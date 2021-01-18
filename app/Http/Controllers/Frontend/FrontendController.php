<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Footer;
use App\Model\Mission;
use App\Model\Vision;
use App\Model\NewsEvent;
use App\Model\Service;
use App\Model\About;
use App\Model\Contact;
use Mail;

class FrontendController extends Controller
{
    public function index(){
    	$data['logo'] = Logo::first();
    	$data['sliders'] = Slider::all();
    	$data['contact'] = Footer::first();
    	$data['mission'] = Mission::first();
    	$data['vission'] = Vision::first();
    	$data['news'] = NewsEvent::orderBy('id','desc')->get();
    	$data['services'] = Service::all();
    	return view('frontend.layouts.home',$data);
    }

    public function aboutUs(){
    	$data['logo'] = Logo::first();
    	$data['contact'] = Footer::first();
    	$data['about'] = About::first();
    	return view('frontend.single_page.aboutus',$data);
    }

    public function contactUs(){
    	$data['logo'] = Logo::first();
    	$data['contact'] = Footer::first();
    	return view ('frontend.single_page.contact',$data);
    }

    public function newsDetails($id){
    	$data['logo'] = Logo::first();
    	$data['contact'] = Footer::first();
    	$data['news'] = NewsEvent::find($id);
    	//dd($news);
    	return view('frontend.single_page.news_details',$data);
    }

    public function mission(){
    	$data['logo'] = Logo::first();
    	$data['contact'] = Footer::first();
    	$data['mission'] = Mission::first();
    	//dd($news);
    	return view('frontend.single_page.mission',$data);
    }

    public function vision(){
    	$data['logo'] = Logo::first();
    	$data['contact'] = Footer::first();
    	$data['vission'] = Vision::first();
    	//dd($news);
    	return view('frontend.single_page.vision',$data);
    }

    public function newsEvent(){
    	$data['logo'] = Logo::first();
    	$data['contact'] = Footer::first();
    	$data['news'] = NewsEvent::orderBy('id','desc')->get();
    	//dd($news);
    	return view('frontend.single_page.news_event',$data);
    }

    public function store(Request $request){
    	$data = new Contact();
    	$data->name   = $request->name;
    	$data->email  = $request->email;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->message = $request->message;
    	$data->save();

    	$data = [
    		'name'   => $request->name,
    		'email'  => $request->email,
    		'mobile' => $request->mobile,
    		'address' => $request->address,
    		'message' => $request->message
    	];
    	Mail::send('frontend.emails.customer_info',$data, function($message) use ($data){
			$message->from('php7version@gmail.com','FullStackDeveloper');
			$message->to($data['email']);
			$message->subject('Thanks for contact-us');
    	});

    	return redirect()->back()->with('success','Your message successfully sent!');
    }
}
