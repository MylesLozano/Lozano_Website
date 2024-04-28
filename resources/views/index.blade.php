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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand d-flex align-items-center" href={{ route('index') }}>
                <img src="{{ asset('images/Spotlight Shop.png') }}" alt="" width="50" height="50"
                    class="d-inline-block align-text-top">
                <h4 class="ms-3">Spotlight Products Promotion</h4>
            </a>
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>

                <ul class="navbar-nav ms-3">
                    <li class="nav-item me-3">
                        <a class="nav-link d-flex align-items-center" href="{{ route('auth.login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center me-3" href="{{ route('auth.register') }}">
                            <i class="fas fa-bookmark pe-2"></i>Register
                        </a>
                    </li>
                    <li class="nav-item" style="width: 65px;">
                        <a class="nav-link d-flex align-items-center" href="{{ route('home') }}">Home</a>
                    </li>
                </ul>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Product Carousel -->
    <div class="container mt-5">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-6">
                            <a href={{ route('show') }}>
                                <img src="{{ asset('images/Nanite Hoodies.png') }}" class="d-block w-100"
                                    alt="Product 1">
                            </a>
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
    <!-- Images Start-to-End -->
    <div class="card pb-1 text-center">
        <img class="img-fluid" src="{{ asset('images/Product_Sample2.jpg') }}" alt="Sample Product 1">
        <div class="card-img-overlay">
            <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">A shining
                Spotlight for upcoming
                local businesses looking for a boost in popularity</p>
        </div>
    </div>
    <div class="card pb-1 text-center">
        <img class="img-fluid" src="{{ asset('images/Product_Sample1.jpg') }}" alt="Sample Product 2">
        <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">Connecting
            consumers to obscure but good quality products flying under their radar</p>
    </div>
    <div class="card pb-1 text-center">
        <img class="img-fluid" src="{{ asset('images/Product_Sample3.jpg') }}" alt="Sample Product 3">
        <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">Promoting
            local goods and products,
            as well as forming a community of sellers and buyers all around</p>
    </div>
    <!-- Images Start-to-End -->
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-center text-lg-start text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row my-4">
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                    <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto"
                        style="width: 150px; height: 150px;">
                        <img src="{{ asset('images/Spotlight Shop.png') }}" alt="" width="100"
                            height="100" class="d-inline-block align-text-top">
                    </div>

                    <p class="text-center">Spotlight Products Promotion</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">About Us</h5>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Our Socials</h5>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Contact</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p><i class="fas fa-map-marker-alt pe-2"></i>JMCFI, Sasa, Davao City</p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone pe-2"></i>+63-2-8123-4567</p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            Humphrey Myles C. Lozano
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
