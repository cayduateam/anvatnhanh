<!DOCTYPE html>
<html>

<!-- meta contains meta taga, css and fontawesome icons etc -->
<?php echo $__env->make('admin.common.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('').'public/images/favicon/apple-icon-57x57.png'); ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('').'public/images/favicon/apple-icon-60x60.png'); ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('').'public/images/favicon/apple-icon-72x72.png'); ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('').'public/images/favicon/apple-icon-76x76.png'); ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('').'public/images/favicon/apple-icon-114x114.png'); ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('').'public/images/favicon/apple-icon-120x120.png'); ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('').'public/images/favicon/apple-icon-144x144.png'); ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('').'public/images/favicon/apple-icon-152x152.png'); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('').'public/images/favicon/apple-icon-180x180.png'); ?>">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(asset('').'public/images/favicon/android-icon-192x192.png'); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('').'public/images/favicon/favicon-32x32.png'); ?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('').'public/images/favicon/favicon-96x96.png'); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('').'public/images/favicon/favicon-16x16.png'); ?>">
<link rel="manifest" href="<?php echo e(asset('').'public/images/favicon/manifest.json'); ?>">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- ./end of meta -->

<body class=" hold-transition skin-blue sidebar-mini">
	<!-- wrapper -->
    <div class="wrapper">
    
   		<!-- header contains top navbar -->
        <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- ./end of header -->
        
        <!-- left sidebar -->
        <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- ./end of left sidebar -->
        
        <!-- dynamic content -->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- ./end of dynamic content -->
        
        <!-- right sidebar -->
        <?php echo $__env->make('admin.common.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- ./right sidebar -->
    	<?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
	<!-- ./wrapper -->

	<!-- all js scripts including custom js -->
	<?php echo $__env->make('admin.common.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ./end of js scripts -->
    
	</body>
</html>
