@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            

            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black">
                  <h3 class="widget-user-username">Admin name :{{ $adminData->name }} </h3>
                  <a href="{{ url('admin/profile/edit') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Edit profile</a>
                  <h6 class="widget-user-desc">Admin email: {{ $adminData->email }}</h6>
                </div>
                <div class="widget-user-image">
                  <img class="rounded-circle"  src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload\admin_images\No-Image-Placeholder.svg.png')}}" alt="User Avatar">
                </div>
                <div class="box-footer">
               
                  <!-- /.row -->
                </div>
              </div>




        </div>
    </section>
    <!-- /.content -->
  </div>

  @endsection