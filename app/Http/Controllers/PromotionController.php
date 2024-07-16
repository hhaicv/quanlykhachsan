<?php

namespace App\Http\Controllers;

use App\Models\promotion;
use App\Http\Requests\StorepromotionRequest;
use App\Http\Requests\UpdatepromotionRequest;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "admin.promotions.";
    public function index()
    {
        $data=promotion::query()->latest('id')->get();
        return view(self::PATH_VIEW. __FUNCTION__,compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW. __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepromotionRequest $request)
    {
        $data=$request->all();
        promotion::query()->create($data);
        return redirect()->route("admin.promotions.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=promotion::query()->findOrFail($id);
        return view(self::PATH_VIEW. __FUNCTION__,compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepromotionRequest $request, string $id)
    {
        $data= promotion::query()->findOrFail($id);
        $data->update($request->all());
        return redirect()->route("admin.promotions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=promotion::query()->findOrFail($id);
        $data->delete();
        return back();
    }
}
