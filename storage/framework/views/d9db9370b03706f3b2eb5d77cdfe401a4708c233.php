<div class="content">
    <ul class="interior__menu">
        <li>
            <a href="<?php echo e(route('pages.get',$pages['about']->first()->slug)); ?>" <?php if(strpos(url()->current(), 'about')): ?> class="active" <?php endif; ?>><?php echo app('translator')->get('general.generalInformation'); ?></a>
        </li>
        <li>
            <a href="<?php echo e(route('pages.get',$pages['charter']->first()->slug)); ?>" <?php if(strpos(url()->current(), 'charter')): ?> class="active" <?php endif; ?>><?php echo e($pages['charter']->first()->title); ?></a>
        </li>
        <li>
            <a href="<?php echo e(route('pages.get',$pages['members']->first()->slug)); ?>" <?php if(strpos(url()->current(), 'members')): ?> class="active" <?php endif; ?>><?php echo e($pages['members']->first()->title); ?></a>
        </li>
        <li>
            <a href="<?php echo e(route('pages.get',$pages['join']->first()->slug)); ?>" <?php if(strpos(url()->current(), 'join')): ?> class="active" <?php endif; ?>><?php echo e($pages['join']->first()->title); ?></a>
        </li>
        <li><a href="<?php echo e(route('pages.get',$pages['projects']->first()->slug)); ?>" <?php if(strpos(url()->current(), 'projects')): ?> class="active" <?php endif; ?>><?php echo e($pages['projects']->first()->title); ?></a></li>
    </ul>
    <?php if(strpos(url()->current(), 'charter') === false): ?>
    <div class="interior__network">
        <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($soc->link); ?>"><img src="<?php echo e(Voyager::image($soc->icon)); ?>" alt="<?php echo e($soc->value); ?>"></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
</div>

<?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/partials/sidebar_union.blade.php ENDPATH**/ ?>