<!doctype html>

<html>



<!-- meta contains meta taga, css and fontawesome icons etc -->
<base href="{{asset('')}}">
@include('common.meta')
<link rel="apple-touch-icon" sizes="57x57" href="{{asset('').'public/images/favicon/apple-icon-57x57.png'}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{asset('').'public/images/favicon/apple-icon-60x60.png'}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('').'public/images/favicon/apple-icon-72x72.png'}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('').'public/images/favicon/apple-icon-76x76.png'}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('').'public/images/favicon/apple-icon-114x114.png'}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('').'public/images/favicon/apple-icon-120x120.png'}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('').'public/images/favicon/apple-icon-144x144.png'}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('').'public/images/favicon/apple-icon-152x152.png'}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('').'public/images/favicon/apple-icon-180x180.png'}}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('').'public/images/favicon/android-icon-192x192.png'}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('').'public/images/favicon/favicon-32x32.png'}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('').'public/images/favicon/favicon-96x96.png'}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('').'public/images/favicon/favicon-16x16.png'}}">
<link rel="manifest" href="{{asset('').'public/images/favicon/manifest.json'}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- ./end of meta -->

<!--dir="rtl"-->

<body dir="{{ session('direction')}}">

	<!-- header -->
		@if(session('homeStyle')=='two' )
        	@include('common.header_two')
            @if(Request::path() == 'index' or Request::path() == '/')
            <section class="carousel-content">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-9 p-0"> @include('common.carousel') </div>
                  <div class="col-12 col-lg-3 p-0"> @include('common.offers') </div>
                </div>
              </div>
            </section>
            @endif
        @elseif(session('homeStyle')=='three' )
        	@include('common.header_three')
            @if(Request::path() == 'index' or Request::path() == '/')
            <section class="carousel-content">
              <div class="container">
                <div class="row">
                  <div class="col-12 p-0"> @include('common.carousel') </div>
                </div>
              </div>
            </section>
            @endif                 
       
        @else
       		@include('common.header')
            @if(Request::path() == 'index' or Request::path() == '/')
            <section class="carousel-content">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-3 p-0"> @include('common.categories') </div>
                  <div class="col-12 col-lg-9 p-0"> @include('common.carousel') </div>
                </div>
              </div>
            </section>
            @endif
        @endif
	<!-- ./end of header -->
        
        

	@yield('content')
	

	<section class="banner-content">
    	@include('common.banner')
    </section>
    
    @include('common.footer')
	<!-- all js scripts including custom js -->

	@include('common.scripts')

    <!-- ./end of js scripts -->
    @if(!empty($result['commonContent']['setting'][77]->value))
		<?=stripslashes($result['commonContent']['setting'][77]->value)?>
    @endif
</body>

</html>

