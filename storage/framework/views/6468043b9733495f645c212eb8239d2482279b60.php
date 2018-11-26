<!doctype html>

<html>



<!-- meta contains meta taga, css and fontawesome icons etc -->

<?php echo $__env->make('common.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

<!--dir="rtl"-->

<body dir="<?php echo e(session('direction')); ?>">

	<!-- header -->
		<?php if(session('homeStyle')=='two' ): ?>
        	<?php echo $__env->make('common.header_two', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php if(Request::path() == 'index' or Request::path() == '/'): ?>
            <section class="carousel-content">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-9 p-0"> <?php echo $__env->make('common.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                  <div class="col-12 col-lg-3 p-0"> <?php echo $__env->make('common.offers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                </div>
              </div>
            </section>
            <?php endif; ?>
        <?php elseif(session('homeStyle')=='three' ): ?>
        	<?php echo $__env->make('common.header_three', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php if(Request::path() == 'index' or Request::path() == '/'): ?>
            <section class="carousel-content">
              <div class="container">
                <div class="row">
                  <div class="col-12 p-0"> <?php echo $__env->make('common.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                </div>
              </div>
            </section>
            <?php endif; ?>                 
       
        <?php else: ?>
          <?php echo $__env->make('common.header_two', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php if(Request::path() == 'index' or Request::path() == '/'): ?>
            <section class="carousel-content">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-9 p-0"> <?php echo $__env->make('common.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                  <div class="col-12 col-lg-3 p-0"> <?php echo $__env->make('common.offers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                </div>
              </div>
            </section>
            <?php endif; ?>
<!-- 
       		<?php echo $__env->make('common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php if(Request::path() == 'index' or Request::path() == '/'): ?>
            <section class="carousel-content">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-3 p-0"> <?php echo $__env->make('common.categories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                  <div class="col-12 col-lg-9 p-0"> <?php echo $__env->make('common.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                </div>
              </div>
            </section>
            <?php endif; ?> -->
        <?php endif; ?>
	<!-- ./end of header -->
        
        

	<?php echo $__env->yieldContent('content'); ?>
	

	<section class="banner-content">
    	<?php echo $__env->make('common.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </section>
    
    <?php echo $__env->make('common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- all js scripts including custom js -->

	<?php echo $__env->make('common.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- ./end of js scripts -->
    <?php if(!empty($result['commonContent']['setting'][77]->value)): ?>
		<?=stripslashes($result['commonContent']['setting'][77]->value)?>
    <?php endif; ?>
</body>

</html>

