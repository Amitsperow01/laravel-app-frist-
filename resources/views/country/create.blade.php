<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Country Add</title>

</head>

<body>
    <h2>Add Country</h2>
    <form action="{{ route('country.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Country Name:</td>
                <td><input type="text" name="name">

                </td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                    <select name="status">
                        <option value="">Select</option>
                        <option value="1">Enable</option>
                        <option value="2">Disable</option>

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
                        <tr>
                            <td><input type="text" name="state_name[]" ></td>

                            <td><select name="state_status[]">
                                    <option value="">Select</option>
                                    <option value="1">Enable</option>
                                    <option value="2">Disable</option>

                                </select></td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save" name="save">
                    <input type="reset" name="reset" value="reset">
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
