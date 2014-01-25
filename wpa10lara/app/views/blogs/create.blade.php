<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	{{ HTML::style('css/bootstrap.css') }}
</head>
<body>
	<div class="container">	
		<div class="row">
			{{ Form::open(array('route' => 'blogs.store')) }}
			<fieldset>
				<legend>Blog Entry</legend>
				{{ Form::label('title', "Blog Title") }}
				{{ Form::text('title', '', array('placeholder' => 'Type something ..')) }}
				@if ($errors->any())
					<span class="help-block"><p class="text-error">{{ $errors->first('title') }}</p></span>
				@endif
			{{ Form::label('body', 'Blog Body') }}
			{{ Form::textarea('body', '', array('style' => 'width:500px')) }} 
			@if ($errors->any())
				<span class="help-block"><p class="text-error">{{ $errors->first('body') }}</p></span>
			@endif
			<br />
			{{ Form::submit('Submit', array('class' => 'btn')) }}
			</fieldset>
			{{ Form::close() }}
		</div>
	</div>
</body>
</html>