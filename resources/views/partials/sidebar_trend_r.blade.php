<div class="content">
    <div class="interior__recommendations">
        {{--<div class="interior__recommendations-title">
            @lang('general.recentReviews')
        </div>--}}
        <ul class="interior__recommendations-menu">
            @foreach ($trends as $t)
                <li>
                    <a href="{{route('trends.show', ['trends' => $t->slug])}}">
                        {{$t->title}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>