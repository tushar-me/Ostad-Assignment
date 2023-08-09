<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{

    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $user = Auth::user();
        $income = new Income([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
        ]);
        $user->incomes()->save($income);

        return redirect()->route('incomes.index');
    }

    public function index(Request $request)
    {
        $query = Auth::user()->incomes();

        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->has('date_range')) {
            $dates = explode('-', $request->input('date_range'));
            $query->whereBetween('date', [$dates[0], $dates[1]]);
        }

        $incomes = $query->orderBy('date', 'desc')->paginate(10);

        return view('incomes.index', compact('incomes'));
    }

}
