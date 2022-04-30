<div class="content">
    <ul class="interior__menu">
        <li>
            <a href="{{route('pages.get',$pages['about']->first()->slug)}}" @if(strpos(url()->current(), 'about')) class="active" @endif>@lang('general.generalInformation')</a>
        </li>
        <li>
            <a href="{{route('pages.get',$pages['charter']->first()->slug)}}" @if(strpos(url()->current(), 'charter')) class="active" @endif>{{$pages['charter']->first()->title}}</a>
        </li>
        <li>
            <a href="{{route('pages.get',$pages['members']->first()->slug)}}" @if(strpos(url()->current(), 'members')) class="active" @endif>{{$pages['members']->first()->title}}</a>
        </li>
        <li>
            <a href="{{route('pages.get',$pages['join']->first()->slug)}}" @if(strpos(url()->current(), 'join')) class="active" @endif>{{$pages['join']->first()->title}}</a>
        </li>
        <li><a href="{{route('pages.get',$pages['projects']->first()->slug)}}" @if(strpos(url()->current(), 'projects')) class="active" @endif>{{$pages['projects']->first()->title}}</a></li>
    </ul>
    @if(strpos(url()->current(), 'charter') === false)
    <div class="interior__network">
        @foreach ($socials as $soc)
            <a href="{{ $soc->link }}"><img src="{{ Voyager::image($soc->icon) }}" alt="{{ $soc->value }}"></a>
        @endforeach
    </div>
    @endif
</div>

