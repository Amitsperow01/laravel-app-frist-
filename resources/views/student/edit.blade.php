<!DOCTYPe html>
<html>

<head>

	<title>Edit Student</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width,initial-scale=1.0">

	
</head>

<body>
	<h3>Edit Student</h3>
	<form action="{{route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<table cellpadding="10">

			<tr>
				<td>FIRST NAME: </td>
				<td><input type="text" name="first_name" maxlength="30" value="{{$student->first_name}}">(Max 30 Characters a-z and A-Z)
				</td>
			</tr>
			<tr>
				<td>LAST NAME:</td>
				<td><input type="text" name="last_name" maxlength="30" value="{{$student->last_name}}">(Max 30 Characters a-z and A-Z)
				</td>
			</tr>
			<tr>
				<td>DATE OF BIRTH</td>
				<td>
					<input type="date" name="dob" value="{{$student->dob}}">
				</td>
				</td>
			</tr>
			<tr>
				<td>EMAIL ID:</td>
				<td><input type="email" name="email" value="{{$student->email}}">
				</td>
			</tr>
			<tr>
				<td>MOBILE NUMBER: </td>
				<td><input type="tel" name="mobile_number" maxlength="10" value="{{$student->mobile_number}}">( 10 Digits Allowed)
				</td>
			</tr>
			<tr>
				<td>GENDER:</td>
				<td><input type="radio" name="gender" value="M"{{($student->gender='m')?'checked':''}}> Male &nbsp;&nbsp;&nbsp;
					<input type="radio" name="gender"  value="f"{{($student->gender='f')?'checked':''}}> Female
				</td>
			</tr>
			<tr>
				<td>ADDRESS:</td>
				<td><textarea name="address" rows="5" cols="20" >{{$student->address}}"</textarea>
				</td>
			</tr>
			<tr>
				<td>CITY:</td>
				<td><input type="text" name="city" maxlength="30" value="{{$student->city}}">(Max 30 Characters a-z and A-Z)

				</td>
			</tr>
			<tr>
				<td>PIN CODE: </td>
				<td><input type="number" name="pin_code" maxlength="6" value="{{$student->pin_code}}">(6 Digits Allowed)

				</td>
			</tr>
			<tr>
				<td>STATE: </td>
				<td><input type="text" name="state" maxlength="30" value="{{$student->state}}">(Max30 Characters a-z and A-Z)
				</td>
			</tr>
			<tr>
				<td>COUNTRY: </td>
				<td><input type="text" name="country"  value="{{$student->country}}">
				</td>
			</tr>
			<tr>
				<td>HOBBIES:</td>
				@php
					$_student=explode(',',$student->hobbies)
				@endphp
				<td><input type="checkbox" name="hobbies[]" value="drowing"{{(in_array ("drowing",$_student))?'checked':''}}>Drowing
					<input type="checkbox" name="hobbies[]" value="singing"{{(in_array ("singing",$_student))?'checked':''}}>Singing
					<input type="checkbox" name="hobbies[]" value="dancing"{{(in_array ("dancing",$_student))?'checked':''}}>Dancing
					<input type="checkbox" name="hobbies[]" value="sketching"{{(in_array ("sketching",$_student))?'checked':''}}>Sketching<br>
					<input type="checkbox" name="other_hobbies" value="other"{{in_array ("other",$_student)?'checked':''}}>other
					{{-- <input type="text" name="other_hobbies" value="{{$student->other_hobbies}}"> --}}
				</td>
			</tr>
			<tr>
                <td>
                    <label>Qualifications:</label>
                </td>
                <td>
                    <table>
                        <tr>
                            <td align="center">Examination</td>
                            <td align="center">Board</td>
                            <td align="center">Percentage</td>
                            <td align="center">Year of Passing</td>
                        </tr>
						@foreach($studentQul as $_studentQul)
                        <tr>
							<input type="hidden"  name="studentID[]" value="{{$_studentQul->id}}">
                            <td>
                                <input type="text" value="{{$_studentQul->examination}}" name="examination[]" readonly>
                            </td>
                            <td>
                                <input type="text" name="board[]" value="{{$_studentQul->board}}" >
                                
                            </td>
                            <td>
                                <input type="number" name="percentage[]" value="{{$_studentQul->percentage}}" >
                            </td>
                            <td>
                                <input type="number" min="2000" max="2099" step="1" value="{{ $_studentQul->passing_year}}"
                                    name="year_of_passing[]">
                            </td>
                        </tr>
                       @endforeach
                    </table>
                </td>
            </tr>

			<tr>
				<td>COURSES APPLIED FOR:</td>
				<td><input type="radio" name="courses" value="bca" {{($student->gender='bca')?'checked':''}}>BCA
					<input type="radio" name="courses" value="bcom" {{($student->gender='bcom')?'checked':''}}>B.Com
					<input type="radio" name="courses" value="bsc"{{($student->gender='bsc')?'checked':''}}>B.Sc
					<input type="radio" name="courses" value="ba" {{($student->gender='ba')?'checked':''}}> BA
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="update">&nbsp;
				

				</td>
			</tr>

		</table>
	</form>
</body>

</html>