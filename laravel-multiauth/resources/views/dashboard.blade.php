
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Add this in your <head> -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>Listing</title>
	</head>
       <body>
	<div class="row mt-5 ml-5 mr-5">

		<div class="col-md-12">
		
			<div class="card">
			<nav class="navbar navbar-expand-lg navbar-light bg-light m-2">
				<a class="navbar-brand font-weight-bold" href="#">Dashboard</a>
					<div class="ml-auto">
					<span class="mr-3">Role: {{ Auth::user()->role }}</span>
					<a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>
					</div>
				</nav>
				<div class="card-header ">
                        <h4>
                            Generate Short URLs
							<a href="generate_pdf" class="btn btn-success float-right ml-2" target="_blank">
                                Download
                            </a>
                             @if(auth()->user()->role === 'admin' || auth()->user()->role === 'member')
								<a href="create" class="btn btn-primary float-right ml-2">
									Generate
								</a>
							@endif							
                        </h4>
                </div>
				@if($message=Session::get('success'))
				<p class="text-center text-success">				
				{{$message}}				
				</p>
				@endif
				@if($message=Session::get('error'))
				<p class="text-center text-danger">				
				{{$message}}				
				</p>
				@endif
				<div class="card-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>Short URL</th>
						<th>Long URL</th>
					</tr>
					@forelse($urls as $row)
						<tr>
							<td>{{ $row->shorturl }}</td>
							<td>{{ $row->longurl }}</td>
						</tr>
					@empty
						<tr>
							<td colspan="2" class="text-center">No record(s) found</td>
						</tr>
					@endforelse
				</table>
				<div class="d-flex justify-content-left">
					{{ $urls->links('pagination::bootstrap-4') }}
				</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	 @if(auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin')
	<div class="row mt-5 ml-5 mr-5">

		<div class="col-md-12">		
			<div class="card">
				<div class="card-header ">
                        <h4>
                            Team Members							
							<a href="invite" class="btn btn-primary float-right ml-2">
                                Invite
                            </a>
                        </h4>
                </div>	

				@if($message=Session::get('success_invitation'))
				<p class="text-center text-success">				
				{{$message}}				
				</p>
				@endif
				@if($message=Session::get('error_invite'))
				<p class="text-center text-danger">				
				{{$message}}				
				</p>
				@endif
				
				<div class="card-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
					</tr>

					@forelse($members as $row)
						<tr>
							<td>{{ $row->name }}</td>
							<td>{{ $row->email }}</td>
							<td>{{ $row->role }}</td>
						</tr>
					@empty
						<tr>
							<td colspan="3" class="text-center">No record(s) found</td>
						</tr>
					@endforelse
				</table>
				 <div class="d-flex justify-content-left">
					{{ $members->links('pagination::bootstrap-4') }}
				</div>
				</div>
			</div>
		</div>
	</div>
	@endif
</body>
</html>
