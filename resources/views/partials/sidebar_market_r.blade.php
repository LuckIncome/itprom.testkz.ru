<div class="content">
    <div class="interior__recommendations">
        <div class="interior__recommendations-title">
            @lang('general.recentReviews')
        </div>
        <ul class="interior__recommendations-menu">
            @foreach ($markets as $m)
                <li>
                    <a href="{{route('market.show', ['market' => $m->slug])}}">
                        {{$m->title}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>