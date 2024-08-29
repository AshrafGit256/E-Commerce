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