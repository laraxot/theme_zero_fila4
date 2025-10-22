<x-filament::page>
    <table class="table table-bordered">
        <tr>
            <td>
                <h3>
                    <br />Question type : {{ $question_type }}
                    <br />field_name : {{ $field_name }}
                    <br />date range : {{ $q->date_from }} - {{ $q->date_to }}
                    <br />qid : {{ $q->question }}
                    <br />parent_qid : {{ $q->parent_qid }}
                    {{-- dddx($q->limeQuestion) --}}
                    {{-- <br />Tot : {{ $tot }} --}}
                    {{-- <br />Risp : {{ $risp }} --}}
                    {{-- <br />Not Risp : {{ $not_risp }} --}}
                    @foreach ($q->charts as $chart)
                        <br /> Type : {{ $chart['type'] }}
                    @endforeach
                </h3>
            </td>
            <td>
                {{-- @foreach ($filenames as $filename)
                    <img src="{{ asset($filename) }}" />
                @endforeach --}}
                <img src="{{ asset($q->img_src) }}" />
                <div id="main1"></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>

            </td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            @foreach ($data as $v)
                <td>
                    <table class="table table-bordered">
                        @foreach ($v->answers as $v1)
                            <tr>
                                <td>{{ $v1->label }}</td>
                                <td>
                                    <pre>{{ print_r($v1->value, true) }}</pre>
                                </td>
                                <td>
                                    <pre>{{ print_r($v1->avg, true) }}</pre>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            @endforeach
        </tr>
    </table>
</x-filament::page>
