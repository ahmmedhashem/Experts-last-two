<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use App\Models\Orginization;

class DashboardController extends Controller
{
    public function index(){
        // $areas = Category::with('users')->get();

        // $movies = Category::whereHas('users', function($q) {
        //     $q->select('name');
        // })->get();

        $data = [];
        $data['contries'] = Country::whereHas('users') -> with(['users' => function($q) {
            $q -> select('nationality_id');
        }]) ->  get();

        $data['areas'] = Category::whereHas('users') -> with(['users' => function($q) {
            $q -> select('category_id');
        }]) ->get();

        $data['category'] = User::select('category_id') ->selectRaw('count(category_id) as qty') -> groupBy('category_id') -> orderByRaw('COUNT(category_id) DESC') -> first();
        $category_id = $data['category'] -> category_id;
        $data['subCategories'] = Category::where('id',$category_id) -> with(['_childrens' => function($q) {
            $q -> limit(3) -> with(['userss' => function($x) {
                $x -> select('users.id');
            }]);
        }]) -> first();

        $data['national'] = Orginization::where('type',1) -> get();
        $data['regional'] = Orginization::where('type',2) -> get();
        $data['international'] = Orginization::where('type',3) -> get();




        // $data['subCategories']

        // return $data['subCategories'];
        return view('admin.dashboard',$data);
    }


}


