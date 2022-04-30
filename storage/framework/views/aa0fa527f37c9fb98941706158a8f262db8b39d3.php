<!-- Транформация шапки это Sidebar и поиск search в низу под footer -->
<header class="header <?php if($page->type != 'home'): ?> header-news <?php endif; ?>">
    <div class="container">
        <button class="header__toggle" @click="toggleMenu">
            <i class="bi bi-list"></i>
        </button>
        <a href="/" class="header__logo">
            <img src="<?php echo e(Voyager::image(setting('site.header_logo'))); ?>" alt="logo">
        </a>
        <?php echo e(menu('header_menu','vendor.voyager.menu.header_menu')); ?>

        
        <div class="header__search" @click="toggleSearch">
            <i class="bi bi-search"></i>
        </div>
    </div>
</header><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/partials/header.blade.php ENDPATH**/ ?>