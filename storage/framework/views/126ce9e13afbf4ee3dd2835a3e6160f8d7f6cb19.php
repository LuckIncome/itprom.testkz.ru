
<?php $__env->startSection('page_title',(strlen($page->title) > 1 ? $page->title : '')); ?>
<?php $__env->startSection('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : '')); ?>
<?php $__env->startSection('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : '')); ?>
<?php $__env->startSection('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : '')); ?>
<?php $__env->startSection('image',$page->thumbic); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>
         
<?php echo $__env->make('partials.breadcrumbs',['template' => 'UnionRule', 'title'=> $page->title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="connection">
    <div class="container">
        <form id="reqFeedback" action="<?php echo e(route('feedback')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <p class="text"><?php echo app('translator')->get('general.thankYouForYourInterest'); ?></p>
            <div class="radio">
                <div>
                    <input type="radio" id="choice1" name="check" value="choice1" checked>
                    <label for="choice1"><?php echo app('translator')->get('general.joinTheUnion'); ?></label>
                </div>

                <div>
                    <input type="radio" id="choice2" name="check" value="choice2">
                    <label for="choice2"><?php echo app('translator')->get('general.btherBusinessInquiries'); ?></label>
                </div>

                <div>
                    <input type="radio" id="choice3" name="check" value="choice3">
                    <label for="choice3"><?php echo app('translator')->get('general.reportTechnicalProblemOnTheSite'); ?></label>
                </div>
            </div>
            <div class="input">
                <label for="name"><?php echo app('translator')->get('general.name'); ?></label>
                <input type="text" name="name" id="name" placeholder="<?php echo app('translator')->get('general.name'); ?>" required="required">
                <label for="email"><?php echo app('translator')->get('general.email'); ?></label>
                <input type="email" name="email" id="email" placeholder="<?php echo app('translator')->get('general.email'); ?>" required="required">
                <label for="phone"><?php echo app('translator')->get('general.phone'); ?></label>
                <input type="text" name="phone" id="phone" placeholder="<?php echo app('translator')->get('general.phone'); ?>">
                <label for="company"><?php echo app('translator')->get('general.company'); ?></label>
                <input type="text" name="company" id="company" placeholder="<?php echo app('translator')->get('general.company'); ?>">
                <label for="message"><?php echo app('translator')->get('general.message'); ?></label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="<?php echo app('translator')->get('general.message'); ?>"></textarea>   
            </div>
            
            <p class="link"><?php echo app('translator')->get('general.ITPROMIsCommittedToProtecting'); ?> <a href="#"><?php echo app('translator')->get('general.privacyPolicy'); ?></a>.</p>
            <input type="hidden" name="page" value="">
            <input type="hidden" name="url" value="<?php echo e(url()->current()); ?>">

            <button type="submit"><?php echo app('translator')->get('general.send'); ?></button>
        </form>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/itprom.kz/httpdocs/resources/views/pages/contacts.blade.php ENDPATH**/ ?>