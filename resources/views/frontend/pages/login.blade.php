@include('frontend.layouts.upper-main')

<section class="vh-100 py-4">
    <div class="container-fluid h-custom">
        <div class="d-flex justify-content-center">
            <h1>Login to your account</h1>
        </div>
        <div class="row d-flex justify-content-center align-items-center h-100 py-5">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 shadow p-5">
                {{ Form::open(array('route' => 'customer.login')) }}
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input required type="email" name="email" class="form-control form-control-lg"
                               placeholder="Enter your email address" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input required type="password" name="password" class="form-control form-control-lg"
                               placeholder="Enter password" />
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                {{ Form::close() }}
                <div class="text-center text-lg-start my-2 pt-2">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('customer.register') }}"
                                                                                      class="text-primary">Register</a></p>
                    <div class="d-flex justify-content-center mt-5">
                        <a href="{{ route('company.login') }}" class="bg-primary rounded text-light px-4 py-2">Visit as Company</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.layouts.lower-main')
