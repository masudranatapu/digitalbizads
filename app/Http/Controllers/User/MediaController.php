<?php

namespace App\Http\Controllers\User;

use App\Plan;
use App\User;
use App\Medias;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
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

    // All user media
    public function media()
    {
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();
        $plan = User::where('user_id', Auth::user()->user_id)->first();

        if ($active_plan != null) {
            $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->paginate(8);
            $settings = Setting::where('status', 1)->first();

            return view('user.media.index', compact('media', 'settings'));
        } else {
            return redirect()->route('user.plans');
        }
    }

    // Add media
    public function addMedia()
    {
        $settings = Setting::where('status', 1)->first();

        return view('user.media.add', compact('settings'));
    }

    // Upload media
    public function uploadMedia(Request $request)
    {
        $image = $request->file('file');

        $uniqid = uniqid();
        $imageName = Auth::user()->user_id . '-' . $uniqid . '.' . $image->extension();
        $media_url = "images/" . Auth::user()->user_id . '-' . $uniqid . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $card = new Medias();
        $card->media_id = $uniqid;
        $card->user_id = Auth::user()->user_id;
        $card->media_name = $image->getClientOriginalName();
        $card->media_url = $media_url;
        $card->save();

        return response()->json(['success' => $imageName]);
    }

    public function deleteMedia(Request $request, $mid)
    {
        $media_data = Medias::where('user_id', Auth::user()->user_id)->where('media_id', $mid)->first();
        if ($media_data != null) {
            Medias::where('user_id', Auth::user()->user_id)->where('media_id', $mid)->delete();

            alert()->success(trans('Media file removed!'));
            return redirect()->route('user.media');
        }
    }

    public function multipleImages(Request $request)
    {
        $image = $request->file('file');

        $uniqid = uniqid();

        $imageName = Auth::user()->user_id . '-' . $uniqid . '.' . $image->extension();
        $media_url = "images/" . Auth::user()->user_id . '-' . $uniqid . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $card = new Medias();
        $card->media_id = $uniqid;
        $card->user_id = Auth::user()->user_id;
        $card->media_name = $image->getClientOriginalName();
        $card->media_url = $media_url;
        $card->save();

        return response()->json(['image_url' => $imageName]);
    }
}
