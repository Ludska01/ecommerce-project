@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin password change</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('update.change.password') }}" >
                        @csrf
					  <div class="row">
						<div class="col-12">

							<div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                            <h5>Current password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="oldpassword" class="form-control" id="current_password" required > </div>
                                        </div>



                                        <div class="form-group">
                                            <h5>New password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control" id="password" required > </div>
                                        </div>
                                        

                                

                                    <div class="form-group">
                                        <h5>Repeat new password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required > </div>
                                    </div>

                                </div>
                            </div>

                        
                                    
                                
                            
                        



                            </div>



						<div class="text-xs-right mt-10">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
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
