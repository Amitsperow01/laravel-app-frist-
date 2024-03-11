
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>state</title>
</head>

<body>
	<h2>state</h2>
	
	<a href="{{route('state.create')}}">+ Add state</a>
	{{session()->get('success')}}
		<table border="1" cellspacing="0">
		<tr>
			<th>Sr.No.</th>
			<th>country</th>
			<th>state Name</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>
	
		@if($state->count())
		@foreach($state as $_state)
		
		<tr>
			<td>{{$_state->id}}</td>
			<td>{{$_state->country->name}}</td>
			<td>{{$_state->name}}</td>
			<td>{{($_state->status=="1")?"Enable":"Disable"}}</td>

			<td>
				<a href="{{route('state.edit',$_state->id)}}">Edit</a>|
				<form action="{{route('state.destroy',$_state->id)}}" method="POST">
				@csrf
				@method('DELETE')
				<input type="submit" name="delete" value="DELETE">
				</form>
			</td>
		</tr>
		@endforeach
		@else

		<tr>
			<td colspan="15" align="center"> No Data Found...</td>
		</tr>
	@endif
			

	</table>
	<a href="{{ route('country.index') }}">Country index page</a><br><br>
	<a href="{{ route('city.index') }}">City index page</a>

</body>

</html>
