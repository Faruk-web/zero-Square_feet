<?php

namespace App\Http\Controllers;
use App\SeoText;
use App\AreaGuidesMain;
use App\ManageText;
use App\AreaGuides;
use App\SalesBuyGuidesMain;
use App\Mail\SubscribeUsNotification;
use Auth;
use App\User;
use DB;
use Schema;
use File;
use Illuminate\Http\Request;
class GuidesController extends Controller
{
    //area guides
    public function index(Request $request){
        $banner_image=AreaGuidesMain::find(3);
        $areaguides=AreaGuides::paginate();
        if($request->ajax()){
          return  $areaguides;
      }
        $seo_text=SeoText::find(6);
        $websiteLang=ManageText::all();
        return view('user.guides.index',compact('banner_image','seo_text','areaguides'));
    }
      //area guides
      public function gallery($id){
        $areaguides=AreaGuides::find($id);
        $seo_text=SeoText::find(6);
        $websiteLang=ManageText::all();
        return view('user.guides.gallery',compact('seo_text','areaguides','websiteLang'));
     }

      //area sale buy guides
      public function salebuyguides(){
        $banner_image=SalesBuyGuidesMain::find(3);
        $seo_text=SeoText::find(6);
        $websiteLang=ManageText::all();
        return view('user.guides.sale_buy_guides',compact('banner_image','seo_text',));
     }
       //area sale guides
       public function saleguides(){
        $banner_image=SalesBuyGuidesMain::find(3);
        $sale_guides=SalesBuyGuidesMain::where('sale_buy','Sale')->get();
        $seo_text=SeoText::find(6);
        $websiteLang=ManageText::all();
        return view('user.guides.sale_guides',compact('banner_image','seo_text','sale_guides'));
     }
       //area sale guides
       public function buyguides(){
        $banner_image=SalesBuyGuidesMain::find(4);
        $sale_guides=SalesBuyGuidesMain::where('sale_buy','Buy')->get();
        $seo_text=SeoText::find(6);
        $websiteLang=ManageText::all();
        return view('user.guides.buy_guides',compact('banner_image','seo_text','sale_guides'));
     }
      //search project end
    public function search_guides(Request $request) {
      $output = '';
      $guides_info = $request->guides_info;
        $areaguides = AreaGuides::where(function ($query) use ($guides_info) {
                              $query->where('title', 'LIKE', '%'. $guides_info. '%')
                                  ->orWhere('area_details', 'LIKE', '%'. $guides_info. '%');
                          })
                          ->get(['area_details','title', 'id']);
        //  dd($areaguides);
        if(!empty($guides_info)) {
            if(count($areaguides) > 0) {
              foreach ($areaguides as $areaguide) {
                  $output.='<tr>
                      <td>
                        <a href="'.route('guides.gallery', $areaguide->id).'">
                            <button type="button" onclick="setguidesInfo(\''.$areaguide->id.'\', \''.$areaguide->title.'\')">'.$areaguide->title.'</button>
                        </a>
                      </td>
                      </tr>';
                  }
            }
            else {
              $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
          }
      }
      return Response($output);
  }
}
