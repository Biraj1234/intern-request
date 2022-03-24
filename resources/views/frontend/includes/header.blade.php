<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Classic - Responsive Bootstrap 4.0 Template</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/templatemo-style.css') }}"> <!-- Templatemo style -->



</head>

<body>

    <div class="tm-header">
        <div class="container-fluid">
            <div class="tm-header-inner">
                <a href="{{ route('/') }}" class="navbar-brand tm-site-name">EKhabar</a>

                <!-- navbar -->
                <nav class="navbar tm-main-nav">

                    <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse"
                        data-target="#tmNavbar">
                        &#9776;
                    </button>



                    <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                        <ul class="nav navbar-nav">
                            <li class="nav-item active">
                                <a href="index.html" class="nav-link">Home</a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a href="" class="nav-link">{{ $category->title }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </nav>

            </div>
        </div>
    </div>
