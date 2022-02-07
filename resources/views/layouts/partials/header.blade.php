
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
                            <button class="btn btn-success" type="submit">Signup</button>
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
                        <form>
                            <div class="mb-3">
                              <input type="email" class="form-control" placeholder="Enter Your Email or phone">
                            </div>
                            <div class="mb-3 mt-3">
                              <input type="password" class="form-control" placeholder="Password" >
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success mb-3">Login</button>
                                <p>
                                    New to OurDoctor?
                                </p>
                                <a  class="btn btn-success mb-5">Create an account</a>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
