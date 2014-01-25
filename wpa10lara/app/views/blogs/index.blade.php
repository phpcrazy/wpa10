<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	{{ HTML::style('css/bootstrap.css') }}
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span12">
				<h1>All Blog Entries</h1>
				@if($blogs->count())
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Title</th>
							<th>Body</th>
						</tr>
					</thead>
					<tbody>
						@foreach($blogs as $blog)
						<tr>
							<td>{{{ $blog->title }}}</td>
							<td>{{{ $blog->body }}}</td>
							<td>{{ link_to_route('blogs.edit', 'Edit', 
									array($blog->id), 
									array('class' => 'btn btn-info')) }}
							</td>
							<td>
								{{ Form::open(array('method' => 'DELETE', 
								'route' => array('blogs.destroy', $blog->id))) }}
                            	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        		{{ Form::close() }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
				<h1>There is no blog entries</h1>
				@endif
				
			</div> <!-- end of span12 -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->
</body>
</html>