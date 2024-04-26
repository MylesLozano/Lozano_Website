<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Spotlight Shop.png') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center pt-4">Login to your account</h2>
                <form>
                    <div class="form-group pt-4">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" autofocus>
                    </div>

                    <div class="form-group pt-4">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                </form>
                <div class="form-group pt-4">
                    <a href={{ route('home') }}>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
