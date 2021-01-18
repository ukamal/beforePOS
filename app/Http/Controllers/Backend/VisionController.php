<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Vision;

class VisionController extends Controller
{
        public function view(){
    	$data['CountVision'] = Vision::count();
        $data['allData'] = Vision::all();
        return view('backend.Vision.view_vision',$data);
    }

    public function add(){
        // dd($kamal->toArray());
        return view('backend.Vision.add_vision');
    }

    public function store(Request $request){
        $data = new Vision();
        $data->title = $request->title;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/vision_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-vision')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $editData = Vision::find($id);
        //dd($editData);
        return view('backend.Vision.edit_vision',compact('editData'));
    }

    public function update(Request $request, $id){
        $data = Vision::find($id);
        $data->title = $request->title;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/vision_image/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/vision_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-vision')->with('success','Data updated successfully!');
    }

    public function delete($id){
        $Vision = Vision::find($id);
        if(file_exists('/upload/vision_image/' . $Vision->image) AND ! empty($Vision->image)){
            unlink(public_path('/upload/vision_image/'.$Vision->image));
        }
        $Vision->delete();
        return redirect()->route('view-vision')->with('success','Data deleted successfully!');
    }
}
