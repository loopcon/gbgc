<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataText;
use App\Models\Region;
use App\Models\LevelMaster;
use DB;
use App\Imports\Importdatatext;
use Excel;
class DatatextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $return_data = array();
        $return_data['region'] = Region::orderBy('name','asc')->get();
        return view('admin.datatext.list', array_merge($return_data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $region = Region::orderBy('name','asc')->get();
        $return_data['region'] = $region;
        $level_1 = LevelMaster::where('level_number',1)->get();
        $return_data['level_1'] = $level_1;
        return view('admin.datatext.form', array_merge($return_data));
    }
    public function fetchsub_category_1(Request $request)
    {
        $data['sub_category_1'] = LevelMaster::where("parent_id",$request->parent_id)->get();
        return response()->json($data);
    }
    public function fetchsub_category_2(Request $request)
    {
        $data['sub_category_2'] = LevelMaster::where("parent_id",$request->parent_id)->get();
        return response()->json($data);
    }
    public function fetchlevel_4(Request $request)
    {
        // print_r($request->all());exit;
        $data['level_4'] = LevelMaster::where("parent_id",$request->parent_id)->get();
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'region_id' => ['required'],
                'main_category' => ['required'],
                'sub_category_1' => ['required'],
                'sub_category_2' => ['required'],
                'level_4' => ['required'],
                'description' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $datatext = new DataText();
        $fields = array('region_id', 'main_category','sub_category_1','sub_category_2','level_4','description');
        foreach($fields as $key => $value){
            $datatext->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }
        $datatext->save();

        if($datatext){
            return redirect('admin/glossary')->with('success', trans('Data Added Successfully!'));
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
        $record = DataText::find($id);
        $return_data['record'] = $record;
        $region = Region::orderBy('name','asc')->get();
        $return_data['region'] = $region;
        $level_1 = LevelMaster::where('level_number',1)->get();
        $return_data['level_1'] = $level_1;
        return view('admin.datatext.form', array_merge($return_data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
                'region_id' => ['required'],
                'main_category' => ['required'],
                'sub_category_1' => ['required'],
                'sub_category_2' => ['required'],
                'level_4' => ['required'],
                'description' => ['required'],
            ],[
                'required'  => trans('The :attribute field is required.')
            ]
        );
        $datatext = DataText::find($id);
        $fields = array('region_id', 'main_category','sub_category_1','sub_category_2','level_4','description');
        foreach($fields as $key => $value){
            $datatext->$value = isset($request->$value) && $request->$value != '' ? $request->$value : NULL; 
        }

        $datatext->save();
        if($datatext) {
            return redirect('admin/glossary')->with('success', trans('Data Updated Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $datatext = DataText::where('id', $id)->delete();
        if($datatext) {
            return redirect('admin/glossary')->with('success', trans('Data Deleted Successfully!'));
        } else {
            return redirect()->back()->with('error', trans('Something went wrong, please try again later!'));
        }
    }

    public function glossaryList(Request $request)
    {
        if($request->jurisdiction)
        {
            $dbdata = DataText::with('regionDetail', 'maincategoryDetail', 'subcategory1Detail', 'subcategory2Detail', 'level4Detail')->where('region_id',$request->jurisdiction)->paginate(10);
        }else{
            $dbdata = DataText::with('regionDetail', 'maincategoryDetail', 'subcategory1Detail', 'subcategory2Detail', 'level4Detail')->paginate(10);
        }
       
        $formattedData = [];
        $prevRegionId = null;
        $prevMainCategory = null;
        $prevSubCategory1 = null;
        $prevSubCategory2 = null;

        foreach ($dbdata as $row) {
            $regionId = $row->regionDetail->name;;
            $mainCategory = $row->maincategoryDetail->title;
            $subCategory1 = $row->subcategory1Detail->title;
            $subCategory2 = $row->subcategory2Detail->title;

            // Check if the current row's values are different from the previous row's values
            $regionIdChanged = $regionId !== $prevRegionId;
            $mainCategoryChanged = $mainCategory !== $prevMainCategory;
            $subCategory1Changed = $subCategory1 !== $prevSubCategory1;
            $subCategory2Changed = $subCategory2 !== $prevSubCategory2;

            // Update the previous values
            $prevRegionId = $regionId;
            $prevMainCategory = $mainCategory;
            $prevSubCategory1 = $subCategory1;
            $prevSubCategory2 = $subCategory2;

            // Determine whether to show the values or display an empty string
            $regionIdDisplay = $regionIdChanged ? $regionId : '';
            $mainCategoryDisplay = $mainCategoryChanged ? $mainCategory : '';
            $subCategory1Display = $subCategory1Changed ? $subCategory1 : '';
            $subCategory2Display = $subCategory2Changed ? $subCategory2 : '';

            $formattedData[] = [
                'id'=>$row->id,
                'region_id' => $regionIdDisplay,
                'main_category' => $mainCategoryDisplay,
                'sub_category_1' => $subCategory1Display,
                'sub_category_2' => $subCategory2Display,
                'level_4' => $row->level4Detail->title,
                'level4information' => $row->level4Detail->information,
                'description' => $row->description,
            ];
        }
        $region=Region::where('id',$request->jurisdiction)->first();
        $view = view('admin.datatext.table',compact('formattedData','dbdata'))->render();
        return response()->json(['view' => $view, 'region'=>$region]);
    }

    public function importdatatext(Request $request)
    {
        $region=$request->input('region');
        $file = $request->file('file');
        Excel::import(new Importdatatext($region,$file), $file);
        return redirect('admin/glossary')->with('success', trans('Glossary Imported successfully.'));
    }
}
