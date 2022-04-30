<?php if($template == 'notUnion'): ?>
<section class="news-block-item">
    <div class="container">
        <div class="news-block-item__navigation">
            <?php if(isset($bread_title)): ?>
                <a href="/"><?php echo app('translator')->get('general.main'); ?></a> 
                <i class="bi bi-chevron-right"></i> 
                <span><?php echo e($bread_title); ?></span>
            <?php else: ?>
                <i class="bi bi-chevron-left"></i> 
                <a href="/"><?php echo app('translator')->get('general.backMainPage'); ?></a> 
            <?php endif; ?>           
        </div>
        <?php if(isset($title)): ?>
            <h1><?php echo e($title); ?></h1>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if($template == 'Union'): ?>
<section class="navigation">
    <div class="container">
        <a href="/"><?php echo app('translator')->get('general.main'); ?></a> 
        <i class="bi bi-chevron-right"></i>
        <span><?php echo e($bread_title); ?> </span>
    </div>
</section>
<?php endif; ?>

<?php if($template == 'UnionRule'): ?>
<section class="news-block-item">
    <div class="container">
        <div class="news-block-item__navigation">
            <i class="bi bi-chevron-left"></i> 
            <a href="/charter"><?php echo app('translator')->get('general.backUnion'); ?></a> 
        </div>
        <?php if(isset($title)): ?>
            <h1><?php echo e($title); ?></h1>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/partials/breadcrumbs.blade.php ENDPATH**/ ?>