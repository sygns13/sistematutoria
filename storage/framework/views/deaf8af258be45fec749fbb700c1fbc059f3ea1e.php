<?php $__env->startSection('content'); ?>
    <h1 class="text-center">Chat Application</h1>
    <message :messages="messages"></message>
    <sent-message v-on:messagesent="addMessage" :user="<?php echo e(Auth::user()); ?>"></sent-message>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>