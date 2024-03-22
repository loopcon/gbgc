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
        $region =Region::where('id',$request->jurisdiction)->first();
        $view = view('frontend.glossary.table',compact('formattedData','dbdata'))->render();
        return response()->json(['view' => $view, 'region'=>$region]);
    }
}
