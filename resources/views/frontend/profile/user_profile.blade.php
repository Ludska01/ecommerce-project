@extends('frontend.main_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br>
                <img class='card-img-top' style="border-radius: 50%" height="100%" width="100%"src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload\admin_images\No-Image-Placeholder.svg.png')}}">
                <br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Dashboard</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div><!--end col md2-->
            <div class="col-md-2">

            </div><!--end col md2-->
            
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong> update your profile here!</h3>


                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <br>
                            <div class="form-group">
                                <label class="info-title" for="email">Email Address</label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" value="{{ $user->email }}">
                              </div>
                            
                            <div class="form-group">
                                <label class="info-title" for="name">Name</label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" value="{{ $user->name }}">
                            </div>
                            
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone Number </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone" value="{{ $user->phone }}">
                            </div>
                            
                            <div class="form-group">
                                <h5>Profile image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="profile_photo_path" class="form-control" id="image"> 
                                </div>
                            </div>

                            <img id="showImage"style="width:100px; height:100px;"  src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload\admin_images\No-Image-Placeholder.svg.png')}}" alt="User Avatar">
                            <br><br>
                            <div class="form-button">

                                <button type="submit" class="btn btn-danger">Update</button>

                            </div>
                            <br><br>

                        </form>


                    </div>

                </div>

            </div><!--end col md2-->
        </div><!--endrow-->

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();

            reader.onload = function (e){
                $('#showImage').attr('src',e.target.result);
            };
            reader.readAsDataURL(e.target.files['0']);
        });

    });



</script>
@endsection