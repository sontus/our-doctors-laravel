
    <!-- header start -->
    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="{{ route('home')}}">
                          <img src="{{ asset('assets/img/logo.png')}}" alt="logo" />
                      </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mt-2 mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('doctor')}}">Find Doctors</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('hospital')}}">Find Hospitals</a>
                          </li>

                        </ul>
                        <div class="d-flex">
                            <button class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#login">Login</button>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signup" >Signup</button>
                        </div>
                      </div>
                    </div>
                  </nav>
            </div>
        </div>

        <!-- Modal -->
      <div class="modal fade " id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="loginLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-10 offset-md-1 ">
                      <div class="logo  d-flex justify-content-center">
                        <img src="{{ asset('assets/img/logo.png')}}" alt="logo" />
                      </div>
                      <div class="d-flex justify-content-center m-2">
                        <h5 class="mt-5">Login to your account</h5>
                      </div>
                      <div  class="d-flex justify-content-center m-2">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                              {{-- <input type="email" class="form-control" placeholder="Enter Your Email or phone"> --}}

                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="hello@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                              {{-- <input type="password" class="form-control" placeholder="Password" > --}}
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success mb-3">Login</button>
                                {{-- <p>
                                    New to OurDoctor?
                                </p>
                                <a  class="btn btn-success mb-5">Create an account</a> --}}
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade " id="signup" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="signupLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-10 offset-md-1 ">
                      <div class="logo  d-flex justify-content-center">
                        <img src="{{ asset('assets/img/logo.png')}}" alt="logo" />
                      </div>
                      <div class="d-flex justify-content-center m-2">
                        <h5 class="mt-5">Create  your account</h5>
                      </div>
                      <div  class="">
                        <form action="{{ route('doctor-register')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="modal-header">
                                <h5 class="modal-title">Add New Doctor</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div> --}}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="doctor_name">Doctor Name <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{old('doctor_name', empty($errors->doctor_name) ? '' : $errors->doctor_name)}}" placeholder="Doctor Name">
                                        @if ($errors->has('doctor_name'))
                                            <span class="text-danger">{{ $errors->first('doctor_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_degree">Doctor Degree <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="doctor_degree" name="doctor_degree" value="{{old('doctor_degree', empty($errors->doctor_degree) ? '' : $errors->doctor_degree)}}" placeholder="Doctor Degree">
                                        @if ($errors->has('doctor_degree'))
                                            <span class="text-danger">{{ $errors->first('doctor_degree') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="doctor_category">Categories <span class="req">*</span> </label>
                                        <select name="doctor_category" id="doctor_category" class="form-control">
                                            @php
                                                $categories = \DB::table('categories')->where('row_status',true)->latest()->get();
                                                $hospitals  = \DB::table('hospitals')->where('row_status',true)->latest()->get();
                                            @endphp
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('doctor_category'))
                                            <span class="text-danger">{{ $errors->first('doctor_category') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_hospital">Hospitals <span class="req">*</span> </label>
                                        <select name="doctor_hospital" id="doctor_hospital" class="form-control">
                                            @foreach ($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('doctor_hospital'))
                                            <span class="text-danger">{{ $errors->first('doctor_hospital') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="doctor_mobile">Doctor Mobile <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="doctor_mobile" name="doctor_mobile" value="{{old('doctor_mobile', empty($errors->doctor_mobile) ? '' : $errors->doctor_mobile)}}" placeholder="Doctor Mobile">
                                        @if ($errors->has('doctor_mobile'))
                                            <span class="text-danger">{{ $errors->first('doctor_mobile') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_experince">Doctor Experince <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="doctor_experince" name="doctor_experince" value="{{old('doctor_experince', empty($errors->doctor_experince) ? '' : $errors->doctor_experince)}}" placeholder="Doctor Experince">
                                        @if ($errors->has('doctor_experince'))
                                            <span class="text-danger">{{ $errors->first('doctor_experince') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="doctor_address">Doctor Address <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="doctor_address" name="doctor_address" value="{{old('doctor_address', empty($errors->doctor_address) ? '' : $errors->doctor_address)}}" placeholder="Doctor Mobile">
                                        @if ($errors->has('doctor_address'))
                                            <span class="text-danger">{{ $errors->first('doctor_address') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_image">Doctor Image <span class="req">*</span> </label>
                                        <input type="file" class="form-control" id="doctor_image" name="doctor_image" value="{{old('doctor_image', empty($errors->doctor_image) ? '' : $errors->doctor_image)}}">
                                        @if ($errors->has('doctor_image'))
                                            <span class="text-danger">{{ $errors->first('doctor_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="doctor_details">Doctor Details <span class="req">*</span> </label>
                                        <textarea name="doctor_details" class="form-control" id="doctor_details" cols="30" rows="4"></textarea>
                                        @if ($errors->has('doctor_details'))
                                            <span class="text-danger">{{ $errors->first('doctor_details') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button> --}}
                                {{-- <button type="submit" class="btn btn-primary">Save Changes</button> --}}
                                <button type="submit" class="btn btn-success mb-3">Register</button>
                            </div>
                        </form>

                        {{-- <form>
                            <div class="row">

                            </div>
                            <div class="mb-3">
                              <input type="email" class="form-control" placeholder="Enter Your Email or phone">
                            </div>
                            <div class="mb-3 mt-3">
                              <input type="password" class="form-control" placeholder="Password" >
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success mb-3">Login</button>
                                {{-- <p>
                                    New to OurDoctor?
                                </p>
                                <a  class="btn btn-success mb-5">Create an account</a>
                            </div>
                        </form> --}}
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
