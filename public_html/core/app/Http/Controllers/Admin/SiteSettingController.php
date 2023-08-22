<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;


class SiteSettingController extends Controller
{
    public function updateControl(Request $request, GeneralSetting $generalSetting)
    {
        $this->middleware('isDemo');
        
        $generalSetting::first()->update([
            'cur_text' => $request->cur_text,
            'cur_sym' => $request->cur_sym,
            'registration' => $request->registration ? 1 : 0,
            'force_ssl' => $request->force_ssl ? 1 : 0,
            'secure_password' => $request->secure_password ? 1 : 0,
            'ev' => $request->ev ? 1 : 0,
            'en' => $request->en ? 1 : 0,
            'sv' => $request->sv ? 1 : 0,
            'sn' => $request->sn ? 1 : 0,
            'withdraw_status' => $request->withdraw_status ? 1 : 0
        ]);

        $timezoneFile = config_path('timezone.php');
        $content = '<?php return[ "timezone" => "' . $request->updateTimezone . '" ]; ?>';
        file_put_contents($timezoneFile, $content);

        return redirect()->route('moder.setting.control')->withNotify([['success', 'Your data updated']]);

    }
}
