@extends('frontend.layout.master')

@section('main-content')
    <div class="row tm-2-rows-sm-swap">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 tm-2-rows-sm-down-2">

            <h3 class="tm-gold-text">Sidebar Links</h3>

            <nav>
                <ul class="nav">
                    <li><a href="#" class="tm-text-link">Lorem ipsum dolor sit</a></li>
                    <li><a href="#" class="tm-text-link">Tincidunt non faucibus placerat</a></li>
                    <li><a href="#" class="tm-text-link">Vestibulum tempor ac lectus</a></li>
                    <li><a href="#" class="tm-text-link">Fusce non turpis euismod</a></li>
                    <li><a href="#" class="tm-text-link">Nam in augue consectetur</a></li>
                    <li><a href="#" class="tm-text-link">Text Link Color #006699</a></li>
                </ul>
            </nav>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9 tm-2-rows-sm-down-1">
            <h3 class="tm-gold-text">{{ $row->title }}</h3>


            <img src="{{ asset('uploads/posts/' . $row->image) }}" alt="" width="500px">
            <p>{{ $row->description }}</p>

        </div>
    </div>


    </div>
@endsection
