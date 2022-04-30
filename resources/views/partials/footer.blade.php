<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="content">
                <a href="/" class="logo">
                    <img src="{{Voyager::image(setting('site.footer_logo'))}}" alt="logo">
                </a>
                <p>
                    @lang('general.footer_text')
                </p>
            </div>

            <div class="content">
                <a href="{{route('pages.get',$pages['contacts']->first()->slug)}}" class="link">@lang('general.contactUs')</a>
                <div class="messenger">
                    <a href="mailto:{{ $email->value }}" class="email">{{ $email->value }}</a>
                    <div class="network">
                        @foreach ($socials as $social)
                            <a href="{{ $social->link }}">
                                <img src="{{ Voyager::image($social->icon) }}" alt="{{ $social->value }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <p>© {{ date('Y') }} IT Prom.</p>
            <p>@lang('general.allRightsReserved').</p>
            <a href="{{route('pages.get',$pages['policy']->first()->slug)}}">@lang('general.privacyPolicy_mini')</a>
            <div class="content">
                <p>@lang('general.developed')</p>
                <a href="https://i-marketing.kz"> <img src="{{ asset('assets/images/icons/logo-im.svg') }}" alt="i-marketing"></a>
            </div>
        </div>
    </div>
</footer>