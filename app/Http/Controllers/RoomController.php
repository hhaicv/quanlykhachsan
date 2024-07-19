<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Http\Requests\StoreroomRequest;
use App\Http\Requests\UpdateroomRequest;
use App\Models\RoomType;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW="admin.rooms.";

    const PATH_UPLOAD="room";

    public function index()
    {
        $data = room::query()->with('tags')->latest('id')->get();
     
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=RoomType::get();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW.__FUNCTION__, compact('data', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreroomRequest $request)
    {
        $data=$request->except("images","cover");
        
        $images=request()->file('images');
        $arrNameImage =[];
        $dataProductTags = $request->tags;

        if($request->hasFile('cover')){
            // kiểm tra xem có upload file không
            $data['cover']=Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }
        
        foreach($images as $image){
           $nameImage =  Storage::put(self::PATH_UPLOAD, $image);
           $arrNameImage[] = $nameImage;
        }
        $arrNameImage = json_encode($arrNameImage);
        $room = room::query()->create($data);
        $room->tags()->sync($dataProductTags);

        $room->update([
            'images' => $arrNameImage
        ]);
        return redirect()->route("admin.rooms.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=room::query()->with('tags')->findOrFail($id);
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=room::query()->with('tags')->findOrFail($id);
        $model=RoomType::get();
        $allTags = Tag::all();
        // Lấy tất cả các tag liên kết với sản phẩm cụ thể
        $tags = $data->tags()->pluck('id')->toArray();
        return view(self::PATH_VIEW.__FUNCTION__, compact('data', 'model', 'tags', 'allTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateroomRequest $request, string $id)
    {
        $model = room::query()->findOrFail($id);
        $data=$request->except("images","tags");
        
        $images=request()->file('images');
        $arrNameImage =[];

        $dataProductTags = $request->tags;

        if($request->hasFile('cover')){
            // kiểm tra xem có upload file không
            $data['cover']=Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }
        
        foreach($images as $image){
           $nameImage =  Storage::put(self::PATH_UPLOAD, $image);
           $arrNameImage[] = $nameImage;
        }
        $arrNameImage = json_encode($arrNameImage);
        $model->update($data);
        if($arrNameImage){
            $model->update([
                'images' => $arrNameImage
            ]);
        }
        $model->tags()->sync($dataProductTags);
        return redirect()->route("admin.rooms.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = room::query()->findOrFail($id);
        $data->roomTags();
        dd($data);
        $data->delete();
        return back();
    
    }
}
