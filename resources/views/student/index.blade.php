<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudents List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <h1>Students List</h1>
    <a href="{{ route('student.create') }}">+ Add Student</a>
    {{ session()->get('success') }}
    <table border="1" cellspacing="0">

        <tr>
            <th>Sr.No.</th>
            <th>Frist Name</th>
            <th>Last Name</th>
            <th>Date Of Birth</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Gender</th>
            <th>Address</th>
            <th>City</th>
            <th>Pin Code </th>
            <th>State</th>
            <th>Country</th>
            <th>Hobbies</th>
            {{-- <th>Qualification</th> --}}
            <th>Courses For Applied</th>
            <th>Action</th>

        </tr>

        @if ($students->count())
            @php
                $i = 1;
            @endphp
            @foreach ($students as $_student)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $_student->first_name }}</td>
                    <td>{{ $_student->last_name }}</td>
                    <td>{{ $_student->dob }}</td>
                    <td>{{ $_student->email }}</td>
                    <td>{{ $_student->mobile_number }}</td>
                    <td>{{ $_student->gender == 'm' ? 'Male' : 'Female' }}</td>
                    <td>{{ $_student->address }}</td>
                    <td>{{ $_student->city }}</td>
                    <td>{{ $_student->pin_code }}</td>
                    <td>{{ $_student->state }}</td>
                    <td>{{ $_student->country }}</td>
                    <td>{{ $_student->hobbies }}</td>
                    {{-- <td>{{$_student->Qualification}}</td> --}}
                    <td>{{ $_student->courses }}</td>
                    <td>
                        <a href="{{ route('student.edit', $_student->id) }}">Edit</a>|
                        <form action="{{ route('student.destroy', $_student->id) }}" method="POST">
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
    {{ $students->links('pagination::bootstrap-5') }}

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>
