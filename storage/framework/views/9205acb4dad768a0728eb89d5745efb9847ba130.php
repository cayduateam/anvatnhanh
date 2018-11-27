<div class="sidebar">
    <div class="widget block-categories">
        <div class="block-title">
            <h2>Info Pages</h2>
        </div>
        <div class="block-content">
            <ul class="list-categories">
            
                <?php if(count($result['commonContent']['pages'])): ?>
                <?php $__currentLoopData = $result['commonContent']['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <a href="<?php echo e(URL::to('/page?name='.$page->slug)); ?>"><?php echo e($page->name); ?></a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
    <div class="widget block-images">
    	<ul class="list-images en">
        	<li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'public/images/banner_1_en.jpg'); ?>" alt="image"></a></li>
            <li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'public/images/banner_2_en.jpg'); ?>" alt="image"></a></li>
            <li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'public/images/banner_3_en.jpg'); ?>" alt="image"></a></li>
        </ul>
        
        <ul class="list-images ar">
        	<li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'public/images/banner_1_ar.jpg'); ?>" alt="image"></a></li>
            <li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'public/images/banner_2_ar.jpg'); ?>" alt="image"></a></li>
            <li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'public/images/banner_3_ar.jpg'); ?>" alt="image"></a></li>
        </ul>
    </div>
</div>