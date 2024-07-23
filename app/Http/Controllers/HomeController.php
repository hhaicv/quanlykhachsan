<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\room;
use App\Models\RoomType;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "client.home.";
    public function index()
    {
        // $data = RoomType::query()->get();
        // return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
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
    public function store(StoreHomeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room= room::query()->limit(4)->get();
        $data=room::query()->with('tags','services')->findOrFail($id);
        return view(self::PATH_VIEW.__FUNCTION__, compact('data', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
