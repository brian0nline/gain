<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;
use App\Models\Admin\LeaderBoard;

class SiteController extends Controller
{

    public function notifications()
    {
        $notifications = AdminNotification::orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        return view('admin.notifications', compact('notifications'));
    }

    public function notificationRead($id)
    {
        $notification = AdminNotification::findOrFail($id);
        $notification->read_status = 1;
        $notification->save();
        return redirect($notification->click_url);
    }

    public function notificationReadAll()
    {
        AdminNotification::where('read_status', 0)->update([
            'read_status' => 1
        ]);
        $notify[] = ['success', 'Notifications read successfully'];
        return back()->withNotify($notify);
    }

    public function deleteNotify($id)
    {
        AdminNotification::where('id', $id)->delete();
        $notify[] = ['success', 'Notifications deleted successfully'];
        return back()->withNotify($notify);
    }



    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

    /**
     * @param null $size
     */
    public function placeholderImage($size = '')
    {
        $imgWidth = explode('x', $size)[0];
        $imgHeight = explode('x', $size)[1];
        $text = $imgWidth . '×' . $imgHeight;
        $fontFile = dirname(__DIR__, 4) . '/asset/fonts/Ubuntu/Ubuntu-Bold.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if ($imgHeight < 100 && $fontSize > 30) {
            $fontSize = 30;
        }

        $image = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX = ($imgWidth - $textWidth) / 2;
        $textY = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }
    
    
    public function showLeaderboard(){
        
        return view('leaderboard', [
            'levels' => LeaderBoard::orderBy('rewards', 'desc')->get(),
            ]);
    }
   
}
