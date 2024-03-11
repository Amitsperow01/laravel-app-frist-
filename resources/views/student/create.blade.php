<!DOCTYPe html>
<html>

<head>

    <title>Create Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width,initial-scale=1.0">

    <!-- <style type="text/css">
  h3 {
   font-family: Calibri;
   font-size: 22pt;
   color: SlateBlue;
   text-decoration: underline
  }
  table {
   font-family: Calibri;
   color: white;
   background-color: SlateBlue;
  }
  </style> -->
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h3>Create Student</h3>
    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table cellpadding="10">

            <tr>
                <td>FIRST NAME: </td>
                <td>
                    <input type="text" name="first_name" maxlength="30" value="{{ old('first_name') }}">(Max 30
                    Characters a-z and A-Z)
                    @error('first_name')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>LAST NAME:</td>
                <td>
                    <input type="text" name="last_name" maxlength="30" value="{{ old('last_name') }}">(Max 30
                    Characters a-z and A-Z)
                    @error('last_name')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>DATE OF BIRTH</td>
                <td>
                    <input type="date" name="dob" value="{{ old('dob') }}">
                    @error('dob')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
                </td>
            </tr>
            <tr>
                <td>EMAIL ID:</td>
                <td>
                    <input type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>MOBILE NUMBER: </td>
                <td>
                    <input type="tel" name="mobile_number" value="{{ old('mobile_number') }}">( 10 Digits Allowed)
                    @error('mobile_number')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>GENDER:</td>
                <td><input type="radio" name="gender" value="m" {{ old('gender') == 'm' ? 'checked' : '' }}>
                    Male
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="f" {{ old('gender') == 'f' ? 'checked' : '' }}>
                    Female
                    @error('gender')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>ADDRESS:</td>
                <td>
                    <textarea name="address" rows="5" cols="20">{{ old('address') }}</textarea>
                    @error('address')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>CITY:</td>
                <td><input type="text" name="city" maxlength="30" value="{{ old('city') }}">(Max 30 Characters
                    a-z and A-Z)
                    @error('city')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>PIN CODE: </td>
                <td><input type="number" name="pin_code" maxlength="6" value="{{ old('pin_code') }}">(6 Digits
                    Allowed)
                    @error('pin_code')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>STATE: </td>
                <td><input type="text" name="state" maxlength="30" value="{{ old('state') }}">(Max30 Characters
                    a-z and A-Z)
                    @error('state')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>COUNTRY: </td>
                <td><input type="text" name="country" value="{{ old('country') }}">
                    @error('country')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>HOBBIES:</td>
                <td><input type="checkbox" name="hobbies[]" value="drowing"
                        {{ in_array('drowing', old('hobbies') ?? []) ? 'checked' : '' }}>Drowing
                    <input type="checkbox" name="hobbies[]" value="singing"
                        {{ in_array('singing', old('hobbies') ?? []) ? 'checked' : '' }}>Singing
                    <input type="checkbox" name="hobbies[]" value="dancing"
                        {{ in_array('dancing', old('hobbies') ?? []) ? 'checked' : '' }}>Dancing
                    <input type="checkbox" name="hobbies[]" value="sketching"
                        {{ in_array('sketching', old('hobbies') ?? []) ? 'checked' : '' }}>Sketching<br>
                    {{-- <input type="checkbox" name="other_hobbies" value="other">other
                    <input type="text" name="other_hobbies"> --}}
                    @error('hobbies')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
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
                        <tr>
                            <td>
                                <input type="text" value="Class X" name="examination[]" readonly>
                            </td>
                            <td>
                                <input type="text" name="board[]" value="{{ old('board.0') }}">
                                @error('board.*')
                                    <span class="error">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </td>
                            <td>
                                <input type="number" name="percentage[]" value="{{ old('percentage.0') }}">
                            </td>
                            <td>
                                <input type="number" min="2000" max="2099" step="1" value="2010"
                                    name="year_of_passing[]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="Class XII" name="examination[]" readonly>
                            </td>
                            <td>
                                <input type="text" name="board[]" value="{{ old('board.1') }}">
                            </td>
                            <td>
                                <input type="number" name="percentage[]" value="{{ old('percentage.1') }}">
                            </td>
                            <td>
                                <input type="number" min="2000" max="2099" step="1" value="2010"
                                    name="year_of_passing[]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="Graduation" name="examination[]" readonly>
                            </td>
                            <td>
                                <input type="text" name="board[]" value="{{ old('board.2') }}">
                            </td>
                            <td>
                                <input type="number" name="percentage[]" value="{{ old('percentage.2') }}">
                            </td>
                            <td>
                                <input type="number" min="2000" max="2099" step="1" value="2010"
                                    name="year_of_passing[]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="Masters" name="examination[]" readonly>
                            </td>
                            <td>
                                <input type="text" name="board[]" value="{{ old('board.3') }}">
                            </td>
                            <td>
                                <input type="number" name="percentage[]" value="{{ old('percentage.3') }}">
                            </td>
                            <td>
                                <input type="number" min="2000" max="2099" step="1" value="2010"
                                    name="year_of_passing[]">
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td>COURSES APPLIED FOR:</td>
                <td><input type="radio" name="courses"
                        value="bca"{{ old('courses') == 'bca' ? 'checked' : '' }}>BCA
                    <input type="radio" name="courses"
                        value="bcom"{{ old('courses') == 'bcom' ? 'checked' : '' }}>B.Com
                    <input type="radio" name="courses"
                        value="bsc"{{ old('courses') == 'bsc' ? 'checked' : '' }}>B.Sc
                    <input type="radio" name="courses"
                        value="ba"{{ old('courses') == 'ba' ? 'checked' : '' }}> BA
                    @error('courses')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    {{-- <button type="submit">submit</button> --}}
                    <input type="submit" value="Submit">&nbsp;
                    <button type="reset">Reset</button>

                </td>
            </tr>

        </table>
    </form>
</body>

</html>
