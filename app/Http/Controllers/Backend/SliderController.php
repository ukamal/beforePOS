<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Slider;

class SliderController extends Controller
{
    public function viewSlider(){
        $data['allData'] = Slider::all();
        return view('backend.slider.view_slider',$data);
    }

    public function addSlider(){
        // dd($kamal->toArray());
        return view('backend.slider.add_slider');
    }

    public function storeSlider(Request $request){
        $data = new Slider();
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/slider_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-slider')->with('success','Data inserted successfully!');
    }

    public function editSlider($id){
        $editData = Slider::find($id);
        //dd($editData);
        return view('backend.slider.edit_slider',compact('editData'));
    }

    public function updateSlider(Request $request, $id){
        $data = Slider::find($id);
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/slider_image/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/upload/slider_image'),$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('view-slider')->with('success','Data updated successfully!');
    }

    public function deleteSlider($id){
        $slider = Slider::find($id);
        if(file_exists('/upload/slider_image/' . $slider->image) AND ! empty($slider->image)){
            unlink(public_path('/upload/slider_image/'.$slider->image));
        }
        $slider->delete();
        return redirect()->route('view-slider')->with('success','Data deleted successfully!');
    }
}
