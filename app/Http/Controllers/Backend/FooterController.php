<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Footer;
use App\Model\Contact;

class FooterController extends Controller
{
    public function view(){
        $data['countContact'] = Footer::count();
        //dd($data['countContact']);
        $data['allData'] = Footer::all();
        return view('backend.footer.view_footer',$data);
    }

    public function add(){
        // dd($kamal->toArray());
        return view('backend.footer.add_footer');
    }

    public function store(Request $request){
        $data = new Footer();
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->linkedin = $request->linkedin;
        $data->created_by = Auth::user()->id;
       
        $data->save();
        return redirect()->route('view-footer')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $editData = Footer::find($id);
        //dd($editData);
        return view('backend.footer.edit_footer',compact('editData'));
    }

    public function update(Request $request, $id){
        $data = Footer::find($id);
         $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->linkedin = $request->linkedin;
        $data->updated_by = Auth::user()->id;
       
        $data->save();
        return redirect()->route('view-footer')->with('success','Data updated successfully!');
    }

    public function delete($id){
        $footer = Footer::find($id);
        $footer->delete();
        return redirect()->route('view-footer')->with('success','Data deleted successfully!');
    }

    //Customer Information 
    public function contact(){
        $contacts = Contact::orderBy('id','desc')->get();
        return view('backend.contact.contact_info',compact('contacts'));
    }
    public function deleteConatct($id){
        $customer = Contact::find($id);
        $customer->delete();
        return redirect()->route('view-contact')->with('success','Data deleted successfully');
    }
}
