<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policie;

class TermsController extends Controller
{
    public function index() {
        $policies = Policie::find(1);
        return view('admin.terms.edit',compact('policies'));
    }

    public function update (Request $request,$id) {
        try {
            $policies = Policie::find(1);
            if(!$policies){
                return redirect()->route('admin.dashboard')->with(['error' => 'Something went wrong']);
            }
            // return $request;
            $policies->update($request->except('_token'));
            return redirect()->route('admin.terms')->with(['success' => 'Policies updated successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.dashboard')->with(['error' => 'Something went wrong']);
        }

    }
}
