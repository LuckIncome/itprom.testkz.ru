<ul class="sidebar-mobile__menu">
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
  <li>
      <dropdown inline-template>
          <div class="sidebar-dropdown">
              <div class="sidebar-dropdown__head" :class="{'sidebar-dropdown__head-show' : isShow}" @click="dropdownToggle">
                <?php echo e($item->title); ?>

              </div>
              <ul v-if="isShow" class="sidebar-dropdown__body">
                  <?php $__currentLoopData = $originalItem->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $child = $child;
                    if (Voyager::translatable($child)) {
                        $child = $child->translate($options->locale);
                    }
                  ?> 
                  <li><a href="<?php echo e(url($child->link())); ?>"><?php echo e($child->title); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      </dropdown>
  </li>  
  <?php else: ?> 
    <li><a href="<?php echo e(url($item->link())); ?>"><?php echo e($item->title); ?></a></li>
  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/vendor/voyager/menu/mobile_header_menu.blade.php ENDPATH**/ ?>