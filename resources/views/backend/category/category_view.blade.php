@extends('admin.admin_master')

@section('admin')


    <div class="container-full">
      
      

      <!-- Main content -->
      <section class="content">
        <div class="row">




          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Category list</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category icon</th>
                              <th>Category name en</th>
                              <th>Category name srb</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($category as $item)
                           <tr>
                                <td> <span> <i class=" fa {{ $item->category_icon }} fa-2x"></i></span> </td>
                                <td>{{ $item->category_name_en }}</td>
                                <td>{{ $item->category_name_srb }}</td>
                                <td class="">
                                    <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info btn-md" title="edit data"><i class=" fa fa-pencil"></i></a>
                                    <a href="{{ route('delete.category',$item->id) }}" class="btn btn-danger btn-md" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
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
          {{-- =========================================== add category page ============================================================= --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Category </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{ route('category.store') }}" >
                        @csrf
        
                        <div class="form-group">
                            <h5>Category Name en<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="category_name_en" required > </div>
                        </div>



                        <div class="form-group">
                            <h5>Category Name srb<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="category_name_srb" required > </div>
                        </div>
                            

                        <div class="form-group">
                            <h5>Category icon (uses <a href="https://fontawesome.com/v4/icons/" target="_blank">fa-icons</a>)<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="category_icon" required> </div>
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