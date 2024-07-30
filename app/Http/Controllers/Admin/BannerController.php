<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Http\Requests\StorebannerRequest;
use App\Http\Requests\UpdatebannerRequest;
use Illuminate\Support\Facades\Storage;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "admin.banners.";

    const PATH_UPLOAD = "banners";

    public function index()
    {
        $data = banner::query()->latest('id')->get();
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
    public function store(StorebannerRequest $request)
    {
        $data = $request->except('image_url');
        if($request->hasFile('image_url')){
            $data['image_url']=Storage::put(self::PATH_UPLOAD, $request->file('image_url'));
        }
        banner::query()->create($data);
        return redirect()->route('admin.banners.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = banner::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebannerRequest $request, string $id)
    {
        $model = banner::query()->findOrFail($id);
        $data = $request->except('image_url');
        if($request->hasFile('image_url')){
            $data['image_url']=Storage::put(self::PATH_UPLOAD, $request->file('image_url'));
        }

        $cover = $model->image_url;

        $model->update($data);

        if ($request->hasFile('image_url') && $cover && Storage::exists($cover)) {
            Storage::delete($cover);
        }

        return redirect()->route("admin.banners.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = banner::query()->findOrFail($id);
        $data->delete();
        if ($data->image && Storage::exists($data->image)) {
            Storage::delete($data->image);
        }
        return back();
    }
}
