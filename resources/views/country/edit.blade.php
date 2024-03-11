<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Country edit</title>
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>

<body>
    <h1>edit Country page...</h1>
    {{-- {{ $stateData }}
{{ die(); }} --}}
    <form action="{{ route('country.update', $countryData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <th>Country:</th>
                <td>
                    <input type="text" name="name" value="{{ $countryData->name }}">
                </td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>
                    <select name="status">
                        <option value="">Select Status</option>
                        <option value="1" {{ $countryData->status == 1 ? 'selected' : '' }}>Enable</option>
                        <option value="2" {{ $countryData->status == 2 ? 'selected' : '' }}>Disable</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>State:</td>
                <td>
                    <table id="table_data">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <td><button type="button" id="add_more">+</button></td>
                        </tr>
                        @foreach ($countryData->states as $_stateData)
                            <tr>
                                <input type="hidden" name="state_id[]" value="{{ $_stateData->id }}">
                                <td><input type="text" name="state_name[]" value="{{ $_stateData->name }}"></td>

                                <td><select name="state_status[]">
                                        <option value="">Select</option>
                                        <option value="1" {{ ($_stateData->status == 1 )? 'selected' : '' }}>Enable
                                        </option>
                                        <option value="2" {{( $_stateData->status == 2 )? 'selected' : '' }}>Disable
                                        </option>

                                    </select></td>
                                <td><button type="button" id="remove">X</button></td>

                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="UPDATE">
                </td>
            </tr>
        </table>
    </form>


    <script>
        $(document).ready(function() {

            $("#add_more").click(function() {
                let tableRow = '<tr>\
        				<td><input type="text" name="state_name[]"></td>\
        				<td><select name="state_status[]">\
        					<option value="" >Select</option>\
        					<option value="1">Enable</option>\
        					<option value="2">Disable</option>\
        				</select></td>\
        				<td><button type="button" id="remove">X</button></td>\
        			</tr>'

                $("#table_data").append(tableRow);


            });
            $("#table_data").delegate("#remove", "click", function() {
                $(this).closest("tr").remove();
            });
        });
    </script>
</body>

</html>
