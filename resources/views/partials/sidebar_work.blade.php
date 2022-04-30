<div class="content">
    <ul class="union-members__menu">
        <li><a href="{{route('pages.get',$pages['analytics']->first()->slug)}}" @if(strpos(url()->current(), 'analytics')) class="active" @endif>@lang('general.industryToday')</a></li>
        <li><a href="{{route('pages.get',$pages['trends']->first()->slug)}}" @if(strpos(url()->current(), 'trends')) class="active" @endif>{{$pages['trends']->first()->title}}</a></li>
        <li><a href="{{route('pages.get',$pages['work']->first()->slug)}}" @if(strpos(url()->current(), 'work')) class="active" @endif>{{$pages['work']->first()->title}}</a></li>
        <li><a href="{{route('pages.get',$pages['reviews']->first()->slug)}}" @if(strpos(url()->current(), 'reviews')) class="active" @endif>{{$pages['reviews']->first()->title}}</a></li>
    </ul>
    <div class="union-members__network">
        @foreach ($socials as $soc)
            <a href="{{ $soc->link }}"><img src="{{ Voyager::image($soc->icon) }}" alt="{{ $soc->value }}"></a>
        @endforeach
    </div>
</div>