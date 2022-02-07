@extends('layouts.app')
@section('title','Doctor Details')

@push('css')

@endpush

@section('content')
<div class="container doctor-detail">
    <div class="row  mt-5">
        <div class="col-sm-3 col-md-3 col-lg-3 offset-1">
            <img src="{{ asset('assets/img/'.$details->image )}}" alt="doctors" >
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <h4>{{ $details->name }}</h4>
            <p>{{ $details->category->name}}  |  Experience {{ $details->age}}+ years</p>
            <p>{{ $details->degree}}</p>
            <span>
                <div class="star">
                    <ul>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                    </ul>
                </div>
            </span>
            <p>{{ $details->details}}</p>
        </div>
    </div>
    <h3 class="text-center mt-5">Chambers</h3>
    <div class="row chambers">
        <hr/>
        <div class="col-sm-4 col-md-4 col-lg-4"> <h6>Address</h6> </div>
        <div class="col-sm-4 col-md-4 col-lg-4"><h6>Consulting Hrs</h6> </div>
        <div class="col-sm-4 col-md-4 col-lg-4"> <h6>Visit Fees</h6></div>
        <hr/>
    </div>
    @foreach ( $details->chambers as $chamber)



    <div class="row mt-5">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <span>{{$chamber->hospital->name}}</span>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <span>{{$chamber->consulting_hrs}}</span>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <span>1st time: <b>{{$chamber->visitfees_one}} TK</b> </span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <span> <i class="fas fa-map-marker-alt"></i> {{$chamber->hospital->address}}</span>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <span> </span>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <span>2nd time: <b> {{$chamber->visitfees_two}} TK</b> </span>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-sm-4 col-md-4 col-lg-4 offset-md-4">
            <button class="btn doctor-detail-action">Call for appointment : <span>{{$chamber->hospital->phone}}</span> </button>
        </div>
    </div>
    @endforeach
</div>

<div class="container">
    <div class="row add-review p-5">
        <h5>Whats your opinion about <b>{{ $details->name }}</b> </h5>
        <form action="{{ route('review-store')}}" method="POST">
            @csrf
        <div class="col-sm-12 col-md-12 col-lg-12">
            <p class="m-2">Rate this doctor in terms of helpfulness, punctuallity, knowledge</p>

            <div class="add-review-star">
                <ul>
                    <li> <a href="#"><i class="fas fa-star"></i></a></li>
                    <li> <a href="#"><i class="fas fa-star"></i></a></li>
                    <li> <a href="#"><i class="fas fa-star"></i></a></li>
                    <li> <a href="#"><i class="fas fa-star"></i></a></li>
                    <li> <a href="#"><i class="fas fa-star"></i></a></li>
                </ul>
            </div>
            <p class="m-2">What type of visit was it? In-Person Real-time video</p>
            <div class="radio-review d-flex justify-content-between col-md-4 m-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="in-person" id="in_person">
                    <label class="form-check-label" for="in_person">
                        In-Person
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="video" id="video">
                    <label class="form-check-label" for="video">
                        Real-time video
                    </label>
                  </div>
            </div>
            <p class="m-2">Upload proof of your visit</p>
            <div>
                <input class="comment-file" type="file" name="file" id="">
                <span>**Upload a prescription or just prescription header.</span>
            </div>
            <span class="m-2 danger-info">OurDoctors don’t store any of user document</span>

            <p class="m-2">Comment</p>
            <div class="comment-box m-2">
                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="doctor_id" value="{{ $details->id }}">
                <input type="hidden" name="rating" value="5">
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="4"></textarea>
            </div>

            <button class="btn btn-success m-2">Submit review</button>

        </div>
    </form>
    </div>
</div>

<!-- reviews  -->
<div class="container">
    <div class="row doctor-reviews">
        <h4>Reviews of {{ $details->name }}</h4>
        @foreach ($reviews as $review)
            <div class="col-sm-12 col-md-12 col-lg-12 mb-5 mt-5">
                <div class="doctor-review d-flex justify-content-between">
                    <div class="star">
                        <ul>
                            <li> <i class="fas fa-star"></i></li>
                            <li> <i class="fas fa-star"></i></li>
                            <li> <i class="fas fa-star"></i></li>
                            <li> <i class="fas fa-star"></i></li>
                            <li> <i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="date">
                        <p>13 DEC 2021</p>
                    </div>
                </div>
                <p>{{ $review->review}}</p>
            </div>
            <hr/>
        @endforeach
    </div>

</div>


@endsection


@push('js')

@endpush
