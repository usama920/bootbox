<?php

namespace App\Listeners;

use App\Models\ProductOrder;
use App\Models\SubscriptionInstallments;
use App\Models\User;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Handle received Stripe webhooks.
     */
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'invoice.payment_succeeded') {
            $user = User::where(['stripe_id' => $event->payload["data"]["object"]["customer"]])->first();
            if ($user) {
                $amount_paid = $event->payload["data"]["object"]["amount_paid"] / 100;
                if ($amount_paid < 0) {
                    $amount_paid = 0;
                }
                $sub_id = $event->payload["data"]["object"]["subscription"];;
                $installment = new SubscriptionInstallments();
                $installment->cus_id = $event->payload["data"]["object"]["customer"];
                $installment->sub_id = $sub_id;
                $installment->invoice_url = $event->payload["data"]["object"]["hosted_invoice_url"];
                $installment->paid_amount = $amount_paid;
                $installment->currency = $event->payload["data"]["object"]["currency"];
                $installment->product_id = $event->payload["data"]["object"]["lines"]["data"][0]["plan"]["product"];
                $installment->start_at = $event->payload["data"]["object"]["lines"]["data"][0]["period"]["start"];
                $installment->end_at = $event->payload["data"]["object"]["lines"]["data"][0]["period"]["end"];
                $installment->save();

                $user = User::where(['stripe_id' => $event->payload["data"]["object"]["customer"]])->first();
                if($user) {
                    $order = ProductOrder::where(['user_id' => $user->id])->where('status', '!=', 0)->with('orderSubscription', 'orderProduct', 'orderSizes', 'OrderInstallments')->latest()->first();
                    $order_installments = SubscriptionInstallments::where(['sub_id' => $sub_id])->get();
                    if ($order) {
                        $subscription_count = $order->subscription_count;
                        if ($order->subscription_type == 0) {
                            $needed_installments = ($order->orderSubscription->months * $subscription_count) + 1;
                            if (count($order_installments) >= $needed_installments) {
                                $order->status = 2;
                                $order->subscription_count = $subscription_count + 1;
                                $order->save();
                            }
                        } else if ($order->subscription_type == 1) {
                            $needed_installments = ($order->orderSubscription->months * 4 * $subscription_count) + 1;
                            if (count($order_installments) >= $needed_installments) {
                                $order->status = 2;
                                $order->subscription_count = $subscription_count + 1;
                                $order->save();
                            }
                        }
                    }
                }
            }
        }

        if ($event->payload['type'] === 'customer.subscription.created') {
            $user = User::where(['stripe_id' => $event->payload["data"]["object"]["customer"]])->first();
            if ($user) {
                $order = ProductOrder::where(['user_id' => $user->id, 'status' => 0])->latest()->first();
                if ($order) {
                    $order->status = 2;
                    $order->stripe_subscription_id = $event->payload["data"]["object"]["id"];
                    $order->save();
                }
            }
        }

        if ($event->payload['type'] === 'charge.succeeded') {
            $user = User::where(['stripe_id' => $event->payload["data"]["object"]["customer"]])->first();
            if ($user) {
                $order = ProductOrder::where(['user_id' => $user->id, 'status' => 0])->latest()->first();
                if ($order) {
                    $order->status = 2;
                    $order->stripe_charge_id = $event->payload["data"]["object"]["id"];
                    $order->save();

                    $amount_paid = $event->payload["data"]["object"]["amount"] / 100;
                    if ($amount_paid < 0) {
                        $amount_paid = 0;
                    }

                    $installment = new SubscriptionInstallments();
                    $installment->cus_id = $event->payload["data"]["object"]["customer"];
                    $installment->charge_id = $event->payload["data"]["object"]["id"];
                    $installment->invoice_url = $event->payload["data"]["object"]["receipt_url"];
                    $installment->paid_amount = $amount_paid;
                    $installment->currency = $event->payload["data"]["object"]["currency"];
                    $installment->save();
                }
            }
        }


    }
}
