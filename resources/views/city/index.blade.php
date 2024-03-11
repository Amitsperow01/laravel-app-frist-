
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>city</title>
	</head>
	
	<body>
		<h2>city</h2>
		
		{{-- {{dd($city->states)}} --}}

		<a href="{{route('city.create')}}">+ Add city</a>
	{{session()->get('success')}}
		<table border="1" cellspacing="0">
		<tr>
			<th>Sr.No.</th>
			<th>country</th>
			<th>state Name</th>
			<th>city Name</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>
	
		@if($city->count())
		@foreach($city as $_city)
		<tr>
			<td>{{$_city->id}}</td>
			<td>{{$_city->country->name}}</td>
			<td>{{$_city->states->name}}</td>
			<td>{{$_city->name}}</td>
			<td>{{($_city->status==1)?"Enable":"Disable"}}</td>

			<td>
				<a href="{{route('city.edit',$_city->id)}}">Edit</a>|
				<form action="{{route('city.destroy',$_city->id)}}" method="POST">
				@csrf
				@method('DELETE')
				<input type="submit" name="delete" value="DELETE">
				</form>
			</td>
		</tr>
		@endforeach
		@else

		<tr>
			<td colspan="5" align="center"> No Data Found...</td>
		</tr>
	@endif
			

	</table>
	<a href="{{ route('state.index') }}">State index page</a><br><br>
	<a href="{{ route('country.index') }}">Country index page</a>

</body>

</html>
