<?php

namespace App\Http\Controllers;


use App\Models\Karaokelist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class KaraokelistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karaokelists = Karaokelist::latest()->paginate(5);
        return view('index', compact('karaokelists'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'code' => 'required',
        ]);

        Karaokelist::create($request->all());

        return redirect()->route('index')
            ->with('success', 'Your favorite song created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karaokelist $karaokelist)
    {
        return view('show', compact('karaokelist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karaokelist $karaokelist)
    {
        return view('edit', compact('karaokelist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karaokelist $karaokelist)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'code' => 'required',
        ]);

        $karaokelist->update($request->all());

        return redirect()->route('index')
            ->with('success', 'Your favorite song updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karaokelist $karaokelist)
    {
        $karaokelist->delete();

        return redirect()->route('index')
            ->with('success', 'Your favorite song deleted successfully');
    }
}