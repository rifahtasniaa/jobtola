<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function register(Request $request)
    {
        if($request->isMethod('post')) {
            $company = Company::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'password' => Hash::make($request->get('password')),
            ]);
            if(Auth::guard('customer')->check())
                Auth::guard('customer')->logout();
            Auth::guard('company')->attempt($request->only('email', 'password'));
            return redirect()->route('home');
        }
        return view('frontend.pages.company-registration');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->only('email', 'password');
            if(Auth::guard('customer')->check())
                Auth::guard('customer')->logout();
            if(Auth::guard('company')->attempt($credentials)){
                return redirect()->route('home');
            }else{
                session()->put('danger', 'Invalid credentials');
            }
        }
        return view('frontend.pages.company-login');
    }

    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect()
            ->route('home');
    }

    public function profile(Request $request){
        $company = Auth::guard('company')->user();
        $id = $company->id;

        if($request->isMethod('post')){
            if(Hash::check($request->get('password'), $company->password)){
                $company->setAttribute('name', $request->get('name'));
                $company->setAttribute('email', $request->get('email'));
                $company->setAttribute('phone', $request->get('phone'));
                $company->setAttribute('representative_name', $request->get('representative_name'));
                $company->setAttribute('representative_phone', $request->get('representative_phone'));
                $company->setAttribute('address', $request->get('address'));
                $company->save();
                session()->put('success', 'Company profile updated');
            }else{
                session()->put('danger', 'Incorrect password');
            }
        }
        $customer = Auth::guard('company')->user();

        return view('frontend.pages.company-profile', ['company' => $company]);
    }

    public function list(){
        return view('frontend.pages.company-list');
    }

    public function follow(Request $request){

        Follower::create([
            'company_id' => $request->get('id'),
            'customer_id' => Auth::guard('customer')->user()->id
        ]);
        return redirect()->back();
    }

    public function unfollow(Request $request){
        $follower = Follower::all()->where('company_id', $request->get('id'))->where('customer_id', Auth::guard('customer')->user()->id)->first();
        $follower->delete();
        return redirect()->back();
    }
}
