<?php

namespace App\Http\Controllers;
use App\SeoText;
use App\AreaGuidesMain;
use App\ManageText;
use App\AreaGuides;
use App\SalesBuyGuidesMain;
use App\BannerImage;
use App\Mail\SubscribeUsNotification;
use App\About;
use App\AboutSection;
use Auth;
use App\Navigation;
use App\Overview;
use App\Partner;
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
        $areaguides=AreaGuides::get();
        // dd($areaguides);
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
                  $output.='
                     <dive style="background-color:#bcd130;margin-left: 30px;"> 
                        <a href="'.route('guides.gallery', $areaguide->id).'" onclick="setguidesInfo(\''.$areaguide->id.'\', \''.$areaguide->title.'\')">
                        <h2>'.$areaguide->title.'</h2>
                        </a>
                      </dive>
                     ';
                  }
            }
            else {
              $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
          }
      }
      return Response($output);
  }
  //loancalculation
  public function loancalculation(){
    $about=About::first();
    $banner_image=BannerImage::find(2);
    $overviews=Overview::where('status',1)->get();
    $partners=Partner::where('status',1)->get();
    $sections=AboutSection::all();
    $seo_text=SeoText::find(3);
    $menus=Navigation::all();
    $websiteLang=ManageText::all();
    return view('user.guides.loan_calculation',compact('about','banner_image','overviews','partners','sections','seo_text','menus','websiteLang'));
  }
}
