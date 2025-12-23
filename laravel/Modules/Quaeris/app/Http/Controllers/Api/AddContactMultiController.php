<?php

declare(strict_types=1);

namespace Modules\Quaeris\Http\Controllers\Api;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Quaeris\Actions\Contact\CreateContactFromArrayAction;
use Modules\Xot\Datas\JsonResponseData;
use Modules\Xot\Http\Controllers\XotBaseController;
use function Safe\json_decode;
use Webmozart\Assert\Assert;

class AddContactMultiController extends XotBaseController
{
    public function __invoke(Request $request): JsonResponse
    {
        $all = $request->all();
        $datas = json_decode($all['data'], true);

        $user_id = auth()->id();
        $user = auth()->user();

        if (! $user instanceof Authenticatable) {
            return $this->sendError('Unauthorised.', ['error' => 'user is not existing'], 500);
        }
        if (! \is_array($datas)) {
            return JsonResponseData::from([
                'success' => false,
                'message' => 'datas not array.',
                'status' => 403,
                'data' => ['all' => $all],
            ])->response();
        }

        foreach ($datas as $data) {
            Assert::isArray($data, '['.__LINE__.']['.class_basename($this).']');
            app(CreateContactFromArrayAction::class)->execute(data: $data);
        }

        return $this->sendResponse('added contact n.'.\count($datas), []);
    }
}
