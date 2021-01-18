<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Model\Logo;

class LogoController extends Controller
{
    public function viewLogo(){
        $data['countLogo'] = Logo::count();
        //dd($data['countLogo']);
        $data['allData'] = Logo::all();
        return view('backend.logos.view_logo',$data);
    }

    public function addLogo(){
        // dd($kamal->toArray());
        return view('backend.logos.add_logo');
    }

    public function storeLogo(Request $request){
        $data = new Logo();
        $data->created_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/logo_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-logo')->with('success','Data inserted successfully!');
    }

    public function editLogo($id){
        $editData = Logo::find($id);
        //dd($editData);
        return view('backend.logos.edit_logo',compact('editData'));
    }

    public function updateLogo(Request $request, $id){
        $data = Logo::find($id);
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/logo_image/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/logo_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-logo')->with('success','Data updated successfully!');
    }

    public function deleteLogo($id){
        $logo = Logo::find($id);
        if(file_exists('/upload/logo_image/' . $logo->image) AND ! empty($logo->image)){
            @unlink(public_path('/upload/logo_image/'.$logo->image));
        }
        $logo->delete();
        return redirect()->route('view-logo')->with('success','Data deleted successfully!');
    }
}
