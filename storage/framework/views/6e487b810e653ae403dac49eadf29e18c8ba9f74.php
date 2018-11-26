<?php $__env->startSection('content'); ?>

<section class="site-content">
  <div class="container"> 
     <div class="group-banners en">
    	<div class="row">
        	<div class="col-12 col-sm-4">
            	<div class="banner-image">
                	<a title="Banner Image" href="<?php echo e(URL::to('/shop')); ?>"><img class="img-fluid" src="<?php echo e(asset('').'public/images/banner_1_en.jpg'); ?>" alt="Banner Image"></a>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            	<div class="banner-image">
                	<a title="Banner Image" href="<?php echo e(URL::to('/shop')); ?>"><img class="img-fluid" src="<?php echo e(asset('').'public/images/banner_2_en.jpg'); ?>" alt="Banner Image"></a>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            	<div class="banner-image">
                	<a title="Banner Image" href="<?php echo e(URL::to('/shop')); ?>"><img class="img-fluid" src="<?php echo e(asset('').'public/images/banner_3_en.jpg'); ?>" alt="Banner Image"></a>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="group-banners ar">
    	<div class="row">
        	<div class="col-12 col-sm-4">
            	<div class="banner-image">
                	<a title="Banner Image" href="<?php echo e(URL::to('/shop')); ?>"><img class="img-fluid" src="<?php echo e(asset('').'public/images/banner_1_ar.jpg'); ?>" alt="Banner Image"></a>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            	<div class="banner-image">
                	<a title="Banner Image" href="<?php echo e(URL::to('/shop')); ?>"><img class="img-fluid" src="<?php echo e(asset('').'public/images/banner_2_ar.jpg'); ?>" alt="Banner Image"></a>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            	<div class="banner-image">
                	<a title="Banner Image" href="<?php echo e(URL::to('/shop')); ?>"><img class="img-fluid" src="<?php echo e(asset('').'public/images/banner_3_ar.jpg'); ?>" alt="Banner Image"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- dynamic content -->

    <div class="products-area">
      <div class="row">
        <div class="col-md-12">
          <div class="nav nav-pills" role="tablist">
             <a class="nav-link nav-item nav-index active" href="#featured" id="featured-tab" data-toggle="pill" role="tab" aria-controls="featured" aria-selected="true"><?php echo app('translator')->getFromJson('website.TopSales'); ?></a> 
            <a class="nav-link nav-item nav-index" href="#special" id="special-tab" data-toggle="pill" role="tab" aria-controls="special" aria-selected="false"><?php echo app('translator')->getFromJson('website.Special'); ?></a> 
             <a class="nav-link nav-item nav-index" href="#liked" id="liked-tab" data-toggle="pill" role="tab" aria-controls="liked" aria-selected="false"><?php echo app('translator')->getFromJson('website.MostLiked'); ?></a> 
          </div>
          
          <!-- Tab panes -->
          <div class="tab-content">
          	<div class="overlay" style="display:none;"><img src="<?php echo e(asset('').'public/images/loader.gif'); ?>"></div>
            <div role="tabpanel" class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
              <div id="owl_featured" class="owl-carousel owl_featured"> 
              <?php if($result['top_seller']['success']==1): ?>
              	<?php $__currentLoopData = $result['top_seller']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$top_seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="product">
                  <article>
                  	
                       <div class="thumb"> <img class="img-fluid" src="<?php echo e(asset('').$top_seller->products_image); ?>" alt="<?php echo e($top_seller->products_name); ?>"></div>
						<?php
                                $current_date = date("Y-m-d", strtotime("now"));
                                
                                $string = substr($top_seller->products_date_added, 0, strpos($top_seller->products_date_added, ' '));
                                $date=date_create($string);
                                date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));
                                
                                //echo $top_seller->products_date_added . "<br>";
                                $after_date = date_format($date,"Y-m-d");
                                
                                if($after_date>=$current_date){
                                    print '<span class="new-tag">';
                                    print __('website.New');
                                    print '</span>';
                                }
                                
                                if(!empty($top_seller->discount_price)){
                                    $discount_price = $top_seller->discount_price;	
                                    $orignal_price = $top_seller->products_price;	
                                    
                                    $discounted_price = $orignal_price-$discount_price;
                                    $discount_percentage = $discounted_price/$orignal_price*100;
                                    echo "<span class='discount-tag'>".(int)$discount_percentage."%</span>";
                                }
                                 
                        ?>
                        <span class="tag text-center">
                        	<?=stripslashes($top_seller->categories_name)?>
                        </span>
                        <h2 class="title text-center"><?php echo e($top_seller->products_name); ?></h2>
                        <div class="price text-center">
                        	<?php if(!empty($top_seller->discount_price)): ?>                        
                          	<?php echo e($web_setting[19]->value); ?><?php echo e($top_seller->discount_price+0); ?>                           
                          	<span> <?php echo e($web_setting[19]->value); ?><?php echo e($top_seller->products_price+0); ?></span>                          
                          	<?php else: ?>
                          		<?php echo e($web_setting[19]->value); ?><?php echo e($top_seller->products_price+0); ?> 
                          
                          	<?php endif; ?> 
						</div>
                          
                     
                     <div class="product-hover">
                     	<div class="icons">
                        	<div class="icon-liked">
                            	
                            	<span products_id = '<?php echo e($top_seller->products_id); ?>' class="fa <?php if($top_seller->isLiked==1): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?> is_liked"><span class="badge badge-secondary"><?php echo e($top_seller->products_liked); ?></span></span>
                            </div>
                            
                            <a href="<?php echo e(URL::to('/product-detail/'.$top_seller->products_slug)); ?>" class="fa fa-eye"></a>
                        </div>
                        <div class="buttons">
                        	<?php if(!in_array($top_seller->products_id,$result['cartArray'])): ?>
                        
                                <button  class="btn btn-block btn-secondary cart" products_id="<?php echo e($top_seller->products_id); ?>"><?php echo app('translator')->getFromJson('website.Add to Cart'); ?></button>
                                
                            <?php else: ?>
                                <button  class="btn btn-block btn-secondary active"><?php echo app('translator')->getFromJson('website.Added'); ?></button>
                            <?php endif; ?>
                        </div>
                     </div>
                    
                  </article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="product last-product">
                      <article>
                      	<a href="<?php echo e(URL::to('/shop?type=topseller')); ?>" class="buttons">
                        	<span class="fa fa-angle-right"></span>
                        	<span class="btn btn-secondary"><?php echo app('translator')->getFromJson('website.View All'); ?></span>
                        </a>
                      	
                      </article>
                    </div>
                <?php endif; ?> 
                </div>
              <!-- 1st tab --> 
            </div>
            <div role="tabpanel" class="tab-pane fade" id="special" role="tabpanel" aria-labelledby="special-tab">
              <div id="owl_special" class="owl-carousel"> <?php if($result['special']['success']==1): ?>
                <?php $__currentLoopData = $result['special']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product">
                  <article>
                  
                  	<div class="thumb"><img class="img-fluid" src="<?php echo e(asset('').$special->products_image); ?>" alt="<?php echo e($special->products_name); ?>"></div>
                    <?php
						$current_date = date("Y-m-d", strtotime("now"));
						
						$string = substr($special->products_date_added, 0, strpos($special->products_date_added, ' '));
						$date=date_create($string);
						date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));
						
						//echo $top_seller->products_date_added . "<br>";
						$after_date = date_format($date,"Y-m-d");
						
						if($after_date>=$current_date){
							print '<span class="new-tag">';
							print __('website.New');
							print '</span>';
						}
						
						if(!empty($special->discount_price)){
							$discount_price = $special->discount_price;	
							$orignal_price = $special->products_price;	
							
							$discounted_price = $orignal_price-$discount_price;
							$discount_percentage = $discounted_price/$orignal_price*100;
							echo "<span class='discount-tag'>".(int)$discount_percentage."%</span>";
						}
						 
			  		 ?>
                     <span class="tag text-center">
						<?=stripslashes($special->categories_name)?>
                    </span>
                    
                    <h2 class="title text-center"><?php echo e($special->products_name); ?></h2>
                    
                    <div class="price text-center">                     
                    	<?php echo e($web_setting[19]->value); ?><?php echo e($special->products_price+0); ?>                    
                    	<span><?php echo e($web_setting[19]->value); ?><?php echo e($special->discount_price+0); ?></span>                        
                    </div>                   
                    
                    <div class="product-hover">
                     	<div class="icons">
                        	<div class="icon-liked">
                            	<span products_id = '<?php echo e($special->products_id); ?>' class="fa <?php if($special->isLiked==1): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?> is_liked"><span class="badge badge-secondary"><?php echo e($special->products_liked); ?></span></span>
                            </div>
                            
                            <a href="<?php echo e(URL::to('/product-detail/'.$special->products_slug)); ?>" class="fa fa-eye"></a>
                        </div>
                        
                        
                        <div class="buttons">
                        	<?php if(!in_array($special->products_id,$result['cartArray'])): ?>
                        
                                <button  class="btn btn-block btn-secondary cart" products_id="<?php echo e($special->products_id); ?>"><?php echo app('translator')->getFromJson('website.Add to Cart'); ?></button>
                                
                            <?php else: ?>
                                <button  class="btn btn-block btn-secondary active"><?php echo app('translator')->getFromJson('website.Added'); ?></button>
                            <?php endif; ?>
                        </div>
                     </div>
         
                  </article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="product last-product">
                      <article>
                      	<a href="<?php echo e(URL::to('/shop?type=special')); ?>" class="buttons">
                        	<span class="fa fa-angle-right"></span>
                        	<span class="btn btn-secondary"><?php echo app('translator')->getFromJson('website.View All'); ?></span>
                        </a>
                      </article>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="liked" role="tabpanel" aria-labelledby="liked-tab">
              <div id="owl_liked" class="owl-carousel"> 
              <?php if($result['most_liked']['success']==1): ?>
                <?php $__currentLoopData = $result['most_liked']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$most_liked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product">
                  <article>
                  	<div class="thumb"><img class="img-fluid" src="<?php echo e(asset('').$most_liked->products_image); ?>" alt="<?php echo e($most_liked->products_name); ?>"></div>
                    <?php
						$current_date = date("Y-m-d", strtotime("now"));
						
						$string = substr($most_liked->products_date_added, 0, strpos($most_liked->products_date_added, ' '));
						$date=date_create($string);
						date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));
						
						//echo $top_seller->products_date_added . "<br>";
						$after_date = date_format($date,"Y-m-d");
						
						if($after_date>=$current_date){
							print '<span class="new-tag">';
							print __('website.New');
							print '</span>';
						}
						
						if(!empty($most_liked->discount_price)){
							$discount_price = $most_liked->discount_price;	
							$orignal_price = $most_liked->products_price;	
							
							$discounted_price = $orignal_price-$discount_price;
							$discount_percentage = $discounted_price/$orignal_price*100;
							echo "<span class='discount-tag'>".(int)$discount_percentage."%</span>";
						}
							 
				   ?>
                    <span class="tag text-center">
                    	<?=stripslashes($most_liked->categories_name)?>
                    </span>
                    
                    <h2 class="title text-center"><?php echo e($most_liked->products_name); ?></h2>
                 
                    <div class="price text-center">
                      <?php if(!empty($most_liked->discount_price)): ?>
                      	<?php echo e($web_setting[19]->value); ?><?php echo e($most_liked->discount_price+0); ?> <span><?php echo e($web_setting[19]->value); ?><?php echo e($most_liked->products_price+0); ?></span> <?php else: ?>
                      	<?php echo e($web_setting[19]->value); ?><?php echo e($most_liked->products_price+0); ?>

                      <?php endif; ?> 
                    </div>
                    
                    <div class="product-hover">
                     	<div class="icons">
                        	<div class="icon-liked">
                            	
                            	<span products_id = '<?php echo e($most_liked->products_id); ?>' class="fa <?php if($most_liked->isLiked==1): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?> is_liked"><span class="badge badge-secondary"><?php echo e($most_liked->products_liked); ?></span></span>
                            </div>
                            
                            <a href="<?php echo e(URL::to('/product-detail/'.$most_liked->products_slug)); ?>" class="fa fa-eye"></a>
                        </div>
                        
                        <div class="buttons">
                        	<?php if(!in_array($most_liked->products_id,$result['cartArray'])): ?>
                                <button  class="btn btn-block btn-secondary cart" products_id="<?php echo e($most_liked->products_id); ?>"><?php echo app('translator')->getFromJson('website.Add to Cart'); ?></button> 
                            <?php else: ?>
                                <button  class="btn btn-block btn-secondary active"><?php echo app('translator')->getFromJson('website.Added'); ?></button>
                            <?php endif; ?>
                        </div>
                     </div>
                              
					</article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="product last-product">
                      <article>
                      	<a href="<?php echo e(URL::to('/shop?type=mostliked')); ?>" class="buttons">
                        	<span class="fa fa-angle-right"></span>
                        	<span class="btn btn-secondary"><?php echo app('translator')->getFromJson('website.View All'); ?></span>
                        </a>
                      </article>
                    </div>
                <?php endif; ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
   
    <!-- ./end of dynamic content --> 
  </div>
