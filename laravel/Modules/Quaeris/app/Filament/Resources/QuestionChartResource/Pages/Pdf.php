<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages;

use Filament\Resources\Pages\Page;
use Modules\Quaeris\Filament\Resources\QuestionChartResource;
use function Safe\readfile;

class Pdf extends Page
    //class Pdf extends Action
{
    protected static string $resource = QuestionChartResource::class;
    protected string $view = 'quaeris::filament.resources.question-chart-resource.pages.pdf';

    /*
    protected function setUp(): void
    {
        parent::setUp();
        dd('aaaa');
    }
    */
    /*
    public function __construct(){
        dd('b');
    }
    */
    /*
    public function mount(QuestionChartResource $a,ListQuestionCharts $b){
        dd([get_class_methods($b)]);
        //dd($b->getParentId);
    }
    */

    /**
     * ---
     */
    protected function getViewData(): array
    {
        $file = 'c:/tmp/tmp.txt';

        header('Content-Description: File Transfer');
        //header('Content-Type: image/png');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="tmp1.txt"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: '.strlen($file));
        readfile($file);
        exit;

        //exit (response()->download('c:/tmp/tmp.txt','download'));
        //return [
        //    'html'=> response()->download('c:/tmp/tmp.txt'),
        //];
    }
}
