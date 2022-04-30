<ul class="sidebar__menu">
  @php
    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }
  @endphp
  @foreach ($items as $item)
  @php

      $originalItem = $item;
      if (Voyager::translatable($item)) {
          $item = $item->translate($options->locale);
      }

      $isActive = null;
      $styles = null;
      $icon = null;

      // Background Color or Color
      if (isset($options->color) && $options->color == true) {
          $styles = 'color:'.$item->color;
      }
      if (isset($options->background) && $options->background == true) {
          $styles = 'background-color:'.$item->color;
      }

      // Check if link is current
      if(url($item->link()) == url()->current() || \Str::contains(url()->current(),$item->link())){
          $isActive = 'active';
      }

  @endphp 
  @if(!$originalItem->children->isEmpty())
  <li><button @click="toggleMenuTab({{ $item->id }})" :class="{'active': menuTabValue == {{ $item->id }}}">{{ $item->title }}</button></li> 
  @else 
    <li><a href="{{ url($item->link()) }}">{{ $item->title }}</a></li>
  @endif
  @endforeach
  <ul class="sidebar__lang">
      <li><a href="/locale/kz" @if(session()->get('locale') == 'kz') class="active" @endif>KAZ</a></li>
      <li><a href="/locale/ru" @if(session()->get('locale') == 'ru') class="active" @endif>RUS</a></li>
      <li><a href="/locale/en" @if(session()->get('locale') == 'en') class="active" @endif>ENG</a></li>
  </ul>
</ul>
<div class="sidebar__tabs"> 
  <transition name="fade" mode="out-in" key="open">
      @foreach ($items as $item1)
      @php
      $originalItem = $item1;
      if (Voyager::translatable($item1)) {
          $item1 = $item1->translate($options->locale);
      }

      $isActive = null;
      $styles = null;
      $icon = null;

      // Background Color or Color
      if (isset($options->color) && $options->color == true) {
          $styles = 'color:'.$item1->color;
      }
      if (isset($options->background) && $options->background == true) {
          $styles = 'background-color:'.$item1->color;
      }

      // Check if link is current
      if(url($item1->link()) == url()->current() || \Str::contains(url()->current(),$item1->link())){
          $isActive = 'active';
      }
      @endphp 
       
        <div class="tab" v-if="menuTabValue == {{ $item1->id }}" key="menuTabValue-{{ $item1->id }}">
            <h3>{{ $item1->title }}</h3>
            <ul class="links">
                @if(!$originalItem->children->isEmpty())
                  @foreach ($originalItem->children as $child1)
                    @php
                      $child1 = $child1;
                      if (Voyager::translatable($child1)) {
                          $child1 = $child1->translate($options->locale);
                      }
                    @endphp
                    <li>
                      <a href="{{ url($child1->link()) }}">{{ $child1->title }}</a>
                    </li>
                  @endforeach
                @endif
            </ul>
        </div>
        
      @endforeach
  </transition>
</div>
<div class="sidebar__wrapper" @click="toggleWrapper"></div>