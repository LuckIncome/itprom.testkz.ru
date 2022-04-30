
<?php $__env->startSection('page_title',(strlen($page->title) > 1 ? $page->title : '')); ?>
<?php $__env->startSection('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : '')); ?>
<?php $__env->startSection('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : '')); ?>
<?php $__env->startSection('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : '')); ?>
<?php $__env->startSection('image',$page->thumbic); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.breadcrumbs',['template' => 'Union','bread_title' => $page->title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="banner banner-mini">
    <img src="<?php echo e(Voyager::image($about->bg_image)); ?>" class="banner__background banner__background-dark" alt="<?php echo e($about->title); ?>">
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1><?php echo e($about->title); ?></h1>
            <p><?php echo e($about->excerpt); ?></p>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">

        <?php echo $__env->make('partials.sidebar_union', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <div class="content">
            <div class="editors">
                <?php echo $about->first_content; ?>

            </div>
        </div>
        <div class="content" style="border: none; padding: 0;">
        </div>

    </div>
</section>

<section class="interior-images">
    <div class="container">
        <div class="image">
            <img src="<?php echo e(Voyager::image($about->first_image)); ?>" alt="<?php echo e($about->first_alt_image); ?>">
            <p><?php echo e($about->first_title_image); ?></p>
        </div>
        <div class="image">
            <img src="<?php echo e(Voyager::image($about->second_image)); ?>" alt="<?php echo e($about->second_alt_image); ?>">
            <p><?php echo e($about->second_title_image); ?></p>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">

        <div class="content" style="border: none;">
        </div>
        <div class="content">
            <div class="editors">
                <?php echo $about->second_content; ?>

            </div>
        </div>
        <div class="content" style="border: none; padding: 0;">
        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/pages/about.blade.php ENDPATH**/ ?>