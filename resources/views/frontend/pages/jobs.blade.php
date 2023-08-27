@php
    use App\Models\Job;
@endphp
@include('frontend.layouts.upper-main')
<!-- Job List Area Start -->
<div class="job-listing-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="small-section-tittle2 mb-45">
                            <div class="ion"> <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                          d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                </svg>
                            </div>
                            <h4>Filter Jobs</h4>
                        </div>
                    </div>
                </div>
                <!-- Job Category Listing start -->
                <div class="job-category-listing mb-10">
                    <!-- single one -->
                    <form method="GET" action="{{ route('job.all') }}" class="pt-2 pb-5 px-0">
                        <button type="submit" class="bg-light text-dark border"><i class="fa fa-th"></i>&nbsp;&nbsp;&nbsp;&nbsp;Reset</button>
                    </form>
                    <div class="single-listing">
                        <div class="mb-5">
                            <form method="GET" action="{{ route('search-jobs') }}">
                                <input type="text" name="query" placeholder="Search...">
                                <button type="submit" class="bg-light text-dark mt-2"><i class="fa fa-search"></i>&nbsp;Search</button>
                            </form>
                        </div>

                        <!-- Select job items start -->
                        <div class="select-job-items2 border-top pt-5">
                            <form method="GET" action="{{ route('filter-jobs') }}">
                                <div class="small-section-tittle2 mb-30">
                                    <h4>Employment Type</h4>
                                @foreach(Job::getEmploymentTypeOptions() as $value=>$name)
                                    <input type="radio" name="employment_type" value="{{$value}}">
                                    <label>{{ $name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <br>
                                @endforeach
                                </div>
                                <div class="small-section-tittle2 mb-30">
                                    <h4>Job Type</h4>
                                @foreach(Job::getJobTypeOptions() as $value=>$name)
                                    <input type="radio" name="job_type" value="{{$value}}">
                                    <label>{{ $name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <br>
                                @endforeach
                                </div>
                                <input type="text" name="location" placeholder="Location..." class="mb-30">
                                <button type="submit" class="bg-light text-dark mt-2"><i class="fa fa-search"></i>&nbsp;Filter</button>
                            </form>
                        </div>
                        <!--  Select job items End-->
                    </div>
                </div>
                <!-- Job Category Listing End -->
            </div>
            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <!-- Featured_job_start -->
                <section class="featured-job-area">
                    <div class="container">
                        <!-- Count of Job list Start -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="count-job mb-35">
                                    <span>{{ count($jobs) }} Jobs found</span>
                                </div>
                            </div>
                        </div>
                        <!-- Count of Job list End -->
                        @foreach($jobs as $job)
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30 border shadow">
                                <div class="job-items row">
                                    <div class="company-img col-2">
                                        <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                    </div>
                                    <div class="col-8 job-tittle job-tittle2">
                                        <h4>{{$job->name}}</h4>
                                        <ul>
                                            <li>{{$job->getCompany()->name}}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>
                                            <li>{{ $job->salary }}&nbsp;Tk</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('job.detail', ['id' => $job->id]) }}">
                                        <button class="btn" type="submit">{{ $job->getEmploymentType() }}</button>
                                    </a>
                                    <p class="mt-2 mb-0 text-center badge-pill badge-light border">{{ $job->getJobType() }}</p>
                                </div>
                                <span class="pt-3">Deadline: {{ $job->deadline }}</span>
                                <div class="items-link items-link2 f-right">
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center">
                            @if($jobs instanceof \Illuminate\Pagination\LengthAwarePaginator)
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
                            @endif
                        </div>
                    </div>
                </section>
                <!-- Featured_job_end -->
            </div>
        </div>
    </div>
</div>
<!-- Job List Area End -->
@include('frontend.layouts.lower-main')
