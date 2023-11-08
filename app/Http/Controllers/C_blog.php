<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class C_blog extends Controller
{

    public function index($id)
    {
        $token = session('token');
        $response = Http::withToken($token)->get('http://localhost:1111/api/show/' . $id);

        $blog = json_decode($response);

        return view('showblog', [
            'blog' => $blog
        ]);
    }

    public function show()
    {
        $token = session('token');
        $response = Http::withToken($token)->get('http://localhost:1111/api/showall');

        $blog = json_decode($response);


        return view('blog', [
            'blog' => $blog
        ]);
    }


    public function addblog()
    {
        $token = session('token');

        $response = Http::withToken($token)->get('http://localhost:1111/api/cat');

        $category = json_decode($response)->data;

        return view('addblog', [
            'category' => $category
        ]);
    }

    public function updateget($id)
    {
        $token = session('token');
        $response = Http::withToken($token)->get('http://localhost:1111/api/cat');
        $response1 = Http::withToken($token)->get('http://localhost:1111/api/updateget/' . $id);

        $update = json_decode($response1);
        $category = json_decode($response)->data;

        // dd($update);
        // die;
        return view('update', [
            'update' => $update,
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $token = session('token');
        $response = Http::withToken($token)->put('http://localhost:1111/api/update/' . $id, [
            'title' => $request->input('title'),
            'r_id_category' => $request->input('category'),
            'content' => $request->input('content'),
        ]);


        if ($response->successful()) {
            return redirect('/blog')->with('success', 'Blog post created successfully.');
        } else {
            throw new \Exception('Error creating the blog post.');
        }
    }

    public function store(Request $request)
    {

        try {
            $token = session('token');
            $response = Http::withToken($token)->post('http://localhost:1111/api/create', [
                'title' => $request->input('title'),
                'r_id_category' => $request->input('category'),
                'content' => $request->input('content'),
            ]);

            if ($response->successful()) {
                return redirect('/blog')->with('success', 'Blog post created successfully.');
            } else {
                throw new \Exception('Error creating the blog post.');
            }
        } catch (\Exception $e) {
            dd($e);
        };
    }



    public function delete($id)
    {
        try {
            $token = session('token');
            $response = Http::withToken($token)->delete('http://localhost:1111/api/delete/' . $id);
            return redirect('/blog');
        } catch (\Exception $e) {
            dd($e);
        };
        die;

        if ($response->successful()) {
            return redirect('/blog');
        } else {
            throw new \Exception('Error creating the blog post.');
        }
    }
}
