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
        		<div class="container">
                    @if(!empty($getSubCategory))
                        <h1 class="page-title">{{ $getSubCategory->name }}</h1>
                    @else
                        <h1 class="page-title">{{ $getCategory->name }}</h1>
                    @endif
        			
        		</div>
        	</div>
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        @if(!empty($getSubCategory))
                            <li class="breadcrumb-item " aria-current="page"><a href="{{ url($getCategory->slug) }}">{{ $getCategory->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $getSubCategory->name }}</li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $getCategory->name }}</li>
                        @endif
                        
                    </ol>
                </div>
            </nav>

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                			<div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                						Showing <span>9 of 56</span> Products
                					</div>
                				</div>

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select name="sortby" id="sortby" class="form-control ChangeSortby">
												<option value="">Select</option>
												<option value="popularity">Most Popular</option>
												<option value="rating">Most Rated</option>
												<option value="date">Date</option>
											</select>
										</div>
                					</div>
                					
                				</div>
                			</div>
                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                
                                    @foreach($getProduct as $value)
                                    @php
                                        $getProductImage = $value->getImageSingle($value->id);
                                    @endphp
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="{{ url($value->slug) }}">
                                                    @if(!empty($getProductImage) && !empty($getProductImage->get_image()))
                                                    <img style="height: 280px; width: 100%; object-fit:cover;" src="{{ $getProductImage->get_image() }}" alt="{{ $value->title }}" class="product-image">
                                                    @endif
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{ url($value->slug) }}">{{ $value->title }}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ${{ number_format($value->price, 2) }}
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container -->

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->
                                    @endforeach
                                

                                </div><!-- End .row -->
                            </div><!-- End .products -->

                            

                			<nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {{-- Previous Page Link --}}
                                    @if ($getProduct->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                                            <span class="page-link page-link-prev" aria-hidden="true">
                                                <i class="icon-long-arrow-left"></i> Prev
                                            </span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link page-link-prev" href="{{ $getProduct->previousPageUrl() }}" rel="prev" aria-label="Previous">
                                                <i class="icon-long-arrow-left"></i> Prev
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    {!! $getProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                                    {{-- Next Page Link --}}
                                    @if ($getProduct->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link page-link-next" href="{{ $getProduct->nextPageUrl() }}" rel="next" aria-label="Next">
                                                Next <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                                            <span class="page-link page-link-next" aria-hidden="true">
                                                Next <i class="icon-long-arrow-right"></i>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>

                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">

						<form id="FilterForm" method="post" action="" style="padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9; max-width: 400px; margin: auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
							<input type="text" name="sub_category_id" id="get_sub_category_id" placeholder="Sub Category ID" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
							<input type="text" name="brand_id" id="get_brand_id" placeholder="Brand ID" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
							<input type="text" name="color_id" id="get_color_id" placeholder="Color ID" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
							<input type="text" name="sortby_id" id="get_sortby_id" placeholder="Sort by ID" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
						</form>



                			<div class="sidebar sidebar-shop">
                				<div class="widget widget-clean">
                					<label>Filters:</label>
                					<a href="#" class="sidebar-filter-clear">Clean All</a>
                				</div><!-- End .widget widget-clean -->

                				<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
									        Category
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-1">
										<div class="widget-body">
											<div class="filter-items filter-items-count">
												@foreach($getSubCategoryFilter as $f_category)
												<div class="filter-item">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input ChangeCategory" value="{{ $f_category->id }}" id="cat-{{ $f_category->id }}">
														<label class="custom-control-label" for="cat-{{ $f_category->id }}">{{ $f_category->name }}</label>
													</div>
													<span class="item-count">{{ $f_category->totalProduct() }}</span>
												</div>
												@endforeach

												
											</div>
										</div>
									</div>
        						</div>


        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
									        Colour
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-3">
										<div class="widget-body">
											<div class="filter-colors">
												@foreach($getColor as $f_color)
												<a href="javascript:;" id="{{ $f_color->id }}" class="ChangeColor" style="background: {{ $f_color->code }};"><span class="sr-only">{{ $f_color->name }}</span></a>
												@endforeach
											</div>
										</div>
									</div>
        						</div>

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
									        Brand
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-4">
										<div class="widget-body">
											<div class="filter-items">
											@foreach($getBrand as $f_brand)
												<div class="filter-item">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input ChangeBrand" data-val= "0" value="{{ $f_brand->id }}" id="brand-{{ $f_brand->id }}">
														<label class="custom-control-label" for="brand-{{ $f_brand->id }}">{{ $f_brand->name }}</label>
													</div>
												</div>
											@endforeach


											</div>
										</div>
									</div>
        						</div>

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
									        Price
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-5">
										<div class="widget-body">
                                            <div class="filter-price">
                                                <div class="filter-price-text">
                                                    Price Range:
                                                    <span id="filter-price-range"></span>
                                                </div><!-- End .filter-price-text -->

                                                <div id="price-slider"></div><!-- End #price-slider -->
                                            </div><!-- End .filter-price -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection        
    

@section('script')
	<script src="{{ url('assets/js/wNumb.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>
	<script src="{{ url('assets/js/nouislider.min.js') }}"></script>

	<script type="text/javascript">

		$('.ChangeSortby').change(function() {
			var id = $(this).val();
			$('#get_sortby_id').val(id);  // Set the value of the input field with the selected IDs
		});

		$('.ChangeCategory').change(function() {
			var ids = "";  // Initialize the variable to store the selected IDs

			$('.ChangeCategory').each(function() {
				if(this.checked) {
					var id = $(this).val();
					ids += id + ',';  // Append the id to the ids string
				}
			});

			$('#get_sub_category_id').val(ids);  // Set the value of the input field with the selected IDs
		});

		$('.ChangeBrand').change(function() {
			var ids = "";  // Initialize the variable to store the selected IDs

			$('.ChangeBrand').each(function() {
				if(this.checked) {
					var id = $(this).val();
					ids += id + ',';  // Append the id to the ids string
				}
			});

			$('#get_brand_id').val(ids);  // Set the value of the input field with the selected IDs
		});

		$('.ChangeColor').click(function() {
			var id = $(this).attr('id');
			var status = $(this).attr('data-val');

			if(status == 0)
			{
				$(this).attr('data-val', 1);
				$(this).addClass('active-color');
			}

			else
			{
				$(this).attr('data-val', 0);
				$(this).removeClass('active-color');
			}

			var ids = '';
			$('.ChangeColor').each(function() {
				var status = $(this).attr('data-val');
				if(status == 1) {
					var id = $(this).attr('id');
					ids += id + ',';  // Append the id to the ids string
				}
			});

			$('#get_color_id').val(ids);
		});
</script>

@endsection