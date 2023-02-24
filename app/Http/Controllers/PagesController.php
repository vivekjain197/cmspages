<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Traits\UserTrait;
use Response;
use Auth;
use App\Models\User;
use App\Models\Pages;
class PagesController extends Controller
{
    //
    public function __construct(Request $request){
        $this->request = $request;
    }

	public function manage(Request $request){
		$data = array();
		$records = Pages::orderby('title','asc');
		$records = $records->get();
        $data['records'] = $records;
		return view('admin.Pages.manage', $data);
	}

    public function create(){
		$data = array();
		$Pages = new Pages();
		$data['Pages'] = $Pages;
        $dropdownpages = Pages::whereNull('parent_id')->with('subpages')->get();
        $data['dropdownpages'] = $dropdownpages;
		return view('admin.Pages.create', $data);
	}

    public function getTree($allpages,$temp){
        foreach ($allpages as $allpage) {
            $temp[$allpage->id] = $allpage->title;
            echo '<pre>';print_r($allpage->children);echo '</pre>';
            if ($allpage->children->isNotEmpty()) {
                echo '<pre>';print_r($allpage->children);echo '</pre>';
                $this->getTree($allpage->children, $temp);
            }
        }
        return $temp;
    }

	public function store(Request $request){
		$data = $request->input();
		$validator =  Validator::make($data, [
            'title' => 'required'
        ]);
		if ($validator->fails()) {
				return redirect('adminp/pages/create')
                        ->withErrors($validator)
                        ->withInput();
		}
		//$staticpage->update($request->all());
		$pages = Pages::create($request->all());
        $pages->slug = $this->createSlug($request->input('title'));
        $pages->save();
		return redirect('admin/pages/manage')->with('success','Record has been saved successfully.');
	}

    function createSlug($string)
    {
        $c = explode(' ', $string);
        $text = preg_replace('~[^\\pL\d]+~u', '-', $string);
        // trim
        $text = trim($text, '-');
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if(strlen($text) > 70) {
            $text = substr($text, 0, 70);
        }
        if(strlen($text) == (count($c) - 1)) {
            return time();
        }
        if (empty($text)) {
            return time();
        }
        return $text;
    }

	public function edit($id){
		$data = array();
		$cmspage = Pages::where('id',$id)->first();
        $dropdownpages = Pages::whereNull('parent_id')->with('subpages')->get();
        $data['dropdownpages'] = $dropdownpages;
		$data['cmspage'] = $cmspage;
		return view('admin.Pages.editcms', $data);
	}

	public function update(Request $request,$id){
		$data = $request->input();
        $staticpage = Pages::where('id',$id)->first();
		$validator =  Validator::make($data, [
            'title' => 'required',
        ]);
		if ($validator->fails()) {
				return redirect('admin/pages/edit')
                        ->withErrors($validator)
                        ->withInput();
		}
		$staticpage->update($request->all());
        $staticpage->save();
		return redirect('admin/pages/manage')->with('success','Record has been updated successfully.');
	}

    public function delete($id){
        $staticpage = Pages::where('id',$id)->first();
        $staticpage ->delete();
        return redirect('admin/pages/manage')->with('success','Record has been deleted successfully.');
    }

    public function home(){
        $data = array();
        $dropdownpages = $this->getmainmenu();
        $data['dropdownpages'] = $dropdownpages;
		return view('Pages.home', $data);
    }

    public function cmspage($slug){
        $slug_page = explode('/',$slug);
        $slug_val = $slug_page[count($slug_page)-1];
        $staticpage = Pages::where('slug',$slug_val)->first();
        //echo '<pre>';print_r($staticpage);echo '</pre>';exit;;
        $data['staticpage'] = $staticpage;

        $dropdownpages = $this->getmainmenu();
        $data['dropdownpages'] = $dropdownpages;
		return view('Pages.cmspage', $data);
    }

    public function getmainmenu(){
        return Pages::whereNull('parent_id')->with('subpages')->get();
    }
}
