@php
use \App\Models\Job;
$company = Auth::guard('company')->user();
@endphp
@include('frontend.layouts.upper-main')
<div class="container pt-50 pb-200">
    <div class="row">
        <!-- Right content -->
        <div class="col-xl-9 col-lg-9 col-md-8 shadow">
            {{ Form::open(array('route' => 'job.save')) }}
            <div class="mx-3 my-5">
                <h4 class="text-dark border-bottom pb-4 mb-4">New Job</h4>

                <div class="col-md-12 mt-3">
                    <label class="labels text-dark">Job Title</label>
                    <input required type="text" class="form-control" name="name">
                </div>

                <div class="col-md-6 mt-3">
                    <label class="labels text-dark">Job Summary</label>
                    <textarea required rows="4" cols="80" name="short_description" style="border: none; background-color: aliceblue" class="my-2 p-3"></textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="labels text-dark">Job Description</label>
                    <textarea required rows="4" cols="80" name="description" style="border: none; background-color: aliceblue" class="my-2 p-3"></textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="labels text-dark">Benefits</label>
                    <textarea required rows="4" cols="80" name="benefits" style="border: none; background-color: aliceblue" class="my-2 p-3"></textarea>
                </div>

                <div class="col-md-12 mt-3 border-top pt-3">
                    <label class="labels">Job Type</label>
                    <br>
                    @foreach(Job::getJobTypeOptions() as $value=>$name)
                        <input required type="radio" name="job_type" value="{{$value}}">
                        <label>{{ $name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                </div>

                <div class="col-md-12 mt-3">
                    <label class="labels">Employment Type</label>
                    <br>
                    @foreach(Job::getEmploymentTypeOptions() as $value=>$name)
                        <input required type="radio" name="employment_type" value="{{$value}}">
                        <label>{{ $name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                </div>

                <div class="row mt-3 pt-3 border-top">
                    <div class="col-md-6">
                        <label class="labels text-dark">Location</label>
                        <input required type="text" class="form-control" name="location">
                    </div>

                    <div class="col-md-6">
                        <label class="labels text-dark">Salary Range</label>
                        <input required type="text" class="form-control" name="salary">
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <label class="labels text-dark">Deadline</label>
                    <input required type="date" class="form-control" name="deadline">
                </div>

                <div class="col-md-6 mt-3">
                    <label class="labels text-dark">Office Address</label>
                    <textarea rows="4" cols="80" name="office_address" style="border: none; background-color: aliceblue" class="my-2 p-3"></textarea>
                </div>
                <br>
                <input type="hidden" name="company_id" value="{{ Auth::guard('company')->user()->id }}">
                <button type="submit" class="btn float-end">Add</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@include('frontend.layouts.lower-main')
