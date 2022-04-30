<!DOCTYPE html>
<html lang="<?php echo e(session()->get('locale')); ?>">
  <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>       
  <vue id="app">
    <?php echo $__env->make('errors.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="main">
      <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </vue>  
  <?php echo $__env->make('partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/errors/layout.blade.php ENDPATH**/ ?>