<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\ShippingRates;

class ShippingController extends Controller
{
    public function index()
    {
        $shipping_rates = ShippingRates::orderBy('id', 'ASC')->get();
        $vat = Setting::select('meta_value')->where('meta_key', 'vat')->first();
        $vat = $vat->meta_value ?? 0;
        return view('admin.shipping-rates', compact('shipping_rates', 'vat'));
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

    public function vat_store(Request $request)
    {
        $request->validate([
            'vat' => 'required|numeric'
        ]);

        try {
            $vat = Setting::updateOrCreate(
                ['meta_key' => 'vat'],
                ['meta_value' => $request->vat]
            );

            return redirect()->back()->with('vat_status', 'VAT saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('vat_error', 'Error: ' . $e->getMessage());
        }
    }
}
