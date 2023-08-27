@php
    $company = $job->getCompany();
@endphp
@include('frontend.layouts.upper-main')
<main>
    <!-- job post company Start -->
    <div class="job-post-company pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $job->name }}</h4>
                                </a>
                                <ul>
                                    <li><i class="fa fa-building"></i>{{ $company->name }}</li>
                                    <li><i class="fa fa-money-bill-alt"></i>{{ $job->salary }}<i>&nbsp;tk</i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Summary</h4>
                            </div>
                            {!! $job->short_description !!}
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Description</h4>
                            </div>
                            {!! $job->description !!}
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Benefits</h4>
                            </div>
                            {!! $job->benefits !!}
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>Posted date : <span>{{ $job->created_at->todatestring() }}</span></li>
                            <li>Location : <span>{{ $job->location }}</span></li>
                            <li>Job type : <span>{{ $job->getJobType() }}</span></li>
                            <li>Employment type : <span>{{ $job->getEmploymentType() }}</span></li>
                            <li>Salary :  <span>{{ $job->salary }}&nbsp;Tk</span></li>
                            <li>Deadline : <span>{{ $job->deadline }}</span></li>
                        </ul>
                        @if(Auth::guard('customer')->check())
                            @if($job->checkApplicant())
                                <span class="btn px-4 py-3 text-white bg-danger">
                                    Applied!
                                </span>
                            @else
                                <div class="apply-btn2">
                                    <a href="{{ route('job.apply', ['job-id' => $job->id]) }}" class="btn">Apply Now</a>
                                </div>
                            @endif
                        @elseif(Auth::guard('company')->check())
                            @if($job->checkOwner())
                                <div class="apply-btn2">
                                    <a href="{{ route('job.applicants', ['job-id' => $job->id]) }}" class="btn">See Applicants</a>
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="pb-2">
                            <h4>Company Information</h4>
                        </div>
                        <h5>{{ $company->name }}</h5>
                        <div class="pb-4">
                            {!! $company->address !!}
                        </div>
                        <ul>
                            <li>{{$company->email}}</li>
                            <li>{{$company->phone}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

</main>


@include('frontend.layouts.lower-main')
