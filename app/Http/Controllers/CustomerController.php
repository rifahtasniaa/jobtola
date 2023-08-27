<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.list', ['allCustomer' => Customer::all()]);
    }

    public function new()
    {
        return view('customer.new');
    }

    public function edit(string $id)
    {
        return view('customer.edit', ['customer' => Customer::find($id)]);
    }

    public function register(Request $request)
    {
        if($request->isMethod('post')) {
            $customer = Customer::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'password' => Hash::make($request->get('password')),
            ]);
            if(Auth::guard('company')->check())
                Auth::guard('company')->logout();
            Auth::guard('customer')->attempt($request->only('email', 'password'));
            return redirect()->route('home');
        }
        return view('frontend.pages.registration');
    }

    public function update(Request $request)
    {
        $customer = Customer::find($request->get('id'));
        $customer->setAttribute('phone', $request->get('phone'));
        $customer->setAttribute('first_name', $request->get('first_name'));
        $customer->setAttribute('last_name', $request->get('last_name'));
        $customer->setAttribute('email', $request->get('email'));
        $customer->setAttribute('password', $request->get('password'));
        $customer->save();

        return redirect()->route('customer.index');
    }

    public function delete(string $id){
        Customer::find($id)->delete();
        return redirect()->route('customer.index');
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            if(Auth::guard('company')->check())
                Auth::guard('company')->logout();
            $credentials = $request->only('email', 'password');
            if(Auth::guard('customer')->attempt($credentials)){
                return redirect()->route('feed');
            }else{
                session()->put('danger', 'Invalid credentials');
                return view('frontend.pages.login');
            }
        }else
            return view('frontend.pages.login');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()
            ->route('home');
    }

    public function profile(Request $request){
        $customer = Auth::guard('customer')->user();
        $id = $customer->id;

        if($request->isMethod('post')){
            if(Hash::check($request->get('password'), $customer->password)){
                $customer->setAttribute('first_name', $request->get('first_name'));
                $customer->setAttribute('last_name', $request->get('last_name'));
                $customer->setAttribute('email', $request->get('email'));
                $customer->setAttribute('phone', $request->get('phone'));
                $customer->setAttribute('gender', (int)$request->get('gender'));

                if ($request->has('cv')) {
                    $fileName = $customer->email . '_cv_' . Carbon::now()->toAtomString();
                    $cvPath = $request->file('cv')->storeAs('pdfs', $fileName, 'public');
                    if($customer->cv){
                        Storage::disk('public')->delete($customer->cv);
                    }
                    $customer->setAttribute('cv', $cvPath);
                }

                $customer->save();
                session()->put('success', 'Profile updated');
            }else{
                session()->put('danger', 'Incorrect password');
            }
        }
        $customer = Auth::guard('customer')->user();

        return view('frontend.pages.profile', ['customer' => $customer]);
    }

    public function downloadCV($id)
    {
        $customer = Customer::find($id);
        $pdfPath = $customer->cv;
        if($pdfPath)
            return Storage::disk('public')->download($pdfPath);
        else{
            session()->put('danger', 'CV Unavailable');
            return redirect()->back();
        }
    }
}
