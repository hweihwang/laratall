<nav id="header" class="fixed w-full z-10 top-0">
    <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
        <div class="pl-4">
            <div class="space-y-6">
                <a href="{{ route('home') }}">
                    <x-logo/>
                </a>
            </div>
        </div>
        <div class="pr-4">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="text-sm font-semibold text-indigo-600"
                        >
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-indigo-600">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold text-indigo-600">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
