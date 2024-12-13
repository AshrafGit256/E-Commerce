@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">

          @include('admin.layouts._message')

            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product's Title</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Title <span style="color: red;">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $product->title) }}" class="form-control" placeholder="Enter Products Title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SKU<span style="color: red;">*</span></label>
                            <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="form-control" placeholder="SKU">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category<span style="color: red;">*</span></label>
                            <select class="form-control" required id="ChangeCategory" name="category_id">
                                <option value="">Select</option>
                                @foreach($getCategory as $category)
                                    <option value="{{ $category->id }}"
                                            {{ ($product->category_id == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach 
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub-Category<span style="color: red;">*</span></label>
                            <select class="form-control" required id="getSubCategory" name="sub_category_id">
                                <option value="">Select</option>
                                @foreach($getSubCategory as $subCategory)
                                    <option value="{{ $subCategory->id }}"
                                            {{ ($product->sub_category_id == $subCategory->id) ? 'selected' : '' }}>
                                        {{ $subCategory->name }}
                                    </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand<span style="color: red;">*</span></label>
                            <select class="form-control" name="brand_id">
                                <option value="">Select</option>
                                @foreach($getBrand as $brand)
                                    <option value="{{ $brand->id }}"
                                            {{ ($product->brand_id == $brand->id) ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Trendy Products<span style="color: red;"></span></label>
                        
                            <div>
                                <label><input {{ !empty($product->is_trendy) ? 'checked' : '' }} type="checkbox" name="is_trendy"></label>
                            </div>

                    </div>
                
                </div>
                </div>

                <!-- <hr style="border: 1px dotted blue;"> -->

                <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Color<span style="color: red;">*</span></label>

                        @foreach($getColor as $color)
                            @php
                                $checked = '';
                            @endphp

                            @foreach($product->getColor as $pcolor)
                                @if($pcolor->color_id  == $color->id)
                                    @php
                                        $checked = 'checked';
                                    @endphp
                                @endif
                            @endforeach
                            <option value="{{$color->id}}">{{$color->color}}</option>
                            <div>
                                <label><input {{ $checked }} type="checkbox" name="color_id[]" placeholder="Color" value="{{ $color->id }}">{{ $color->name }}</label>
                            </div>
                        @endforeach 

                    </div>
                </div>
                </div>

                <hr>

                    <!-- <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label>Old Price ($)<span style="color: red;">*</span></label>
                            <input type="text" name="old_price" class="form-control" placeholder="Old Price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>New Price ($)<span style="color: red;">*</span></label>
                            <input type="text" name="price" class="form-control" placeholder="New Price">
                        </div>
                    </div>
                </div>     -->

                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Price<span style="color: red">*</span></label>
                        <div>
                        <table class="table table-striped table-bordered">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>Old Price</th>
                                    <th>New Price</th>
                                </tr>
                            </thead>

                            <tbody >
                            <tr>
                                <td>
                                    <input type="text" name="old_price"  value="{{ !empty($product->old_price) ? $product->old_price : '' }}" class="form-control" placeholder="Old Price">
                                </td>
                                <td>
                                    <input type="text" name="price" required value="{{ !empty($product->price) ? $product->price : '' }}" class="form-control" placeholder="New Price">
                                </td>
                                
                            </tr>
                        </tbody>
                        </table>
                        
                        </div>
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Size<span style="color: red">*</span></label>
                        <div>
                        <table class="table table-striped table-bordered">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>Name</th>
                                    <th>Price($)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="AppendSize">
                            
                            

                            <tr>
                                <td>
                                    <input type="text" placeholder="Name" class="form-control" name="size[100][name]">
                                </td>
                                <td>
                                    <input type="text" placeholder="Price" class="form-control" name="size[100][price]">
                                </td>
                                <td width="130px">

                                <button type="button" class="btn btn-success AddSize">
                                    <i class="fas fa-plus-circle"></i> Add
                                </button>

                                </td>
                            </tr>

                            @foreach($product->getSize as $size)
                            <tr>
                                <td>
                                    <input type="text" placeholder="Name" class="form-control" name="size[{{ $size->id }}][name]" value="{{ $size->name }}">
                                </td>
                                <td>
                                    <input type="text" placeholder="Price" class="form-control" name="size[{{ $size->id }}][price]" value="{{ $size->price }}">
                                </td>
                                <td width="100px">
                                <button type="button" id="" class="btn btn-outline-danger DeleteSize">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        </table>
                        
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Image<span style="color: red;"></span></label>
                        <input type="file" name="image[]" class="form-control" style="padding: 4px;" multiple accept="image/*">
                    </div>
                </div>
            </div>

            @if(!empty($product->getImage->count()))
                <div class="row" id="sortable">
                    @foreach($product->getImage as $image)
                      @if(!empty($image->get_image()))
                        <div class="col-md-1 sortable_image" id="{{ url( $image->id ) }}" style="text-align: center;">

                        <img style="
                            width: 100px; 
                            height: 100px; 
                            border-radius: 50%; 
                            box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.4), 0px 10px 10px rgba(0, 0, 0, 0.4); 
                            transition: transform 0.8s ease; 
                            cursor: grab; 
                            object-fit: cover;" 
                            src="{{ $image->get_image() }}" 
                            alt="Image">

                            <a href="{{ url('admin/product/image_delete/'.$image->id) }}" style="margin-top:10px;" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                        </div>
                      @endif  
                    @endforeach
                </div>
            @endif

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Short Description<span style="color: red;">*</span></label>
                        <textarea name="short_description" class="form-control" placeholder="Short Description">{{ $product->short_description}}</textarea>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description<span style="color: red;">*</span></label>
                        <textarea name="description" class="form-control editor" placeholder="Description">{{ $product->description}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Additional Information<span style="color: red;">*</span></label>
                        <textarea name="additional_information" class="form-control editor" placeholder="Additional Information">{{ $product->additional_information}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Shipping Returns<span style="color: red;">*</span></label>
                        <textarea name="shipping_returns" class="form-control editor" placeholder="Short shipping_returns">{{ $product->shipping_returns}}</textarea>
                    </div>
                </div>
            </div>
        
            <div class="row">
             <div class="col-md-12">
                <div class="form-group">
                    <label>Status<span style="color: red;">*</span></label>
                    <select class="form-control"  name="status" value="{{ old('status') }}">
                        <option {{ ($product->status == 0) ? 'selected'  : '' }} value="0">Active</option>
                        <option {{ ($product->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                </div>
             </div>
            </div> 
                

            </div>

            <hr>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i>   Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

  </div>
@endsection

@section('script')

<script src="{{ url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ url('sortable/jquery-ui.js')}}"></script>

<script type="text/javascript">

        $(document).ready(function() {
            $( "#sortable" ).sortable({
                update : function(event, ui)
                {
                    var photo_id = new Array();
                    $('.sortable_image').each(function()
                    {
                        var id = $(this).attr('id');
                        photo_id.push(id);
                    });
                    
                    $.ajax({
                        type: "POST", 
                        url: "{{ url('admin/product_image_sortable') }}",
                        data: {
                            "photo_id": photo_id, // Fixed the syntax here
                            "_token": "{{ csrf_token() }}"
                        }, 
                        dataType: "json",
                        success: function(data) {
                            // Handle the success response here
                        },
                        error: function(xhr, status, error) {
                            // Handle the error response here
                        }
                    });

                }
            });
        } );

        $('.editor').summernote({
            height: 200
        });

        $(document).ready(function(){
        var i = 101;
        
        // Delegate the click event to the 'AddSize' button
        $('body').delegate('.AddSize', 'click', function(){
            var html = `
                <tr id="DeleteSize${i}">
                    <td>
                        <input type="text" name="size[${i}][name]" placeholder="Name" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="size[${i}][price]" placeholder="Price" class="form-control">
                    </td>
                    <td>
                        <button type="button" id="${i}" class="btn btn-outline-danger DeleteSize">Delete</button>
                    </td>
                </tr>`;
            
        $('#AppendSize').append(html);
            i++; // Increment the counter to ensure unique IDs
        });
        
        // Delegate the click event to dynamically remove the row
        $('body').delegate('.DeleteSize', 'click', function(){
            $(this).closest('tr').remove();
        });



        // Delegate the click event to dynamically remove the row
        $('body').delegate('.DeleteSize', 'click', function(){
            $(this).closest('tr').remove();
        });

       
        $(document).delegate('#ChangeCategory', 'change', function(e){
            var id = $(this).val();

            $.ajax({
                type: "POST", 
                url: "{{ url('admin/get_sub_category') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                }, 
                dataType: "json",
                success: function(data) {
                    $('#getSubCategory').html(data.html);
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log the error
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
@endsection
