<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Mission;

class MissionController extends Controller
{
    public function view(){
    	$data['CountMission'] = Mission::count();
        $data['allData'] = Mission::all();
        return view('backend.mission.view_mission',$data);
    }

    public function add(){
        // dd($kamal->toArray());
        return view('backend.mission.add_mission');
    }

    public function store(Request $request){
        $data = new Mission();
        $data->title = $request->title;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/mission_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-mission')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $editData = Mission::find($id);
        //dd($editData);
        return view('backend.mission.edit_mission',compact('editData'));
    }

    public function update(Request $request, $id){
        $data = Mission::find($id);
        $data->title = $request->title;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/mission_image/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/mission_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-mission')->with('success','Data updated successfully!');
    }

    public function delete($id){
        $mission = Mission::find($id);
        if(file_exists('/upload/mission_image/' . $mission->image) AND ! empty($mission->image)){
            unlink(public_path('/upload/mission_image/'.$mission->image));
        }
        $mission->delete();
        return redirect()->route('view-mission')->with('success','Data deleted successfully!');
    }
}
