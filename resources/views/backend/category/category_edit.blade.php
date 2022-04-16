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
                 <h3 class="box-title">Edit Category </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                        @csrf
                            
                        <div class="form-group">
                            <h5>Category Name en<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="category_name_en"  value="{{ $category->category_name_en }}"> </div>
                        </div>



                        <div class="form-group">
                            <h5>Category Name srb<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="category_name_srb"  value="{{ $category->category_name_srb }}"> </div>
                        </div>


                        <div class="form-group">
                            <h5>Category icon (uses <a href="https://fontawesome.com/v4/icons/" target="_blank">fa-icons</a>)<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="category_icon"  value="{{ $category->category_icon }}"> </div>
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