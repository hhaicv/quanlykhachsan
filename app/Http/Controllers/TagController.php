<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Symfony\Component\Yaml\Yaml;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

    const PATH_VIEW = "admin.tags.";

    public function index()
    {
        $data = Tag::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $data = $request->all();
        Tag::query()->create($data);
        return redirect()->route("admin.tags.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Tag::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, string $id)
    {
        $data= Tag::query()->findOrFail($id);
        $data->update($request->all());
        return redirect()->route("admin.tags.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tag::query()->findOrFail($id);
        $data->rooms()->sync([]);
        $data->delete();
        return back();
    }
}
