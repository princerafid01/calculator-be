<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function get_sum(Request $request)
    {
        $request->validate([
            'first_number' => 'integer|required',
            'second_number' => 'integer|required'
        ]);

        $sum = $request->first_number + $request->second_number;

        Calculator::create([
            'first_number' => $request->first_number,
            'second_number' => $request->second_number,
            'answer' => $sum,
        ]);

        return response()->json(['sum' => $sum], 200);
    }

    public function index()
    {
        return response()->json(Calculator::all());
    }
}
