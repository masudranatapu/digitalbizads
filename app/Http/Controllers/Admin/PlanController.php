<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // All Plans
    public function plans()
    {
        $plans = Plan::get();
        $currencies = Setting::where('status', 1)->get();
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();
        return view('admin.plans.plans', compact('plans', 'currencies', 'settings', 'config'));
    }

    // Add Plan
    public function addPlan()
    {
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();
        return view('admin.plans.add-plan', compact('settings', 'config'));
    }

    // Save Plan
    public function savePlan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'plan_name' => 'required',
            'plan_description' => 'required',
            'plan_price' => 'required',
            'no_of_vcards' => 'required',
            'no_of_services' => 'required',
            // 'no_of_galleries' => 'required',
            // 'no_of_features' => 'required',
            // 'no_of_payments' => 'required'
            'features' => 'sometimes'
        ]);


        if ($request->personalized_link == null) {
            $personalized_link = 0;
        } else {
            $personalized_link = 1;
        }

        if ($request->hide_branding == null) {
            $hide_branding = 0;
        } else {
            $hide_branding = 1;
        }

        if ($request->is_private == null) {
            $is_private = 0;
        } else {
            $is_private = 1;
        }

        if ($request->free_setup == null) {
            $free_setup = 0;
        } else {
            $free_setup = 1;
        }

        if ($request->free_support == null) {
            $free_support = 0;
        } else {
            $free_support = 1;
        }

        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }
        if ($request->is_whatsapp_store == null) {
            $whatsappStore = 0;
        } else {
            $whatsappStore = 1;
        }

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $plan = new Plan;
        $plan->plan_id = uniqid();
        $plan->plan_name = $request->plan_name;
        $plan->plan_description = $request->plan_description;
        $plan->recommended = $recommended;
        $plan->plan_price = $request->plan_price;
        $plan->validity = $request->validity;
        $plan->no_of_vcards = $request->no_of_vcards;
        $plan->no_of_services = $request->no_of_services;
        $plan->no_of_galleries = $request->no_of_galleries ?? 0;
        $plan->no_of_features = $request->no_of_features ?? 0;
        $plan->no_of_payments = $request->no_of_payments ?? 0;
        $plan->personalized_link = $personalized_link;
        $plan->hide_branding = $hide_branding;
        $plan->free_setup = $free_setup;
        $plan->free_support = $free_support;
        $plan->is_whatsapp_store = $whatsappStore;
        $plan->is_private = $is_private;
        if (isset($request->features) && count($request->features) > 0) {

            $plan->fearures = json_encode($request->features);
        } else {
            $plan->fearures = null;
        }


        $plan->save();
        alert()->success(trans('New Plan Created Successfully!'));
        return redirect()->route('admin.add.plan');
    }

    // Edit Plan
    public function editPlan(Request $request, $id)
    {
        $plan_id = $request->id;
        $plan_details = Plan::where('plan_id', $plan_id)->first();
        $settings = Setting::where('status', 1)->first();
        if ($plan_details == null) {
            return view('errors.404');
        } else {
            return view('admin.plans.edit-plan', compact('plan_details', 'settings'));
        }
    }

    // Update Plan
    public function updatePlan(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'plan_id' => 'required',
            'plan_name' => 'required',
            'plan_description' => 'required',
            'plan_price' => 'required',
            'no_of_vcards' => 'required',
            'no_of_services' => 'required',
            // 'no_of_galleries' => 'required',
            // 'no_of_features' => 'required',
            // 'no_of_payments' => 'required'
            'features' => 'sometimes'

        ]);

        if ($validator->fails()) {

            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        DB::beginTransaction();
        try {

            if ($request->personalized_link == 'on') {
                $personalized_link = 1;
            } else {
                $personalized_link = 0;
            }

            if ($request->hide_branding == 'on') {
                $hide_branding = 1;
            } else {
                $hide_branding = 0;
            }


            if ($request->is_private == null) {
                $is_private = 0;
            } else {
                $is_private = 1;
            }

            if ($request->free_setup == null) {
                $free_setup = 0;
            } else {
                $free_setup = 1;
            }

            if ($request->free_support == null) {
                $free_support = 0;
            } else {
                $free_support = 1;
            }

            if ($request->recommended == null) {
                $recommended = 0;
            } else {
                $recommended = 1;
            }

            if ($request->is_whatsapp_store == null) {
                $whatsappStore = 0;
            } else {
                $whatsappStore = 1;
            }


            $plan = Plan::where('plan_id', $request->plan_id)->first();
            $plan->plan_name = $request->plan_name;
            $plan->plan_description = $request->plan_description;
            $plan->recommended = $recommended;
            $plan->plan_price = $request->plan_price;
            $plan->validity = $request->validity;
            $plan->no_of_vcards = $request->no_of_vcards;
            $plan->no_of_services = $request->no_of_services;
            $plan->no_of_galleries = $request->no_of_galleries ?? 0;
            // $plan->no_of_features = $request->no_of_features ?? 0;
            // $plan->no_of_payments = $request->no_of_payments ?? 0;
            $plan->personalized_link = $personalized_link;
            $plan->hide_branding = $hide_branding;
            $plan->free_setup = $free_setup;
            $plan->free_support = $free_support;
            $plan->is_whatsapp_store = $whatsappStore;
            $plan->is_private = $is_private;
            if (isset($request->features) && count($request->features) > 0) {

                $plan->fearures = json_encode($request->features);
            } else {
                $plan->fearures = null;
            }





            return redirect()->route('admin.edit.plan', $request->plan_id);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            alert()->error(trans('Plan Details not Updated!'));

            return redirect()->route('admin.edit.plan', $request->plan_id);
        }
        DB::commit();
        alert()->success(trans('Plan Details Updated Successfully!'));

        return redirect()->route('admin.edit.plan', $request->plan_id);
    }
    // Delete Plan
    public function deletePlan(Request $request)
    {
        $plan_details = Plan::where('plan_id', $request->query('id'))->first();
        if ($plan_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        Plan::where('plan_id', $request->query('id'))->update(['status' => $status]);
        alert()->success(trans('Plan Status Updated Successfully!'));
        return redirect()->route('admin.plans');
    }
}
