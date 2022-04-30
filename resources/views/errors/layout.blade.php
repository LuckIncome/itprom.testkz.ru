<!DOCTYPE html>
<html lang="{{session()->get('locale')}}">
  @include('partials.head')
<body>       
  <vue id="app">
    @include('errors.header')
    <main class="main">
      @yield('content')
    </main>
    @include('partials.footer')
    @include('partials.sidebar')
    @include('partials.modals')
  </vue>  
  @include('partials.scripts')
  @yield('scripts')
</body>
</html>