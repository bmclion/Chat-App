<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('<?php echo e(env("PUSHER_APP_KEY")); ?>', {
            cluster: '<?php echo e(env("PUSHER_APP_CLUSTER")); ?>',
            encrypted: true
        });

        var channel = pusher.subscribe('user-channel');
        channel.bind('new-user', function(data) {
            // Handle new user event
            console.log(data);
        });
    </script>
</head>
<body>
    <h1>User List</h1>
    <ul>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($user->name); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH /var/www/html/my_chat_app/resources/views/users/index.blade.php ENDPATH**/ ?>