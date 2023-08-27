@include('frontend.layouts.upper-main')
<!-- Post List Area Start -->
<div class="job-listing-area pt-20 pb-20">
    <div class="container">
        <div class="row">
            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <!-- Featured_job_start -->
                <section class="featured-job-area">
                    <div class="container">
                        @foreach($jobs as $job)
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30 border shadow">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <h4>{{$job->name}}</h4>
                                        <ul>
                                            <li>{{$job->getCompany()->name}}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>
                                            <li>{{ $job->salary }}&nbsp;Tk</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('job.detail', ['id' => $job->id]) }}">
                                        <button class="btn" type="submit">{{ $job->getEmploymentType() }}</button>
                                    </a>
                                    <p class="mt-2 mb-0 text-center badge-pill badge-light border">{{ $job->getJobType() }}</p>
                                </div>
                                <span class="">Deadline: {{ $job->deadline }}</span>
                                <div class="items-link items-link2 f-right">
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center mb-5">
                            @if($jobs->previousPageUrl())
                                <a href="{{ $jobs->previousPageUrl() }}" class="text-dark border mx-5 px-3 py-2">
                                    Prev
                                </a>
                            @endif
                            @if($jobs->nextPageUrl())
                                <a href="{{ $jobs->nextPageUrl() }}" class="text-dark border mx-5 px-3 py-2">
                                    Next
                                </a>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- Featured_post_end -->
                <div class="d-flex justify-content-center">
                    <a href="{{ route('job.new') }}" class="badge rounded-pill px-3 py-2 bg-info">
                        <h5 class="text-light ">
                            + Add new job
                        </h5>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Post List Area End -->
@include('frontend.layouts.lower-main')
