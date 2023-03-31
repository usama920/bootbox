<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProductOrder::where('status', '!=', 0)
            ->with('orderSubscription', 'orderProduct', 'orderSizes', 'OrderInstallments')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        foreach ($data as $key => $order) {
            $subscription_status = DB::table('subscriptions')->where(['stripe_id' => $order->stripe_subscription_id])->first();
            if ($subscription_status && $subscription_status->stripe_status == 'active') {
                $data[$key]->subscription_status = 'Active';
            } else if ($subscription_status && $subscription_status->stripe_status == 'canceled') {
                $data[$key]->subscription_status = 'Cancelled';
            }

            if (isset($order->OrderInstallments) && count($order->OrderInstallments) > 0) {
                $installments = $order->OrderInstallments;
                foreach ($installments as $keyy => $install) {
                    $data[$key]->OrderInstallments[$keyy]->start_at = date('Y/m/d H:i:s', $install->start_at);
                    $data[$key]->OrderInstallments[$keyy]->end_at = date('Y/m/d H:i:s', $install->end_at);
                }
            }
        }
        return Inertia::render('Admin/Orders/Orders', [
            'orders' => $data
        ]);
    }

    public function PendingOrders()
    {
        $data = ProductOrder::where('status', '=', 2)
            ->with('orderSubscription', 'orderProduct', 'orderSizes', 'OrderInstallments')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        foreach ($data as $key => $order) {
            $subscription_status = DB::table('subscriptions')->where(['stripe_id' => $order->stripe_subscription_id])->first();
            if ($subscription_status && $subscription_status->stripe_status == 'active') {
                $data[$key]->subscription_status = 'Active';
            } else if ($subscription_status && $subscription_status->stripe_status == 'canceled') {
                $data[$key]->subscription_status = 'Cancelled';
            }
            if (isset($order->OrderInstallments) && count($order->OrderInstallments) > 0) {
                $installments = $order->OrderInstallments;
                foreach ($installments as $keyy => $install) {
                    $data[$key]->OrderInstallments[$keyy]->start_at = date('Y/m/d H:i:s', $install->start_at);
                    $data[$key]->OrderInstallments[$keyy]->end_at = date('Y/m/d H:i:s', $install->end_at);
                }
            }
        }
        return Inertia::render('Admin/Orders/Orders', [
            'orders' => $data
        ]);
    }

    public function OnwayOrders()
    {
        $data = ProductOrder::where('status', '=', 3)
            ->with('orderSubscription', 'orderProduct', 'orderSizes', 'OrderInstallments')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        foreach ($data as $key => $order) {
            $subscription_status = DB::table('subscriptions')->where(['stripe_id' => $order->stripe_subscription_id])->first();
            if ($subscription_status && $subscription_status->stripe_status == 'active') {
                $data[$key]->subscription_status = 'Active';
            } else if ($subscription_status && $subscription_status->stripe_status == 'canceled') {
                $data[$key]->subscription_status = 'Cancelled';
            }
            if (isset($order->OrderInstallments) && count($order->OrderInstallments) > 0) {
                $installments = $order->OrderInstallments;
                foreach ($installments as $keyy => $install) {
                    $data[$key]->OrderInstallments[$keyy]->start_at = date('Y/m/d H:i:s', $install->start_at);
                    $data[$key]->OrderInstallments[$keyy]->end_at = date('Y/m/d H:i:s', $install->end_at);
                }
            }
        }
        return Inertia::render('Admin/Orders/Orders', [
            'orders' => $data
        ]);
    }

    public function DeliveredOrders()
    {
        $data = ProductOrder::where('status', '=', 1)
            ->with('orderSubscription', 'orderProduct', 'orderSizes', 'OrderInstallments')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        foreach ($data as $key => $order) {
            $subscription_status = DB::table('subscriptions')->where(['stripe_id' => $order->stripe_subscription_id])->first();
            if ($subscription_status && $subscription_status->stripe_status == 'active') {
                $data[$key]->subscription_status = 'Active';
            } else if ($subscription_status && $subscription_status->stripe_status == 'canceled') {
                $data[$key]->subscription_status = 'Cancelled';
            }
            if (isset($order->OrderInstallments) && count($order->OrderInstallments) > 0) {
                $installments = $order->OrderInstallments;
                foreach ($installments as $keyy => $install) {
                    $data[$key]->OrderInstallments[$keyy]->start_at = date('Y/m/d H:i:s', $install->start_at);
                    $data[$key]->OrderInstallments[$keyy]->end_at = date('Y/m/d H:i:s', $install->end_at);
                }
            }
        }
        return Inertia::render('Admin/Orders/Orders', [
            'orders' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function status(Request $request)
    {
        if (!empty($request->id)) {
            ProductOrder::where('id', $request->id)->update(['status' => 1]);
            return response()->success();
        } else
            return response()->error('something went wrong', 500);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = ProductOrder::where('user_id', auth()->user()->id)
            ->where('status', '!=', 0)
            ->orderBy('id', 'DESC')
            ->with('orderSubscription', 'orderProduct', 'orderSizes', 'OrderInstallments')
            ->get();
        foreach ($data as $key => $order) {
            $subscription_status = DB::table('subscriptions')->where(['stripe_id' => $order->stripe_subscription_id])->first();
            if ($subscription_status && $subscription_status->stripe_status == 'active') {
                $data[$key]->subscription_status = 'Active';
            } else if ($subscription_status && $subscription_status->stripe_status == 'canceled') {
                $data[$key]->subscription_status = 'Cancelled';
            }
            if (isset($order->OrderInstallments) && count($order->OrderInstallments) > 0) {
                $installments = $order->OrderInstallments;
                foreach ($installments as $keyy => $install) {
                    $data[$key]->OrderInstallments[$keyy]->start_at = date('Y/m/d H:i:s', $install->start_at);
                    $data[$key]->OrderInstallments[$keyy]->end_at = date('Y/m/d H:i:s', $install->end_at);
                }
            }
        }

        return response()->success($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function process(Request $request)
    {
        if (!empty($request->id)) {
            ProductOrder::where('id', $request->id)->update(['status' => 3]);
            return response()->success();
        } else
            return response()->error('something went wrong', 500);
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
