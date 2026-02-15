<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function step1()
    {
        return view('auth.register');
    }


    public function step2(AuthRequest $request)
    {
        $request->session()->put('register.step1',[
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/register/step2');
    }


    public function showStep2(Request $request)
    {
        if (!$request->session()->has('register.step1')) {
            return redirect('/register/step1');
        }

        return view('auth.register_step2');
    }


    public  function register(AuthRequest $request)
    {
        $step1 = $request->session()->get('register.step1');

            if(!$step1) {
                return redirect('/register/step1');
            }

        DB::transaction(function() use ($step1, $request, &$user) {
        $user = User::create([
            'name' => $step1['name'],
            'email' => $step1['email'],
            'password' => Hash::make($step1['password']),
        ]);

        $user->weightTargets()->create([
            'target_weight' =>$request->target_weight,
        ]);

        $user->weightLogs()->create([
            'date' => now()->toDateString(),
            'weight' => $request->weight,
        ]);

        });

        Auth::login($user);

        $request->session()->forget('register');

        return redirect('/weight_logs');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request)
    {
        if(Auth::attempt($request->only('email','password'))) {
            return redirect('/weight_logs');
        }

        return back()->withErrors(['email' => 'ログインに失敗しました']);
    }

    public function logout()
    {
        return view ('auth.logout');
    }

}