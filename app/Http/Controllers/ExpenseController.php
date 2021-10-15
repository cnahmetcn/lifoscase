<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$expenses = Expense::paginate(5);
        $expenses = Expense::all();
        return view('expense.list', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('expense.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $description = $request->get('description');
        $spent_money = $request->get('spent_money');
        $event_date = date("Y-m-d", strtotime($request->get('event_date')));
        $cat_id = $request->get('cat_id');
        $lat = $request->get('lat');
        $lng = $request->get('lng');

        Expense::create([
            'description' => $description,
            'spent_money' => $spent_money,
            'event_date' => $event_date,
            'category_id' => $cat_id,
            'lat' => $lat,
            'lng' => $lng
        ]);
        //return view('list');
        return redirect()->route('list')->with('success', 'Yeni Gider Eklendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense, $id)
    {
        $categories = Category::all();
        $expens = Expense::findOrFail($id);
        return view('expense.show', compact('expens', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense, $id)
    {
        $categories = Category::all();
        $expens = Expense::findOrFail($id);
        return view('expense.edit', compact('expens', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $description = $request->get('description');
        $spent_money = $request->get('spent_money');
        $event_date = date("Y-m-d", strtotime($request->get('event_date')));
        $cat_id = $request->get('cat_id');
        $lat = $request->get('lat');
        $lng = $request->get('lng');

        DB::table('expenses')
            ->where('id', $id)
            ->update([
                'description' => $description,
                'spent_money' => $spent_money,
                'event_date' => $event_date,
                'category_id' => $cat_id,
                'lat' => $lat,
                'lng' => $lng
            ]);

        return redirect()->route('list')->with('success', 'Gider Düzenlendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('list')->with('success', 'Gider Başarılı Bir Şekilde Silindi.');
    }

    public function maps()
    {
        $locations = Expense::all();
        return view('expense.map', compact('locations'));
    }
}
