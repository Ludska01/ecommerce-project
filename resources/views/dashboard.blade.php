@extends('frontend.main_master')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
           @include('frontend.widgets.user_sidebar')
            <div class="col-md-2">

            </div><!--end col md2-->
            
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi.....</span><strong>{{ Auth::user()->name }}</strong> welcome to my ecommerce project!</h3>

                </div>

            </div><!--end col md2-->
        </div><!--endrow-->

    </div>

</div>
@endsection