<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();       
        $return_data['site_title'] = "FAQ";
        $faq = FAQ::get();
        $return_data['faq'] = $faq;
        return view('admin.faq.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'question' => ['required'],
                'answer' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $faq = new FAQ();
        $fields = array('question', 'answer');
        foreach($fields as $key => $value){
            $faq->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }
        $faq->save();

        if($faq){
            return redirect('faq')->with('success', trans('FAQ Added Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    public function listDatatable(request $request)
    {
        if($request->ajax()){

            $query = FAQ::select('id', 'question', 'answer')->orderBy('id', 'DESC');
            $list = $query->get();

            return DataTables::of($list)
                ->addColumn('action', function ($row) {
                    $html = "";
                    $id = $row->id;
                    $html .= "<span class='text-nowrap'>";
                    $html .= "<a href='".route('faq-edit', array($id))."' rel='tooltip' title='".trans('Edit')."' class='btn btn-info btn-sm'><i class='fas fa-pencil-alt'></i></a>&nbsp";
                    $html .= "<a href='javascript:void(0);' data-href='".route('faq-delete',array($id))."' rel='tooltip' title='".trans('Delete')."' class='btn btn-danger btn-sm delete'><i class='fas fa-trash-alt'></i></a>";
                    $html .= "</span>";
                    return $html;
                })
                ->rawColumns(['id','question','answer','action'])
                ->make(true);
        } else {
            return redirect('backend/dashboard');
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
        $record = FAQ::find($id);
        $return_data['record'] = $record;
        return view('admin.faq.form', array_merge($return_data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
                'question' => ['required'],
                'answer' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $faq = FAQ::find($id);
        $fields = array('question', 'answer');
        foreach($fields as $key => $value){
            $faq->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }
        $faq->save();
        if($faq) {
            return redirect('faq')->with('success', trans('FAQ Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = FAQ::where('id', $id)->delete();
        if($faq) {
            return redirect('faq')->with('success', trans('Faq Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }
}
