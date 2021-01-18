<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\NewsEvent;

class NewsEventController extends Controller
{
        public function view(){
        $data['allData'] = NewsEvent::all();
        return view('backend.newsEvent.view_newsevent',$data);
    }

    public function add(){
        // dd($kamal->toArray());
        return view('backend.newsEvent.add_newsevent');
    }

    public function store(Request $request){
        $data 			   = new NewsEvent();
        $data->date 	   = date('Y-m-d',strtotime($request->date));
        $data->short_title = $request->short_title;
        $data->long_title  = $request->long_title;
        $data->created_by  = Auth::user()->id;
        if ($request->file('image')) {
            $file 	  = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/newsevent_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-newsevent')->with('success','Data inserted successfully!');
    }

    public function edit($id){
        $editData = NewsEvent::find($id);
        //dd($editData);
        return view('backend.newsEvent.edit_newsevent',compact('editData'));
    }

    public function update(Request $request, $id){
        $data = NewsEvent::find($id);
        $data->date 	   = date('Y-m-d',strtotime($request->date));
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/newsevent_image/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/newsevent_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-newsevent')->with('success','Data updated successfully!');
    }

    public function delete($id){
        $newsevent = NewsEvent::find($id);
        if(file_exists('/upload/newsevent_image/' . $newsevent->image) AND !empty($newsevent->image)){
            unlink('/upload/newsevent_image/' . $newsevent->image);
        }
        $newsevent->delete();
        return redirect()->route('view-newsevent')->with('success','Data deleted successfully!');
    }
}
