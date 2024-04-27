<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Spotlight Shop.png') }}">
    <title>Registration Page</title>
</head>

<body>
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Registration Form</h2>
                    <form action={{ route('register') }} method="POST">
                        @csrf <!-- Add CSRF token for security -->

                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" id="fname" name="firstName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="mname">Middle Name:</label>
                            <input type="text" id="mname" name="middleName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" id="lname" name="lastName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="psw">Password:</label>
                            <input type="password" class="form-control" id="psw" name="password">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile Number:</label>
                            <input type="text" class="form-control" id="mobile" name="mobileNumber">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
