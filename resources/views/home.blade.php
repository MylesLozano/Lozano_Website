<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Spotlight Products</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Spotlight Shop.png') }}">
    <style>
        /* Adjust carousel image size */
        #productCarousel img {
            max-width: 100%;
            height: auto;
        }

        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        div a {
            color: black;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar with logo -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/Spotlight Shop.png') }}" alt="" width="100" height="100"
                    class="d-inline-block align-text-top">
                <h1 class="ms-3">Spotlight Products Promotion</h1>
            </a>
            <div class="bg-info bg-gradient btn">
                <a href={{ route('login') }} style="text-decoration: none; color:black">
                    Login
                </a>
            </div>
            <div class="bg-info bg-gradient btn">
                <a href={{ route('register') }} style="text-decoration: none; color:black">
                    Register
                </a>
            </div>
            <div>

            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Product Carousel -->
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('images/Nanite Hoodies.png') }}" class="d-block w-100" alt="Product 1">
                        </div>
                        <div class="col-md-6">
                            <h5>Product 1</h5>
                            <p>LozanoTech's newest fashionable jacket hoodie! Style yourself with the latest
                                clothing inspired by LozanoTech's NanoSuit V5, hailed as an industry standard in
                                nanotechnology armor and fabric protection!</p>
                            <h4>Product Features:</h4>
                            <ul>
                                <li>Made from 100% LozanoTech Nanites for shock and physical trauma protection.</li>
                                <li>Self-repairing ability rivaling the NanoSuit V2.</li>
                                <li>Automatic temperature control module for the best comfort possible.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('images/Nanite Gloves.png') }}" class="d-block w-100" alt="Product 2">
                        </div>
                        <div class="col-md-6">
                            <h5>Product 2</h5>
                            <p>LozanoTech's latest Nanite Gloves, designed for the heaviest of workloads, on or
                                off-site!
                                A direct upgrade from the nano-enhanced Tech Glove-S50, these pair of tools boasts
                                greater
                                power than its previous predecssors!</p>
                            <h4>Product Features:</h4>
                            <ul>
                                <li>Made from 100% LozanoTech Nanites for shock and physical trauma protection.</li>
                                <li>10x more strength capacity compared to the Tech Glove-S50 and S40.</li>
                                <li>Self-repairing ability rivaling the NanoSuit V2.</li>
                                <li>Automatic strength control module, comnplying with industry safety standards.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('images/Detail Glasses.png') }}" class="d-block w-100" alt="Product 3">
                        </div>
                        <div class="col-md-6">
                            <h5>Product 3</h5>
                            <p>LozanoTech's brand new, state-of-the-art Detail Glasses! Inspired from LozanoTech's own
                                Libra Goggles, the Detail Glasses capabilities are unmatched in its assistive
                                capabilities
                                which is powered by the world's best AI, A.R.M.A.D.A.!</p>
                            <h4>Product Features:</h4>
                            <ul>
                                <li>Powered by LozanoTech's compact but powerful version of the A.R.M.A.D.A. AI.</li>
                                <li>Made from 100% LozanoTech Nanites for shock and physical trauma protection.</li>
                                <li>Self-repairing ability rivaling the NanoSuit V2.</li>
                                <li>Automatic Internet Access in 10km, with an emergency satellite connection module.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </div>
    <footer class="mt-5 ms-1">All rights reserved 2024. Powered by LozanoTech Inc.</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
