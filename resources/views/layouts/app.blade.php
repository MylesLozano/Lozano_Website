<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body
    style="background-image: url('{{ asset('images/BG-Roles.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: auto;">

    @yield('content')

    @include('includes.scripts')

</body>

</html>
