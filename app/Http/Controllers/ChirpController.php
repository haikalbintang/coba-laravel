<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::whereNull('parent_id')->with('replies', 'user')->latest()->paginate(10);
        return view('chirps.index', [
            'chirps' => $chirps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => ['required', 'string', 'max:255'],
            'parent_id' => ['nullable', 'exists:chirps,id']
        ]);
        $data['user_id'] = Auth::id();
        Chirp::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        $chirps = Chirp::whereNull('parent_id')->with('replies', 'user')->latest()->paginate(10);
        return view('chirps.show', [
            'chirp' => $chirp,
            'chirps' => $chirps
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
