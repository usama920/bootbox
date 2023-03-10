<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
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
        $cart = Cart::select('id', 'products_id', 'quantity', 'sizes_id', 'subscription_price', 'subscriptions_id', 'total_price', 'users_id')
            ->where('users_id', auth()->user()->id)
            ->with('CartProduct', 'CartSize', 'CartSubscription')
            ->get();
        return response()->success(CartResource::collection($cart));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cart::where('id', $id)->delete();
        return response()->success();
    }
}
