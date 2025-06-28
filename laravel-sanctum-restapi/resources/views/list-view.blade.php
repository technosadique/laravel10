<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>Listing</title>
	</head>
       <body>
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header ">			
                        <h4>
                            Listing
                            <a href="create" class="btn btn-primary float-right ml-2">
                                Add
                            </a>	

							<a href="generate_pdf" class="btn btn-secondary float-right ml-2" target="_blank">
                                Export PDF
                            </a>
							
							<a href="download_csv" class="btn btn-secondary float-right" target="_blank">
                                Export CSV
                            </a>
                        </h4>
                    </div>
				<p class="text-center text-success">			  
				@if($message=Session::get('success'))				
				{{$message}}
				@endif			  
				</p>
				<div class="card-body">	
				<table class="table table-bordered table-striped">
				 <tr>
				 <th>Id</th>				 
				 <th>Title</th>				 
				 <th>Action</th>
				 </tr>
				@foreach($posts as $row)
				 <tr>				 
				 <td>{{ $row->id }}</td>
				 <td>{{ $row->title }}</td>	
				 <td><a class="btn btn-primary" href="edit/{{$row->id}}">Edit</a> <a class="btn btn-danger" href="delete/{{$row->id}}">Delete</a></td>
				 </tr>
				 @endforeach				 
				 </table>				
				<div class="d-flex justify-content-left">
					{{ $posts->links('pagination::bootstrap-4') }}
				</div>		 
				</div>			
			</div>
		</div>
	</div>
</body>
</html>
