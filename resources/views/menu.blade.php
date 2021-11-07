<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php require_once('css/phpcss.php'); ?>

  </head>
  <body>

  	@include('komponen.headermenu')

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="..">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

   

    <section class="ftco-section" id="list-menu">
    	<div class="container">
    		<form method="POST" action="menu">
    			@csrf
    			<div class="row">
	        	<div class="col-md-6 mb-5 pb-3">
	        		<h3 class="mb-5 heading-pricing ftco-animate">Starter</h3>
							@php
	        		$i = 1;
	        		@endphp
							@foreach ($barang1 as $data)
	        		<div class="pricing-entry d-flex ftco-animate">
	        			<div class="img" style="background-image: url(images/dish-5.jpg);"></div>
	        			<div class="desc pl-3">
		        			<div class="d-flex text align-items-center">
		        				<h3><span>{{ $data->nama_produk }}</span></h3>
		        				<span class="price">RP{{ $data->harga_produk }}/{{ $data->ukuran_kemasan }}</span>
		        			</div>
		        			<div class="d-block">
		        				<p>{{ $data->detail_komposisi }}</p>
		        			</div>

		        			<div class="custom-control custom-checkbox">
									  <input type="checkbox" name="ch{{$i}}" value="{{ $data->nama_produk }}" class="custom-control-input" id="customCheck{{$i}}">
									  <label class="custom-control-label" for="customCheck{{$i}}">Beli produk ini</label>
									</div>

									@php
									$i++;
									@endphp

		        		</div>
	        		</div>
	        		@endforeach
	        	</div>

	        	<div class="col-md-6 mb-5 pb-3">
	        		<h3 class="mb-5 heading-pricing ftco-animate">Main Dish</h3>
	        		@php
	        		$i = 100;
	        		@endphp
	        		@foreach ($barang2 as $data)
	        		<div class="pricing-entry d-flex ftco-animate">
	        			<div class="img" style="background-image: url(images/dish-5.jpg);"></div>
	        			<div class="desc pl-3">
		        			<div class="d-flex text align-items-center">
		        				<h3><span>{{ $data->nama_produk }}</span></h3>
		        				<span class="price">RP{{ $data->harga_produk }}/{{ $data->ukuran_kemasan }}</span>
		        			</div>
		        			<div class="d-block">
		        				<p>{{ $data->detail_komposisi }}</p>
		        			</div>

		        			<div class="custom-control custom-checkbox">
									  <input type="checkbox" name="ch{{$i}}" value="{{ $data->nama_produk }}" class="custom-control-input" id="customCheck{{$i}}">
									  <label class="custom-control-label" for="customCheck{{$i}}">Beli produk ini</label>
									</div>

									@php
									$i++;
									@endphp

		        		</div>
	        		</div>
	        		@endforeach
	        	</div>

	        	<input type="submit" value="Hubungi Penjual" name="submit" class="btn btn-primary mx-auto d-block">
	        </div>
    		</form>
        
    	</div>
    </section>

    <section class="ftco-menu mb-5 pb-5" id="pilih-menu">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
		              		@foreach($barang1 as $data)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/dish-1.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">{{$data->nama_produk}}</a></h3>
		              					<p>{{ $data->detail_komposisi }}</p>
		              					<p class="price"><span>RP{{ $data->harga_produk }}/{{ $data->ukuran_kemasan }}</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		@endforeach
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
		                	@foreach($barang2 as $data)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/dish-1.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">{{$data->nama_produk}}</a></h3>
		              					<p>{{ $data->detail_komposisi }}</p>
		              					<p class="price"><span>RP{{ $data->harga_produk }}/{{ $data->ukuran_kemasan }}</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		@endforeach
		              	</div>
		              </div>

		             
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

    @include('komponen.footer')
    
  

  	@include('komponen.loader')


  <?php require_once('js/phpjs.php'); ?>
    
  </body>
</html>