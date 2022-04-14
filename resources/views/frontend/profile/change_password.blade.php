@extends('frontend.main_master')

@section('content')

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
                    <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong> update your password here!</h3>


                    <div class="card-body">
                        <form action="{{ route('user.password.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <br>
                            <div class="form-group">
                                <label class="info-title" for="password">Current password </label>
                                <input type="password" class="form-control unicase-form-control text-input" id="current_password" name="oldpassword" required>
                            </div>

                              <div class="form-group">
                                <label class="info-title" for="password">Password </label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Password confirmation </label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            
                            

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

@endsection