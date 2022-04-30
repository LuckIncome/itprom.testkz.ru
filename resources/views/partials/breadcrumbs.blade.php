@if($template == 'notUnion')
<section class="news-block-item">
    <div class="container">
        <div class="news-block-item__navigation">
            @if(isset($bread_title))
                <a href="/">@lang('general.main')</a> 
                <i class="bi bi-chevron-right"></i> 
                <span>{{$bread_title}}</span>
            @else
                <i class="bi bi-chevron-left"></i> 
                <a href="/">@lang('general.backMainPage')</a> 
            @endif           
        </div>
        @if(isset($title))
            <h1>{{ $title }}</h1>
        @endif
    </div>
</section>
@endif

@if($template == 'Union')
<section class="navigation">
    <div class="container">
        <a href="/">@lang('general.main')</a> 
        <i class="bi bi-chevron-right"></i>
        <span>{{$bread_title}} </span>
    </div>
</section>
@endif

@if($template == 'UnionRule')
<section class="news-block-item">
    <div class="container">
        <div class="news-block-item__navigation">
            <i class="bi bi-chevron-left"></i> 
            <a href="/charter">@lang('general.backUnion')</a> 
        </div>
        @if(isset($title))
            <h1>{{ $title }}</h1>
        @endif
    </div>
</section>
@endif

