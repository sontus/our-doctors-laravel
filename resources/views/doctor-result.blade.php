@extends('layouts.app')
@section('title','Doctor List')

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
            <div class="row search-result mt-3">
                <p>{{ $doctors->count() }} Search Results Found</p>
            </div>
        </div>
    </div>
        <!-- search end -->

    <!-- header end -->
    <!-- doctors start -->
    <div class="container m-5">
        <div class="row doctor-list">
            <div class="col-sm-12 col-md-3 col-lg-3 category-list">
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






@endsection


@push('js')

@endpush
