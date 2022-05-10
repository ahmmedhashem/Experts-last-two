<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use DB;
use Illuminate\Support\Str;

class ExpertsDataController extends Controller
{
    public function index(){

        //$activities = Activitie::with('criteria') -> orderBy('id','DESC') -> paginate(PAGINATION_COUNT);
        $categories = Category::maincategories() -> get();
        // return $categories;
        return view('admin.area-of-expirtes.index', compact('categories'));
    }

    public function getExpertByArea($id) {
        $caregory = Category::find($id);
        if(!$caregory){
            return redirect()->route('admin.experts.data')->with(['error' => __('Something went Wrong')]);
        }

        $experts = User::with('nationality','emirtes') -> select('id','name','email','phone','nationality_id','emirate_id') -> where('category_id',$id) -> paginate(PAGINATION_COUNT);

        return view('admin.area-of-expirtes.experts', compact('experts'));

    }

    public function getExpertData($id) {
        $expert = User::with('nationality','emirtes','langauges','educations','category','categories','orginizations','consultancies','publications','committes') -> where('id',$id) -> first();
        // return $expert;
        return view('admin.area-of-expirtes.cv',compact('expert'));
    }

    public function closecv(){
        return view('admin.area-of-expirtes.index')->with(['success']);
    }

}
