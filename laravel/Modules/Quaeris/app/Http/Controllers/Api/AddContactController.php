<?php

declare(strict_types=1);

namespace Modules\Quaeris\Http\Controllers\Api;

use function gettype;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use function in_array;
use Modules\Quaeris\Actions\SendInviteAction;
use Modules\Quaeris\Actions\UpdateContactTokenAction;
use Modules\Quaeris\Models\Contact;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\Xot\Datas\JsonResponseData;
use Modules\Xot\Http\Controllers\XotBaseController;
use function Safe\date;
use Spatie\QueueableAction\ActionJob;

class AddContactController extends XotBaseController
{
    public function __invoke(Request $request): JsonResponse
    {
        $default = [
            'id' => null,
            'language' => 'it',
            'usesleft' => 1,
        ];

        $data = $request->all();
        $user_id = auth()->id();
        $user = auth()->user();

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/app_requests_'.date('Y-m-d').'.log'),
        ])->info('app.requests', ['ip' => $request->ip(), 'user_id' => $user_id, 'type' => gettype($data), 'data' => $data]);

        if (! $user instanceof Authenticatable) {
            return $this->sendError('Unauthorised.', ['error' => 'user is not existing'], 500);
        }

        // if ($user->currentTeam == null) {
        //     $err = 'you can not manage survey pdf';

        //     return $this->sendError('Unauthorised.', ['error' => $err], 403);
        // }

        // Assert::isInstanceof($user->currentTeam, \Modules\Quaeris\Models\Customer::class);
        // // dddx($user->currentTeam->surveyPdfs);
        // if (! in_array($data['survey_pdf_id'], $user->currentTeam->surveyPdfs->modelKeys())) {
        //     $err = 'you can not manage survey pdf [' . $data['survey_pdf_id'] . ']';

        //     return $this->sendError('Unauthorised.', ['error' => $err], 403);
        // }

        $teams = $user->teams()->get();

        // $surveyPdfs_ids = SurveyPdf::whereIn('customer_id', $teams->modelKeys())->get()->modelKeys();
        $surveyPdfs = SurveyPdf::whereIn('customer_id', $teams->modelKeys())->get();
        $surveyPdfs_ids = $surveyPdfs->modelKeys();

        if (! in_array($data['survey_pdf_id'], $surveyPdfs_ids, false)) {
            $err = 'you can not manage survey pdf ['.$data['survey_pdf_id'].']';
            $errorData = [];
            $errorData['error'] = $err;
            //$errorData['surveyPdfs_ids']=$surveyPdfs_ids;
            //$errorData['user']=$user;
            //$errorData['teams_get']=$user->teams()->get();
            //$errorData['teams_sql']=rowsToSql($user->teams());
            //$errorData['teams']=$teams;
            $errorData['form_data'] = $data;

            return JsonResponseData::from([
                'success' => false,
                'message' => 'Unauthorised.',
                'status' => 403,
                'data' => $errorData,
            ])->response();
            //return $this->sendError('Unauthorised.', ['error' => $err], 403);
        }

        $data = array_filter($data, fn ($v, $k): bool => ! empty($v), ARRAY_FILTER_USE_BOTH);

        // dddx($data);

        $validator = Validator::make($data, [
            'survey_pdf_id' => 'integer',
            'mobile_phone' => 'required_without:email', // |digits:10',
            'email' => 'required_without:mobile_phone|email',
            // 'language' => 'required|string', //se vuoto default IT
            // 'usesleft' => 'required|integer', // se vuoit default 1
            // 'attribute_1' => 'required',
            // 'attribute_2' => 'required',
            // 'attribute_3' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->all());
        }

        $data = array_merge($default, $data);

        $contact = Contact::create($data);

        /** @phpstan-ignore-next-line */
        app(UpdateContactTokenAction::class)
            ->onQueue()
            ->execute($contact)
            ->chain([
                new ActionJob(SendInviteAction::class, [$contact]),
            ]);

        return $this->sendResponse('added contact', $contact->toArray());
    }
}
