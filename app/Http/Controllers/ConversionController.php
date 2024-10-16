<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversionController extends Controller
{
    public function convert(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric',
            'from_unit' => 'required|string',
            'to_unit' => 'required|string',
        ]);

        $value = $request->input('value');
        $from_unit = $request->input('from_unit');
        $to_unit = $request->input('to_unit');

        // Get conversion factor
        $conversionFactor = $this->getConversionFactor($from_unit, $to_unit);
        
        if ($conversionFactor === null) {
            return back()->withErrors(['conversion' => 'Conversion not available.']);
        }

        $result = $value * $conversionFactor;
        $formattedResult = "{$value} {$from_unit} = " . number_format($result, 2) . " {$to_unit}";

        return back()->with('result', $formattedResult);
    }

    private function getConversionFactor($from_unit, $to_unit)
    {
        // Define conversion factors for liquids and weights
        $conversions = [
            // Liquid conversions
            'teaspoon' => [
                'tablespoon' => 1 / 3,
                'cup' => 1 / 48,
                'milliliter' => 5,
                'liter' => 0.005,
            ],
            'tablespoon' => [
                'teaspoon' => 3,
                'cup' => 1 / 16,
                'milliliter' => 15,
                'liter' => 0.015,
            ],
            'cup' => [
                'teaspoon' => 48,
                'tablespoon' => 16,
                'milliliter' => 240,
                'liter' => 0.24,
            ],
            'milliliter' => [
                'teaspoon' => 0.2,
                'tablespoon' => 0.067628,
                'cup' => 0.00422675,
                'liter' => 0.001,
            ],
            'liter' => [
                'milliliter' => 1000,
                'cup' => 4.22675,
                'tablespoon' => 67.628,
                'teaspoon' => 202.884,
            ],
            
            // Weight conversions
            'grams' => [
                'kilograms' => 0.001,
                'pounds' => 0.00220462,
                'ounces' => 0.035274,
            ],
            'kilograms' => [
                'grams' => 1000,
                'pounds' => 2.20462,
                'ounces' => 35.274,
            ],
            'pounds' => [
                'grams' => 453.592,
                'kilograms' => 0.453592,
                'ounces' => 16,
            ],
            'ounces' => [
                'grams' => 28.3495,
                'kilograms' => 0.0283495,
                'pounds' => 0.0625,
            ],
        ];

        // Check if conversion exists
        if (isset($conversions[$from_unit]) && isset($conversions[$from_unit][$to_unit])) {
            return $conversions[$from_unit][$to_unit];
        }

        return null; // Conversion not available
    }
}

