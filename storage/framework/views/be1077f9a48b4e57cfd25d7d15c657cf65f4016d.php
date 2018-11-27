<?php $__env->startSection('content'); ?>
<section class="site-content">
	<div class="container">
		<div class="breadcum-area">
        	<div class="breadcum-inner">
            	<h3><?php echo e($result['detail']['product_data'][0]->products_name); ?></h3>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->getFromJson('website.Home'); ?></a></li>
                    
                    <?php if(!empty($result['category_name']) and !empty($result['sub_category_name'])): ?>
                    	<li class="breadcrumb-item"><a href="<?php echo e(URL::to('/shop?category='.$result['category_slug'])); ?>"><?php echo e($result['category_name']); ?></a></li>
                    	<li class="breadcrumb-item"><a href="<?php echo e(URL::to('/shop?category='.$result['sub_category_slug'])); ?>"><?php echo e($result['sub_category_name']); ?></a></li>
                    <?php elseif(!empty($result['category_name']) and empty($result['sub_category_name'])): ?>
                    	<li class="breadcrumb-item"><a href="<?php echo e(URL::to('/shop?category='.$result['category_slug'])); ?>"><?php echo e($result['category_name']); ?></a></li>
                    <?php endif; ?>
                    
                    <li class="breadcrumb-item active"><?php echo e($result['detail']['product_data'][0]->products_name); ?></li>
                </ol>
            </div>
		</div>

		<div class="product-detail-area">
			<div class="row">
				<div class="col-12">
                	<div class="detail-area">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div id="product-slider" class="carousel slide">
                                    <!-- main slider carousel items -->
                                    <div class="carousel-inner">
                                        
                                        <!-- default image -->
                                        <div class="active item carousel-item" data-slide-number="0">
                                            <img class="img-thumbnail" src="<?php echo e(asset('').$result['detail']['product_data'][0]->products_image); ?>" alt="img-fluid">
                                        </div>
    
                                        <?php $__currentLoopData = $result['detail']['product_data'][0]->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item carousel-item" data-slide-number="<?php echo e(++$key); ?>">
                                                <img class="img-thumbnail" src="<?php echo e(asset('').$images->image); ?>" alt="img-fluid">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    
                                    <div class="carousel-indicators">                                
                                        <div class="thumbnail active" data-slide-to="0" data-target="#product-slider">
                                            <a id="carousel-selector-0">
                                                <img class="img-thumbnail " src="<?php echo e(asset('').$result['detail']['product_data'][0]->products_image); ?>" alt="img-fluid">
                                            </a>
                                        </div>
                                                    
                                        <?php $__currentLoopData = $result['detail']['product_data'][0]->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="thumbnail" data-slide-to="<?php echo e(++$key); ?>" data-target="#product-slider">
                                                <a id="carousel-selector-1">
                                                    <img class="img-thumbnail " src="<?php echo e(asset('').$images->image); ?>" alt="img-fluid">
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    
                                    <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only"><?php echo app('translator')->getFromJson('website.Previous'); ?></span>
                                    </a>
                                    <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only"><?php echo app('translator')->getFromJson('website.Next'); ?></span>
                                    </a>

                                </div>
                            </div>
            
                            <div class="col-12 col-lg-7">
                                <div class="product-summary">
                                    <div class="like-box">
                                        <span products_id='<?php echo e($result['detail']['product_data'][0]->products_id); ?>' class="fa <?php if($result['detail']['product_data'][0]->isLiked==1): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?> is_liked">
                                        	<span class="badge badge-secondary"><?php echo e($result['detail']['product_data'][0]->products_liked); ?></span>
                                        </span>                                          
                                    </div>                                    
                                    <h3 class="product-title"><?php echo e($result['detail']['product_data'][0]->products_name); ?></h3>                                    
                                    <div class="product-info">
                                        
                                        <?php if(!empty($result['category_name']) and !empty($result['sub_category_name'])): ?>
                                            
                                         <a href="<?php echo e(URL::to('/shop?category='.$result['sub_category_slug'])); ?>" class="category"><?php echo e($result['sub_category_name']); ?></a>
                                        <?php elseif(!empty($result['category_name']) and empty($result['sub_category_name'])): ?>
                                         <a href="<?php echo e(URL::to('/shop?category='.$result['category_slug'])); ?>" class="category"><?php echo e($result['category_name']); ?></a>
                                            
                                        <?php endif; ?>
                                        
                                        <div class="orders"><?php echo e($result['detail']['product_data'][0]->products_ordered); ?>&nbsp;<?php echo app('translator')->getFromJson('website.Order(s)'); ?></div>                                        <?php if($result['detail']['product_data'][0]->products_quantity == 0): ?>
                                            <div class="availbility"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?php echo app('translator')->getFromJson('website.Out of Stock'); ?> </div>
                                        <?php elseif($result['detail']['product_data'][0]->products_quantity <= $result['detail']['product_data'][0]->low_limit ): ?>
                                            <div class="availbility"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?php echo app('translator')->getFromJson('website.Low in Stock'); ?> </div>
                                        <?php else: ?> 
                                            <div class="availbility"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?php echo app('translator')->getFromJson('website.In stock'); ?> </div>
                                        <?php endif; ?>
                                    </div>
            
                                     <div class="product-price">
                                        <?php if(!empty($result['detail']['product_data'][0]->discount_price)): ?>
                                            <span class="discount">
                                                    <?php echo e($web_setting[19]->value); ?><?php echo e($result['detail']['product_data'][0]->discount_price+0); ?> 
                                            </span>
                                        <?php endif; ?>		
                                        
                                        <!--discount_price-->
                                        <span class="price <?php if(!empty($result['detail']['product_data'][0]->discount_price)): ?> line-through <?php else: ?> change_price <?php endif; ?>" >
                                            <?php echo e($web_setting[19]->value); ?><?php echo e($result['detail']['product_data'][0]->products_price+0); ?>

                                        </span>                                    
                                                                
                                            
                                    </div>
            
                                    <form name="attributes" id="add-Product-form" method="post" >
                                        <input type="hidden" name="products_id" value="<?php echo e($result['detail']['product_data'][0]->products_id); ?>">
                                        <input type="hidden" name="products_price" id="products_price" value="<?php if(!empty($result['detail']['product_data'][0]->discount_price)): ?><?php echo e($result['detail']['product_data'][0]->discount_price+0); ?><?php else: ?><?php echo e($result['detail']['product_data'][0]->products_price+0); ?><?php endif; ?>">
                                        <input type="hidden" name="checkout" id="checkout_url" value="<?php if(!empty(app('request')->input('checkout'))): ?> <?php echo e(app('request')->input('checkout')); ?> <?php else: ?> false <?php endif; ?>" >	
                                        
                                        <?php if(count($result['detail']['product_data'][0]->attributes)>0): ?>                                            
                                            <div class="form-row">  
                                                <?php $__currentLoopData = $result['detail']['product_data'][0]->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributes_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                     
                                                <input type="hidden" name="option_name[]" value="<?php echo e($attributes_data['option']['name']); ?>" >
                                                <input type="hidden" name="option_id[]" value="<?php echo e($attributes_data['option']['id']); ?>" >
                                                <input type="hidden" name="<?php echo e($attributes_data['option']['name']); ?>" id="<?php echo e($attributes_data['option']['name']); ?>" value="0" >								
                                                <div class="form-group col-sm-4">							
                                                    <label for="<?php echo e($attributes_data['option']['name']); ?>" class="col-sm-12 col-form-label"><?php echo e($attributes_data['option']['name']); ?></label>		
                                                    <div class="col-sm-12">								
                                                        <select name="<?php echo e($attributes_data['option']['id']); ?>"  class="form-control <?php echo e($attributes_data['option']['name']); ?>">
                                                            <?php $__currentLoopData = $attributes_data['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($values_data['id']); ?>" prefix = '<?php echo e($values_data['price_prefix']); ?>'  value_price ="<?php echo e($values_data['price']+0); ?>" ><?php echo e($values_data['value']); ?></option>								
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>								
                                                        </select>								
                                                    </div>							
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>							
                                            </div>
                                        <?php endif; ?>	
                                        
                                        <div class="form-inline product-box">
                                            <div class="form-group Qty">

                                                <label for="quantity" class="col-form-label"><?php echo app('translator')->getFromJson('website.Quantity'); ?> </label>
                        
                                                <div class="input-group">						
                                                    <span class="input-group-btn first qtyminus">						
                                                    	<button class="btn btn-defualt" type="button">-</button>						
                                                    </span>						
                                                    <input type="text" readonly name="quantity" value="1" min="1" max="<?php echo e($result['detail']['product_data'][0]->products_quantity); ?>" class="form-control qty">						
                                                    <span class="input-group-btn last qtyplus">						
                                                    	<button class="btn btn-defualt" type="button">+</button>						
                                                    </span>						
                                                </div>
                                            </div>
                                            
                                            <div class="price-box">
                                                <span><?php echo app('translator')->getFromJson('website.Total Price'); ?>&nbsp;:</span>
                                                <span class="total_price">
                                                <?php if(!empty($result['detail']['product_data'][0]->discount_price)): ?><?php echo e($web_setting[19]->value); ?><?php echo e($result['detail']['product_data'][0]->discount_price+0); ?><?php else: ?><?php echo e($web_setting[19]->value); ?><?php echo e($result['detail']['product_data'][0]->products_price+0); ?><?php endif; ?>
                                                </span>				
                                            </div>  
                                            <div class="buttons">
                                                <?php if($result['detail']['product_data'][0]->products_quantity == 0): ?>
                                                    <button class="btn btn-danger btn-round " type="button"><?php echo app('translator')->getFromJson('website.Out of Stock'); ?></button>
                                                <?php else: ?>
                                                    <button class="btn btn-secondary btn-round add-to-Cart" type="button" products_id="<?php echo e($result['detail']['product_data'][0]->products_id); ?>"><?php echo app('translator')->getFromJson('website.Add to Cart'); ?></button>
                                                <?php endif; ?> 
                                            </div>   
                                        </div>
                                    </form>								
                                </div>	
                            </div>
                            
                            <div class="col-12">
                                <div class="product-tabs">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills" id="myTab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" id="product-desc-tab" data-toggle="tab" href="#product_desc" role="tab" aria-controls="product_desc" aria-selected="true"><?php echo app('translator')->getFromJson('website.Products Description'); ?></a>
                                      </li>
                                      
                                    </ul>
                                    
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="product_desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                            <p class="product-description"><?=stripslashes($result['detail']['product_data'][0]->products_description)?></p>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				
                    <div class="related-product-area">
                        <div class="heading">
                                <h2><?php echo app('translator')->getFromJson('website.Related Products'); ?> <small class="pull-right"><a href="<?php echo e(URL::to('/shop?category_id='.$result['detail']['product_data'][0]->categories_id)); ?>"><?php echo app('translator')->getFromJson('website.View All'); ?></a></small></h2>
                                <hr>
                            </div>
                        <div class="row">
                            
                            
                            <div class="products products-4x">
                                <?php $__currentLoopData = $result['simliar_products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                                <?php if($result['detail']['product_data'][0]->products_id != $products->products_id): ?>
                
                                <?php if(++$key<=5): ?>
                
                                <div class="product">
                                    <article>
                                        <div class="thumb"><img class="img-fluid" src="<?php echo e(asset('').$products->products_image); ?>" alt="<?php echo e($products->products_name); ?>"></div>
                                        <?php
                                            $current_date = date("Y-m-d", strtotime("now"));
                                            
                                            $string = substr($products->products_date_added, 0, strpos($products->products_date_added, ' '));
                                            $date=date_create($string);
                                            date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));
                                            
                                            
                                            $after_date = date_format($date,"Y-m-d");
                                            
                                            if($after_date>=$current_date){
                                                print '<span class="new-tag">New</span>';
                                            }
                                            
                                            if(!empty($products->discount_price)){
                                                $discount_price = $products->discount_price;	
                                                $orignal_price = $products->products_price;	
                                                
                                                $discounted_price = $orignal_price-$discount_price;
                                                $discount_percentage = $discounted_price/$orignal_price*100;
                                                echo "<span class='discount-tag'>".(int)$discount_percentage."%</span>";
                                            }
                                        ?>
                                        
                                        <span class="tag text-center">
                                            <?=stripslashes($products->categories_name)?>
                                        </span>
                                        
                                        <h2 class="title text-center"><?php echo e($products->products_name); ?></h2>
                                        <!--<p class="like"> <span href="#" products_id = '<?php echo e($products->products_id); ?>' class="fa <?php if($products->isLiked==1): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?> is_liked"></span> <span><?php echo e($products->products_liked); ?> <?php echo app('translator')->getFromJson('website.Likes'); ?></span></p>-->
                                            
                                        <div class="price text-center">
                                            <?php if(!empty($products->discount_price)): ?>
                                                <?php echo e($web_setting[19]->value); ?><?php echo e($products->discount_price+0); ?>

                                                <span><?php echo e($web_setting[19]->value); ?><?php echo e($products->products_price+0); ?></span> 
                                            <?php else: ?>
                                                <?php echo e($web_setting[19]->value); ?><?php echo e($products->products_price+0); ?>

                                            <?php endif; ?>
                                        </div>
                                        
                                        <!--<?php if(!in_array($products->products_id,$result['cartArray'])): ?>
                                            <button type="button" class="btn btn-cart cart" products_id="<?php echo e($products->products_id); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                        <?php else: ?>
                                            <button type="button"  class="btn btn-cart acitve"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                        <?php endif; ?>-->
                                        
                                        <div class="product-hover">
                                            <div class="icons">
                                                <div class="icon-liked">
                                                    <span products_id = '<?php echo e($products->products_id); ?>' class="fa <?php if($products->isLiked==1): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?> is_liked"><span class="badge badge-secondary"><?php echo e($products->products_liked); ?></span></span>
                                                </div>
                                                <a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>" class="fa fa-eye"></a>
                                            </div>
                                            
                                            <div class="buttons">
                                            	<?php if(!in_array($products->products_id,$result['cartArray'])): ?>
                                            
                                                    <button  class="btn btn-block btn-secondary cart" products_id="<?php echo e($products->products_id); ?>"><?php echo app('translator')->getFromJson('website.Add to Cart'); ?></button>
                                                    
                                                <?php else: ?>
                                                    <button  class="btn btn-block btn-secondary active"><?php echo app('translator')->getFromJson('website.Added'); ?></button>
                                                <?php endif; ?>
                                            </div>
                                            
                                         </div>
                                    </article>
                                  </div>
                
                                <?php endif; ?>		
                
                                <?php endif; ?>
                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
    
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>