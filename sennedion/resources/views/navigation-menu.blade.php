<nav x-data="{ open: false }" class="bg-gray-50 shadow-sm  border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a id="logo" href="{{ route('dashboard') }}">
                        <img src="{{asset('uploads/siyah_onedio.png')}}" width="120px">
                    </a>
                    <div class="ml-6 test">
                        <a href="{{route('home.quizzes.index')}}" style="text-decoration: none">
                           <strong>TEST</strong>
                        </a>
                    </div>
                    <div class="ml-6 test">
                        <a href="{{route('home.news.index')}}" style="text-decoration: none">
                            <strong>HABER</strong>
                        </a>
                    </div>
                    <div class="ml-6 test">
                        <a href="{{route('home.shares.index')}}" style="text-decoration: none">
                            <strong>PAYLAŞIM</strong>
                        </a>
                    </div>
                    <div class="ml-6 profil">
                        <a href="{{ route('profile.show') }}" style="text-decoration: none">
                           <strong>PROFİL</strong>
                        </a>
                    </div>
                </div>
            </div>
            <style>
                @media screen and (max-width:428px){
                    .profil{
                        display: none;
                    }
                    .test{
                        display: none;
                    }
                    #logo{
                        margin-left: 40px;
                    }
                    #admin{
                        margin-left: 20px;
                    }
                }
            </style>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="mr-3">
                    @if(auth()->user()->type=='admin')
                        <a class="mr-3" href="{{route('quizzes.index')}}" style="text-decoration: none">
                            TEST
                        </a>
                        <a class="mr-2" href="{{route('news.index')}}" style="text-decoration: none">
                            HABER
                        </a>
                        <a class="mr-2" href="{{route('shares.index')}}" style="text-decoration: none">
                            PAYLAŞIM
                        </a>
                    @endif
                </div>

                <div class="ml-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                    this.closest('form').submit();" style="text-decoration: none">
                            <strong>ÇIKIŞ</strong>
                        </a>
                    </form>
                </div>

                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">

                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                        <button disabled class="btn btn-primary" style="border-radius: 20px; background-color: #0a53be"><strong class="" style="color: white; font-size: 17px">{{ Auth::user()->name }}</strong></button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Ana Sayfa') }}
            </x-jet-responsive-nav-link>
        </div>
        <div class="ml-3">
            @if(auth()->user()->type=='admin')
                <hr>
                ADMİN

            @endif
        </div>
        <div class="mr-3">
            @if(auth()->user()->type=='admin')
                <a id="admin" href="{{route('quizzes.index')}}" style="text-decoration: none">
                    TEST
                </a>
            @endif
        </div>
        <div class="mr-3">
            @if(auth()->user()->type=='admin')
                <a id="admin" href="{{route('news.index')}}" style="text-decoration: none">
                    HABER
                </a>
            @endif
        </div>
        <div class="mr-3">
            @if(auth()->user()->type=='admin')
                <a id="admin" href="{{route('shares.index')}}" style="text-decoration: none">
                    PAYLAŞIM
                </a>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url}}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">

                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{route('home.quizzes.index')}}" :active="request()->routeIs('profile.show')">
                    {{ __('Test') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{route('home.news.index')}}" :active="request()->routeIs('profile.show')">
                    {{ __('Haber') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{route('home.shares.index')}}" :active="request()->routeIs('profile.show')">
                    {{ __('Paylaşım') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profil') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Çıkış Yap') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
