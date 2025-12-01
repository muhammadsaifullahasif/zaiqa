<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\ShippingRates;

class CheckoutSettingController extends Controller
{
    public function index()
    {
        $shipping_rates = ShippingRates::orderBy('id', 'ASC')->get();

        // Get settings using the settings service
        // $vat = settings('vat', 0);
        $free_delivery_threshold = settings('free_delivery_threshold', 0);
        $default_currency = settings('default_currency', '');

        // Get world currencies list from config
        $currencies = config('currencies');

        return view('admin.checkout-setting', compact('shipping_rates', 'free_delivery_threshold', 'currencies', 'default_currency'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'nullable|array',
            'id.*' => 'nullable|integer',
            'location' => 'required|array',
            'location.*' => 'required|string',
            'zipcode' => 'required|array',
            'zipcode.*' => 'required|string',
            'rate' => 'required|array',
            'rate.*' => 'required|numeric',
            'default' => 'nullable|integer'
        ]);

        try {
            // Get the default index (if any)
            $defaultIndex = $request->input('default');

            // Collect IDs that are being updated/kept
            $submittedIds = [];

            // Loop through and create/update shipping rates
            foreach ($request->location as $index => $location) {
                $isDefault = ($defaultIndex !== null && $defaultIndex == $index) ? 1 : 0;

                $data = [
                    'name' => $location,
                    'zipcode' => $request->zipcode[$index],
                    'rate' => $request->rate[$index],
                    'is_default' => $isDefault
                ];

                // Check if this is an update (has ID) or create (no ID)
                if (isset($request->id[$index]) && $request->id[$index]) {
                    // Update existing record
                    $shippingRate = ShippingRates::find($request->id[$index]);
                    if ($shippingRate) {
                        $shippingRate->update($data);
                        $submittedIds[] = $request->id[$index];
                    }
                } else {
                    // Create new record
                    $shippingRate = ShippingRates::create($data);
                    $submittedIds[] = $shippingRate->id;
                }
            }

            // If a new default was selected, unset all other defaults
            if ($defaultIndex !== null) {
                ShippingRates::whereNotIn('id', [$submittedIds[$defaultIndex] ?? 0])
                    ->update(['is_default' => 0]);
            }

            // Delete records that were not submitted (removed rows)
            ShippingRates::whereNotIn('id', $submittedIds)->delete();

            return redirect()->back()->with('shipping_status', 'Shipping rates saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('shipping_error', 'Error: ' . $e->getMessage());
        }
    }

    public function setting_store(Request $request)
    {
        $request->validate([
            // 'vat' => 'required|numeric',
            'free_delivery_threshold' => 'required|numeric',
            'default_currency' => 'required|string'
        ]);

        try {
            // Save settings using the settings service
            // settings()->set('vat', $request->vat);
            settings()->set('free_delivery_threshold', $request->free_delivery_threshold);
            settings()->set('default_currency', $request->default_currency);

            return redirect()->back()->with('checkout_setting_status', 'Checkout settings saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('checkout_setting_error', 'Error: ' . $e->getMessage());
        }
    }
}
