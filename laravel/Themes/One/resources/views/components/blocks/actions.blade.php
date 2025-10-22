@props([
    'items' => []
])

<div class="flex items-center space-x-4">
    @foreach($items as $item)
        @if($item['type'] === 'button')
            <a href="{{ $item['url'] }}" 
               class="inline-flex items-center rounded-md px-4 py-2 text-base font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2
                      @if($item['variant'] === 'primary')
                          bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500
                      @elseif($item['variant'] === 'secondary')
                          bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:ring-primary-500
                      @else
                          bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:ring-primary-500
                      @endif">
                {{ $item['label'] }}
            </a>
        @elseif($item['type'] === 'link')
            <a href="{{ $item['url'] }}" 
               class="text-base font-medium text-gray-900 hover:text-primary-600">
                {{ $item['label'] }}
            </a>
        @endif
    @endforeach
</div>

{{-- Menu Mobile --}}
<div class="mt-3 space-y-1">
    @foreach($items as $item)
        @if($item['type'] === 'button')
            <a href="{{ $item['url'] }}" 
               class="block w-full rounded-md px-3 py-2 text-center text-base font-medium
                      @if($item['variant'] === 'primary')
                          bg-primary-600 text-white hover:bg-primary-700
                      @elseif($item['variant'] === 'secondary')
                          bg-white text-gray-700 border border-gray-300 hover:bg-gray-50
                      @else
                          bg-white text-gray-700 border border-gray-300 hover:bg-gray-50
                      @endif">
                {{ $item['label'] }}
            </a>
        @elseif($item['type'] === 'link')
            <a href="{{ $item['url'] }}" 
               class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">
                {{ $item['label'] }}
            </a>
        @endif
    @endforeach
</div> 