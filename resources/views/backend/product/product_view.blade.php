@extends('admin.admin_master')

@section('admin')


    <div class="container-full">
      
      

      <!-- Main content -->
      <section class="content">
        <div class="row">




          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Product list</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Image thumbnail</th>
                              <th>Product name en</th>
                              <th>Product name srb</th>
                              <th>Product price</th>
                              <th>Product discount price</th>
                              <th>Product code</th>
                              <th>Qty</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($products as $item)
                           <tr>
                                <td><img src="{{ asset($item->product_thumbnail) }}" style="width: 60px; height:50px;" alt=""> </td>
                                <td>{{ $item->product_name_en }}</td>
                                <td>{{ $item->product_name_srb }}</td>
                                <td>{{ $item->selling_price}}</td>
                                @if (isset($item->discount_price))
                                <td>{{ $item->discount_price }}</td>
                                @else
                                <td>Not on discount</td>
                                @endif
                                <td>{{ $item->product_code}}</td>
                                <td>{{ $item->product_qty}}</td>
                                <td class="">
                                    <a href="{{ route('edit.product',$item->id) }}" class="btn btn-info btn-md" title="edit data"><i class=" fa fa-pencil"></i></a>
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
          
        
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>


    
@endsection