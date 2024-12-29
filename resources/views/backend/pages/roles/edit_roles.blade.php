@extends('admin.admin_dashboard');
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">       
        <div class="row profile-body">          
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
              <div class="card">
                <div class="card-body">
								<h6 class="card-title">Edit Roles</h6>
								<form method="POST" action="{{url('update/roles')}}/{{$roles->id}}" class="forms-sample">
                                    @csrf
									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Role Name</label>
										<input type="text" class="form-control" name="roleName" id="roleName" value="{{$roles->name}}" autocomplete="off">
                       
									</div>	
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
									<a href="{{ route('all.roles') }}" class="btn btn-secondary">Cancel</a>
								</form>
              </div>
              </div>
            </div>
          </div>
          <!-- middle wrapper end -->         
        </div>
</div>


@endsection