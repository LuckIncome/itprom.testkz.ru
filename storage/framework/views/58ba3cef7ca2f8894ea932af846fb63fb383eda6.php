<div class="search" :class="[{'search__show': isSearch}, {'search__show search__show-solo': isSearchSolo}]">
    <div class="container">
        <a href="/" class="search__logo" v-if="isMenu">
            <img src="<?php echo e(Voyager::image(setting('site.header_logo'))); ?>" alt="logo">
        </a>
        <form id="search" action="<?php echo e(route('search')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="header_search" placeholder="<?php echo app('translator')->get('general.search'); ?>">
            <button type="submit">
                <i class="bi bi-search"></i>
            </button>
            <div @click="toggleWrapper">
                <i class="bi bi-x-lg"></i>
            </div>
        </form>
    </div>
</div>

<div class="sidebar" :class="{'sidebar__show': isSidebar}">
    <?php echo e(menu('sidebar_header_menu','vendor.voyager.menu.sidebar_header_menu')); ?>

</div>

<div class="sidebar-mobile" :class="{'sidebar-mobile__show': isSidebar}">
    <a href="/" class="sidebar-mobile__logo">
        <img src="<?php echo e(Voyager::image(setting('site.header_logo'))); ?>" alt="logo">
    </a>
    <?php echo e(menu('mobile_header_menu','vendor.voyager.menu.mobile_header_menu')); ?>

    <ul class="sidebar-mobile__lang">
        <li><a href="/locale/kz" <?php if(session()->get('locale') == 'kz'): ?> class="active" <?php endif; ?>>KAZ</a></li>
        <li><a href="/locale/ru" <?php if(session()->get('locale') == 'ru'): ?> class="active" <?php endif; ?>>RUS</a></li>
        <li><a href="/locale/en" <?php if(session()->get('locale') == 'en'): ?> class="active" <?php endif; ?>>ENG</a></li>
    </ul>
</div><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>