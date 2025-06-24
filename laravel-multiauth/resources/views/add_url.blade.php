<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>	
	<body>
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
		<h1>Dashboard User</h1>
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
                            Generate Short URLs							
                        </h4>
                    </div>
				<div class="card-body">
					<form action="{{ 'store' }}" method="post">
					 @csrf
					<div class="form-group">
						<label for="longurl">Long URL</label>
						<input type="text" class="form-control" id="longurl" name="longurl" placeholder="Enter longurl">
						 @error('longurl')
						<span class="text-danger">
						{{ $message }}
						</span>
						@enderror
					</div>
					<button type="submit" class="btn btn-primary">Generate</button>
					<a href="{{'dashboard'}}" class="btn btn-secondary">Cancel</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>
