<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Link;

class LinkController extends Controller
{
    public function index(){
        $links = Link::all();

        if($links == null)
            return view('link.error',array('error' => 'No url="'.$id.'" in database'));

        $data = array('links' => $links);
        return view('link.list',$data);
    }
    public function create(){
        return view('link.create');
    }
    public function store(Request $request){
        if($request->bigUrl == '')
            return view('link.error',array('error' => 'Wrong url'));
            
        $link = new Link;
        $link->bigUrl =  $request->bigUrl;

        $link->smallUrl = Link::calculateUrl();

        $link->save();
        
        return view('link.message',array('success'=> 'Succesfull create url="'.$link->smallUrl.'"'));
    }
    public function delete($id){
        $link = Link::where('smallUrl',$id);

        if($link == null)
            return view('link.error',array('error' => 'No url="'.$id.'" in database'));
        else
            $link->delete();

        return redirect("/link");
    }
    public function open($id){
        $link = Link::where('smallUrl',$id)->first();

        if($link != null)
            return redirect($link->bigUrl);
        else    
            return view('link.message',array('error' => 'No url="'.$id.'" in database'));
    }
}
