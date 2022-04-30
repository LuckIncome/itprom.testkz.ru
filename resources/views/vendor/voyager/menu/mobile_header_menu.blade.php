<ul class="sidebar-mobile__menu">
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
  <li>
      <dropdown inline-template>
          <div class="sidebar-dropdown">
              <div class="sidebar-dropdown__head" :class="{'sidebar-dropdown__head-show' : isShow}" @click="dropdownToggle">
                {{ $item->title }}
              </div>
              <ul v-if="isShow" class="sidebar-dropdown__body">
                  @foreach ($originalItem->children as $child)
                  @php
                    $child = $child;
                    if (Voyager::translatable($child)) {
                        $child = $child->translate($options->locale);
                    }
                  @endphp 
                  <li><a href="{{ url($child->link()) }}">{{ $child->title }}</a></li>
                  @endforeach
              </ul>
          </div>
      </dropdown>
  </li>  
  @else 
    <li><a href="{{ url($item->link()) }}">{{ $item->title }}</a></li>
  @endif
  @endforeach
</ul>