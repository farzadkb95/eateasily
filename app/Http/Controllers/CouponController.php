<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'code' => 'required|string|max:255',
            'discount_type' => 'required|in:percentage,amount',
            'value' => 'required|numeric',
            'expiry_date' => 'nullable|date'
        ]);

        // Create the coupon in the database
        Coupon::create($validated);

        // Return a success message
        return response()->json(['message' => 'Coupon created successfully'], 201);
    }

    public function index()
    {
        $coupons = Coupon::all();
    
        // Build a simple HTML table
        $html = '<table><tr><th>Code</th><th>Discount Type</th><th>Value</th><th>Expiry Date</th></tr>';
    
        foreach ($coupons as $coupon) {
            $html .= "<tr>
                        <td>{$coupon->code}</td>
                        <td>{$coupon->discount_type}</td>
                        <td>{$coupon->value}</td>
                        <td>{$coupon->expiry_date}</td>
                      </tr>";
        }
    
        $html .= '</table>';
    
        // Return the HTML content
        return response($html)->header('Content-Type', 'text/html');
    }
    
    
}
