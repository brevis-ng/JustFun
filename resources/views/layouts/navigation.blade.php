<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex justify-between flex-row flex-nowrap items-center w-full sm:w-auto">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-5 sm:h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        比赛
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('download')" :active="request()->routeIs('download')">
                        下载客户端
                    </x-nav-link>
                </div>
                <div class="sm:hidden"><a href="{{ route('index') }}">比赛</a></div>
                <div class="sm:hidden"><a class="text-sm text-white bg-teal-400 px-2 py-1 rounded-md" href="{{ route('download') }}">下载客户端</a></div>
            </div>
        </div>
    </div>
</nav>
