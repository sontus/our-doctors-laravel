@extends('layouts.app')
@section('title','Hospital List')

@push('css')

@endpush

@section('content')
 <!-- hospitals start -->
 <div class="container hospitals mt-2">
    <h3 class="text-center">Nearest Hospitals</h3>
    <div class="row">
        @foreach ($hospitals as $hospital)
            <div class="col-sm-12 col-md-3 col-lg-3 hospital-box">
                <img src="{{ asset('storage/hospitals/'.$hospital->logo)}}" alt="hospital">
                <h5>{{ $hospital->name }}</h5>
                <p>{{ $hospital->address }}</p>
                <a href="{{ $hospital->map_location }}" class="btn btn-outline-success" target="_blank"><span class="fas fa-map-marker-alt ml-2" ></span> Show on Maps</a>
            </div>
        @endforeach
    </div>
</div>
<!-- hospitals end-->




@endsection


@push('js')

@endpush
