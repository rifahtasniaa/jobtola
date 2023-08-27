@include('frontend.layouts.upper-main')

<section class="vh-100">
    <div class="container h-100">
        <div class="d-flex justify-content-center">
            <h1>Find the perfect job, Register now!</h1>
        </div>
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                     class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 shadow my-3 py-2">
                {{ Form::open(array('route' => 'customer.register')) }}
                    <!-- First Name input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="first_name">First Name</label>
                        <input required type="text" class="form-control form-control-lg" name="first_name" />
                    </div>

                    <!-- Last Name input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="last_name">Last Name</label>
                        <input required type="text" class="form-control form-control-lg" name="last_name" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="email">Email address</label>
                        <input required type="email" class="form-control form-control-lg" name="email" />
                    </div>


                    <!-- Phone input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input type="text" class="form-control form-control-lg" name="phone" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input required type="password" name="password" class="form-control form-control-lg" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                {{ Form::close() }}
                <div class="text-center text-lg-start pt-2">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{ route('customer.login') }}"
                                                                                        class="text-primary">Login</a></p>
                    <div class="d-flex justify-content-center my-2">
                        <a href="{{ route('company.register') }}" class="bg-info rounded text-light px-4 py-2">Visit as company</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.layouts.lower-main')
