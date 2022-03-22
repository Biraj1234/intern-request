@include('frontend.includes.header');

{{-- <div class="tm-home-img-container">
    <img src="img/tm-home-img.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div> --}}

<section class="tm-section">
    <div class="container-fluid">
        @yield('main-content')

    </div>
</section>


@include('frontend.includes.footer')
