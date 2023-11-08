<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class C_auth extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',

            ]);

            $validated = $validator->validated();

            $response = Http::post('http://127.0.0.1:1111/api/login', [
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);

            $user = json_decode($response)->content->name;
            // $response->json('content');
            $token = $response->json('token');

            session(['name' => $user]);
            session(['token' => $token]);
            session()->save();

            return redirect('/dashboard');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function regact(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $validated = $validate->validated();

            $response = Http::post('http://127.0.0.1:1111/api/register', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);


            if ($response->successful()) {
                // Registration was successful
                return redirect('/login')->with('success', 'Registration successful. Please log in.');
            } else {
                // Registration failed, handle errors
                $responseData = $response->json();
                return back()->with('error', 'Registration failed: ' . $responseData['message']);
            }
        } catch (\Throwable $th) {
            // Handle exceptions, log errors, or perform other actions as needed
            return back()->with('error', 'An error occurred during registration.');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $request->session()->flush();
            return redirect('/login')->with('success', 'log out.');
        } catch (\Throwable $th) {
            // Ha"ndle exceptions, log errors, or perform other actions as needed
            dd($th);
        }
    }
}
