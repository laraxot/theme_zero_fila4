<header class="text-white bg-emerald-700">
	<div class="h-12 bg-emerald-900 min-h-12 navbar">
		<div class="flex justify-between w-full max-w-screen-xl mx-auto">
			<div class="flex-1 py-1">
				<a class="text-sm" href="#">@lang('pub_theme::common.region_name')</a>
			</div>
			<div class="flex-none">
				<ul class="px-1 menu menu-horizontal">
					<livewire:dark-mode-switcher />
					<livewire:lang.switcher />
					<li>
						<a class="flex items-center space-x-1" href="{{ route('login') }}">
							<x-heroicon-o-user class="size-4" />
							<div class="hidden md:block">@lang('pub_theme::common.login_area')</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="navbar">
		<div class="flex justify-between w-full max-w-screen-xl mx-auto">
			<div class="flex-1">
				<a href="" class="flex items-center py-2 space-x-4">
					<x-heroicon-o-shield-check class="stroke-1 size-16" />
					<div class="text-start">
						<div class="text-2xl font-bold">@lang('pub_theme::common.municipality.name')</div>
						<div class="text-sm">@lang('pub_theme::common.municipality.tagline')</div>
					</div>
				</a>
			</div>
			<div class="flex-none">
				<ul class="items-center hidden px-1 menu menu-horizontal md:inline-flex md:me-2">
					<li> <a>@lang('pub_theme::common.follow_us')</a> </li>
					@foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $i)
					<li>
						<a class="p-2">
							<x-heroicon-o-link class="size-5" />
						</a>
					</li>
					@endforeach
				</ul>
				<ul class="items-center px-1 menu menu-horizontal">
					<li class="hidden sm:block">@lang('pub_theme::common.search')</li>
					<li class="ms-2">
						<a class="bg-white border-0 btn btn-circle hover:bg-emerald-50 text-emerald-800">
							<x-heroicon-o-magnifying-glass class="size-5" />
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="hidden h-12 overflow-auto min-h-12 navbar md:flex">
		<div class="flex justify-between w-full max-w-screen-xl mx-auto space-x-12">
			<div class="flex-1 ">
				<ul class="items-center px-1 menu menu-horizontal flex-nowrap">
					<li><a href="">Amministrazione</a></li>
					<li><a href="">Novità</a></li>
					<li><a href="">Servizi</a></li>
					<li><a href="">Vivere il Comune</a></li>
				</ul>
			</div>
			<div class="flex-none">
				<ul class="items-center px-1 menu menu-horizontal flex-nowrap">
					<li><a href="">Iscrizioni</a></li>
					<li><a href="">Estate in città</a></li>
					<li><a href="">Polizia locale</a></li>
					<li>
						<a href="">
							<div>Tutti gli argomenti</div>
							<x-heroicon-o-chevron-right class="size-4" />
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
