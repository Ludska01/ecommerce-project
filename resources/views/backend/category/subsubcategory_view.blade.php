@extends('admin.admin_master')

@section('admin')


    <div class="container-full">
      
      

      <!-- Main content -->
      <section class="content">
        <div class="row">




          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">SubCategory list</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th> Category</th>
                              <th> SubCategory</th>
                              <th> SubCategory name en</th>
                              <th> SubCategory name srb</th>
                              <th> Action </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($subsubcategory as $item)
                           <tr>
                                <td> {{ $item->subcategory->category->category_name_en }} </td>
                                <td> {{ $item->subcategory->subcategory_name_en }} </td>
                                <td>{{ $item->subsubcategory_name_en }}</td>
                                <td>{{ $item->subsubcategory_name_srb }}</td>
                                <td class="">
                                    <a href="{{ route('edit.subsubcategory',$item->id) }}" class="btn btn-info btn-md" title="edit data"><i class=" fa fa-pencil"></i></a>
                                    <a href="{{ route('delete.subsubcategory',$item->id) }}" class="btn btn-danger btn-md" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
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
                 <h3 class="box-title">Add SubSubCategory </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{ route('subsubcategory.store') }}" >
                        @csrf
        
                        <div class="form-group">
                            <h5>SubSubCategory Name en<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="subsubcategory_name_en" required > </div>
                        </div>



                        <div class="form-group">
                            <h5>SubSubCategory Name srb<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  class="form-control" name="subsubcategory_name_srb" required > </div>
                        </div>
                            

                        <div class="form-group">
                            <h5>SubCategory select<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subcategory_id" id="select" required class="form-control" aria-invalid="false">
                                    <option value="" selected disabled>Select SubCategory</option>
                                    @foreach ($subcategories as $subcategory )
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name_en }}</option> 
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                                </div>
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