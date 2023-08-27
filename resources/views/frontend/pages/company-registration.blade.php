@include('frontend.layouts.upper-main')

<section class="vh-100">
    <div class="container h-100">
        <div class="d-flex justify-content-center">
            <h1>Register your company now!</h1>
        </div>
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://img.freepik.com/free-vector/organic-flat-people-business-training-illustration_23-2148902493.jpg?w=1380&t=st=1691979874~exp=1691980474~hmac=aa373f267e6fab3aa3b8aa0d0bb3a727333fe4ab1df30af5bdcfeefd925a555a"
                     class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 shadow my-3 py-3">
                {{ Form::open(array('route' => 'company.register')) }}
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input required type="text" class="form-control form-control-lg" name="name" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input required type="email" class="form-control form-control-lg" name="email" />
                    </div>


                    <!-- Phone input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input required type="text" class="form-control form-control-lg" name="phone" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input required type="password" name="password" class="form-control form-control-lg" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                {{ Form::close() }}
                <div class="text-center text-lg-start pt-2">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{ route('company.login') }}"
                                                                                        class="text-primary">Login</a></p>
                    <div class="d-flex justify-content-center my-3">
                        <a href="{{ route('customer.register') }}" class="bg-info rounded text-light px-4 py-2">Visit as customer user</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.layouts.lower-main')
