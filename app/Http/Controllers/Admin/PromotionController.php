<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    const PATH_VIEW = 'admin.promotions.';
    const PATH_UPLOAD = 'promotions';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Promotion::query()->latest('id')->get();
        //        dd($data);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();
    
        // Create a new promotion with validated data
        Promotion::create($validatedData);
    
        // Redirect to the index page with a success message
        return redirect()->route('admin.promotions.index')->with('message', 'Khuyến mãi đã được thêm mới thành công.');
    }
    




    /**
     * Display the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__, compact('promotion'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit(Promotion $promotion)
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__, compact('promotion'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        // Update the promotion with validated data
        $promotion->update($validatedData);
    
        // Redirect to the index page with a success message
        return redirect()->route('admin.promotions.index')->with('message', 'Khuyến mãi đã được cập nhật thành công.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
        $promotion->delete();
        return back()->with('message', 'Xóa thành công');
    }
}
