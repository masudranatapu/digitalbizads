<?php

namespace App\Http\Controllers\User;

use App\Plan;
use App\Theme;
use App\Medias;
use App\Gallery;
use App\Payment;
use App\Service;
use App\Setting;
use App\BusinessCard;
use App\BusinessHour;
use App\BusinessField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditCardController extends Controller
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

    // Edit Card
    public function editCard(Request $request, $id)
    {
        $themes = Theme::where('theme_description', 'vCard')->where('status', 1)->get();
        $business_card = BusinessCard::where('card_id', $id)->first();
        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($business_card->card_type == "store") {
                return redirect()->route('user.edit.store', $id);
            } else {
                $settings = Setting::where('status', 1)->first();
                $plan_details = Plan::where('plan_id', Auth::user()->plan_id)->first();

                return view('user.edit-cards.edit-card', compact('themes', 'business_card', 'settings', 'plan_details'));
            }
        }
    }

    // Update card
    public function updateBusinessCard(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        $cardId = uniqid();
        if ($request->link) {
            $personalized_link = $request->link;
        } else {
            $personalized_link = $cardId;
        }

        $card_url = strtolower(preg_replace('/\s+/', '-', $personalized_link));

        $current_card = BusinessCard::where('card_url', $card_url)->count();

        if ($current_card == 0 || $business_card->card_url == $request->link) {

            if ($business_card == null) {
                return view('errors.404');
            } else {
                if ($request->link) {
                    $personalized_link = $request->link;
                } else {
                    $personalized_link = $id;
                }
                if ($request->cover == null && $request->logo == null) {
                    BusinessCard::where('card_id', $id)->update([
                        'theme_id' => $request->theme_id,
                        'theme_color' => $request->card_color,
                        'card_lang' => $request->card_lang,
                        'card_url' => $personalized_link,
                        'title' => $request->title,
                        'sub_title' => $request->subtitle,
                        'description' => $request->description,
                    ]);
                    alert()->success(trans('Card details updated'));
                    return redirect()->route('user.edit.social.links', $id);
                } else if ($request->logo == null) {
                    $cover = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->cover->getClientOriginalName()) . '.' . $request->cover->extension();

                    $request->cover->move(public_path('backend/img/vCards'), $cover);

                    BusinessCard::where('card_id', $id)->update([
                        'cover' => $cover,
                        'theme_id' => $request->theme_id,
                        'theme_color' => $request->card_color,
                        'card_lang' => $request->card_lang,
                        'card_url' => $personalized_link,
                        'title' => $request->title,
                        'sub_title' => $request->subtitle,
                        'description' => $request->description,
                    ]);
                    alert()->success(trans('Card details updated'));
                    return redirect()->route('user.edit.social.links', $id);
                } else if ($request->cover == null) {
                    $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();

                    $request->logo->move(public_path('backend/img/vCards'), $logo);

                    BusinessCard::where('card_id', $id)->update([
                        'profile' => $logo,
                        'theme_id' => $request->theme_id,
                        'theme_color' => $request->card_color,
                        'card_lang' => $request->card_lang,
                        'card_url' => $personalized_link,
                        'title' => $request->title,
                        'sub_title' => $request->subtitle,
                        'description' => $request->description,
                    ]);
                    alert()->success(trans('Card details updated'));
                    return redirect()->route('user.edit.social.links', $id);
                } else if ($request->cover != null && $request->logo != null) {
                    $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();
                    $cover = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->cover->getClientOriginalName()) . '.' . $request->cover->extension();

                    $request->logo->move(public_path('backend/img/vCards'), $logo);
                    $request->cover->move(public_path('backend/img/vCards'), $cover);

                    BusinessCard::where('card_id', $id)->update([
                        'cover' => $cover,
                        'profile' => $logo,
                        'theme_id' => $request->theme_id,
                        'theme_color' => $request->card_color,
                        'card_lang' => $request->card_lang,
                        'card_url' => $personalized_link,
                        'title' => $request->title,
                        'sub_title' => $request->subtitle,
                        'description' => $request->description,
                    ]);
                    alert()->success(trans('Card details updated'));
                    return redirect()->route('user.edit.social.links', $id);
                }
            }
        } else {
            alert()->error(trans('Sorry, personalized link was already registered.'));
            return redirect()->route('user.edit.card', $id);
        }
    }

    // Social Links
    public function socialLinks(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $features = BusinessField::where('card_id', $id)->orderBy('id', 'asc')->get();
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);
            $settings = Setting::where('status', 1)->first();

            return view('user.edit-cards.edit-social-links', compact('plan_details', 'features', 'settings'));
        }
    }

    // Update social links
    public function updateSocialLinks(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->icon != null) {
                BusinessField::where('card_id', $id)->delete();
                $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                $plan_details = json_decode($plan->plan_details);

                if (count($request->icon) <= $plan_details->no_of_features) {
                    for ($i = 0; $i < count($request->icon); $i++) {
                        if (isset($request->icon[$i]) && isset($request->label[$i]) && isset($request->value[$i])) {


                            $customContent = $request->value[$i];


                            if ($request->type[$i] == 'youtube') {
                                $customContent = str_replace('https://www.youtube.com/watch?v=', '', $request->value[$i]);
                            }

                            if ($request->type[$i] == 'map') {
                                if (substr($request->value[$i], 0, 3) == 'pb=') {
                                    $customContent = $request->value[$i];
                                } else {
                                    $customContent = str_replace('<iframe src="', '', $request->value[$i]);
                                    $customContent = substr($customContent, 0, strpos($customContent, '" '));
                                    $customContent = str_replace('https://www.google.com/maps/embed?', '', $customContent);
                                }
                            }


                            $field = new BusinessField();
                            $field->card_id = $id;
                            $field->type = $request->type[$i];
                            $field->icon = $request->icon[$i];
                            $field->label = $request->label[$i];
                            $field->content = $customContent;
                            $field->position = $i + 1;
                            $field->save();
                        } else {
                            alert()->error(trans('Please add atleast one feature.'));
                            return redirect()->route('user.edit.social.links', $id);
                        }
                    }
                    alert()->success(trans('Feature details updated'));
                    return redirect()->route('user.edit.payment.links', $id);
                } else {
                    alert()->error(trans('You have reached plan features limited.'));
                    return redirect()->route('user.edit.social.links', $id);
                }
            } else {
                alert()->error(trans('Please add atleast one feature.'));
                return redirect()->route('user.edit.social.links', $id);
            }
        }
    }

    // Payment links
    public function paymentLinks(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $payments = Payment::where('card_id', $id)->orderBy('position', 'asc')->get();
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);
            $settings = Setting::where('status', 1)->first();

            return view('user.edit-cards.edit-payment-links', compact('payments', 'plan_details', 'settings'));
        }
    }

    // Update payments links
    public function updatePaymentLinks(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->icon != null) {
                Payment::where('card_id', $id)->delete();
                $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                $plan_details = json_decode($plan->plan_details);

                if (count($request->icon) <= $plan_details->no_of_features) {
                    for ($i = 0; $i < count($request->icon); $i++) {
                        if (isset($request->icon[$i]) && isset($request->label[$i]) && isset($request->value[$i])) {
                            $payment = new Payment();
                            $payment->card_id = $id;
                            $payment->type = $request->type[$i];
                            $payment->icon = $request->icon[$i];
                            $payment->label = $request->label[$i];
                            $payment->content = $request->value[$i];
                            $payment->position = $i + 1;
                            $payment->save();
                        } else {
                            Payment::where('card_id', $id)->delete();
                            alert()->error(trans('Please fill all required fields.'));
                            return redirect()->route('user.edit.payment.links', $id);
                        }
                    }
                    alert()->success(trans('Payment list details updated'));
                    return redirect()->route('user.edit.services', $id);
                } else {
                    alert()->error(trans('You have reached plan payment limit.'));
                    return redirect()->route('user.edit.payment.links', $id);
                }
            } else {
                Payment::where('card_id', $id)->delete();
                alert()->success(trans('Payment list details updated'));
                return redirect()->route('user.edit.services', $id);
            }
        }
    }

    // Services
    public function services(Request $request, $id)
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $services = Service::where('card_id', $id)->get();
            $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();

            return view('user.edit-cards.edit-services', compact('plan_details', 'services', 'media', 'settings'));
        }
    }

    // Update services
    public function updateServices(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if ($request->service_name != null) {
                if (count($request->service_name) <= $plan_details->no_of_services) {
                    Service::where('card_id', $id)->delete();
                    for ($i = 0; $i < count($request->service_name); $i++) {
                        $service = new Service();
                        $service->card_id = $id;
                        $service->service_name = $request->service_name[$i];
                        $service->service_image = $request->service_image[$i];
                        $service->service_description = $request->service_description[$i];
                        $service->enable_enquiry = $request->enquiry[$i];
                        $service->save();
                    }

                    alert()->success(trans('Services details updated'));
                    return redirect()->route('user.edit.galleries', $id);
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.edit.services', $id);
                }
            } else {
                Service::where('card_id', $id)->delete();
                alert()->success(trans('Services details updated'));
                return redirect()->route('user.edit.galleries', $id);
            }
        }
    }

    // Galleries
    public function galleries(Request $request, $id)
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $galleries = Gallery::where('card_id', $id)->get();
            $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();

            return view('user.edit-cards.edit-galleries', compact('plan_details', 'galleries', 'media', 'settings'));
        }
    }

    // Update Gallery Images
    public function updateGalleries(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if ($request->caption != null) {
                if (count($request->caption) <= $plan_details->no_of_galleries) {
                    Gallery::where('card_id', $id)->delete();
                    for ($i = 0; $i < count($request->caption); $i++) {
                        $gallery = new Gallery();
                        $gallery->card_id = $id;
                        $gallery->caption = $request->caption[$i];
                        $gallery->gallery_image = $request->gallery_image[$i];
                        $gallery->save();
                    }
                    alert()->success(trans('Gallery images updated'));
                    return redirect()->route('user.edit.business.hours', $id);
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.edit.galleries', $id);
                }
            } else {
                Gallery::where('card_id', $id)->delete();
                alert()->success(trans('Gallery images updated'));
                return redirect()->route('user.edit.business.hours', $id);
            }
        }
    }

    // Business Hours
    public function businessHours(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();
        $settings = Setting::where('status', 1)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $businessHour = BusinessHour::where('card_id', $id)->first();

            if ($businessHour == null) {
                $monday_open = "09:00";
                $monday_close = "18:30";
                $monday_status = "Opening";;
                $tues_open = "09:00";
                $tues_close = "18:30";
                $tues_status = "Opening";

                $wed_open = "09:00";
                $wed_close = "18:30";
                $wed_status = "Opening";

                $thurs_open = "09:00";
                $thurs_close = "18:30";
                $thurs_status = "Opening";

                $friday_open = "09:00";
                $friday_close = "18:30";
                $friday_status = "Opening";

                $saturday_open = "09:00";
                $saturday_close = "18:30";
                $saturday_status = "Opening";

                $sunday_open = "09:00";
                $sunday_close = "18:30";
                $sunday_status = "Opening";

                $business_hrs = array();
                $business_hrs['monday_open'] = $monday_open;
                $business_hrs['monday_close'] = $monday_close;
                $business_hrs['tuesday_open'] = $tues_open;
                $business_hrs['tuesday_close'] = $tues_close;
                $business_hrs['wednesday_open'] = $wed_open;
                $business_hrs['wednesday_close'] = $wed_close;
                $business_hrs['thursday_open'] = $thurs_open;
                $business_hrs['thursday_close'] = $thurs_close;
                $business_hrs['friday_open'] = $friday_open;
                $business_hrs['friday_close'] = $friday_close;
                $business_hrs['saturday_open'] = $saturday_open;
                $business_hrs['saturday_close'] = $saturday_close;
                $business_hrs['sunday_open'] = $sunday_open;
                $business_hrs['sunday_close'] = $sunday_close;
                $business_hrs['monday_status'] = $monday_status;
                $business_hrs['tues_status'] = $tues_status;
                $business_hrs['wed_status'] = $wed_status;
                $business_hrs['thurs_status'] = $thurs_status;
                $business_hrs['friday_status'] = $friday_status;
                $business_hrs['saturday_status'] = $saturday_status;
                $business_hrs['sunday_status'] = $sunday_status;

                return view('user.edit-cards.edit-business-hours', compact('businessHour', 'business_hrs', 'settings'));
            } else {
                $monday_open = "09:00";
                $monday_close = "18:30";
                $monday_status = "Opening";;
                $tues_open = "09:00";
                $tues_close = "18:30";
                $tues_status = "Opening";

                $wed_open = "09:00";
                $wed_close = "18:30";
                $wed_status = "Opening";

                $thurs_open = "09:00";
                $thurs_close = "18:30";
                $thurs_status = "Opening";

                $friday_open = "09:00";
                $friday_close = "18:30";
                $friday_status = "Opening";

                $saturday_open = "09:00";
                $saturday_close = "18:30";
                $saturday_status = "Opening";

                $sunday_open = "09:00";
                $sunday_close = "18:30";
                $sunday_status = "Opening";

                if ($businessHour->Monday != 'Closed') {
                    $monday = explode("-", $businessHour->Monday);
                    $monday_open = $monday[0];
                    $monday_close = $monday[1];
                } else {
                    $monday_status = "Closed";
                }

                if ($businessHour->Tuesday != 'Closed') {
                    $tuesday = explode("-", $businessHour->Tuesday);
                    $tues_open = $tuesday[0];
                    $tues_close = $tuesday[1];
                } else {
                    $tues_status = "Closed";
                }

                if ($businessHour->Wednesday != 'Closed') {
                    $wednesday = explode("-", $businessHour->Wednesday);
                    $wed_open = $wednesday[0];
                    $wed_close = $wednesday[1];
                } else {
                    $wed_status = "Closed";
                }

                if ($businessHour->Thursday != 'Closed') {
                    $thursday = explode("-", $businessHour->Thursday);
                    $thurs_open = $thursday[0];
                    $thurs_close = $thursday[1];
                } else {
                    $thurs_status = "Closed";
                }

                if ($businessHour->Friday != 'Closed') {
                    $friday = explode("-", $businessHour->Friday);
                    $friday_open = $friday[0];
                    $friday_close = $friday[1];
                } else {
                    $friday_status = "Closed";
                }

                if ($businessHour->Saturday != 'Closed') {
                    $saturday = explode("-", $businessHour->Saturday);
                    $saturday_open = $saturday[0];
                    $saturday_close = $saturday[1];
                } else {
                    $saturday_status = "Closed";
                }

                if ($businessHour->Sunday != 'Closed') {
                    $sunday = explode("-", $businessHour->Sunday);
                    $sunday_open = $sunday[0];
                    $sunday_close = $sunday[1];
                } else {
                    $sunday_status = "Closed";
                }

                $business_hrs = array();
                $business_hrs['monday_open'] = $monday_open;
                $business_hrs['monday_close'] = $monday_close;
                $business_hrs['tuesday_open'] = $tues_open;
                $business_hrs['tuesday_close'] = $tues_close;
                $business_hrs['wednesday_open'] = $wed_open;
                $business_hrs['wednesday_close'] = $wed_close;
                $business_hrs['thursday_open'] = $thurs_open;
                $business_hrs['thursday_close'] = $thurs_close;
                $business_hrs['friday_open'] = $friday_open;
                $business_hrs['friday_close'] = $friday_close;
                $business_hrs['saturday_open'] = $saturday_open;
                $business_hrs['saturday_close'] = $saturday_close;
                $business_hrs['sunday_open'] = $sunday_open;
                $business_hrs['sunday_close'] = $sunday_close;
                $business_hrs['monday_status'] = $monday_status;
                $business_hrs['tues_status'] = $tues_status;
                $business_hrs['wed_status'] = $wed_status;
                $business_hrs['thurs_status'] = $thurs_status;
                $business_hrs['friday_status'] = $friday_status;
                $business_hrs['saturday_status'] = $saturday_status;
                $business_hrs['sunday_status'] = $sunday_status;

                return view('user.edit-cards.edit-business-hours', compact('businessHour', 'business_hrs', 'settings'));
            }
        }
    }

    // Update business hours
    public function updateBusinessHours(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            BusinessHour::where('card_id', $id)->delete();

            if ($request->monday_closed == "on") {
                $monday = "Closed";
            } else {
                $monday = $request->monday_open . "-" . $request->monday_closing;
            }

            if ($request->tuesday_closed == "on") {
                $tuesday = "Closed";
            } else {
                $tuesday = $request->tuesday_open . "-" . $request->tuesday_closing;
            }

            if ($request->wednesday_closed == "on") {
                $wednesday = "Closed";
            } else {
                $wednesday = $request->wednesday_open . "-" . $request->wednesday_closing;
            }

            if ($request->thursday_closed == "on") {
                $thursday = "Closed";
            } else {
                $thursday = $request->thursday_open . "-" . $request->thursday_closing;
            }

            if ($request->friday_closed == "on") {
                $friday = "Closed";
            } else {
                $friday = $request->friday_open . "-" . $request->friday_closing;
            }

            if ($request->saturday_closed == "on") {
                $saturday = "Closed";
            } else {
                $saturday = $request->saturday_open . "-" . $request->saturday_closing;
            }

            if ($request->sunday_closed == "on") {
                $sunday = "Closed";
            } else {
                $sunday = $request->sunday_open . "-" . $request->sunday_closing;
            }

            if ($request->always_open == "on") {
                $always_open = "Opening";
            } else {
                $always_open = "Closed";
            }

            if ($request->is_display == "on") {
                $is_display = 0;
            } else {
                $is_display = 1;
            }

            $businessHours = new BusinessHour();
            $businessHours->card_id = $id;
            $businessHours->Monday = $monday;
            $businessHours->Tuesday = $tuesday;
            $businessHours->Wednesday = $wednesday;
            $businessHours->Thursday = $thursday;
            $businessHours->Friday = $friday;
            $businessHours->Saturday = $saturday;
            $businessHours->Sunday = $sunday;
            $businessHours->is_always_open = $always_open;
            $businessHours->is_display = $is_display;
            $businessHours->save();

            $activeCards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if ($activeCards < $plan_details->no_of_vcards) {
                BusinessCard::where('user_id', Auth::user()->user_id)->where('card_id', $id)->update([
                    'card_status' => 'activated',
                ]);
            }

            alert()->success(trans('Your business card is updated!'));
            return redirect()->route('user.cards');
        }
    }

    // Skip to clear business hours
    public function clearBusinessHours(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            BusinessHour::where('card_id', $id)->delete();

            $always_open = "Opening";
            $businessHours = new BusinessHour();
            $businessHours->card_id = $id;
            $businessHours->Monday = '';
            $businessHours->Tuesday = '';
            $businessHours->Wednesday = '';
            $businessHours->Thursday = '';
            $businessHours->Friday = '';
            $businessHours->Saturday = '';
            $businessHours->Sunday = '';
            $businessHours->is_always_open = $always_open;
            $businessHours->is_display = 1;
            $businessHours->save();
            alert()->success(trans('Your business card is updated!'));
            return redirect()->route('user.cards');
        }
    }
}
