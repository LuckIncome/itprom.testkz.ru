
<?php $__env->startSection('page_title',(strlen($page->title) > 1 ? $page->title : '')); ?>
<?php $__env->startSection('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : '')); ?>
<?php $__env->startSection('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : '')); ?>
<?php $__env->startSection('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : '')); ?>
<?php $__env->startSection('image',$page->thumbic); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>

<section class="banner">
    <img src="<?php echo e(Voyager::image($main->bg_image)); ?>" class="banner__background" alt="<?php echo e($main->title); ?>">
    <div class="container">
        <div class="banner__info">
            <h1><?php echo e($main->title); ?></h1>
            <p><?php echo e($main->excerpt); ?></p>
            <a href="<?php echo e(route('pages.get',$pages['join']->first()->slug)); ?>" class="link__arrow"><?php echo e($pages['join']->first()->title); ?> <i class="bi bi-arrow-right"></i></a>
            
            <a href="<?php echo e(route('pages.get',$pages['about']->first()->slug)); ?>" class="link__arrow"><?php echo e($pages['about']->first()->title); ?> <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="banner__image">
            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_z3pdz6kv.json" background="transparent" speed="1" class="banner__image-main"  loop="" autoplay=""></lottie-player>
        </div>
    </div>
</section>

<section class="information">
    <div class="information__item">
        <div class="information__item-content">
            <div class="container">
                <div class="info">
                    <h2><?php echo e($main->first_title); ?></h2>
                    <p><?php echo e($main->first_excerpt); ?></p>
                    <a href="<?php echo e(route('pages.get',$pages['about']->first()->slug)); ?>" class="link__arrow"><?php echo app('translator')->get('general.more'); ?> <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="information__item-image">
            <img src="<?php echo e(Voyager::image($main->first_image)); ?>" alt="<?php echo e($main->first_title); ?>">
        </div>
    </div>

    <div class="information__item">
        <div class="information__item-content">
            <div class="container">
                <div class="info">
                    <h2><?php echo e($main->second_title); ?></h2>
                    <p><?php echo e($main->second_excerpt); ?></p>
                    <a href="<?php echo e(route('pages.get',$pages['platform']->first()->slug)); ?>" class="link__arrow"><?php echo app('translator')->get('general.more'); ?> <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="information__item-image">
            <img src="<?php echo e(Voyager::image($main->second_image)); ?>" alt="<?php echo e($main->second_title); ?>">
        </div>
    </div>
</section>

<section class="projects">
    <div class="container">
        <h2><?php echo app('translator')->get('general.ourProjects'); ?></h2>
    </div>

    <slider inline-template>
        <div class="slider">

            <div class="slider__items" v-touch:swipe.right="arrowsLeft"
                v-touch:swipe.left="arrowsRight">
                <div class="slider__items-container" :style="`
                    width: ${carousel.container}%`">
                    <div class="slider__items-track" :style="`            
                            transition: ${carousel.speed}s;
                            transform: translateX(-${carousel.start}%)`" ref="carouselItems"
                    >
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="slider__items-item" :style="`min-width: ${carousel.shift}%`">
                                <a href="<?php echo e(route('project.show', ['project' => $p->slug])); ?>" class="item">
                                    <?php if($p->image): ?>
                                    <div class="image">
                                        <img src="<?php echo e(Voyager::image($p->image)); ?>" alt="<?php echo e($p->title); ?>">
                                    </div>
                                    <?php else: ?>
                                    <h3><?php echo e($p->title); ?></h3>
                                    <?php endif; ?>
                                    <?php echo \Illuminate\Support\Str::limit($p->content, 152,'...'); ?>

                                    <div class="link__arrow"><?php echo app('translator')->get('general.more'); ?> <i class="bi bi-arrow-right"></i></div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
                    </div>
                </div>
            </div>

            <div class="slider__arrows container">
                <button :class="{'disabled': valueCarousel == 0}" @click="arrowsLeft">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button :class="{'disabled': valueCarousel == carousel.end}" @click="arrowsRight">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </slider>
</section>

<section class="news">
    <h2><?php echo app('translator')->get('general.companyNews'); ?></h2>

    <div class="news__items">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('news.show', ['news' => $n->slug])); ?>" class="news__item">
            <div class="info">
                <p><?php echo e(date('d.m.Y H:m', strtotime($n->created_at))); ?></p>
                <h3>
                    <?php echo e($n->title); ?>

                </h3>
            </div>
            <div class="image">
                <img src="<?php echo e(Voyager::image($n->image)); ?>" alt="<?php echo e($n->title); ?>">
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
    </div>
    <a href="<?php echo e(route('news')); ?>" class="link__arrow"><?php echo app('translator')->get('general.allNews'); ?> <i class="bi bi-arrow-right"></i></a>
</section>

<section class="join">
    <div class="join__item">
        <div class="join__item-image">
            <img src="<?php echo e(Voyager::image($main->third_image)); ?>" alt="<?php echo e($main->third_title); ?>">
        </div>
        <div class="join__item-content">
            <div class="container">
                <div class="info">
                    <h2><?php echo e($main->third_title); ?></h2>
                    <p><?php echo e($main->third_excerpt); ?></p>
                    
                    <a href="<?php echo e(route('pages.get',$pages['join']->first()->slug)); ?>" class="link__arrow"><?php echo app('translator')->get('general.applicationJoiningUnion'); ?> <i class="bi bi-arrow-right"></i></a>
                    <a href="<?php echo e(route('pages.get',$pages['work']->first()->slug)); ?>" class="link__arrow"><?php echo app('translator')->get('general.unionWorkPlans'); ?> <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/pages/home.blade.php ENDPATH**/ ?>