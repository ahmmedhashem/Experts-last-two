<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Langauge;
use App\Models\User;
use App\Models\Category;
use App\Models\Emirtes;

use App\Models\Education;
use App\Models\Orginization;
use App\Models\Consultancie;
use App\Models\Publication;
use App\Models\Committe;
use App\Models\Policie;

use App\Http\Requests\Site\ExpertsDataRequest;
use App\Http\Requests\Site\DataEduRequest;
use App\Http\Requests\Site\DataConRequest;


class HomeController extends Controller
{


    public function createStepOne(Request $request) {
        $data = [];
        $data['nationalities'] = Country::select('id','nationality')->get();
        $data['langauges'] = Langauge::select('id','name')->get();
        $data['emirtes'] = Emirtes::select('id','name')->get();

        $user = $request->session()->get('user');
        return view('site.home.data-step-one',$data,compact('user'));
    }

    public function storeStepOne(ExpertsDataRequest $request) {

        if(empty($request->session()->get('user'))){
            $user = new User();
            $user -> fill($request->toArray());
            $request->session()->put('user', $user);
        }else{
            $user = $request->session()->get('user');
            $user->fill($request->toArray());
            $request->session()->put('user', $user);
        }


        return redirect()->route('create.data.step.two');
    }

    public function createStepTwo(Request $request)
    {
        $data = [];
        $data['countries'] = Country::select('id','name')->get();
        $data['categories'] = Category::select('id','name') -> where('parent_id',NULL)->get();
        $user = $request->session()->get('user');

        $education = $request->session()->get('education');



        return view('site.home.data-step-two',$data,compact('user','education'));
    }

    public function storeStepTwo(DataEduRequest $request)
    {
        $user = $request->session()->get('user');
        $user->fill($request->toArray());
        $request->session()->put('user', $user);

        if(empty($request->session()->get('education'))){
            $education = new Education();
            $education -> fill($request->toArray());
            $request->session()->put('education', $education);
        }else{
            $education = $request->session()->get('education');
            $education->fill($request->toArray());
            $request->session()->put('education', $education);
        }

        return redirect()->route('create.data.step.three');
    }

    public function createStepThree(Request $request)
    {

        $consultances = $request->session()->get('consultances');
        $policies = Policie::find(1);
        return view('site.home.data-step-three',compact('consultances','policies'));
    }

    public function storeStepThree(DataConRequest $request)
    {
        try {



            $user = $request->session()->get('user');
            $education = $request->session()->get('education');

            if(empty($request->session()->get('consultances'))){
                $consultances = new Consultancie();
                $consultances -> fill($request->toArray());
                $request->session()->put('consultances', $consultances);
            }else{
                $consultances = $request->session()->get('consultances');
                $consultances->fill($request->toArray());
                $request->session()->put('consultances', $consultances);
            }



            $user_data = User::create([
                'emirate_id' => $user->emirate_id,
                'nationality_id' => $user->nationality_id,
                'category_id' => $education->category_id,
                'name' => $user->name,
                'type' => $user->type,
                'email' => $user->email,
                'gender' => $user->gender,
                'date_of_birth' => $user->date_of_birth,
                'phone' => $user->phone,
                'alt_phone' => $user->alt_phone,
                'current_location' => $user->current_location,
                'institution' => $user->institution,
                'willing_to_study' => $user->willing_to_study,
                'willing_to_consultancy' => $user->willing_to_consultancy,
                'available_to_request' => $user->available_to_request,
            ]);


            //save expert education
            $user_data->educations()->create([
                'user_id' => $user_data->id,
                'country_id' => $education->country_id,
                'name' => $education->edu_name,
                'start_date' => $education->start_date,
                'end_date' => $education->end_date,
            ]);

            //save expert orginizations
            $user_data->orginizations()->create([
                'user_id' => $user_data->id,
                'type' => $education->org_type,
                'name' => $education->org_name,
                'desc' => $education->org_desc,
                'start_date' => $education->org_start_date,
                'end_date' => $education->org_end_date,
            ]);

            //save expert consultancies
            $user_data->consultancies()->create([
                'user_id' => $user_data->id,
                'name' => $consultances->con_name,
                'desc' => $consultances->con_desc,
                'start_date' => $consultances->con_start_date,
                'end_date' => $consultances->con_end_date,
            ]);

            //save expert publications
            $user_data->publications()->create([
                'user_id' => $user_data->id,
                'title' => $consultances->title,
                'jornal' => $consultances->journal,
                'year' => $consultances->pub_year,
            ]);

            //save expert committees
            $user_data->committes()->create([
                'user_id' => $user_data->id,
                'orginization' => $consultances->com_organisation,
                'desc' => $consultances->com_desc,
                'start_date' => $consultances->com_start_date,
                'end_date' => $consultances->com_end_date,
            ]);

            // //save expert area of experts
            $user_data->categories()->attach($user -> categories);

            // //save expert langauges
            $user_data->langauges()->attach($user -> langauges);

            $user_data->save();

            $request->session()->forget('user');
            $request->session()->forget('education');
            $request->session()->forget('consultances');

            return view('site.success');

            //return redirect()->route('admin.products')->with(['success' => __('admin/product.added successfully')]);
        } catch (\Exception $ex) {

            return 'somthing went wrong';
            //return redirect()->route('admin.products')->with(['error' => __('admin/product.something went wrong')]);
        }
    }

    public function getSubCats(Request $request) {
        $data['categories'] = Category::select('id','name') -> where('parent_id',$request ->main_cat)->get();
        return response()->json($data);
    }


}
