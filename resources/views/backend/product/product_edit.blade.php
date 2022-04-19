@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
    <section class="content">

    
    <div class="box">
        <div class="box-header with-border">
        <h4 class="box-title">Add product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('product.update',$product->id)}}" >
                    @csrf
                    
                <div class="row">

                    <div class="col-12">		
                        
                        {{-- first row --}}
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Brand select<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" id="select" required class="form-control" aria-invalid="false">
                                            @foreach ($brands as $brand )
                                            <option value="{{ $brand->id }}" {{ ($brand->id==$product->brand_id)?'selected':' ' }}>{{ $brand->brand_name_en }}</option> 
                                            @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                        </div>
                                </div>
                                

                            </div> 
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Category select<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="select" required class="form-control" aria-invalid="false">
                                            @foreach ($categories as $category )
                                            <option value="{{ $category->id }}" {{ ($category->id==$product->category_id)?'selected':' ' }}>{{ $category->category_name_en }}</option> 
                                            @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                        </div>
                                </div>

                            </div> 
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>SubCategory select<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" id="select" required class="form-control" aria-invalid="false">
                                        @foreach ($subcats as $subcat )
                                        <option value="{{ $subcat->id }}"{{ ($subcat->id==$product->subcategory_id)?'selected':' ' }}>{{ $subcat->subcategory_name_en }}</option> 
                                        @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                        </div>
                                </div>


                            </div> 
                    </div>
                    {{-- end first row --}}

          {{-- second row --}}
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Select SubSubCategory<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subsubcategory_id" id="select" required class="form-control" aria-invalid="false">
                                        <option value="" selected disabled>Select SubSubCategory</option>
                                         @foreach ($subsubcats as $subsubcat )
                                        <option value="{{ $subsubcat->id }}" {{ ($subsubcat->id==$product->subsubcategory_id)?'selected':' ' }}>{{ $subsubcat->subsubcategory_name_en }}</option> 
                                        @endforeach 
                                    </select>
                                    <div class="help-block"></div>
                                    </div>
                            </div>
                            

                        </div> 


                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Product Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_en" class="form-control" value="{{ $product->product_name_en }}" required data-validation-required-message="This field is required"> </div>
                            </div>

                        </div> 


                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Product Name Srb<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_srb" class="form-control" value="{{ $product->product_name_srb }}" required data-validation-required-message="This field is required"> </div>
                            </div>


                        </div> 
                </div>
                {{-- end second row --}}

                {{-- third row --}}
                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group">
                            <h5>Product Code<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}"required data-validation-required-message="This field is required"> </div>
                        </div>
                        

                    </div> 


                    <div class="col-md-4">

                        <div class="form-group">
                            <h5>Product Quantity<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="product_qty" class="form-control"  value="{{ $product->product_qty }}"required data-validation-required-message="This field is required"> </div>
                        </div>

                    </div> 


                    <div class="col-md-4">

                        <div class="form-group">
                            <h5>Product Tags en ( use ' , ' to separate )<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="product_tags_en" class="form-control" value="{{ $product->product_tags_en }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                        </div>


                    </div> 
            </div>
            {{-- end third row --}}

            {{-- 4th row --}}
            <div class="row">
                <div class="col-md-4">

                    <div class="form-group">
                        <h5>Product Tags srb <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_tags_srb" class="form-control" value="{{ $product->product_tags_srb }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                    </div>

                </div> 


                <div class="col-md-4">

                    <div class="form-group">
                        <h5>Product Size en <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_size_en" class="form-control" value="{{ $product->product_size_en }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                    </div>

                </div>

                


                <div class="col-md-4">

                    <div class="form-group">
                        <h5>Product Size srb <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_size_srb" class="form-control" value="{{ $product->product_size_srb }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                    </div>

                </div>
        </div>
        {{-- end 4th row --}}

         {{-- 5th row --}}
         <div class="row">
            <div class="col-md-4">

                <div class="form-group">
                    <h5>Product color en <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_color_en" class="form-control" value="{{ $product->product_color_en }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                </div>

            </div> 


            <div class="col-md-4">

                <div class="form-group">
                    <h5>Product color srb <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_color_srb" class="form-control" value="{{ $product->product_color_srb }}" data-role="tagsinput" required data-validation-required-message="This field is required"> </div>
                </div>

            </div>

            


            <div class="col-md-4">

                <div class="form-group">
                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}" required data-validation-required-message="This field is required"> </div>
                </div>

            </div>
    </div>
    {{-- end 5th row --}}

        {{-- 6th row --}}
        <div class="row">
            <div class="col-md-4">

                {{-- <div class="form-group">
                    <h5>Product thumbnail picture <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" name="product_thumbnail" class="form-control" required onChange="mainThumbnailUrl(this)"> </div>
                        <img src="" id="mainThumbnail">
                </div> --}}
                

            </div> 


            <div class="col-md-4">

                {{-- <div class="form-group">
                    <h5>Product multiple images <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required> </div>
                        <div class="row" id="preview_img"></div>
                </div> --}}

                

            </div>

            


            <div class="col-md-4">

                <div class="form-group">
                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="discount_price" class="form-control" value="{{ (isset($product->discount_price))? $product->discount_price : ' ' }}"> </div>
                </div>

            </div>
        </div>
    {{-- end 6th row --}}
        {{-- 7th row --}}
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <h5>Product short description en <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="short_description_en" class="form-control" required >{!! $product->short_description_eng !!}</textarea>
                    </div>
                </div>
                

            </div> 


            <div class="col-md-6">

                <div class="form-group">
                    <h5>Product short description srb <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="short_description_srb" class="form-control" required >{!! $product->short_description_srb !!}</textarea>
                    </div>
                </div>

                

            </div>

        </div>
    {{-- end 7th row --}}

        {{-- 8th row --}}
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <h5>Product long description en <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="long_description_en" class="form-control" required >{!! $product->long_description_eng !!}</textarea>
                    </div>
                </div>
                

            </div> 


            <div class="col-md-6">

                <div class="form-group">
                    <h5>Product long description srb <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="long_description_srb" class="form-control" required >{!! $product->long_description_srb !!}</textarea>
                    </div>
                </div>

                

            </div>

        </div>
    {{-- end 8th row --}}
    {{-- 9th row --}}
    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                
                <div class="controls">
                    <fieldset>
                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ ($product->hot_deals==1)? 'checked':' ' }}>
                        <label for="checkbox_2">Hot deals</label>
                    </fieldset>
                    <fieldset>
                        <input type="checkbox" id="checkbox_3" name="featured" value="1"  {{ ($product->featured==1)? 'checked':' ' }}>
                        <label for="checkbox_3">Featured</label>
                    </fieldset>
                </div>
            </div>
            

        </div> 


        <div class="col-md-6">

            <div class="form-group">
                
                <div class="controls">
                    <fieldset>
                        <input type="checkbox" id="checkbox_4" name="special_deals" value="1" {{ ($product->special_deals==1)? 'checked':' ' }}>
                        <label for="checkbox_4">Special deals</label>
                    </fieldset>
                    <fieldset>
                        <input type="checkbox" id="checkbox_5" name="special_offer" value="1" {{ ($product->special_offer==1)? 'checked':' ' }}>
                        <label for="checkbox_5">Special offer</label>
                    </fieldset>
                </div>
            </div>

            

        </div>

    </div>
{{-- end 9th row --}}
                 
    </div>
</div>
                        
  
                    <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                    </div>
                </form>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->


    <section class="content">
        <div class="row">
   
   <div class="col-md-12">
                   <div class="box bt-3 border-info">
                     <div class="box-header">
            <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                     </div>
   
   
           <form method="" action="" enctype="multipart/form-data">
            @csrf
               <div class="row row-sm">
                   @foreach($multiimgs as $img)
                   <div class="col-md-3">
   
                        <div class="card mt-5">
                            <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                            <div class="card-body">
                            <h5 class="card-title">
                        <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                </h5>
                            <p class="card-text"> 
                                <div class="form-group">
                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="multi_img[ $img->id ]">
                                </div> 
                            </p>
                        
                            </div>
                        </div> 		
   
                   </div><!--  end col md 3		 -->	
                   @endforeach
   
               </div>			
   
               <div class="text-xs-right">
   <input type="submit" class="btn btn-rounded btn-primary mb-5 ml-5" value="Update Image">
            </div>
   <br><br>
   
   
   
           </form>		   
   
   
   
   
   
                   </div>
                 </div>
   
   
   
        </div> <!-- // end row  -->
   
    </section>












</div>





    <script type="text/javascript">
        $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });
    $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
    </script>

<script type="text/javascript">
	function mainThumbnailUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThumbnail').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>



@endsection