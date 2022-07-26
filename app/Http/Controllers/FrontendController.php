<?php


namespace App\Http\Controllers;

//use http\Env\Request;
use App\Models\Chemical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function dd;

class FrontendController extends controller
{
    public function index()
    {


        return view('frontend.front');

    }

    public function sdsSearch()
    {

//        $data = DB::select("SELECT
//    C.chemical_Name AS chemical,
//    c.product_code,
//    c.product_indentifier,
//    c.che_image,
//    c.che_sds_image,
//    c.che_sds_bn_image,
//    s.SupplierName,
//    m.name AS manufacture,
//    cs.caseName,
//    h.image AS hazard_image
//FROM
//    chemical C,
//    l_supplier s,
//    l_manufactures m,
//    l_case cs,
//    l_hazard h
//WHERE
//    c.manufacturer_id = m.id AND c.supplier_id = s.id AND c.cas_id = cs.id AND c.hazard_id = h.id");

//        $data = DB::table('chemical as c')
//            ->leftJoin('l_supplier as s', 's.id', '=', 'c.supplier_id')
//            ->leftJoin('l_manufactures as m', 'm.id', '=', 'c.manufacturer_id')
//            ->leftJoin('l_case as cs', 'cs.id', '=', 'c.cas_id')
//            ->leftJoin('l_hazard as h', 'h.id', '=', 'c.hazard_id')
//            ->select('C.chemical_Name AS chemical',
//                'c.product_code', 'c.product_indentifier', 'c.che_image', 'c.che_sds_image', 'c.che_sds_bn_image',
//                's.SupplierName', 'm.name AS manufacture', 'cs.caseName', 'h.image AS hazard_image')
//            ->paginate(3);



        return view('frontend.sds_search');
    }

    public function getSearchResult(Request $request)
    {

        if($request->searchQuery != '') {
            $sdsSearchResult = DB::table('chemical as c')
                ->leftJoin('l_supplier as s', 's.id', '=', 'c.supplier_id')
                ->leftJoin('l_manufactures as m', 'm.id', '=', 'c.manufacturer_id')
                ->leftJoin('l_case as cs', 'cs.id', '=', 'c.cas_id')
                ->leftJoin('l_hazard as h', 'h.id', '=', 'c.hazard_id')
                ->select('c.chemical_Name AS chemical',
                    'c.product_code', 'c.product_indentifier', 'c.che_image', 'c.che_sds_image', 'c.che_sds_bn_image',
                    's.SupplierName', 'm.name AS manufacture', 'cs.caseName', 'h.image AS hazard_image')
                ->where('chemical_Name', 'like', '%' . $request->searchQuery . '%')
                ->get();
        }else{
            $sdsSearchResult = '';
            return json_encode($sdsSearchResult);
        }

//        $sdsSearchResult = Chemical::where('Chemical_Name', 'like', '%' . $request->get('searchQuery') . '%' )
//                                    ->get();
        return json_encode($sdsSearchResult);
    }




}
