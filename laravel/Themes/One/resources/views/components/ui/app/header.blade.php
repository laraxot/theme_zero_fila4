<header class="text-white bg-emerald-700">
	<div class="h-12 bg-emerald-900 min-h-12 navbar">
		<div class="flex justify-between w-full max-w-screen-xl mx-auto">
			<div class="flex-1 py-1">
				<a class="text-sm" href="#">Nome della Regione</a>
			</div>
			<div class="flex-none">
				<ul class="px-1 menu menu-horizontal">
					<livewire:dark-mode-switcher />
					<livewire:lang.switcher />
					{{-- <li>
						<details>
							<summary>ITA</summary>
							<ul class="p-2 !mt-0 bg-white text-gray-950 rounded">
								<li><a>ITA</a></li>
								<li><a>ENG</a></li>
							</ul>
						</details>
					</li> --}}
					<li>
						<a class="flex items-center space-x-1" href="{{ route('login') }}">
							<x-heroicon-o-user class="size-4" />
							<div class="hidden md:block">@lang('pub_theme::navigation.main_menu.login.label')</div>
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
						<div class="text-2xl font-bold">Il mio Comune</div>
						<div class="text-sm">Un comune da vivere</div>
					</div>
				</a>
			</div>
			<div class="flex-none">
				<ul class="items-center hidden px-1 menu menu-horizontal md:inline-flex md:me-2">
					<li> <a>Seguici su</a> </li>
					@foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $i)
					<li>
						<a class="p-2">
							<x-heroicon-o-link class="size-5" />
						</a>
					</li>
					@endforeach
				</ul>
				<ul class="items-center px-1 menu menu-horizontal">
					<li class="hidden sm:block">Cerca</li>
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
