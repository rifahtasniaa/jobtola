@include('frontend.layouts.upper-main')
<div class="container rounded bg-white mt-5 mb-150">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">{{$customer->getName()}}</span>
                <div class="pt-2 my-auto">
                    <label>Download CV</label>&nbsp;&nbsp;
                    <a href="{{ route('download.cv', ['id' => $customer->id]) }}" class="text-dark">
                        <i class="fa fa-lg fa-download"></i>
                    </a>
                </div>

            </div>
        </div>
        <div class="col-md-5">
            <div class="p-3 pb-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Profile</h3>
                    @if($customer->verified == 1)
                        <p class="text-success"><i class="fa fa-solid fa-sm fa-check" style="color: green"></i>&nbsp;Verified</p>
                    @else
                        <p class="text-danger"><i class="fa fa-solid fa-sm fa-ban" style="color: red"></i>&nbsp;Not verified</p>
                    @endif
                </div>
                {{ Form::open(array('route' => 'customer.profile', 'files' => true)) }}
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels text-dark">First Name</label>
                            <span class="text-danger">*</span>
                            <input required type="text" class="form-control" name="first_name" value="{{$customer->first_name}}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <span class="text-danger">*</span>
                            <input required type="text" class="form-control" name="last_name" value="{{$customer->last_name}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <span class="text-danger">*</span>
                            <input required type="text" class="form-control" name="email" value="{{ $customer->email }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Gender</label>
                            <br>
                            @foreach($customer->getGenderOptions() as $value=>$name)
                                <input type="radio" name="gender" value="{{$value}}" {{ $customer->gender === $value ? 'checked' : '' }}>
                                <label>{{ $name }}</label>&nbsp;&nbsp;
                            @endforeach
                        </div>
                        <div class="col-md-12 mt-2 pt-3 border-top">
                            <label class="labels">NID Number</label>
                            <input type="text" class="form-control" name="nid_number" value="{{ $customer->nid_number }}">
                        </div>
                        <div class="col-md-12 mt-3 pt-3 border-top">
                            <label class="labels">Password</label>
                            <span class="text-danger">*</span>
                            <input required type="password" class="form-control" name="password" value="">
                        </div>
                        <div class="col-md-12 mt-3 pt-3 border p-5">
                            <label for="cv">Upload CV</label>
                            <br>
                            <input type="file" name="cv" accept="application/pdf">
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Changes</button></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('frontend.layouts.lower-main')
