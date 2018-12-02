jQuery( document ).ready( function(){
	$.noConflict();
	
	//stripe_ajax
	jQuery(document).on('click', '#stripe_ajax', function(e){
		jQuery('#loader').css('display','flex');
		jQuery.ajax({
			url: '{{ URL::to("/stripeForm")}}'.replace('http:','https:'),
			type: "POST",			
			success: function (res) {
				if(res.trim() == "already added"){					
				}else{
					jQuery('.head-cart-content').html(res);	
					jQuery(parent).removeClass('cart');
					jQuery(parent).addClass('active');
				}
				message = "@lang('website.Product is added')";			
				notification(message);
				jQuery('#loader').hide();
			},
		});
	});	
	
	//commeents
	jQuery(document).on('focusout','#order_comments', function(e){
		jQuery('#loader').css('display','flex');
		var comments = jQuery('#order_comments').val();
		jQuery.ajax({
			url: '{{ URL::to("/commentsOrder")}}'.replace('http:','https:'),
			type: "POST",
			data: '&comments='+comments,
			async: false,
			success: function (res) {	
				jQuery('#loader').hide();			
			},
		});		
	});
	
	
	//cash_on_delivery_button
	jQuery(document).on('click', '#cash_on_delivery_button', function(e){	
		jQuery('#loader').css('display','flex');
		jQuery("#update_cart_form").submit();
	});	
	
	//shipping_mehtods_form
	jQuery(document).on('submit', '#shipping_mehtods_form', function(e){
		jQuery('.error_shipping').hide();		
		var checked = jQuery(".shipping_data:checked").length > 0;
		if (!checked){
			jQuery('.error_shipping').show();
			return false;
		}				
	});
	
	//update_cart
	jQuery(document).on('click', '#update_cart', function(e){	
		jQuery('#loader').css('display','flex');
		jQuery("#update_cart_form").submit();
	});

	//billling method
	jQuery(document).on('click', '#same_billing_address', function(e){		
		if(jQuery(this).prop('checked') == true){
			jQuery("#billing_firstname").val(jQuery("#firstname").val());
			jQuery("#billing_lastname").val(jQuery("#lastname").val());
			jQuery("#billing_company").val(jQuery("#company").val());
			jQuery("#billing_street").val(jQuery("#street").val());
			jQuery("#billing_city").val(jQuery("#city").val());
			jQuery("#billing_zip").val(jQuery("#postcode").val());			
			jQuery("#billing_countries_id").val(jQuery("#entry_country_id").val());
			jQuery("#billing_zone_id").val(jQuery("#entry_zone_id").val());				
			
			jQuery(".same_address").attr('readonly','readonly');
			jQuery(".same_address_select").attr('disabled','disabled');						
		}else{
			jQuery(".same_address").removeAttr('readonly');
			jQuery(".same_address_select").removeAttr('disabled');
		}
	});	
	
	//apply_coupon_cart
	jQuery(document).on('submit', '#apply_coupon', function(e){
		jQuery('#coupon_code').remove('error');
		jQuery('#coupon_require_error').hide();
		jQuery('#loader').css('display','flex');
		
		if(jQuery('#coupon_code').val().length > 0){		
			var formData = jQuery(this).serialize();
			jQuery.ajax({
				url: '{{ URL::to("/apply_coupon")}}'.replace('http:','https:'),
				type: "POST",
				data: formData,
				success: function (res) {
					var obj = JSON.parse(res);	
					var message = obj.message;
					jQuery('#loader').hide();
					if(obj.success==0){
						jQuery("#coupon_error").html(message).show();
						return false;
					}else if(obj.success==2){			
						jQuery("#coupon_error").html(message).show();
						return false;
					}else if(obj.success==1){						
						window.location.reload(true);	
					}					
				},
			});
		}else{
			jQuery('#loader').css('display','none');
			jQuery('#coupon_code').addClass('error');
			jQuery('#coupon_require_error').show();
			return false;
		}
		jQuery('#loader').hide();
		return false;
	});

	//coupon_code
	jQuery(document).on('keyup', '#coupon_code', function(e){
		jQuery("#coupon_error").hide();
		if(jQuery(this).val().length >0){			
			jQuery('#coupon_code').removeClass('error');
			jQuery('#coupon_require_error').hide();
		}else{
			jQuery('#coupon_code').addClass('error');
			jQuery('#coupon_require_error').show();
		}
		
	});

	//change language
	function changeLanguage(locale){
		jQuery('#loader').css('display','flex');								
		jQuery.ajax({			
			url: '{{ URL::to("/language")}}'.replace('http:','https:'),			
			type: "POST",			
			data: '&locale='+locale,
			//dataType:"json",			
						
			success: function (res) {	
				window.location.reload(true);		
			},			
		});	
		
	};
	
	jQuery( function() {
		jQuery.widget( "custom.iconselectmenu", jQuery.ui.selectmenu, {
		  _renderItem: function( ul, item ) {
			var li = jQuery( "<li>" ),
			  wrapper = jQuery( "<div>", { text: item.label } );
	 
			if ( item.disabled ) {
			  li.addClass( "ui-state-disabled" );
			}
	 
			jQuery( "<span>", {
			  style: item.element.attr( "data-style" ),
			  "class": "ui-icon " + item.element.attr( "data-class" )
			})
			  .appendTo( wrapper );
	 
			return li.append( wrapper ).appendTo( ul );
		  }
		});
	 

		
		jQuery("#change_language")
		.iconselectmenu({
		  create: function (event, ui) {
			  var widget = jQuery(this).iconselectmenu("widget");
			  $span = jQuery('<span id="' + this.id + '_image" class="ui-selectmenu-image"> ').html("&nbsp;").appendTo(widget);
			  $span.attr("style", jQuery(this).children(":selected").data("style"));
			  
		  },		  		 
		  change: function (event, ui) {
			  jQuery("#" + this.id + '_image').attr("style", ui.item.element.data("style"));
			  var locale = jQuery(this).val();
			  changeLanguage(locale);
			  
		  }
		}).iconselectmenu("menuWidget").addClass("ui-menu-icons customicons");
		
  } );
  jQuery( function() {
    	jQuery( "#category_id" ).selectmenu();
		jQuery( ".attributes_data" ).selectmenu();
	});
	
	//is_liked
	jQuery(document).on('click', '.is_liked', function(e){
		var products_id = jQuery(this).attr('products_id');
		var selector = jQuery(this);
		jQuery('#loader').css('display','flex');	
		var user_count = jQuery('#wishlist-count').html();		
		jQuery.ajax({			
			url: '{{ URL::to("/likeMyProduct")}}'.replace('http:','https:'),			
			type: "POST",			
			data: '&products_id='+products_id,			
						
			success: function (res) {			
				//jQuery('.head-cart-content').html(res);	
				var obj = JSON.parse(res);	
				var message = obj.message;
				
				if(obj.success==0){
					
				}else if(obj.success==2){
					jQuery(selector).removeClass('fa-heart-o');
					jQuery(selector).addClass('fa-heart');
					jQuery(selector).children('span').html(obj.total_likes);
					jQuery('#wishlist-count').html(parseInt(user_count)+ parseInt(1));	
					jQuery(selector).children('.badge').html(obj.total_likes);
				}else if(obj.success==1){
					jQuery(selector).removeClass('fa-heart');
					jQuery(selector).addClass('fa-heart-o');
					
					jQuery(selector).children('span').html(obj.total_likes);
					jQuery('#wishlist-count').html(user_count-1);	
					jQuery(selector).children('.badge').html(obj.total_likes);
				}	
				jQuery('#loader').hide();
				notification(message);
						
			},			
		});	
		
	});
	
	//wishlist_liked
	jQuery(document).on('click', '.wishlist_liked', function(e){
		var products_id = jQuery(this).attr('products_id');
		var selector = jQuery(this).parents('.product').remove();
		jQuery('#loader').css('display','flex');	
		var user_count = jQuery('#wishlist-count').html();		
		jQuery.ajax({			
			url: '{{ URL::to("/likeMyProduct")}}'.replace('http:','https:'),			
			type: "POST",			
			data: '&products_id='+products_id,			
						
			success: function (res) {				
				var obj = JSON.parse(res);	
				var message = obj.message;
				
				if(obj.success==0){
					
				}else if(obj.success==2){
					//jQuery(selector).children('span').html(obj.total_likes);
					jQuery('#wishlist-count').html(parseInt(user_count)+ parseInt(1));	
					//jQuery(selector).children('span').html(obj.total_likes+" @lang('website.Likes')");
				}else if(obj.success==1){
					//jQuery(selector).addClass(hidden);
					
					//jQuery(selector).children('span').html(obj.total_likes);
					var count = user_count-1;
					jQuery('#wishlist-count').html(count);
					
					if(count==0){
						jQuery(".loaded_content").hide();
						jQuery("#loaded_content_empty").show();
					}else{						
						jQuery('.showing_record').html(count);	
						jQuery('.showing_total_record').html(parseInt(jQuery('.showing_total_record').html())-parseInt(1));	
					}
					//website.product is not added to your wish list
					//jQuery(selector).children('span').html(obj.total_likes+" @lang('website.Likes')");
				}	
				jQuery('#loader').hide();
				notification(message);
						
			},			
		});	
		
	});
	//change_language
jQuery(document).on('click', '.change_language', function(e){
	jQuery('#loader').css('display','flex');
	var languages_id = jQuery(this).attr('languages_id');
	jQuery.ajax({
		url: '{{ URL::to("/change_language")}}'.replace('http:','https:'),
		type: "POST",
		data: '&languages_id='+languages_id,
		success: function (res) {
			jQuery('#loader').hide();
		},
	});
});	


//sortby
jQuery(document).on('change', '.sortby', function(e){	
	jQuery('#loader').css('display','flex');
	jQuery("#load_products_form").submit();
});
	

//load more products
jQuery(document).on('click', '#load_products', function(e){	
	jQuery('#loader').css('display','flex');
	var page_number = jQuery('#page_number').val();
	var total_record = jQuery('#total_record').val();
	var formData = jQuery("#load_products_form").serialize();
	jQuery.ajax({
		url: '{{ URL::to("/filterProducts")}}'.replace('http:','https:'),
		type: "POST",
		data: formData,
		success: function (res) {
			if(jQuery.trim().res==0){						
				jQuery('#load_products').hide();
				jQuery('#loaded_content').show();
			}else{
				page_number++;
				jQuery('#page_number').val(page_number);
				jQuery('#listing-products').append(res);
				var record_limit = jQuery('#record_limit').val();
				var showing_record = page_number*record_limit;
				if(total_record<=showing_record){
					jQuery('.showing_record').html(total_record);					
					jQuery('#load_products').hide();
					jQuery('#loaded_content').show();
				}else{
					jQuery('.showing_record').html(showing_record);
				}
			}			
			jQuery('#loader').hide();
		},
	});
});

//sortby
jQuery(document).on('change', '.sortbywishlist', function(e){	
	jQuery('#loader').css('display','flex');
	jQuery("#load_wishlist_form").submit();
});
	

//load more products
jQuery(document).on('click', '#load_wishlist', function(e){	
	jQuery('#loader').css('display','flex');
	var page_number = jQuery('#page_number').val();
	var formData = jQuery("#load_wishlist_form").serialize();
	jQuery.ajax({
		url: '{{ URL::to("/loadMoreWishlist")}}'.replace('http:','https:'),
		type: "POST",
		data: formData,
		success: function (res) {
			
			if(jQuery.trim().res==0){						
				jQuery('#load_wishlist').hide();
				jQuery('#loaded_content').show();
			}else{
				page_number++;
				jQuery('#page_number').val(page_number);
				jQuery('#listing-wishlist').append(res);
				
				var record_limit = jQuery('#record_limit').val();
				var total_record = jQuery('#total_record').val();
				
				var showing_record = page_number*record_limit;
				if(total_record<=showing_record){
					jQuery('#load_wishlist').hide();
					jQuery('.showing_record').html(total_record);
				}else{
					jQuery('.showing_record').html(showing_record);
				}
			}
			jQuery('#loader').hide();
			
			
			/*if(jQuery.trim().res==0){						
				jQuery('#load_wishlist').hide();
				jQuery('#loaded_content').show();
			}else{
				page_number++;
				jQuery('#page_number').val(page_number);
				jQuery('#listing-wishlist').append(res);
			}
			jQuery('#loader').hide();*/
		},
	});
});



//sortbynews
jQuery(document).on('change', '.sortbynews', function(e){	
	jQuery('#loader').css('display','flex');
	jQuery("#load_news_form").submit();
});

//load more news
jQuery(document).on('click', '#load_news', function(e){	
	jQuery('#loader').css('display','flex');
	var page_number = jQuery('#page_number').val();
	var formData = jQuery("#load_news_form").serialize();
	jQuery.ajax({
		url: '{{ URL::to("/loadMoreNews")}}'.replace('http:','https:'),
		type: "POST",
		data: formData,
		success: function (res) {
			if(jQuery.trim().res==0){						
				jQuery('#load_news').hide();
				jQuery('#loaded_content').show();
			}else{
				page_number++;
				jQuery('#page_number').val(page_number);
				jQuery('#listing-news').append(res);
				
				var record_limit = jQuery('#record_limit').val();
				var total_record = jQuery('#total_record').val();
				//alert(record_limit);
				var showing_record = page_number*record_limit;
				if(total_record<showing_record){
					jQuery('#load_news').hide();
					jQuery('.showing_record').html(total_record);
				}else{
					jQuery('.showing_record').html(showing_record);
				}
			}
			jQuery('#loader').hide();
		},
	});
});

/*jQuery(document).on('click', '.filters_box', function(e){	
	if (jQuery('input:checkbox.filters_box:checked').length > 0) {
      	jQuery('#filters_applied').val(1);
		jQuery('#apply_options_btn').removeAttr('disabled');
	} else {
      	jQuery('#filters_applied').val(0);
		jQuery('#apply_options_btn').attr('disabled',true);
    }
})
*/
jQuery(document).on('click', '#apply_options_btn', function(e){	
	if (jQuery('input:checkbox.filters_box:checked').length > 0) {
      	jQuery('#filters_applied').val(1);
		jQuery('#apply_options_btn').removeAttr('disabled');
	} else {
      	jQuery('#filters_applied').val(0);
		jQuery('#apply_options_btn').attr('disabled',true);
    }	
	jQuery('#load_products_form').submit();
	
})


//validate form

jQuery(document).on('submit', '.form-validate', function(e){

	var error = "";
	
	//to validate text field

	jQuery(".field-validate").each(function() {
		if(this.value == '') {
			jQuery(this).closest(".form-group").addClass('has-error');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
		}else{
			jQuery(this).closest(".form-group").removeClass('has-error');
			jQuery(this).next(".error-content").attr('hidden', true);
		}
	});
	
	/*jQuery(".phone-validate").each(function() {
		if(this.value == '' && isNaN(this.value)) {
			jQuery(this).closest(".form-group").addClass('has-error');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
		}else{
			jQuery(this).closest(".form-group").removeClass('has-error');
			jQuery(this).next(".error-content").attr('hidden', true);
		}
	});*/
	
	
	var check = 0;
	jQuery(".password").each(function() {
		var regex = "^\\s+$";
		if(this.value.match(regex)) {
			jQuery(this).closest(".form-group").addClass('has-error');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";				
		}else{
			if(check == 1){
				 var res = passwordMatch();

					if(res=='matched'){
						jQuery('.password').closest(".form-group").removeClass('has-error');
						jQuery('#re_password').closest('.re-password-content').children('.error-content-password').add('hidden');
					}else if(res=='error'){
						jQuery('.password').closest(".form-group").addClass('has-error');						
						jQuery('#re_password').closest('.re-password-content').children('.error-content-password').removeAttr('hidden');						
						error = "has error";
					}
				}else{
					jQuery(this).closest(".form-group").removeClass('has-error');
					jQuery(this).next(".error-content").attr('hidden', true);
				}
				 check++;
			}

	});
	

	jQuery(".number-validate").each(function() {
		if(this.value == '' || isNaN(this.value)) {
			jQuery(this).closest(".form-group").addClass('has-error');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
		}else{
			jQuery(this).closest(".form-group").removeClass('has-error');
			jQuery(this).next(".error-content").attr('hidden', true);
		}
	});



	//

	jQuery(".email-validate").each(function() {

		var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

		if(this.value != '' && validEmail.test(this.value)) {

			jQuery(this).closest(".form-group").removeClass('has-error');

			jQuery(this).next(".error-content").attr('hidden', true);



		}else{

			jQuery(this).closest(".form-group").addClass('has-error');

			jQuery(this).next(".error-content").removeAttr('hidden');

			error = "has error";

		}

	});

	
	jQuery(".checkbox-validate").each(function() {
		
		if(jQuery(this).prop('checked') == true){
			jQuery(this).closest(".form-group").removeClass('has-error');
			jQuery(this).closest('.checkbox-parent').children('.error-content').attr('hidden', true);						
		}else{
			jQuery(this).closest(".form-group").addClass('has-error');
			jQuery(this).closest('.checkbox-parent').children('.error-content').removeAttr('hidden');

			error = "has error";
		}

	});



	if(error=="has error"){

		return false;

	}



});



//focus form field

jQuery(document).on('keyup focusout change', '.field-validate', function(e){
	if(this.value == '') {		
		jQuery(this).closest(".form-group").addClass('has-error');
		jQuery(this).next(".error-content").removeAttr('hidden');
	}else{
		jQuery(this).closest(".form-group").removeClass('has-error');
		jQuery(this).next(".error-content").attr('hidden', true);
	}
});



//focus form field
jQuery(document).on('keyup', '.number-validate', function(e){
	if(this.value == '' || isNaN(this.value)) {
		jQuery(this).closest(".form-group").addClass('has-error');
		jQuery(this).next(".error-content").removeAttr('hidden');
	}else{
		jQuery(this).closest(".form-group").removeClass('has-error');
		jQuery(this).next(".error-content").attr('hidden', true);
	}
});

//match password
jQuery(document).on('keyup focusout', '.password', function(e){
	var regex = "^\\s+$";
	if(this.value.match(regex)) {			
		jQuery(this).closest(".form-group").addClass('has-error');
		jQuery(this).next(".error-content").removeAttr('hidden');
	}else{
		jQuery(this).closest(".form-group").removeClass('has-error');
		jQuery(this).next(".error-content").attr('hidden', true);
	}
});



jQuery(document).on('keyup focusout', '.email-validate', function(e){

	var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

	if(this.value != '' && validEmail.test(this.value)) {
		jQuery(this).closest(".form-group").removeClass('has-error');
		jQuery(this).next(".error-content").attr('hidden', true);
	}else{
		jQuery(this).closest(".form-group").addClass('has-error');
		jQuery(this).next(".error-content").removeAttr('hidden');
		error = "has error";
	}

});


		//sorting grid/list
	jQuery(document).on('click','#list',function(){		
		if (!jQuery(this).hasClass('active')) {
			jQuery('#listing-products, .load-more-area').hide();		
			jQuery( '#listing-products' ).removeClass( 'products-3x' );
			jQuery( '#listing-products' ).addClass( 'products-list' );
			jQuery( '#grid' ).removeClass( 'active' );
			jQuery( this ).addClass( 'active' );		
			jQuery('#listing-products, .load-more-area').fadeIn(1000);	
		}
	});

	jQuery(document).on('click','#grid',function(){	
		if (!jQuery(this).hasClass('active')){ 		
			jQuery('#listing-products, .load-more-area').hide();	
			jQuery( '#listing-products' ).removeClass( 'products-list' );
			jQuery( '#listing-products' ).addClass( 'products-3x' );
			jQuery( '#list' ).removeClass( 'active' );
			jQuery( this ).addClass( 'active' );
			jQuery('#listing-products, .load-more-area').fadeIn(1000);
		}
	});

	//sorting grid/list
	jQuery(document).on('click','#list_wishlist',function(){		
		if (!jQuery(this).hasClass('active')) {
			jQuery('#listing-wishlist, .load-more-area').hide();		
			jQuery( '#listing-wishlist' ).removeClass( 'products-3x' );
			jQuery( '#listing-wishlist' ).addClass( 'products-list' );
			jQuery( '#grid_wishlist' ).removeClass( 'active' );
			jQuery( this ).addClass( 'active' );		
			jQuery('#listing-wishlist, .load-more-area').fadeIn(1000);	
		}
	});

	jQuery(document).on('click','#grid_wishlist',function(){	
		if (!jQuery(this).hasClass('active')){ 		
			jQuery('#listing-wishlist, .load-more-area').hide();	
			jQuery( '#listing-wishlist' ).removeClass( 'products-list' );
			jQuery( '#listing-wishlist' ).addClass( 'products-3x' );
			jQuery( '#list_wishlist' ).removeClass( 'active' );
			jQuery( this ).addClass( 'active' );
			jQuery('#listing-wishlist, .load-more-area').fadeIn(1000);
		}
	});
	
	//sorting grid/list
	jQuery(document).on('click','#list_news',function(){		
		if (!jQuery(this).hasClass('active')) {
			jQuery('#listing-news, .load-more-area').hide();		
			jQuery( '#listing-news' ).removeClass( 'blogs-4x' );
			jQuery( '#listing-news' ).addClass( 'blogs-list' );
			jQuery( '#grid_news' ).removeClass( 'active' );
			jQuery( this ).addClass( 'active' );		
			jQuery('#listing-news, .load-more-area').fadeIn(1000);	
		}
	});

	jQuery(document).on('click','#grid_news',function(){	
		if (!jQuery(this).hasClass('active')){ 		
			jQuery('#listing-news, .load-more-area').hide();	
			jQuery( '#listing-news' ).removeClass( 'blogs-list' );
			jQuery( '#listing-news' ).addClass( 'blogs-4x' );
			jQuery( '#list_news' ).removeClass( 'active' );
			jQuery( this ).addClass( 'active' );
			jQuery('#listing-news, .load-more-area').fadeIn(1000);
		}
	});
	
	/*$(".show_commentsandnotes_container").click(function () {
		$('.commentsandnotes_bg').fadeIn(1000, function() {
		   $('.commentsandnotes_bg').addClass('show');
		});
		$('.commentsandnotes_container').fadeIn(1000, function() {
		   $('.commentsandnotes_container').addClass('show');
		});
	});
	$(".commentsandnotes_bg").click(function () {
		$('.commentsandnotes_bg').fadeOut(1000, function() { 
		   $('.commentsandnotes_bg').removeClass('show');
		});
		$('.commentsandnotes_container').fadeOut(1000, function() { 
		   $('.commentsandnotes_container').removeClass('show'); 
		});
	});*/
	

	//default_address
	jQuery(document).on('click', '.default_address', function(e){
		jQuery('#loader').css('display','flex');
		var address_id = jQuery(this).attr('address_id');
		jQuery.ajax({
			url: '{{ URL::to("/myDefaultAddress")}}'.replace('http:','https:'),
			type: "POST",
			data: '&address_id='+address_id,
			
			success: function (res) {
				 window.location = 'shipping-address?action=default';
			},

		});

	});
	//deleteMyAddress
	jQuery(document).on('click', '.deleteMyAddress', function(e){
		jQuery('#loader').css('display','flex');
		var address_id = jQuery(this).attr('address_id');
		jQuery.ajax({
			url: '{{ URL::to("/delete-address")}}'.replace('http:','https:'),
			type: "POST",
			data: '&address_id='+address_id,
			
			success: function (res) {
				window.location = 'shipping-address?action=detele';
			},
		});
	});

	jQuery('.slide-toggle').on('click', function(event){
		jQuery('.color-panel').toggleClass('active');
	});
	jQuery( function() {		 
	  var maximum_price = jQuery( ".maximum_price" ).val();
	  jQuery( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: maximum_price,
		values: [ 0, maximum_price ],
		slide: function( event, ui ) {
			jQuery('#min_price').val(ui.values[ 0 ] );
			jQuery('#max_price').val(ui.values[ 1 ] );
		   
			jQuery('#min_price_show').val( ui.values[ 0 ] );
			jQuery('#max_price_show').val( ui.values[ 1 ] );
		},
		create: function(event, ui){
			jQuery(this).slider('value',20);
		}
	   });	   
	   jQuery( "#min_price_show" ).val( jQuery( "#slider-range" ).slider( "values", 0 ) );	   
	   jQuery( "#max_price_show" ).val(jQuery( "#slider-range" ).slider( "values", 1 ) );
	   //jQuery( "#slider-range" ).slider( "option", "max", 50 );
	});

	//tooltip enable
	jQuery(function () {
	  jQuery('[data-toggle="tooltip"]').tooltip()
	});		




	/******************************
      BOTTOM SCROLL TOP BUTTON
   ******************************/

  // declare variable
  var scrollTop = jQuery(".floating-top");

  jQuery(window).scroll(function() {
    // declare variable
    var topPos = jQuery(this).scrollTop();

    // if user scrolls down - show scroll to top button
    if (topPos > 150) {
      jQuery(scrollTop).css("opacity", "1");

    } else {
      jQuery(scrollTop).css("opacity", "0");
    }

  });

  //Click event to scroll to top
  jQuery(scrollTop).click(function() {
    jQuery('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;

  });

  jQuery('body').on('mouseenter mouseleave','.dropdown.open',function(e){
  var _d=jQuery(e.target).closest('.dropdown');
  _d.addClass('show');
  setTimeout(function(){
    _d[_d.is(':hover')?'addClass':'removeClass']('show');	
    
  },300);
  jQuery('.dropdown-menu', _d).attr('aria-expanded',_d.is(':hover'));
});
  
  
  
jQuery('.nav-index').on('show.bs.tab', function (e) {
	  console.log('fire');
	  e.target // newly activated tab
	  e.relatedTarget // previous active tab
	  jQuery('.overlay').show();   
})
  jQuery('.nav-index').on('hidden.bs.tab', function (e) {
	  console.log('expire');
	  e.target // newly activated tab
	  e.relatedTarget // previous active tab
	  jQuery('.overlay').hide();   
})

});