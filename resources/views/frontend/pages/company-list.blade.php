@include('frontend.layouts.upper-main')
<!-- Post Area Start -->
<div class="job-listing-area pt-20 pb-20">
    <div class="container w-50">
        <div class="pb-100 pt-50">
            @foreach(\App\Models\Company::all() as $company)
                <div class="border shadow my-4 p-4 row">
                    <div class="col-8">
                        <h4 class="mb-1">
                            {{$company->name}}
                        </h4>
                        {{ $company->email }}
                        <br>
                        {{ $company->phone }}
                    </div>
                    <div class="col-4 my-auto">
                        @if(Auth::guard('customer')->check())
                            @if($company->isFollower())
                                <a href="{{ route('company.unfollow', ['id' => $company->id]) }}" class="border p-2">
                                    <span class="text-dark">Unfollow</span>&nbsp;&nbsp;
                                    <i class="fa fa-regular fa-lg fa-bell-slash" style="color: green;"></i>
                                </a>
                            @else
                                <a href="{{ route('company.follow', ['id' => $company->id]) }}" class="border p-2">
                                    <span class="text-dark">Follow</span>&nbsp;&nbsp;
                                    <i class="fa fa-regular fa-lg fa-bell" style="color: grey;"></i>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('frontend.layouts.lower-main')
