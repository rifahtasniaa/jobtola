@include('frontend.layouts.upper-main')
<!-- Post Area Start -->
<div class="job-listing-area pt-20 pb-20">
    <div class="container w-50">
        <div class="pb-100 pt-50">
            @foreach($applicants as $applicant)
                <div class="border shadow my-4 p-4 row">
                    <div class="col-10">
                        <h4 class="mb-1">
                            {{$applicant->getName()}}
                        </h4>
                        {{ $applicant->email }}
                        <br>
                        {{ $applicant->phone }}
                    </div>
                    <div class="col-2 my-auto">
                        <a href="{{ route('download.cv', ['id' => $applicant->id]) }}" class="text-dark">
                            <i class="fa fa-lg fa-download"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @include('frontend.layouts.back')

    </div>
</div>
@include('frontend.layouts.lower-main')
