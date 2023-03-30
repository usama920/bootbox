<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=ProductOrder::where('status', '!=' , 0)
            ->with('orderSubscription', 'orderProduct', 'orderSizes')
            ->paginate();
//        dd($data);
        return Inertia::render('Admin/Orders/Orders', [
            'orders' => $data
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
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=ProductOrder::where('user_id', auth()->user()->id)
            ->where('status', '!=' , 0)
            ->with('orderSubscription', 'orderProduct', 'orderSizes')
            ->get();

        return response()->success($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductOrder $productOrder): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductOrder $productOrder): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductOrder $productOrder): RedirectResponse
    {
        //
    }
}
