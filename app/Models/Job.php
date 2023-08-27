<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = [
        'name', 'short_description', 'description', 'benefits',
        'location', 'salary', 'deadline', 'job_type', 'employment_type',
        'office_address', 'hiring', 'company_id'
        ];

    public function getHiring(){
        if($this->hiring)
            return 'Hiring';
        else
            return 'Not Hiring';
    }

    public function getCompany(){
        return Company::find($this->company_id);
    }

    public function getJobType(){
        $jobTypeEnum = $this->job_type;
        $jobType = match ($jobTypeEnum){
            0 => 'Office',
            1 => 'Remote',
            2 => 'Hybrid',
            3 => 'Field',
            default => 'Office'
        };
        return $jobType;
    }
    public function getEmploymentType(){
        $employmentTypeEnum = $this->employment_type;
        $employmentType = match ($employmentTypeEnum){
            0 => 'Full Time',
            1 => 'Part Time',
            2 => 'Contractual',
            default => 'Full Time'
        };
        return $employmentType;
    }

    public static function getJobTypeOptions(){
        return [
            0 => 'Office',
            1 => 'Remote',
            2 => 'Hybrid',
            3 => 'Field',
        ];
    }

    public static function getEmploymentTypeOptions(){
        return [
            0 => 'Full Time',
            1 => 'Part Time',
            2 => 'Contractual',
        ];
    }

    public function checkApplicant(){
        $application = Application::where('job_id', $this->id)->where('customer_id', Auth::guard('customer')->user()->id)->first();
        return $application;
    }

    public function checkOwner(){
        if($this->company_id === Auth::guard('company')->user()->id){
            return true;
        }
        else
            return false;
    }

    public function getApplications(){
        $applications = Application::where('job_id', $this->id)->get();
        return $applications;
    }
}
