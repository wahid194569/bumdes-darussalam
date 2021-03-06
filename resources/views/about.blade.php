<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php require_once('css/phpcss.php'); ?>

  </head>
  <body>
  	
  	@include('komponen.headerabout')

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(https://images.unsplash.com/photo-1515694590185-73647ba02c10?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">About Us</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="..">Home</a></span> <span>About</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-about d-md-flex" id="about">
    	<div class="one-half img" style="background-image: url(https://images.unsplash.com/photo-1561113825-49e39f7e1f8f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80);"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
	        <div class="heading-section ftco-animate ">
	        	<span class="subheading">Discover</span>
	          <h2 class="mb-4">Our Story</h2>
	        </div>
	        <div>
	  				<p>Kopi seputaran perkebunan dan hutan Lombok Utara. Racikan dengan menggunakan pola fermentasi dan olahan tradisonal untuk keseimbangan varian rasa ada original, coklat, rempah dan khas kopi jantan untuk laki-laki.<br>
						ROASTING<br>
						Kopi rimba Rinjani di roasting ke tingkat medium untuk mempertahankan karakter rasa asli kopi dan dipanggang hingga dark.
						Dan disangrai secara manual untuk mempertahankan rasa tadisional. <br>

						PROFIL RASA<br>
						Kehasan Lombok disamping pedas adalah kopi robustanya memiliki rasa dan aroma kopi yang sangat kuat, sangat cocok disajikan sebagai minuman kopi para penikmat, torisem, parlete dan keluarga.<br>
						karena rasa kopinya khas, dan karakter rasanya dominan dan juga tingkat keasamannya sangat rendah, sehingga sangat nikmat rasanya, apalagi dipadu sensasi original, coklat, jahe, rempah, madu dan sensasi primitiv dengan campur beras.<br>
						Kopi Arabica di dataran tinggi gunung Rinjani pun menambah kehasan dan sangat monumental dengan tingkat fermentasi delapan jam sampai tigapuluh enam jam. </p>
	  			</div>
  			</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="100">0</strong>
		              	<span>Coffee Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="85">0</strong>
		              	<span>Number of Awards</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="10567">0</strong>
		              	<span>Happy Customer</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="900">0</strong>
		              	<span>Staff</span>
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