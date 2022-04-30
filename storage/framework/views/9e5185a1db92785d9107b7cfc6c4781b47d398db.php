
<?php $__env->startSection('page_title', __('general.pageNotFound')); ?>
<?php $__env->startSection('seo_title',  __('general.pageNotFound')); ?>
<?php $__env->startSection('meta_keywords', __('general.pageNotFound')); ?>
<?php $__env->startSection('meta_description',  __('general.pageNotFound')); ?>
<?php $__env->startSection('image',env('APP_URL').'/images/og.jpg'); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.breadcrumbs',['template' => 'notUnion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="error-404">
    <div class="container">
        <img src="<?php echo e(asset('assets/images/icons/404.svg')); ?>" alt="404">
        <p><?php echo app('translator')->get('general.notFoundTitle'); ?></p>
        <a href="/"><?php echo app('translator')->get('general.backToHome'); ?></a>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/errors/404.blade.php ENDPATH**/ ?>