<div 
    class="bg-[#272C4D]">
<!-- INIZIO HEADER -->
    <div x-data="{ mobileMenuOpen: false }" class="relative">
      <!-- Header Bar -->
      <div class="w-full h-18 p-4 lg:p-8 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex-shrink-0">
          <img src="/img/logo.png" class="h-7 lg:h-14" alt="Logo" />
        </div>

        <!-- Desktop Navigation - Hidden on Mobile -->
        <div class="hidden lg:flex flex-row items-center space-x-6">
          <a href="/{{ $lang }}/" class="text-white hover:text-gray-200 text-lg transition-colors duration-200">
            @lang('pub_theme::navigation.main_menu.home.label')
          </a>
          <a href="/{{ $lang }}/pages/progetto" class="text-white hover:text-gray-200 text-lg transition-colors duration-200">
            @lang('pub_theme::navigation.main_menu.project.label')
          </a>
          <a href="/{{ $lang }}/pages/partners" class="text-white hover:text-gray-200 text-lg transition-colors duration-200">
            @lang('pub_theme::navigation.main_menu.partners.label')
          </a>
        </div>

        <!-- Desktop Actions - Hidden on Mobile -->
        <div class="hidden lg:flex items-center space-x-4">
          <!-- Language Switcher Desktop ONLY -->
          <div class="hidden lg:block">
            <x-blocks.navigation.language-switcher alignment="right" />
          </div>
          
          <!-- User Actions - Conditional based on authentication -->
          @auth
            <!-- User Avatar Dropdown for Authenticated Users -->
            <div class="relative" x-data="{ userDropdownOpen: false }">
              <button 
                @click="userDropdownOpen = !userDropdownOpen"
                @click.away="userDropdownOpen = false"
                class="flex items-center text-white hover:text-gray-200 transition-colors duration-200 focus:outline-none"
              >
                <!-- Avatar -->
                @if(auth()->user()->profile_photo_url)
                  <img 
                    src="{{ auth()->user()->profile_photo_url }}" 
                    alt="{{ auth()->user()->name }}" 
                    class="h-8 w-8 rounded-full object-cover border-2 border-white/20"
                  >
                @else
                  <div class="h-8 w-8 rounded-full bg-white/20 flex items-center justify-center text-white font-semibold text-sm">
                    {{ substr(auth()->user()->name, 0, 1) }}
                  </div>
                @endif
                
                <!-- User Name (hidden on smaller screens) -->
                <span class="ml-2 text-white text-lg hidden xl:inline">{{ auth()->user()->name }}</span>
                
                <!-- Dropdown Arrow -->
                <svg class="ml-1 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
              
              <!-- User Dropdown Menu -->
              <div 
                x-show="userDropdownOpen" 
                x-transition:enter="transition ease-out duration-100" 
                x-transition:enter-start="transform opacity-0 scale-95" 
                x-transition:enter-end="transform opacity-100 scale-100" 
                x-transition:leave="transition ease-in duration-75" 
                x-transition:leave-start="transform opacity-100 scale-100" 
                x-transition:leave-end="transform opacity-0 scale-95" 
                class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50"
                style="display: none;"
              >
                <div class="py-1">
                  <!-- User Info -->
                  <div class="px-4 py-2 text-sm text-gray-900 border-b border-gray-100">
                    <div class="font-medium">{{ auth()->user()->name }}</div>
                    <div class="text-gray-500 truncate">{{ auth()->user()->email }}</div>
                  </div>
                  
                  <!-- Profile Link -->
                  <a href="/{{ $lang }}/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <div class="flex items-center">
                      <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                      @lang('pub_theme::navigation.user.profile.label')
                    </div>
                  </a>
                {{--  
                  <!-- Dashboard Link -->
                  <a href="/{{ $lang }}/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <div class="flex items-center">
                      <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z" />
                      </svg>
                      @lang('pub_theme::navigation.user.dashboard.label')
                    </div>
                  </a>
                  --}}
                  <!-- Divider -->
                  <hr class="border-gray-100">
                  
                  <!-- Logout Form -->
                  <form action="/{{ $lang }}/auth/logout" method="GET">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                      <div class="flex items-center">
                        <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        @lang('pub_theme::navigation.user.logout.label')
                      </button>
                  </form>
                </div>
              </div>
            </div>
          @else
            <!-- Login/Register Buttons for Guest Users -->
            <div class="flex items-center space-x-4">
              <a href="/{{ $lang }}/auth/login" class="text-white hover:text-gray-200 text-lg transition-colors duration-200">
                @lang('pub_theme::navigation.main_menu.login.label')
              </a>
              <a href="/{{ $lang }}/auth/register">
                <button class="text-white text-lg bg-[#FF5F7E] py-3 px-6 rounded-lg">
                  @lang('pub_theme::navigation.main_menu.register.label')
                </button>
              </a>
            </div>
          @endauth
        </div>

        <!-- Mobile Hamburger Button - Only visible on Mobile -->
        <button 
          @click="mobileMenuOpen = !mobileMenuOpen"
          class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white transition-colors duration-200"
          aria-label="@lang('pub_theme::navigation.language_switcher.choose_language.label')"
        >
          <!-- Hamburger Icon -->
          <svg x-show="!mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!-- Close Icon -->
          <svg x-show="mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu Dropdown - Only visible on Mobile when opened -->
      <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4"
        @click.away="mobileMenuOpen = false"
        class="lg:hidden absolute top-full left-0 right-0 bg-black z-50 mx-2 mt-2 rounded-xl shadow-2xl border border-white/10"
        style="display: none;"
       >
        <div class="px-6 py-6 space-y-6">
          <!-- Navigation Links -->
          <div class="space-y-4">
            <a href="/{{ $lang }}/" 
               @click="mobileMenuOpen = false"
               class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
              @lang('pub_theme::navigation.main_menu.home.label')
            </a>
            <a href="/{{ $lang }}/pages/progetto" 
               @click="mobileMenuOpen = false"
               class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
              @lang('pub_theme::navigation.main_menu.project.label')
            </a>
            <a href="/{{ $lang }}/pages/partners" 
               @click="mobileMenuOpen = false"
               class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
              @lang('pub_theme::navigation.main_menu.partners.label')
            </a>
          </div>

          <!-- Divider -->
          <hr class="border-white/20">

          <!-- Language Switcher -->
          <div class="py-2">
            <div class="text-white text-sm font-medium mb-3 px-4">
              @lang('pub_theme::navigation.language_switcher.choose_language.label')
            </div>
            <x-blocks.navigation.language-switcher :mobileView="true" />
          </div>

          <!-- Divider -->
          <hr class="border-white/20">

          <!-- User Actions for Mobile - Conditional based on authentication -->
          @auth
            <!-- User Info for Mobile -->
            <div class="py-2">
              <div class="flex items-center px-4 py-3">
                @if(auth()->user()->profile_photo_url)
                  <img 
                    src="{{ auth()->user()->profile_photo_url }}" 
                    alt="{{ auth()->user()->name }}" 
                    class="h-10 w-10 rounded-full object-cover border-2 border-white/20"
                  >
                @else
                  <div class="h-10 w-10 rounded-full bg-white/20 flex items-center justify-center text-white font-semibold">
                    {{ substr(auth()->user()->name, 0, 1) }}
                  </div>
                @endif
                <div class="ml-3">
                  <div class="text-white font-medium">{{ auth()->user()->name }}</div>
                  <div class="text-white/70 text-sm">{{ auth()->user()->email }}</div>
                </div>
              </div>
            </div>

            <!-- User Menu Items for Mobile -->
            <div class="space-y-2">
              <a href="/{{ $lang }}/profile" 
                 @click="mobileMenuOpen = false"
                 class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
                <div class="flex items-center">
                  <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  @lang('pub_theme::navigation.user.profile.label')
                </div>
              </a>
              <a href="/{{ $lang }}/dashboard" 
                 @click="mobileMenuOpen = false"
                 class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
                <div class="flex items-center">
                  <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z" />
                  </svg>
                  @lang('pub_theme::navigation.user.dashboard.label')
                </div>
              </a>
            </div>

            <!-- Divider -->
            <hr class="border-white/20">

            <!-- Logout for Mobile -->
            <form action="/{{ $lang }}/auth/logout" method="POST">
              @csrf
              <button type="submit" 
                      @click="mobileMenuOpen = false"
                      class="w-full text-left text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
                <div class="flex items-center">
                  <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
                  @lang('pub_theme::navigation.user.logout.label')
                </div>
              </button>
            </form>
          @else
            <!-- Login/Register Buttons for Mobile -->
            <div class="space-y-4 pt-2">
              <a href="/{{ $lang }}/auth/login" 
                 @click="mobileMenuOpen = false"
                 class="block text-white text-lg font-medium py-3 px-4 hover:bg-white/10 rounded-lg transition-colors duration-200">
                @lang('pub_theme::navigation.main_menu.login.label')
              </a>
              <a href="/{{ $lang }}/auth/register" 
                 @click="mobileMenuOpen = false"
                 class="block">
                <button class="w-full text-white text-lg bg-transparent border-2 border-white py-3 px-6 rounded-lg hover:bg-white/10 transition-colors duration-200">
                  @lang('pub_theme::navigation.main_menu.register.label')
                </button>
              </a>
            </div>
          @endauth
        </div>
      </div>
    </div>
    <!-- FINE HEADER -->
</div>