<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();
        $currency = Currency::get();
        $return_data['currency'] = $currency;
        return view('admin.currency.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.currency.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $currency = new Currency();
        $fields = array('name');
        foreach($fields as $key => $value){
            $currency->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }
        $currency->save();

        if($currency){
            return redirect('admin/currency')->with('success', trans('Currency Added Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $return_data = array();
        $record = Currency::find($id);
        $return_data['record'] = $record;
        return view('admin.currency.form', array_merge($return_data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
                'name' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $currency = Currency::find($id);
        $fields = array('name');
        foreach($fields as $key => $value){
            $currency->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        // $faq->answer = strip_tags($request->answer);
        $currency->save();
        if($currency) {
            return redirect('admin/currency')->with('success', trans('Currency Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currency = Currency::where('id', $id)->delete();
        if($currency) {
            return redirect('admin/currency')->with('success', trans('Currency Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
