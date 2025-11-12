@props(['slug'])

@php
    $section = \Modules\Cms\Models\Section::where('slug', $slug)->first();
    if (!$section) {
        return;
    }
    $blocks = $section->blocks ?? [];
@endphp

<section {{ $attributes->merge([
    'class' => $section->attributes['class'] ?? '',
    'id' => $section->attributes['id'] ?? $slug,
]) }}>
    @if($slug === 'header')
        @includeIf('components.sections.header', ['section' => $section, 'blocks' => $blocks, 'class' => $attributes->get('class')])
    @elseif($slug === 'footer')
        @includeIf('components.sections.footer', ['section' => $section, 'blocks' => $blocks, 'class' => $attributes->get('class')])
    @else
        @foreach($blocks as $block)
            @php
                $blockComponent = "cms::blocks.{$block['type']}";
                $blockData = $block['data'] ?? [];
            @endphp
            @if(View::exists($blockComponent))
                <x-dynamic-component
                    :component="$blockComponent"
                    :data="$blockData"
                    class="block-{{ $block['type'] }}"
                />
            @endif
        @endforeach
    @endif
</section>
