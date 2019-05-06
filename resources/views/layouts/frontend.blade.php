<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css"/>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
</head>
<body>
<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="{{url('/')}}">
            {{config('app.name')}}
        </a>
        <a class="py-2 d-none d-md-inline-block" href="{{route('posts.frontend.index')}}">
            <i class="fa fa-pencil"></i> Posts

        </a>
        <a class="py-2 d-none d-md-inline-block" href="{{route('products.frontend.index')}}">
            <i class="fa fa-shopping-basket"></i> Product
        </a>
        <a class="py-2 d-none d-md-inline-block" href="{{route('businesses.frontend.index')}}">
            <i class="fa fa-building"></i> Business
        </a>
        @if(auth()->guest())
            <a class="py-2 d-none d-md-inline-block" href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a>
            <a class="py-2 d-none d-md-inline-block" href="{{route('register')}}"><i class="fa fa-user-plus"></i>
                Register</a>
        @else
            <a class="py-2 d-none d-md-inline-block" href="{{route('home')}}"><i
                        class="fa fa-user"></i> {{auth()->user()->name}}</a>
        @endif
    </div>
</nav>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    @yield('content')
</div>


<footer class="container py-5">


</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

@yield('scripts')
</body>
</html>
