@extends('layouts.app')
@section('title','')

@push('css')

@endpush

@section('content')
<!-- search start -->
<div class="search">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1>Looking for a <span>doctor?</span></h1>
            </div>
        </div>

        <div class="row mt-5 search-box">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form class="d-flex" action="{{ route('doctor-search')}}" method="GET">
                    @csrf
                    <input class="form-control me-2" type="text" placeholder="Search for doctor name or specialist name" aria-label="Search" name="doctor_name">

                    <button class="btn btn-success search-button" type="submit">SEARCH</button>
                </form>
            </div>
        </div>
        <div class="row search-result mt-5">
            <p> <span class="fas fa-map-marker-alt ml-2"></span> Dhaka 947, East Shewrapara</p>
        </div>
    </div>
</div>
<!-- search end -->

    {{-- </header> --}}
    <!-- header end -->
    <!-- doctors start -->
    <div class="container m-5">
        <div class="row doctor-list">
            <div class="col-sm-12 col-md-3 col-lg-3 category-list">
                <ul>
                    @foreach ($categories as $key=>$category)
                        <li><a href="{{ route('doctor-category',$category->id)}}"> <button class="btn {{ $key == 0 ? 'btn-success' : '' }} ">{{ $category->name }}</button> </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                @foreach ($doctors as $key=> $doctor)
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2 offset-1">
                            <img src="{{ asset('storage/doctors/'.$doctor->image )}}" alt="doctors" >
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h4> <a href="{{ route('doctor-detail',$doctor->id)}}"> {{ $doctor->name }}</a> </h4>
                            <p>{{ $doctor->category->name}}  |  Experience {{ $doctor->age}}+ years</p>
                            <p>{{ $doctor->degree}}</p>
                            <div class="review-star-box">
                                <div class="star">
                                    <ul>
                                        <li> <i class="fas fa-star"></i></li>
                                        <li> <i class="fas fa-star"></i></li>
                                        <li> <i class="fas fa-star"></i></li>
                                        <li> <i class="fas fa-star"></i></li>
                                        <li> <i class="fas fa-star"></i></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <h5>{{ $doctor->hospital->name}}</h5>
                            <p class="mt-2"><span class="fas fa-map-marker-alt"></span> {{ $doctor->hospital->address}}</p>
                            <p> <span class="fas fa-phone-alt"></span> {{ $doctor->hospital->phone}}</p>
                        </div>
                    </div>
                    <hr/>
                @endforeach
            </div>

        </div>
    </div>
    <!-- doctors end-->

    <!-- review start -->
    <div class="review">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <h3>Consulted any doctor recently?</h3>
                    <p>Share your experience with us and help thousands of people to choose the doctor</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <button class="btn">Write a review</button>
                </div>
            </div>
        </div>
    </div>
    <!-- review end-->
    <!-- hospitals start -->
    <div class="container hospitals mt-2">
        <h3 class="text-center">Nearest Hospitals</h3>
        <div class="row">
            @foreach ($hospitals as $hospital)
                <div class="col-sm-12 col-md-3 col-lg-3 hospital-box">
                    <img src="{{ asset('storage/hospitals/'.$hospital->logo)}}" alt="hospital">
                    <h5>{{ $hospital->name }}</h5>
                    <p>{{ $hospital->address }}</p>
                    <a href="{{ $hospital->map_location }}" class="btn btn-outline-success" target="_blank"><span class="fas fa-map-marker-alt ml-2"></span> Show on Maps</a>
                </div>
            @endforeach
        </div>
        <div class="btncontainer">
            <div class="btncenter">
                <a href="{{ route('hospital')}}" class="btn btn-outline-success mb-5">View All <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <!-- hospitals end-->
    <!-- register doctor start -->
    <div class="doctor">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h3 class="mt-5">Are you a doctor?</h3>
                    <p>
                        Doctors who claim their profile on Ourdoctors connect with the right patients 2x more.
                    </p>
                    <p>
                        Your future patients are ready to connect. Make sure your profile stands out. Learn more about how to claim your free profile and get visible to thousands of patients.
                    </p>
                    <button class="btn btn-success mt-2">Claim your profile</button>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 doctor-image">
                    <img src="assets/img/doctor.png" alt="doctor"/>
                </div>
            </div>
        </div>
    </div>
    <!-- register doctor end-->

@endsection


@push('js')

@endpush
