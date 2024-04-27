<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Spotlight Products</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Spotlight Shop.png') }}">
</head>

<body>
    <div class="container mb-3 pb-3">
        <a class="navbar-brand d-flex justify-content-center" href={{ route('home') }}>
            <img src="{{ asset('images/Spotlight Shop.png') }}" alt="" width="300" height="300"
                class="d-inline-block align-text-center">
        </a>
        <p class="h1 m-3 text-center">Spotlight Products Promotion</p>
    </div>
    <nav class="navbar navbar-light">
        <div class="container">
            <div></div>
            <div></div>
            <div class="bg-info bg-gradient btn">
                <a href="{{ route('home') }}" style="text-decoration: none; color:black">
                    Home
                </a>
            </div>
            <div class="bg-info bg-gradient btn">
                <a href="{{ route('login') }}" style="text-decoration: none; color:black">
                    Login
                </a>
            </div>
            <div class="bg-info bg-gradient btn">
                <a href="{{ route('register') }}" style="text-decoration: none; color:black">
                    Register
                </a>
            </div>
            <div></div>
            <div></div>
        </div>
    </nav>
    <div class="card m-auto pb-3 text-center">
        <img src="{{ asset('images/Product_Sample2.jpg') }}" alt="Sample Product 1">
        <div class="card-img-overlay">
            <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">A shining
                Spotlight for upcoming
                local businesses looking for a boost in popularity</p>
        </div>
    </div>
    <div class="card m-auto pb-3 text-center">
        <img src="{{ asset('images/Product_Sample1.jpg') }}" alt="Sample Product 2">
        <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">Connecting
            consumers to obscure but good quality products flying under their radar</p>
    </div>
    <div class="card m-auto pb-3 text-center">
        <img src="{{ asset('images/Product_Sample3.jpg') }}" alt="Sample Product 3">
        <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">Promoting
            local goods and products,
            as well as forming a community of sellers and buyers all around</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
