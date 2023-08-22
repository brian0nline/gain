<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EmailTemplate;

class UpdateEmailController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject'=>'required'
        ]);
        
        $status = $request->has('email_status') ? 1 : 0;
        
        
        EmailTemplate::where('id', $id)->update([
            'subj' => $request->input('subject'),
            'email_body' => $request->input('email_body'),
            'email_status' => $status,
        ]);
        
         $notify[] = ['success', 'Email updated successfully'];
        return back()->withNotify($notify);
    }
}
