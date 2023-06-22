<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('send_details')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" name="text">
    <button type="submit">Save</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_chat_app/resources/views/pusher-send.blade.php ENDPATH**/ ?>