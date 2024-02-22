<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataText;
use App\Models\Region;

class GlossaryController extends Controller
{
    public function index()
    {
        $return_data = array();
        $datatext = DataText::with('regionDetail','maincategoryDetail','subcategory1Detail','subcategory2Detail','level4Detail')->get();
        $return_data['datatext'] = $datatext;
        $return_data['region'] = Region::orderBy('name','asc')->get();
        return view('frontend.glossary.list', array_merge($return_data));
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
                    <td>'.(isset($data->level4Detail->title) ? $data->level4Detail->title : null).'<a href="javascript:void(0);" class="info" data-information="'.$data->level4Detail->information.'" data-toggle="modal" data-target="#informationmodel"><i class="fa fa-info-circle text-primary" aria-hidden="true"></i></a></td>
                    <td>'.$data->description.'</td> 
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
