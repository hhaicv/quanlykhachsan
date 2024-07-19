<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    const PATH_VIEW = "admin.services.";
    const PATH_UPLOAD = "services";
    public function index()
    {
        $data = Service::query()->latest('id')->get();
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
    public function store(StoreServiceRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }
        Service::query()->create($data);
        return redirect()->route("admin.services.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Service::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, string $id)
    {
        $model = Service::query()->findOrFail($id);
        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        $currentCover = $model->cover;

        $model->update($data);

        if ($request->hasFile('image') && $currentCover && Storage::exists($currentCover)) {
            Storage::delete($currentCover);
        }

        return redirect()->route("admin.services.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Service::query()->findOrFail($id);
        $model->delete();
        if ($model->delete() && Storage::exists($model->delete())) {
            Storage::delete($model->delete());
        }
        return back();
    }
}
