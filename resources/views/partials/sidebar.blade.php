<div class="search" :class="[{'search__show': isSearch}, {'search__show search__show-solo': isSearchSolo}]">
    <div class="container">
        <a href="/" class="search__logo" v-if="isMenu">
            <img src="{{Voyager::image(setting('site.header_logo'))}}" alt="logo">
        </a>
        <form id="search" action="{{ route('search') }}" method="POST">
            @csrf
            <input type="text" name="header_search" placeholder="@lang('general.search')">
            <button type="submit">
                <i class="bi bi-search"></i>
            </button>
            <div @click="toggleWrapper">
                <i class="bi bi-x-lg"></i>
            </div>
        </form>
    </div>
</div>

<div class="sidebar" :class="{'sidebar__show': isSidebar}">
    {{menu('sidebar_header_menu','vendor.voyager.menu.sidebar_header_menu')}}
</div>

<div class="sidebar-mobile" :class="{'sidebar-mobile__show': isSidebar}">
    <a href="/" class="sidebar-mobile__logo">
        <img src="{{ Voyager::image(setting('site.header_logo')) }}" alt="logo">
    </a>
    {{menu('mobile_header_menu','vendor.voyager.menu.mobile_header_menu')}}
    <ul class="sidebar-mobile__lang">
        <li><a href="/locale/kz" @if(session()->get('locale') == 'kz') class="active" @endif>KAZ</a></li>
        <li><a href="/locale/ru" @if(session()->get('locale') == 'ru') class="active" @endif>RUS</a></li>
        <li><a href="/locale/en" @if(session()->get('locale') == 'en') class="active" @endif>ENG</a></li>
    </ul>
</div>