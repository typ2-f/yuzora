<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storages = Storage::where('user_id', Auth::user()->id)->get();
        return view('pages/storages/index', compact('storages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/storages/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        Storage::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'address' => $request->address,
        ]);
        return redirect()->route('storages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $storage = Storage::find($id);
        return view('pages/storages/show', compact('storage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $storage = Storage::find($id);
        return view('pages/storages/edit', compact('storage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $storage = Storage::find($id);
        $storage->name = $request->name;
        $storage->address = $request->address;
        $storage->save();
        return redirect()->route('storages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Storage::destroy($id);
        return redirect()->route('storages/index');
    }
}
