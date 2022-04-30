<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(strlen($__env->yieldContent('seo_title')) > 2): ?> <?php echo $__env->yieldContent('seo_title'); ?> <?php else: ?> <?php echo $__env->yieldContent('page_title'); ?> <?php endif; ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords'); ?>">
    <meta name="title" content="<?php echo $__env->yieldContent('seo_title'); ?>"/>
    <!--<link rel="canonical" href="<?php echo e(url()->current()); ?>">-->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>"/>
    <meta property="og:type" content="<?php echo e(strlen($__env->yieldContent('ogType')) > 2 ? $__env->yieldContent('ogType') : 'website'); ?>" />
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description'); ?>"/>
    <meta property="og:url" content="<?php echo e(url()->current()); ?>"/>
    <meta property="og:image" content="<?php echo $__env->yieldContent('image'); ?>"/>
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:image:width" content="300"/>
    <meta property="og:image:height" content="300"/>  

    
    <link rel="shortcut icon" type="image/png" href="<?php echo e(Voyager::image(setting('site.favicon'))); ?>">
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue2-touch-events@3.2.2/index.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
</head><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/partials/head.blade.php ENDPATH**/ ?>