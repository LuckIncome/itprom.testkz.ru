<div id="modal" class="modal"> <!-- класс что бы открыть modal__show -->
    <div class="modal__content">
        <button id="modal__close"><i class="bi bi-x"></i></button>
        <p><?php echo app('translator')->get('general.successfullySubmitted'); ?></p>
        <a href="/"><?php echo app('translator')->get('general.goToMainPage'); ?></a>
    </div>
</div>
<?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/partials/modals.blade.php ENDPATH**/ ?>