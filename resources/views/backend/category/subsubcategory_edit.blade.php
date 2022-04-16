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
                 <h3 class="box-title">Edit SubSubCategory </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{ route('subsubcategory.update',$subsubcategory->id) }}" >
                        @csrf
                            
                        <div class="form-group">
                            <h5>SubSubCategory Name en<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="subsubcategory_name_en"  value="{{ $subsubcategory->subsubcategory_name_en }}"> </div>
                        </div>



                        <div class="form-group">
                            <h5>SubSubCategory Name srb<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="subsubcategory_name_srb"  value="{{ $subsubcategory->subsubcategory_name_srb }}"> </div>
                        </div>


                        <div class="form-group">
                            <h5>SubCategory select<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subcategory_id" id="select" required class="form-control" aria-invalid="false">
                                    
                                    @foreach ($subcategories as $subcategory )
                                    <option value="{{ $subcategory->id }}" {{ ($subcategory->id == $subsubcategory->subcategory_id) ? 'selected':''}}>{{ $subcategory->subcategory_name_en }}</option> 
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                                </div>
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