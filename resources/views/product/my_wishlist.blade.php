@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
	<style type="text/css">
		.active-color {
			border: 3px solid #000 !important;
		}
	</style>
@endsection

@section('content')

<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container-fluid">
                    
						<h1 class="page-title">My Wishlist</h1>
                    
        		</div>
        	</div>
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">My Wishlist</a></li>
                    </ol>
                </div>
            </nav>

            <div class="page-content">
                <div class="container-fluid">
                	<div class="row">
                		<div class="col-lg-12">
                			<div class="toolbox">
                				<div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <span>{{ $getProduct->count() }} of {{ $getProduct->total() }}</span> Products
                                </div>
                				</div>
							<div id="getProductAjax" >
                                @include('product._list')
							</div>
                		</div>
                        {!! $getProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                	</div>
                    </div>
                </div>
            </div>
</main><!-- End .main -->

@endsection        
    

@section('script')
	
@endsection