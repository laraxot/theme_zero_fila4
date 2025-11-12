<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\SurveyPdf;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use function Safe\date;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportTypeAction
{
    use QueueableAction;

    /**
     * @return BinaryFileResponse
     */
    public function execute(SurveyPdf $surveyPdf, string $type, AnswersFilterData $answersFilterData)
    {
        if (Str::startsWith($type, 'xls_')) {
            $export = Str::after($type, 'xls_');
            $export = Str::Studly($export);
            $export = '\Modules\Quaeris\Exports\\'.$export.'Export';
            // dddx($export);
            $xlsData = new $export($surveyPdf, $answersFilterData);
            $filename = $surveyPdf->name.'_'.$type.'_'.$answersFilterData->getSlug().'-'.date('Ymd');
            $filename = Str::slug($filename).'.xlsx';

            return Excel::download($xlsData, $filename);
        }

        $actionName = Str::studly($type).'Action';
        $action = self::class.'\\'.$actionName;
        return app($action)->execute($surveyPdf, $answersFilterData);
    }
}
