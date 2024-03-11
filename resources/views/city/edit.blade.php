<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<title>city Add</title>
	
</head>

<body>
	<h2>Add city</h2>
	<form action="{{route('city.update',$city->id)}}" method="post">
		@csrf
		@method('PUT')
		<table>
			<tr>
				<td>Country:</td>
				<td><select name="country_id" id="countryId">
					@foreach ($countrys as $_country)
					<option value="{{ $_country->id }}"
						{{ $city->country_id == $_country->id ? 'selected' : '' }} >{{ $_country->name }}
					</option>
				@endforeach
							</option>
					</select><br></td>
			</tr>
			<tr>
				<td>state:</td>
				<td><select name="state_id" id="stateId">
					@foreach ($States as $_States)
					<option value="{{ $_country->id }}"
						{{ $city->state_id == $_States->id ? 'selected' : '' }} >{{ $_States->name }}
					</option>
				@endforeach
					</select><br></td>
			</tr>
			<tr>
				<td>city Name:</td>
				<td><input type="text" name="name" value="{{$city->name}}">
					
				</td>
			</tr>
			<tr>
				<td>Status:</td>
				<td>
					<select name="status">
						<option value="" >Select</option>
						<option  value="1"{{($city->status=='1')?'selected':''}}>Enable</option>
						<option  value="2"{{($city->status=='2')?'selected':''}}>Disable</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="update" name="save"></td>
			</tr>

		</table>

	</form>
	<script>
		$(document).ready(function(){
			$("#countryId").change(function(){
				var ctId = $(this).val();
				// console.log(ctId);
				$.ajax({
					url: '{{ route("country-state") }}',
					type: 'GET',
					data: {'ct_id': ctId},
					success: function(request) {
						// console.log(request);
						$("#stateId").html(request);
					},
					error: function (er) {
						alert(er);
					}
				});
			});
		});
	</script>

</body>
</html>