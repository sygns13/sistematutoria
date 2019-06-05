<?php $__env->startSection('htmlheader_title'); ?>
    Log in
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body class="hold-transition login-page">
<div class="logo row">
<div class="col-xs-1"></div>
<div class="col-xs-8">
    <img src="<?php echo e(asset('/img/logoindex.png')); ?>" class="img-responsive" id="logo-login">
</div>

<div class="col-xs-3">
    <label class="top-label" style="margin-top: 2em;">Ingeniería de Sistemas e Informática</label>
    <label class="top-label" style="">Facultad de Ciencias</label>
</div>
  
</div>

    <div id="app">
    <center>  
        <div class="login-box" >

        
            <div class="login-logo">
               <a href="<?php echo e(url('/home')); ?>" class="title-login"><b>Acceso</b> al Sistema</a>
            </div><!-- /.login-logo -->

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Lo sentimos</strong> <?php echo e(trans('adminlte_lang::message.someproblems')); ?><br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="login-box-body">
        <p class="login-box-msg"> <?php echo e(trans('adminlte_lang::message.siginsession')); ?> </p>
        <form action="<?php echo e(url('/login')); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <login-input-field
                    name="<?php echo e(config('auth.providers.users.field','email')); ?>"
                    domain="<?php echo e(config('auth.defaults.domain','')); ?>"
                    ></login-input-field>
            
                
                
            
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.password')); ?>" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7">
                   
                </div><!-- /.col -->
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-off"></span> Ingresar</button>
                </div><!-- /.col -->
            </div>
        </form>

        

       

    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </center> 
    </div>
    <?php echo $__env->make('adminlte::layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>