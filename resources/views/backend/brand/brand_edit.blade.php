@extends('admin.admin_master')

@section('admin')


    <div class="container-full">
      
      

      <!-- Main content -->
      <section class="content">
        <div class="row">

          {{-- =========================================== add brand page ============================================================= --}}
          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Brand </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                        <div class="form-group">
                            <h5>Brand Name en<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="brand_name_en"  value="{{ $brand->brand_name_en }}"> </div>
                        </div>



                        <div class="form-group">
                            <h5>Brand Name srb<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="brand_name_srb"  value="{{ $brand->brand_name_srb }}"> </div>
                        </div>
                            

                    

                        <div class="form-group">
                            <h5>Brand image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control"  > </div>
                        </div>

						<div class="text-xs-right mt-10">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
						</div>
					</form>
                   
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
 
             
             <!-- /.box -->          
           </div><!--end col-->
          
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>


    
@endsection