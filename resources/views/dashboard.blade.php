<x-app-layout>
    <div class="sm:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="nav-mb sm:hidden fixed left-0 right-0 whitespace-nowrap overflow-x-scroll bg-white h-9">
                <div class="flex flex-row flex-nowrap px-2 justify-between">
                @foreach($navs as $nav)
                    <div class="px-1 items-center {{ $nav['isActive'] ? 'text-teal-600 bg-emerald-50' : '' }}">
                        <a href="{{ route('index', ['firstType' => $nav['firstTypeId'], 'secondType' => $nav['secondTypeId']]) }}">
                            <span>{{ $nav['navigationName'] }}</span>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="grid grid-cols-5 sm:gap-4 content sm:pt-0 pt-9">
                <div class="nav bg-white p-2 border-gray-200 rounded-lg h-max hidden sm:block">
                    @foreach($navs as $nav)
                    <div class="hover:text-teal-600 hover:bg-emerald-50 hover:cursor-pointer pl-4 py-2 {{ $nav['isActive'] ? 'text-teal-600 bg-emerald-50' : '' }}">
                        <a href="{{ route('index', ['firstType' => $nav['firstTypeId'], 'secondType' => $nav['secondTypeId']]) }}">
                            <p class="flex flex-nowrap flex-row items-center">
                                <img class="mr-3 w-5" src="{{ $nav['navigationLogo'] }}">
                                <span>{{ $nav['navigationName'] }}</span>
                            </p>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="matchs col-span-5 sm:col-span-4 bg-white border-gray-200 rounded-md overflow-y-scroll scroll-smooth no-scrollbar" style="height: 90vh;">
                @if(count($data))
                @foreach($data as $match)
                    <div class="matchContent divide-y">
                        <div class="pl-5 bg-neutral-100 sm:bg-neutral-200 text-gray-800 py-2 font-bold">{{ $match['date'] }}</div>
                        @foreach($match['list'] as $item)
                        <div class="sm:hidden">
                            <div class="py-2 flex relative">
                                <span class="ml-3 mr-1 text-sm flex-none absolute">{{ explode(' ', $item['matchTime'])[1] }}&nbsp;&nbsp;{{ $item['competitionName'] }}</span>
                                <div class="text-teal-600 grow flex justify-center items-center text-sm">
                                    @switch($item['status'])
                                    @case(1)
                                        未开赛
                                        @break
                                    @case(2)
                                        <span class="text-red-600 flex justify-center items-center"><img class="w-3 h-3 mr-2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAADdJREFUOE9jZMAB3rq5/UeWEt61ixGbUqyCIIWjBpAQBrgCi+hApLsB6BYykuqCUQMw08fAByIAWCV70Yp/p1oAAAAASUVORK5CYII=">进行中</span>
                                        @break
                                    @case(3)
                                        待定
                                        @break
                                    @case(4)
                                        已结束
                                        @break
                                    @case(5)
                                        延期
                                        @break
                                    @case(6)
                                        待定
                                        @break
                                    @default未开赛
                                @endswitch
                                </div>
                            </div>
                            <div class="flex flex-row flex-nowrap justify-center py-2">
                                <div class="flex flex-col flex-nowrap text-center items-center w-24">
                                    <img src="{{ $item['homeTeamLogo'] }}" alt="" class="h-8 w-8">
                                    <span class="text-center text-sm">{{ $item['homeTeamName'] }}</span>
                                </div>
                                <div class="font-bold flex flex-row flex-nowrap text-center justify-between items-baseline">
                                @if($item['status'] == 2)
                                    <span>{{ $item['homeTeamScore'] }}</span><span class="px-1">:</span><span>{{ $item['awayTeamScore'] }}</span>
                                @else
                                    <span>VS</span>
                                @endif
                                </div>
                                <div class="flex flex-col flex-nowrap text-center items-center w-24">
                                    <img src="{{ $item['awayTeamLogo'] }}" alt="" class="h-8 w-8">
                                    <span class="text-center text-sm">{{ $item['awayTeamName'] }}</span>
                                </div>
                            </div>
                            @if($item['jumpChannelInfoList'])
                            @foreach($item['jumpChannelInfoList'] as $link)
                            <div class="ml-3 my-3 w-fit">
                                <a href="/" class="flex flex-row items-center text-sm text-gray-500 bg-neutral-100 rounded-full px-2 py-1">
                                    <img class="w-2 h-2 mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAADdJREFUOE9jZMAB3rq5/UeWEt61ixGbUqyCIIWjBpAQBrgCi+hApLsB6BYykuqCUQMw08fAByIAWCV70Yp/p1oAAAAASUVORK5CYII=">
                                    {{ $link['title'] }}
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="match sm:flex flex-row flex-nowrap justify-start items-center h-12 hidden">
                            <span class="font-bold text-gray-900 mr-2 pl-4">{{ explode(' ', $item['matchTime'])[1] }}</span>
                            <span class="text-gray-500 whitespace-nowrap min-w-[70px]">{{ $item['competitionName'] }}</span>
                            <span class="w-1 h-5 border-l border-solid border-stone-400 mr-6"></span>
                            <span class="text-teal-600 w-[70px] mr-16">
                            @switch($item['status'])
                                @case(1)
                                    未开赛
                                    @break
                                @case(2)
                                    <span class="text-red-600 flex justify-center items-center"><img class="w-3 h-3 mr-2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAADdJREFUOE9jZMAB3rq5/UeWEt61ixGbUqyCIIWjBpAQBrgCi+hApLsB6BYykuqCUQMw08fAByIAWCV70Yp/p1oAAAAASUVORK5CYII=">进行中</span>
                                    @break
                                @case(3)
                                    待定
                                    @break
                                @case(4)
                                    已结束
                                    @break
                                @case(5)
                                    延期
                                    @break
                                @case(6)
                                    待定
                                    @break
                                @default未开赛
                            @endswitch
                            </span>
                            <div class="grid grid-cols-5 gap-1">
                                <span class="matchInfoLeft flex flex-none justify-end items-center col-span-2">
                                    <span class="mr-1">{{ $item['homeTeamName'] }}</span>
                                    <img src="{{ $item['homeTeamLogo'] }}" class="mr-3 h-6 w-6">
                                </span>
                                <span class="matchInfoCenter mr-1 flex justify-center w-24">
                                    @if($item['status'] == 2)
                                    <span class="text-right inline-block font-bold text-gray-800">{{ $item['homeTeamScore'] }}</span>
                                    <span class="text-center inline-block font-bold text-gray-800 w-7">:</span>
                                    <span class="text-left inline-block font-bold text-gray-800">{{ $item['awayTeamScore'] }}</span>
                                    @else
                                    <span class="text-center inline-block font-bold text-gray-800 w-7">VS</span>
                                    @endif
                                </span>
                                <span class="matchInfoRight flex flex-none justify-start items-center col-span-2">
                                    <img src="{{ $item['awayTeamLogo'] }}" class="mr-3 h-6 w-6">
                                    <span class="mr-1">{{ $item['awayTeamName'] }}</span>
                                </span>
                            </div>
                            @if($item['jumpChannelInfoList'])
                            @foreach($item['jumpChannelInfoList'] as $link)
                            <a href="{{ $link['url'] }}" class="hover:text-teal-600 hover:bg-emerald-50 flex items-center flex-row flex-nowrap rounded-2xl bg-slate-200">
                                <span class="flex justify-center items-center px-2 py-1 text-xs">
                                    <img class="w-2 h-2 mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAADdJREFUOE9jZMAB3rq5/UeWEt61ixGbUqyCIIWjBpAQBrgCi+hApLsB6BYykuqCUQMw08fAByIAWCV70Yp/p1oAAAAASUVORK5CYII=">
                                    {{ $link['title'] }}
                                </span>
                            </a>
                            @endforeach
                            @endif
                        </div>
                        @endforeach
                    </div>
                @endforeach
                @else
                    <div class="flex flex-col flex-nowrap items-center justify-center h-full w-full">
                        <img src="{{ url('/storage/schedule_empty.png') }}" alt="" class="sm:w-40 w-14">
                        <span class="pt-4">暂无数据</span>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
