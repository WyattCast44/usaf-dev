<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Passport\Client;
use App\Http\Controllers\Controller;

class AppsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index()
    {
        return view('admin.apps.index', ['clients' => Client::all()]);
    }

    public function create()
    {
        return view('admin.apps.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|string',
            'homepage_url' => 'required|url',
            'avatar' => 'nullable|image',
            'redirect' => 'required|url',
            'first_party' => 'nullable',
        ]);

        $client = Client::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'homepage_url' => $request->homepage_url,
            'approved_until' => now()->addDays(30),
            'secret' => Str::random(40),
            'redirect' => $request->redirect,
            'personal_access_client' => false,
            'password_client' => false,
            'revoked' => false,
            'first_party' => ($request->has('first_party')) ? true : false,
        ]);

        return redirect()->route('admin.apps.index');
    }
}
