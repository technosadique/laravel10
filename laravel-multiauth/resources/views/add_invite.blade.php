<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Invite</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>	
	<body>
	

	<div class="row mt-5 ml-5 mr-5">

		<div class="col-md-12">
				<!-- Navigation Header -->		
			<div class="card">
				<nav class="navbar navbar-expand-lg navbar-light bg-light m-2">
				<a class="navbar-brand font-weight-bold" href="#">Dashboard</a>
					<div class="ml-auto">
					<span class="mr-3">Role: {{ Auth::user()->role }}</span>
					<a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>
					</div>
				</nav>
			<div class="card-header">
                        <h4>
                            Invite New Team Member							
                        </h4>
                    </div>
				<div class="card-body">

					<form action="{{ 'store_invite' }}" method="post">
					 @csrf
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
						 @error('name')
						<span class="text-danger">
						{{ $message }}
						</span>
						@enderror
					</div>
					
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
						 @error('email')
						<span class="text-danger">
						{{ $message }}
						</span>
						@enderror
					</div>
					
					<div class="form-group">
						<label for="role">Role</label>
						<select class="form-control" id="role" name="role">
							<option value="">-- Select Role --</option>							
							@if(Auth::user()->role === 'superadmin')
								<option value="admin">Admin</option>
							@else
								<option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
								<option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
							@endif
						</select>
						@error('role')
						<span class="text-danger">
							{{ $message }}
						</span>
						@enderror
					</div>
			

					<button type="submit" class="btn btn-primary">Send Invitation</button>
					<a href="{{'dashboard'}}" class="btn btn-secondary">Cancel</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>
