@extends('layouts.app')
@section('title','Doctor Details')

@push('css')
    <style>
        /** rating **/
        div.stars {
        display: inline-block;
        }

        input.star { display: none; }

        label.star {
        float: right;
        padding: 10px;
        font-size: 20px;
        color:
        #444;
        transition: all .2s;
        }

        input.star:checked ~ label.star:before {
        content: 'f005';
        color:
        #e74c3c;
        transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
        color:
        #e74c3c;
        text-shadow: 0 0 5px
        #7f8c8d;
        }

        input.star-1:checked ~ label.star:before { color:
        #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
        content: 'f006';
        font-family: FontAwesome;
        }


        .horline > li:not(:last-child):after {
            content: " |";
        }
        .horline > li {
        font-weight: bold;
        color:
        #ff7e1a;

        }
        /** end rating **/
    </style>
@endpush

@section('content')
<div class="container doctor-detail">
    <div class="row  mt-5">
        <div class="col-sm-3 col-md-3 col-lg-3 offset-1">
            <img src="{{ asset('storage/doctors/'.$details->image )}}" alt="doctors" >
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <h4>{{ $details->name }}</h4>
            <p>{{ $details->category->name}}  |  Experience {{ $details->age}}+ years</p>
            <p>{{ $details->degree}}</p>
            <span></span>
                <h6>{{ round($avgStar,2) }} <i class="fas fa-star" style="color:#ff7e1a;"></i> out of ({{$reviews->count()}} reviews)</h6>
                {{-- <div class="star">
                    <ul>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                        <li> <i class="fas fa-star"></i></li>
                    </ul>

                </div> --}}

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
            <button class="btn doctor-detail-action">Call for appointment : <span>{{$chamber->mobile}}</span> </button>
        </div>
    </div>
    @endforeach
</div>
@guest
<div class="row mb-5">
    <div class="col-sm-4 col-md-4 col-lg-4 offset-md-4">
        <button class="btn doctor-detail-action" data-bs-toggle="modal" data-bs-target="#login" >For Write Review.Login or Signup</button>
        {{-- <button class="btn doctor-detail-action" data-bs-toggle="modal" data-bs-target="#login" >For Write Review. Click Here to Login</button> --}}
    </div>
</div>
@else
<div class="container">
    <div class="row add-review p-5">
        <h5>Whats your opinion about <b>{{ $details->name }}</b> </h5>
        <form action="{{ route('review-store')}}" method="POST">
            @csrf
        <div class="col-sm-12 col-md-12 col-lg-12">
            <p class="m-2">Rate this doctor in terms of helpfulness, punctuallity, knowledge</p>

            <div class="add-review-star">
                <div class="col-md-4">
                    <select name="star" id="star" class="form-control" required>
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                    </select>
                </div>
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
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                <input type="hidden" name="doctor_id" value="{{ $details->id }}">
                <input type="hidden" name="rating" value="5">
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="4"></textarea>
            </div>

            <button class="btn btn-success m-2">Submit review</button>

        </div>
    </form>
    </div>
</div>
@endguest

<!-- reviews  -->
<div class="container">
    <div class="row doctor-reviews">
        <h4>Reviews of {{ $details->name }}</h4>
        <h6>{{ round($avgStar,2) }} <i class="fas fa-star" style="color:#ff7e1a;"></i> out of ({{$reviews->count()}} reviews)</h6>
        @foreach ($reviews as $review)
            <div class="col-sm-12 col-md-12 col-lg-12 mb-5 mt-5">
                <span><strong>{{ $review->user->name}}</strong></span>
                <div class="doctor-review d-flex justify-content-between">

                    <div class="star">
                        <ul>
                            <li>{{$review->rating}} <i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="date">
                        <p>{{ date('d M Y',strtotime($review->created_at))}}</p>
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
<script>
    $('#addStar').change('.star', function(e) {
    $(this).submit();
    });
</script>
@endpush
