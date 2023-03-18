<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Product/Coupon', [
            'coupons' => Coupon::select('id', 'code', 'amount', 'status', 'type', 'limit')
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "code" => 'required',
            "amount" => 'required',
            "status" => 'required',
            "type" => 'required',
            "limit" => 'required',
        ]);
        Coupon::updateOrCreate([
            'id'=>$request->id,
        ],[
            'code'=>$request->code,
            'amount'=>$request->amount,
            'status'=>$request->status,
            'type'=>$request->type,
            'limit'=>$request->limit,
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Coupon::where('id', $id)->delete();
        return response()->success();
    }
}
