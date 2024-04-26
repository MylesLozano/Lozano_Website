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
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="psw">Password</label>
                            <input type="password" class="form-control" id="psw">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" id="contact">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male"
                                    value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female"
                                    value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </form>
                    <a href={{ route('login') }}>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>