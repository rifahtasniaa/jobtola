<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Job;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function detail(Request $request){
        return view('frontend.pages.job-detail', ['job' => Job::find($request->get('id'))]);
    }

    public function jobs(){
        $jobs = Job::orderBy('id', 'desc')->paginate(5);

        return view('frontend.pages.jobs', ['jobs' => $jobs]);
    }

    public function searchJobs(){
        $searchTerm = strtolower(request()->get('query'));
        $jobs = Job::all();
        $filteredJobs = $jobs->filter(function ($job) use ($searchTerm) {
            return str_contains(strtolower($job->name), $searchTerm);
        });
        return view('frontend.pages.jobs', ['jobs' => $filteredJobs]);
    }
    public function filterJobs(){
        // All Jobs
        $jobs = Job::all();

        // Filter jobs by employment type if selected
        $employmentType = request()->get('employment_type');
        if($employmentType != null){
            $jobs = $jobs->where('employment_type', $employmentType);
        }

        // Filter jobs by job type if selected
        $jobType = request()->get('job_type');
        if($jobType != null){
            $jobs = $jobs->where('job_type', $jobType);
        }

        // Filter jobs by location if selected
        $location = strtolower(request()->get('location'));
        if($location != null){
            $jobs = $jobs->filter(function ($job) use ($location) {
                return str_contains(strtolower($job->location), $location);
            });
        }

        return view('frontend.pages.jobs', ['jobs' => $jobs]);
    }

    public function ourJobs(){
        $jobs = Job::where('company_id', Auth::guard('company')->user()->id)->orderBy('id', 'desc')->paginate(5);

        return view('frontend.pages.our-jobs', ['jobs' => $jobs]);
    }

    public function saveJob(Request $request){
        $newJob = Job::create([
            'name' => $request->get('name'),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description'),
            'benefits' => $request->get('benefits'),
            'location' => $request->get('location'),
            'salary' => $request->get('salary'),
            'deadline' => $request->get('deadline'),
            'job_type' => (int)$request->get('job_type'),
            'employment_type' => $request->get('employment_type'),
            'office_address' => $request->get('office_address'),
            'company_id' => $request->get('company_id')
        ]);
        $followers = Company::find($newJob->company_id)->first()->getFollowers();
        foreach ($followers as $follower){
            Notification::createJobNotification(
                $follower->customer_id,
                $newJob->id,
                (Company::find($newJob->company_id)->name . ' created a new job: "' . $newJob->name)
            );
        }
        return redirect()->route('our-jobs');
    }

    public function newJob(){
        return view('frontend.pages.new-job');
    }

    public function applyNow(){
        $customerId = Auth::guard('customer')->user()->id;
        $jobId = request()->get('job-id');

        $newApplication = new Application();
        $newApplication->setAttribute('customer_id', $customerId);
        $newApplication->setAttribute('job_id', $jobId);
        $newApplication->save();
        return redirect()->route('job.detail', ['id' => $jobId]);
    }

    public function getApplicants(){
        $job = Job::find(request()->get('job-id'));
        $applications = $job->getApplications();
        $applicants = [];
        foreach ($applications as $application) {
            $applicants[] = Customer::find($application->customer_id);
        }
        return view('frontend.pages.job-applicants', ['applicants' => $applicants]);
    }
}
