<!DOCTYPE html>
<html lang="{{session()->get('locale')}}">
  @include('partials.head')
<body>       
  <vue id="app"> 
    @if ($page->type == 'home')
      @include('partials.main_page_html')
    @endif
    @include('partials.header')
    <main class="main">
      @yield('content')
      <button class="scroll-up" onclick="window.scrollTo(0, 0);">
        <i class="bi bi-arrow-up"></i>
      </button>
    </main>
    @include('partials.footer')
    @include('partials.sidebar')   
  </vue> 
  @include('partials.modals') 
  @include('partials.scripts')
  @yield('scripts')
</body>
</html>