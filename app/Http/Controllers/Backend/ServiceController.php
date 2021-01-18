<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Service;

class ServiceController extends Controller
{
    public function view(){
        $data['allData'] = Service::all();
        return view('backend.service.view_service',$data);
    }

    public function add(){
        // dd($kamal->toArray());
        return view('backend.service.add_service');
    }

    public function store(Request $request){
        $data = new Service();
        $data->short_title = $request->short_title;
        $data->peragraph = $request->peragraph;
        $data->created_by = Auth::user()->id;
       
        $data->save();
        return redirect()->route('view-service')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $editData = Service::find($id);
        //dd($editData);
        return view('backend.service.edit_service',compact('editData'));
    }

    public function update(Request $request, $id){
        $data = Service::find($id);
        $data->short_title = $request->short_title;
        $data->peragraph = $request->peragraph;
        $data->updated_by = Auth::user()->id;
       
        $data->save();
        return redirect()->route('view-service')->with('success','Data updated successfully!');
    }

    public function delete($id){
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('view-service')->with('success','Data deleted successfully!');
    }
}
