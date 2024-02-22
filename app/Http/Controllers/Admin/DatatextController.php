<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataText;
use App\Models\Region;
use App\Models\LevelMaster;
use DB;

class DatatextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_data = array();
        $datatext = DataText::with('regionDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')->get();
        $return_data['datatext'] = $datatext;
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

    public function glossaryList(Request $request,$page)
    {
        $query = DataText::with('regionDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail');
        $per_page = 10;
        if($request->jurisdiction) {
            $query->where([['region_id', '=', $request->jurisdiction]]);
            // where('name', 'LIKE', "%$name%")
        }
            
      
        $total_data = $query->get();
        $total_records = $total_data->count();
        $total_pages = ceil($total_records / $per_page);
        $offset = ($page - 1) * $per_page;
        $glossary = $query->offset($offset)->limit($per_page)->get(); // get page records
        // $glossary = $query->get(); // get page records
        
        $html = '';
        if(count($glossary) > 0) {
                $i=1;
                // $prevLevel1 = null;
                // $prevLevel2 = null;
                // $prevLevel3 = null;
            foreach($glossary as $data) {
                $html .= '<tr>';
                //    if($prevLevel1 !== $data->main_category){
                //          $html .='<td rowspan='.$data->where('main_category', $data->main_category)->count().'>'.(isset($data->maincategoryDetail->title) ? $data->maincategoryDetail->title : null).'</td>';
                //    }
                //    $prevLevel1 = $data->main_category;
                //    if($prevLevel2 !== $data->sub_category_1){
                //          $html .='<td rowspan='.$data->where('sub_category_1', $data->sub_category_1)->count().'>'.(isset($data->subcategory1Detail->title) ? $data->subcategory1Detail->title : null).'</td>';
                //    }
                //    $prevLevel2 = $data->sub_category_1;
                //    if($prevLevel3 !== $data->sub_category_2){
                //          $html .='<td rowspan='.$data->where('sub_category_2', $data->sub_category_2)->count().'>'.(isset($data->subcategory2Detail->title) ? $data->subcategory2Detail->title : null).'</td>';
                //    }
                //    $prevLevel3 = $data->sub_category_2;

                    $html .=
                    '<td>'.(isset($data->maincategoryDetail->title) ? $data->maincategoryDetail->title : null).'</td>
                    <td>'.(isset($data->subcategory1Detail->title) ? $data->subcategory1Detail->title : null).'</td>
                    <td>'.(isset($data->subcategory2Detail->title) ? $data->subcategory2Detail->title : null).'</td>
                    <td>'.(isset($data->level4Detail->title) ? $data->level4Detail->title : null).' <a href="javascript:void(0);" class="info" data-information="'.$data->level4Detail->information.'" data-toggle="modal" data-target="#informationmodel"><i class="fa fa-info-circle text-primary" aria-hidden="true"></i></a></td>
                    <td>'.$data->description.'</td> 
                    <td><a href='. route('datatext-edit',$data->id).' rel="tooltip" class="btn text-light" style="background:#4099ff" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0);" data-href='.route('datatext-delete',$data->id).' rel="tooltip" class="btn btn-danger delete" title="Delete"><i class="fa fa-trash"></i></a></td>
                </tr>';
            }
            $status = true;
            $message = "";
            
            $pagination_link = "";
            if($per_page < $total_records) {
                $pagination_link = pagination($total_pages, $page, url('report'));
            }
            $data = array("glossary_list"=>$html,"pagination"=>$pagination_link);
        } else {
            $html .= '
                        <td valign="top" colspan="6" class="dataTables_empty">No data available in table</td>
                     ';
            $status = false;
            $message = "No data available in table";
            $data = array("glossary_list"=>$html,"pagination"=>"");
        }
         $return_data = array(
            "status"=>$status,
            "message"=>$message,
            "data"=>$data,
        );
        echo json_encode($return_data);
        exit;
    }
}
