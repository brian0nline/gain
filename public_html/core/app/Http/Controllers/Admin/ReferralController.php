<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Referral;
use App\Models\Setting;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        $pageTitle = 'Manage Referral';
        $trans = Referral::get();
        return view('admin.referral.index', compact('pageTitle', 'trans'));
    }

    public function store(Request $request)
    {
        $this->middleware('isDemo');

        $this->validate($request, [
            'level*' => 'required|integer|min:1',
            'required*' => 'required|string|min:1',
            'percent*' => 'required|numeric',
            'commission_type' => 'required',
        ]);
        Referral::where('commission_type', $request->commission_type)->delete();
        for ($a = 0; $a < count($request->level); $a++) {
            Referral::create([
                'level' => $request->level[$a],
                'required' => $request->required[$a],
                'percent' => $request->percent[$a],
                'commission_type' => $request->commission_type,
                'status' => 1,
            ]);
        }
        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);
    }

    public function referralStatusUpdate($type)
    {
        $general_setting = GeneralSetting::first();
        if (@$general_setting->$type == 1) {
            @$general_setting->$type = 0;
            $general_setting->save();
        } elseif (@$general_setting->$type == 0) {
            @$general_setting->$type = 1;
            $general_setting->save();
        } else {
            $notify[] = ['error', 'Something Wrong'];
            return back()->withNotify($notify);
        }
        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }

    public function referralPage()
    {
        return view('admin.referral.customize');
    }

    public function updateReferralPage(Request $request)
    {
        $this->middleware('isDemo');

        $request->validate([
            'contents' => 'required|string|min:1|max:191197',
        ]);

        Setting::where('name', 'ref_page_content')
            ->update(['value' => $request->contents]);

        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }
}
