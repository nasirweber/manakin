<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Faqs;
use DB;

class FaqController extends Controller
{
    public function ViewFaq(){

        //$faq = Faq::all();
        $faq = DB::table('tbl_faqs')
                ->latest()
                ->first();

        //return view('backend.pages.roles.all_roles',compact('roles'));
        return view('backend.pages.faq',compact('faq'));

    }

    public function StoreFaq(Request $request){

       
        $request->validate([
            'faq' =>  'required'
        ]);

        $faqObj = new Faqs();
        $idVal =  $faqObj->pluck('faq_id')->last();
        $faqObj->faq_id = $idVal+1;
        $faqObj->faq = $request['faq'];
        $faqObj->created_at = date('Y-m-d H:i:s');
        $faqObj->updated_at = date('Y-m-d H:i:s');
        $faqObj->save();

        $notification = array(
            'message' => 'Faq Successfully Saved.',
            'alert-type'=>'success'
        );
        
        return redirect()->route('faq')->with($notification);

    }

    public function UpdateFaq(Request $request,$id){
        
        $faq = Faqs::find($id);
        $request->validate([
            'faq' =>  'required'
        ]);
        $faq->faq = $request['faq'];
        $faq->created_at = date('Y-m-d H:i:s');
        $faq->updated_at = date('Y-m-d H:i:s');
        $faq->save();

        $notification = array(
            'message' => 'FAQ Successfully Updated.',
            'alert-type'=>'success'
        );
        /*
        $faq = DB::table('tbl_faqs')
        ->latest()
        ->first();*/
        //$data = compact('faq','notification');
        return redirect()->route('faq')->with($notification);

    }
}
