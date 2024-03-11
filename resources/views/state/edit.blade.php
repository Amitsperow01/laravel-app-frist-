<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>state Edit</title>

</head>

<body>
    <h2>Edit state</h2>
    <form action="{{ route('state.update', $states->id) }}" method="post">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Country:</td>
                <td><select name="country_id">
                        @foreach ( $countrys as $_country)
                            <option value="{{ $_country->id }}"
                                {{ $states->country_id == $_country->id ? 'selected' : '' }} >{{ $_country->name }}
                            </option>
                        @endforeach
                    </select><br></td>
            </tr>
            <tr>
                <td>state Name:</td>
                <td><input type="text" name="name" value="{{ $states->name }}">

                </td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                    <select name="status">
                        <option value="">Select</option>
                        <option value="1" {{ ($states->status == 1) ? 'selected' : '' }}>Enable</option>
                        <option value="2" {{ ($states->status == 2) ? 'selected' : '' }}>Disable</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td>City:</td>
                <td>
                    <table id="table_data">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>  
                            <td><button type="button" id="add_more">+</button></td>

                        </tr>
                        @foreach ($states->cities as $_city)
                            <tr>
                                <td>
                                    <input type="hidden" name="city_id[]" value="{{ $_city->id }}">
                                    <input type="text" name="city_name[]" value="{{ $_city->name }}"></td>

                                <td><select name="city_status[]">
                                        <option value="1" {{( $_city->status == 1 )? 'selected' : '' }}>Enable </option>
                                        <option value="2" {{( $_city->status == 2 )?'selected' : '' }}>Disable </option>
                                    </select></td>
                                <td><button type="button" id="remove">X</button></td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="update" name="save"></td>
            </tr>

        </table>

    </form>
    <script>
        $(document).ready(function() {

            $("#add_more").click(function() {
                let tableRow = '<tr>\
        				<td><input type="text" name="city_name[]"></td>\
        				<td><select name="city_status[]">\
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
