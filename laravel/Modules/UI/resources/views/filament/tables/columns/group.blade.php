<?php

declare(strict_types=1);

?>
@php
    $fields=$getFields();
    $record=$getRecord();
@endphp
<div
    {{
        $attributes
            ->merge($getExtraAttributes(), escape: false)
            ->class([
                'fi-ta-icon flex flex-wrap gap-1.5',
                'px-3 py-4' => ! $isInline(),
                //'flex-col' => $isListWithLineBreaks(),
                'flex-col' => true,
            ])
    }}
>
    @foreach ($fields as $field)
        @php
            $state=$field->record($record)->getState();
            if($state==null){
                continue;
            }
            try{
                $out=str_replace(', ',',<br/>',$state).'<br/>';
            }catch(\TypeError $e){
                $out=$field->record($record)->render();
            }
        @endphp
        {!! $out !!}
    @endforeach
</div>
