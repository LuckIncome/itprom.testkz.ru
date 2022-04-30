<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="content">
                <a href="/" class="logo">
                    <img src="<?php echo e(Voyager::image(setting('site.footer_logo'))); ?>" alt="logo">
                </a>
                <p>
                    <?php echo app('translator')->get('general.footer_text'); ?>
                </p>
            </div>

            <div class="content">
                <a href="<?php echo e(route('pages.get',$pages['contacts']->first()->slug)); ?>" class="link"><?php echo app('translator')->get('general.contactUs'); ?></a>
                <div class="messenger">
                    <a href="mailto:<?php echo e($email->value); ?>" class="email"><?php echo e($email->value); ?></a>
                    <div class="network">
                        <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($social->link); ?>">
                                <img src="<?php echo e(Voyager::image($social->icon)); ?>" alt="<?php echo e($social->value); ?>">
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <p>© <?php echo e(date('Y')); ?> IT Prom.</p>
            <p><?php echo app('translator')->get('general.allRightsReserved'); ?>.</p>
            <a href="<?php echo e(route('pages.get',$pages['policy']->first()->slug)); ?>"><?php echo app('translator')->get('general.privacyPolicy_mini'); ?></a>
            <div class="content">
                <p><?php echo app('translator')->get('general.developed'); ?></p>
                <a href="https://i-marketing.kz"> <img src="<?php echo e(asset('assets/images/icons/logo-im.svg')); ?>" alt="i-marketing"></a>
            </div>
        </div>
    </div>
</footer><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/partials/footer.blade.php ENDPATH**/ ?>