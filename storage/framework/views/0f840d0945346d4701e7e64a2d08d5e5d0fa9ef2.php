<ul class="sidebar__menu">
  <?php
    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }
  ?>
  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php

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

  ?> 
  <?php if(!$originalItem->children->isEmpty()): ?>
  <li><button @click="toggleMenuTab(<?php echo e($item->id); ?>)" :class="{'active': menuTabValue == <?php echo e($item->id); ?>}"><?php echo e($item->title); ?></button></li> 
  <?php else: ?> 
    <li><a href="<?php echo e(url($item->link())); ?>"><?php echo e($item->title); ?></a></li>
  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <ul class="sidebar__lang">
      <li><a href="/locale/kz" <?php if(session()->get('locale') == 'kz'): ?> class="active" <?php endif; ?>>KAZ</a></li>
      <li><a href="/locale/ru" <?php if(session()->get('locale') == 'ru'): ?> class="active" <?php endif; ?>>RUS</a></li>
      <li><a href="/locale/en" <?php if(session()->get('locale') == 'en'): ?> class="active" <?php endif; ?>>ENG</a></li>
  </ul>
</ul>
<div class="sidebar__tabs"> 
  <transition name="fade" mode="out-in" key="open">
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
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
      ?> 
       
        <div class="tab" v-if="menuTabValue == <?php echo e($item1->id); ?>" key="menuTabValue-<?php echo e($item1->id); ?>">
            <h3><?php echo e($item1->title); ?></h3>
            <ul class="links">
                <?php if(!$originalItem->children->isEmpty()): ?>
                  <?php $__currentLoopData = $originalItem->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $child1 = $child1;
                      if (Voyager::translatable($child1)) {
                          $child1 = $child1->translate($options->locale);
                      }
                    ?>
                    <li>
                      <a href="<?php echo e(url($child1->link())); ?>"><?php echo e($child1->title); ?></a>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </div>
        
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </transition>
</div>
<div class="sidebar__wrapper" @click="toggleWrapper"></div><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/vendor/voyager/menu/sidebar_header_menu.blade.php ENDPATH**/ ?>