</section>

<section class="products-content"> <?php echo $__env->make('common.products', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </section>




<section class="blog-content">
<div class="container">
    <div class="blog-area">
        <!-- heading -->
        <div class="heading">
            <h2><?php echo app('translator')->getFromJson('website.From our News'); ?> <small class="pull-right"><a href="<?php echo e(URL::to('/news')); ?>"><?php echo app('translator')->getFromJson('website.View All'); ?></a></small></h2>
            <hr>
        </div>
    
		<div class="row">
            <div class="blogs blogs-3x">
            	<!-- Blog Post -->
				<?php if($result['news']['success']==1): ?>
					<?php $__currentLoopData = $result['news']['news_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$news_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-post">
                            <article>
                                <div class="blog-thumb">
                                	<h4 class="blog-title">
                                        <a href="<?php echo e(URL::to('/news-detail/'.$news_data->news_slug)); ?>"><?php echo e($news_data->news_name); ?> </a> 
                                        <?php if($news_data->is_feature==1): ?>
                                            <span class="badge badge-success"><?php echo app('translator')->getFromJson('website.Featured'); ?></span>
                                        <?php endif; ?>
                                    </h4>
                                    <span class="blog-date">
                                        <strong>
                                            <?php
                                                $timestamp = strtotime($news_data->news_date_added);
                                                echo date('d',$timestamp);
                                            ?>
                                        </strong>
                                        <?php                                            
                                            echo date('M',$timestamp);
                                        ?>
                                    </span>
                                    
                                    <div class="blog-overlay">
                                        <a href="<?php echo e(URL::to('/news-detail/'.$news_data->news_slug)); ?>" class="fa fa-search-plus"></a>
                                    </div>
                                    
                                    <img class="img-fluid" src="<?php echo e(asset('').$news_data->news_image); ?>" alt="">
                                </div>
                            </article>
                        </div>
                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            	<?php endif; ?>
			</div>
		</div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>