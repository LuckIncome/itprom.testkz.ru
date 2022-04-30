<!-- Транформация шапки это Sidebar и поиск search в низу под footer -->
<header class="header header-news">
    <div class="container">
        <button class="header__toggle" @click="toggleMenu">
            <i class="bi bi-list"></i>
        </button>
        <a href="/" class="header__logo">
            <img src="<?php echo e(Voyager::image(setting('site.header_logo'))); ?>" alt="logo">
        </a>
        <?php echo e(menu('header_menu','vendor.voyager.menu.header_menu')); ?>

        <ul class="header__lang">
            <li><a href="/locale/kz" <?php if(session()->get('locale') == 'kz'): ?> class="active" <?php endif; ?>>KAZ</a></li>
            <li><a href="/locale/ru" <?php if(session()->get('locale') == 'ru'): ?> class="active" <?php endif; ?>>RUS</a></li>
            <li><a href="/locale/en" <?php if(session()->get('locale') == 'en'): ?> class="active" <?php endif; ?>>ENG</a></li>
        </ul>
        <div class="header__search" @click="toggleSearch">
            <i class="bi bi-search"></i>
        </div>
    </div>
</header><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/errors/header.blade.php ENDPATH**/ ?>