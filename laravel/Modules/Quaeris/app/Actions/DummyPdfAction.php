<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use function Safe\realpath;
use Spatie\QueueableAction\QueueableAction;
use Spipu\Html2Pdf\Html2Pdf;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DummyPdfAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(): BinaryFileResponse
    {
        //return $this->executeTwo();
        return $this->executeOne();
    }

    public function executeOne(): BinaryFileResponse
    {
        include_once realpath(__DIR__.'/../../Xot/Services/vendor/autoload.php');
        $html2pdf = new Html2Pdf('P', 'A4', 'en');
        $html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');

        $filename = 'my_doc.pdf';
        $path = Storage::disk('cache')->path($filename);
        $html2pdf->output($path, 'F');
        $res = $html2pdf->output($path, 'F');
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return response()->download($path, $filename, $headers);
    }

    public function executeTwo(): Response
    {
        include_once realpath(__DIR__.'/../../Xot/Services/vendor/autoload.php');
        $html2pdf = new Html2Pdf('P', 'A4', 'en');
        $html2pdf->writeHTML('<h1>HelloWorld</h1>This is my second test');

        $filename = 'my_doc.pdf';
        $content = $html2pdf->output($filename, 'S');
        $headers = [
            'Content-type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ];

        return response()->make($content, 200, $headers);
    }
}
