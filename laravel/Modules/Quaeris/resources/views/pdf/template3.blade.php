@include('quaeris::pdf.css')

<page backtop="{{ $pdf->backtop }}mm" backbottom="{{ $pdf->backbottom }}mm" backleft="{{ $pdf->backleft }}mm"
    backright="{{ $pdf->backright }}mm" style="font-size: {{ $pdf->font_size }}pt; color:{{ $pdf->color }};">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width: 100%; text-align: left">
                    <img src="{{ asset($parent->logo) }}" style="height: 30mm" />
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">

                </td>
                <td style="width: 34%; text-align: center">
                    {{-- page[[page_cu]]/[[page_nb]] --}}
                    QUALITY MONITOR REPORT
                </td>
                <td style="width: 33%; text-align: right">
                    <img src="{{ Theme::asset('img/Q.png') }}" />
                    [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>

    <h1>{{ $survey_title }} - QUALITY MONITOR</h1>
    <br /><br /><br />
    {{-- <h3>2021 - 2022</h3><br /> --}}
    <h3>Aggiornamento SETTIMANA {{ $survey_date_to }}</h3>

    {{-- <h3>{{ $monday_sunday_days['monday'] }} - {{ $monday_sunday_days['sunday'] }}</h3> --}}
    <h3>
        @if($date_from == null)
            fino al {{ $date_to }}
        @else
            dal {{ $date_from }} al {{ $date_to }}
        @endif
    </h3>

    <page pageset="old">
        <p
            style="width: 100%; text-align: center;
        margin-right: 10mm; margin-bottom: 2mm; margin-top: 50mm;
        padding-right: 10mm; padding-bottom: 0mm; padding-top: 0mm;
        font-size: 150%;
        border-top: 0mm; border-top: 0mm;">
            {!! $parent->title !!}
        </p>
    </page>


</page>
@foreach ($rows as $row)
    @if ($row->first()->group_name != '' || $row->first()->group_name != null)
        <page pageset="old">
            <br /><br /><br /><br /><br />
            {{-- <h3>{{ $row->first()->getGroupTitle()[0] }}</h3>
            <br /><br /><br />
            <h3>{{ $row->first()->getGroupTitle()[1] }}</h3> --}}
            <h3>{{ $row->first()->group_name }}</h3>
        </page>
    @endif


    <page pageset="old">
        <table class="tablechart">
            <tr>
                <td colspan="{{ $row->count() }}">
                    @foreach ($row->first()->getQuestionBreads() as $bread)
                        @if (isset($bread->group_question))
                            <p
                                style="width: 90%; text-align: center;
                                margin-right: 10mm; margin-bottom: 2mm; margin-top: 0mm;
                                padding-right: 10mm; padding-bottom: 0mm; padding-top: 0mm;
                                font-size:{{ $pdf->font_size_question - 30 }}%;
                                border-top: 0mm; border-top: 0mm;">
                                {{ $bread->group_question->group_name }}:</p>
                        @endif
                        @php

                            $q_title = strip_tags($bread->question);
                            //$q_title=mb_convert_encoding($q_title, 'Windows-1252', 'UTF-8');
                            //dddx($q_title);
                        @endphp
                        <p
                            style="width: 90%;
                                margin-right: 10mm; margin-bottom: 2mm; margin-top: 0mm;
                                padding-right: 10mm; padding-bottom: 0mm; padding-top: 0mm;
                                font-size: {{ $pdf->font_size_question }}%;
                                border-top: 0mm; border-top: 0mm;">

                            {!! $q_title !!}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                @foreach ($row as $img)
                    <td style="width: {{ ($img->col_size * 100) / 12 }}% ">
                        <h3>{{ mb_convert_encoding($img->title, 'Windows-1252', 'UTF-8') }}</h3>
                        <img src=" {{ asset($img->img_src) }}" {{-- style="width: 90%" --}} />
                        @if ($debug)
                            <div style="border:1px dashed darkgreen">
                                ID: {{ $img->id }}<br />
                                question: {{ $img->question }}<br />
                                Title:
                                @foreach ($img->getQuestionBreads() as $bread)
                                    {{ $bread->title }}-
                                @endforeach
                                <br />Type:
                                @foreach ($img->getQuestionBreads() as $bread)
                                    {{ $bread->type }}-
                                @endforeach
                                <br />
                                subquestion: {{ $img->subquestion }}<br />
                                Pos: {{ $img->pos }}<br />
                                col_size : {{ $img->col_size }}<br />
                                wxh {{ $img->width }} x {{ $img->height }}<br />
                                obbligatorio: {{ $img->mandatory }}
                            </div>
                        @endif
                    </td>
                @endforeach
            </tr>
        </table>
    </page>
@endforeach
