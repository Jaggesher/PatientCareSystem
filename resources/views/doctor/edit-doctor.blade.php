@extends('main')

{{-- Including  required CSS/JS/Other --}}

@section('title')
   Update Doctor
@endsection

@section('OuterInclude')
    <link href="{{ asset('css/edit_doctor.css') }}" rel="stylesheet">
    <script src="{{ asset('js/edit_doctor.js') }}"></script>
@endsection


@section('ContentOfBody')
	<div class="container">
		<div class=" col-sm-12 pro_head">
			<h2>Edit Doctor</h2>
		</div>


		 <div class="col-sm-4 pro_image" align="center">
        <h4>Current Profile Picture.</h4>
        <img  id="ProPicUp" src="{{ asset("image/RakulPreet.jpg") }}" class="img-thumbnail clearfix" alt="Profile Pic" width="200" height="200">
        <form action="{{-- {{route('savePicture')}} --}}" method="post" enctype="multipart/form-data">
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload" class="file" accept="image/jpg, image/jpeg, image/png" required>
            </div>

            <div class="input-group" style="width:220px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                <input id="displayFileName" type="text" class="form-control" value="" readonly placeholder="Upload Image">
                <span class="input-group-btn">
                    <button class="browse btn btn-primary" type="button"><i class="glyphicon glyphicon-folder-open"></i></button>
                </span>
            </div>

          <button id="SavePropic" class="btn btn-primary " type="submit" style="width:220px;"><i class="glyphicon glyphicon-ok-sign"></i> Set as Profile</button>
        </form>
       
          {{-- @if ($errors->has('fileToUpload'))
            <div class="alert alert-danger">
              <span class="help-block">
                  <strong>{{ $errors->first('fileToUpload') }}</strong>
              </span>
            </div>
          @endif
          @if (Session::has('wrong'))
            <div class="alert alert-danger">
              <span class="wrong">
                <strong> {{ Session::get('wrong') }}</strong>
              </span>
            </div>
          @endif --}}
        
    </div>

    <div class="col-sm-8 pro_info">
     {{--  @if(count($errors) > 0 || Session::has('no_match')) --}}
        <div id="errMsg">
            <button id="fail" type="button" class="pull-right alert-danger"><span class="glyphicon glyphicon-remove alert-danger"> </span></button>
            <p style="margin-bottom: 3px; text-align: center;" class="alert alert-danger fail"><strong>FAIL</strong>, Please fill information correctly.</p>
        </div>
     {{--  @endif  --}}
        	<h3 style="margin-bottom: 3px;">Update Your Doctor's info </h3> 

            <br>
            <form class="form-horizontal" role="form" method="post" action="{{-- {{route('editProfile.submit')}} --}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              	<div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="name" placeholder="Doctor's Name" value="" maxlength="49" required >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Short Message:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="sort_msg" placeholder="Sort Message" value="" maxlength="149" required >
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-lg-3 control-label">Category:</label>
                    <div class="col-lg-8">
	                    <select class="form-control" name="category">
						    <option value="A">A</option>
						    <option value="A">B</option>
						    <option value="A">C</option>
						    <option value="A">D</option>
						</select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">description:</label>
                    <div class="col-lg-8">
                      <textarea class="form-control" rows="8" placeholder="About Doctor." name="description" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Money:</label>
                    <div class="col-lg-8">
                      <input class="form-control"  type="number" name="Money" placeholder="enter amount"   min="0" max="5000" required >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Office Room No:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="Office" placeholder="Room No." value="" maxlength="10" required >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Office Time:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="time" name="duty_time" placeholder="Room No." value="" maxlength="10" required >
                    </div>
                </div>

              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <input type="submit" class="btn btn-primary" value="Update Doctor">
                  <span></span>
                  {{-- <input type="reset" class="btn btn-default" value="Cancel"> --}}
                </div>
              </div>
            </form>
            <br>
            <br>
            <br>
    	</div>
	</div>
@endsection 