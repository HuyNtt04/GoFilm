<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Dashboard</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" href="images/favicon.ico" type="image/x-icon">
    
    <!-- vendor css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('css/Admin/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/Admin/mo.css')); ?>" />
    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body class="">
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
        
    <?php echo $__env->make('layouts.admin.nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('layouts.admin.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main>
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </main>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/admin/vendor-all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/pcoded.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/plugins/apexcharts.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/layouts/admin.blade.php ENDPATH**/ ?>