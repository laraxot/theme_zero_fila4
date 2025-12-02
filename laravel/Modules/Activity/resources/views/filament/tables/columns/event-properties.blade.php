<?php

declare(strict_types=1);

?>
@foreach($getState() as $variable => $value)
    <p>
        {{$variable}}={{$value}}
        @if(!$loop->last),
        @endif
    </p>
@endforeach
