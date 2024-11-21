@extends('layouts.app')

@section('content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $getPage->title }}</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container-fluid">
	        	<div class="page-header page-header-big text-center" style="background-image: url('{{ $getPage->getImage() }}')">
                <h1 class="page-title text-white">
                    <i class="fas fa-envelope"></i> {{ $getPage->title }}
                    <!-- <span class="text-white"> Keep in Touch with Us</span> -->
                </h1>

	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container-fluid">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
						{!! $getPage->description !!}
						<br>
						
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<!-- <h3>The Office</h3> -->

                						<ul class="contact-list">
											@if(!empty($getSystemSetting->address))
                							<li>
                								<i class="icon-map-marker"></i>
	                							{{ $getSystemSetting-> address}}
	                						</li>
											@endif

											@if(!empty($getSystemSetting->phone))
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:{{ $getSystemSetting->phone }}">{{ $getSystemSetting->phone }}</a>
                							</li>
											@endif

											@if(!empty($getSystemSetting->phone_two))
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:{{ $getSystemSetting->phone_two }}">{{ $getSystemSetting->phone_two }}</a>
                							</li>
											@endif

											@if(!empty($getSystemSetting->email))
                							<li>
											    <i class="icon-envelope"></i>
                								<a href="mailto:{{ $getSystemSetting->email }}">{{ $getSystemSetting->email }}</a>
                							</li>
											@endif

											@if(!empty($getSystemSetting->email_two))
                							<li>
											    <i class="icon-envelope"></i>
                								<a href="mailto:{{ $getSystemSetting->email_two }}">{{ $getSystemSetting->email_two }}</a>
                							</li>
											@endif
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				<div class="col-sm-5">
                					<div class="contact-info">
                						<!-- <h3>The Office</h3> -->

                						<ul class="contact-list">
										    @if(!empty($getSystemSetting->working_hours))
                							<li>
                								<i class="icon-clock-o"></i>
	                							{{ $getSystemSetting->working_hours }}
	                						</li>
											@endif
                						</ul>
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-5 -->
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                			<p class="mb-2">Use the form below to get in touch with the sales team</p>
							@include('layouts._message')
                			<form action="" class="contact-form mb-3 mt-4" autocomplete="off" method="post">
								{{ csrf_field() }}
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" class="form-control" id="cname" name="name" placeholder="Name *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                						<input type="email" class="form-control" id="cemail" name="email" placeholder="Email *" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input type="tel" class="form-control" id="cphone" name="phone" placeholder="Phone">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Subject</label>
                						<input type="text" class="form-control" id="csubject" name="subject" placeholder="Subject" required>
                					</div><!-- End .col-sm-6 -->
									
                				</div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" cols="30" rows="4" id="cmessage" name="message" required placeholder="Message *"></textarea>

								<div class="row">
									<div class="col-sm-12">
										<label for="verification">{{ $first_number }} + {{ $second_number }} = ?</label>
										<input type="text" class="form-control" id="verification" name="verification" placeholder="Verification Sum">
									</div><!-- End .col-sm-6 -->
								</div>

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>SUBMIT</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                	<hr class="mt-4 mb-5">

                	<div class="stores mb-4 mb-lg-5">
	                	<h2 class="title text-center mb-3">Our Stores</h2>

	                	<div class="row">
	                		<div class="col-lg-6">
	                			<div class="store">
	                				<div class="row">
	                					<div class="col-sm-5 col-xl-6">
	                						<figure class="store-media mb-2 mb-lg-0">
	                							<img src="assets/images/stores/img-1.jpg" alt="image">
	                						</figure>
	                					</div>
	                					<div class="col-sm-7 col-xl-6">
	                						<div class="store-content">
	                							<h3 class="store-title">Wall Street Plaza</h3>
	                							<address>88 Pine St, New York, NY 10005, USA</address>
	                							<div><a href="tel:#">+1 987-876-6543</a></div>

	                							<h4 class="store-subtitle">Store Hours:</h4>
                								<div>Monday - Saturday 11am to 7pm</div>
                								<div>Sunday 11am to 6pm</div>

                								<a href="#" class="btn btn-link" target="_blank"><span>View Map</span><i class="icon-long-arrow-right"></i></a>
	                						</div>
	                					</div>
	                				</div>
	                			</div>
	                		</div>

	                		<div class="col-lg-6">
	                			<div class="store">
	                				<div class="row">
	                					<div class="col-sm-5 col-xl-6">
	                						<figure class="store-media mb-2 mb-lg-0">
	                							<img src="assets/images/stores/img-2.jpg" alt="image">
	                						</figure>
	                					</div>

	                					<div class="col-sm-7 col-xl-6">
	                						<div class="store-content">
	                							<h3 class="store-title">One New York Plaza</h3>
	                							<address>88 Pine St, New York, NY 10005, USA</address>
	                							<div><a href="tel:#">+1 987-876-6543</a></div>

	                							<h4 class="store-subtitle">Store Hours:</h4>
												<div>Monday - Friday 9am to 8pm</div>
												<div>Saturday - 9am to 2pm</div>
												<div>Sunday - Closed</div>

                								<a href="#" class="btn btn-link" target="_blank"><span>View Map</span><i class="icon-long-arrow-right"></i></a>
	                						</div>
	                					</div>
	                				</div>
	                			</div>
	                		</div>
	                	</div>
                	</div>
                </div>
            	<!-- <div id="map"></div> -->
            </div>
        </main>
@endsection        
    