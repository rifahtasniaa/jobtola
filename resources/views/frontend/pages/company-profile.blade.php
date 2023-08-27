@include('frontend.layouts.upper-main')
<div class="container rounded bg-white mt-5 mb-150">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">{{$company->name}}</span>
            </div>
        </div>
        <div class="col-md-5">
            <div class="p-3 pb-10">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Profile</h3>
                    @if($company->verified == 1)
                        <p class="text-success"><i class="fa fa-solid fa-sm fa-check" style="color: green"></i>&nbsp;Verified</p>
                    @else
                        <p class="text-danger"><i class="fa fa-solid fa-sm fa-ban" style="color: red"></i>&nbsp;Not verified</p>
                    @endif
                </div>
                {{ Form::open(array('route' => 'company.profile')) }}
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels text-dark">Name</label>
                            <span class="text-danger">*</span>
                            <input required type="text" class="form-control" name="name" value="{{$company->name}}">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="labels">Email</label>
                            <span class="text-danger">*</span>
                            <input required type="text" class="form-control" name="email" value="{{ $company->email }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Phone</label>
                            <span class="text-danger">*</span>
                            <input required type="text" class="form-control" name="phone" value="{{ $company->phone }}">
                        </div>
                        <div class="col-md-12 mt-4 pt-3 border-top">
                            <label class="labels">Representative Name</label>
                            <input type="text" class="form-control" name="representative_name" value="{{ $company->representative_name }}">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="labels">Representative Phone</label>
                            <input type="text" class="form-control" name="representative_phone" value="{{ $company->representative_phone }}">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="labels">Address</label>
                            <br>
                            <textarea rows="4" cols="40" name="address" style="border: grey; background-color: aliceblue" class="my-2 p-3">{!! $company->address !!}</textarea>
                        </div>
                        <div class="col-md-12 mt-3 pt-3 border-top">
                            <label class="labels">Password</label>
                            <span class="text-danger">*</span>
                            <input required type="password" class="form-control" name="password" value="">
                        </div>

                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Changes</button></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('frontend.layouts.lower-main')
