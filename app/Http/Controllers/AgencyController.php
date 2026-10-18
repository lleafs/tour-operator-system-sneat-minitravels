<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\User;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agencies = Agency::paginate(10);
        return response()->view('livewire.agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agency = Agency::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        User::create([
            'name'      => $request->admin_name,
            'email'     => $request->login_email,
            'password'  => Hash::make($request->temporary_password),
            'agency_id' => $agency->id,
            'role'      => 'agency',
        ]);

        return redirect()
            ->route('agencies.index')
            ->with('success', 'Agency and user created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        return view(
            'livewire.agencies.show',
            compact('agency')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        return view('livewire.agencies.edit', compact('agency'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $agency->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()
            ->route('agencies.show', $agency)
            ->with('success', 'Agency updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();

        return redirect()
            ->route('agencies.index')
            ->with('success', 'Agency deleted successfully.');
    }
}
