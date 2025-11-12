@props([
    'title',
    'stats' => [],
    'description' => null
])


        <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $title }}</h2>
            @if($description)
                <p class="mt-6 text-lg leading-8 text-gray-600">{{ $description }}</p>
        <div class="mx-auto max-w-2xl sm:text-center md:text-center lg:text-center">
            <div class="flex justify-center">
                <h2 class="text-3xl font-bold tracking-tight text-[#1A467F] sm:text-4xl">{{ $title }}</h2>
            </div>
            @if(isset($description))
                <p class="mt-6 text-lg leading-8 text-[#1A467F]">{{ $description }}</p>
        <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $title }}</h2>
            @if(isset($description))
                <p class="mt-6 text-lg leading-8 text-gray-600">{{ $description }}</p>
            @if(isset($description))
                <p class="mt-6 text-lg leading-8 text-[#1A467F]">{{ $description }}</p>
            @endif
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
            <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                @foreach($stats as $stat)
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                        <dt class="text-base leading-7 text-gray-600">{{ $stat['label'] ?? '' }}</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                            {{ $stat['value'] ?? '0' }}
                        <dt class="text-base leading-7 text-[#0D9488] text-center sm:text-center">{{ $stat['label'] }}</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-[#0D9488] sm:text-5xl">
                            {{ $stat['number'] }}
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</div>
