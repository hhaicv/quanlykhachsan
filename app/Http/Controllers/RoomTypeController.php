<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // chuyển hướng view
    const PATH_VIEW = "admin.room_types.";

    // tên file upload ảnh
    const PATH_UPLOAD = 'room_types';

    public function index()
    {
        $data= RoomType::query()->with('services')->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomTypeRequest $request)
    {
        $data = $request->except('cover');

        $data['is_active'] ??= 0;
        $dataService = $request->services;

        // lấy toàn bộ input nhưng không lấy file upload
        if($request->hasFile('cover')){
            // kiểm tra xem có upload file không
            $data['cover']=Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }
        $model=RoomType::query()->create($data);
        $model->services()->sync($dataService);

        return redirect()->route("admin.room_types.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= RoomType::query()->with('services')->findOrFail($id);
        $allService = Service::all();
        $services = $data->services()->pluck('id')->toArray();

        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'allService','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomTypeRequest $request, string $id)
    {
        $model = RoomType::query()->findOrFail($id);
        $data = $request->except(['cover', 'services']);
        $data['is_active'] ??= 0;

        $dataService = $request->services;
        if($request->hasFile('cover')){
            $data['cover']=Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }

        $currentCover = $model->cover;

        $model->update($data);
        $model->services()->sync($dataService);
        if ($request->hasFile('cover') && $currentCover && Storage::exists($currentCover)) {
            Storage::delete($currentCover);
        }

       return redirect()->route("admin.room_types.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = RoomType::query()->findOrFail($id);
        $model->services()->sync([]);
        $model->delete();
        if ($model->delete() && Storage::exists($model->delete())) {
            Storage::delete($model->delete());
        }
        return back();
    }
}
