<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    const PATH_VIEW = "admin.users.";

    const PATH_UPLOAD = "users";
    public function index()
    {
        $data = User::query()->get();
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
    public function store(StoreUserRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }
        User::query()->create($data);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= User::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $model = User::query()->findOrFail($id);
        $data = $request->except('image');
        if($request->hasFile('image')){
            $data['image']=Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        $Cover = $model->image_url;

        $model->update($data);

        if ($request->hasFile('image') && $Cover && Storage::exists($Cover)) {
            Storage::delete($Cover);
        }

        return redirect()->route("admin.users.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::query()->findOrFail($id);
        $data->delete();
        if ($data->delete() && Storage::exists($data->delete())) {
            Storage::delete($data->delete());
        }
        return back();
    }
}
