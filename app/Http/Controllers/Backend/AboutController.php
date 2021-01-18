<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\About;

class AboutController extends Controller
{
    public function view(){
    	$data['AboutCount'] = About::count();
    	//dd($data['AboutCount']);
    	$data['allData'] = About::all();
        return view('backend.about.view_about',$data);
    }

    public function add(){
        return view('backend.about.add_about');
    }

    public function store(Request $request){
        $data = new About();
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('view-about')->with('success','Description added successfully!');
    }

    public function edit($id){
        $editData = About::find($id);
        //dd($editData);
        return view('backend.about.edit_about',compact('editData'));
    }

    public function update(Request $request, $id){
    	$updateData = About::find($id);
        $updateData->description = $request->description;
        $updateData->updated_by = Auth::user()->id;
        $updateData->save();
        return redirect()->route('view-about')->with('success','Data updated successfully!');
    }

    public function delete(Request $request, $id){
        $deleteData = About::find($id);
        $deleteData->delete();
        return redirect()->route('view-about')->with('success','Data deleted successfully!');
    }
}
