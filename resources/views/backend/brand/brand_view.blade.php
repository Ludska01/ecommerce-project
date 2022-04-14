@extends('admin.admin_master')

@section('admin')


    <div class="container-full">
      
      

      <!-- Main content -->
      <section class="content">
        <div class="row">




          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brand list</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand Name En</th>
                              <th>Brand Name srb</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($brands as $item)
                           <tr>
                                <td>{{ $item->brand_name_en }}</td>
                                <td>{{ $item->brand_name_srb }}</td>
                                <td><img src="{{ asset('$item->brand_image') }}" alt="No image" style="width: 70px; height:40px;"></td>
                                <td>
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                           </tr>
                          @endforeach
                      </tbody>
                     
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
            <!-- /.box -->          
          </div>
          <!-- /.col -->
          {{-- =========================================== add brand page ============================================================= --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brand </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <h5>Brand Name en<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="brand_name_en" required > </div>
                        </div>



                        <div class="form-group">
                            <h5>Brand Name srb<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="brand_name_srb" required > </div>
                        </div>
                            

                    

                        <div class="form-group">
                            <h5>Brand imgage<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control" > </div>
                        </div>

						<div class="text-xs-right mt-10">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add">
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