<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(Auth::guard('administrator')->check()){
            $administrator=Administrator::where('email',Auth::guard('administrator')->user()->email)->first();
            return redirect()->intended(RouteServiceProvider::ADMHOME);
        }else{
            return view('backend.auth.login');
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        if(Auth::guard('administrator')->attempt(['email'=>$request->email,'password'=>$request->password])){
            $administrator=Administrator::where('email',$request->email)->first();
            return redirect()->intended(RouteServiceProvider::ADMHOME);
        }else{
            return redirect()->back()->with('status','Information Does Not Match');
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('administrator')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/administrator/login');
    }

    public function dashboard(){
        $administrator=Administrator::where('email',Auth::guard('administrator')->user()->email)->first();
        return view('backend.content.maincontent');
    }



}
