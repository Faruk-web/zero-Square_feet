<?php

namespace App\Http\Controllers;
use App\ManageText;
use App\AreaGuidesMain;
use App\AreaGuides;
use App\SalesBuyGuidesMain;
use Illuminate\Http\Request;

class AreaGuidesController extends Controller
{
    //create page
    public function mainindex(){
        $websiteLang=ManageText::all();
        return view('admin.guides.main_index',compact('websiteLang'));
    }
    //create page
    public function index(){
        $websiteLang=ManageText::all();
        $areaguides=AreaGuidesMain::get();
        // dd($areaguides);
        return view('admin.guides.index',compact('websiteLang','areaguides'));
    }
     //create page
     public function salebuyindex(){
        $websiteLang=ManageText::all();
        return view('admin.guides.sale_buy_area',compact('websiteLang'));
    }
    public function mainindexstore(Request $request){
        // dd($request);
        $student = new AreaGuidesMain;
        $student->name = $request->input('name');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/areaguides/', $filename);
            $student->image = $filename;
        }
        $student->save();
        return redirect()->back()->with('areaguides',' Added Successfully');
    }
    public function guidesindexstore(Request $request){
        // dd($request);
        $student = new AreaGuides;
        $student->title = $request->input('title');
        $student->main_area_id = $request->input('main_area_id');
        $student->area_details = $request->input('area_details');
        if($request->hasfile('area_image'))
        {
            $file = $request->file('area_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/areaguides/', $filename);
            $student->area_image = $filename;
        }
        if($request->hasfile('features_image'))
        {
            $file = $request->file('features_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/areaguides/', $filename);
            $student->features_image = $filename;
        }
        $student->save();
        return redirect()->back()->with('areaguides',' Added Successfully');
    }
    public function guidessalesbuystore(Request $request){
        // dd($request);
        $student = new SalesBuyGuidesMain;
        $student->title = $request->input('title');
        $student->number = $request->input('number');
        $student->area_details = $request->input('area_details');
        $student->sale_buy = $request->input('sale_buy');
        if($request->hasfile('guides_image'))
        {
            $file = $request->file('guides_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/areaguides/', $filename);
            $student->guides_image = $filename;
        }
        $student->save();
        return redirect()->back()->with('areaguides',' Added Successfully');
    }
    
}
