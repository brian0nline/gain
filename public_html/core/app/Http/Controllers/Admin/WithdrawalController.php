<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function pending()
    {
        $pageTitle = 'Pending Withdrawals';
        $withdrawals = Withdrawal::pending()->with(['user', 'method'])->orderBy('id', 'desc')->paginate(getPaginate());
        $emptyMessage = 'No withdrawal found';
        return view('admin.withdraw.withdrawals', compact('pageTitle', 'withdrawals', 'emptyMessage'));
    }


    public function log()
    {
        $pageTitle = 'Withdrawals Log';
        $withdrawals = Withdrawal::where('status', '!=', 0)->with(['user', 'method'])->orderBy('id', 'desc')->paginate(getPaginate());
        $emptyMessage = 'No withdrawal history';
        return view('admin.withdraw.withdrawals', compact('pageTitle', 'withdrawals', 'emptyMessage'));
    }


    public function details($id)
    {
        $general = GeneralSetting::first();
        $withdrawal = Withdrawal::where('id', $id)->where('status', '!=', 0)->with(['user', 'method'])->firstOrFail();
        $pageTitle = $withdrawal->user->username . ' Withdraw Requested ' . showAmount($withdrawal->amount) . ' ' . $general->cur_text;
        $details = $withdrawal->withdraw_information ? json_encode($withdrawal->withdraw_information) : null;


        $methodImage = getImage(imagePath()['withdraw']['method']['path'] . '/' . $withdrawal->method->image, '800x800');

        return view('admin.withdraw.detail', compact('pageTitle', 'withdrawal', 'details', 'methodImage'));
    }

    public function approve(Request $request)
    {
        $this->middleware('isDemo');

        $request->validate(['id' => 'required|integer']);
        $withdraw = Withdrawal::where('id', $request->id)->where('status', 2)->with('user')->firstOrFail();
        $withdraw->status = 1;
        $withdraw->admin_feedback = $request->details;
        $withdraw->save();

        $general = GeneralSetting::first();
        notify($withdraw->user, 'WITHDRAW_APPROVE', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => showAmount($withdraw->final_amount),
            'amount' => showAmount($withdraw->amount),
            'charge' => showAmount($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => showAmount($withdraw->rate),
            'trx' => $withdraw->trx,
            'admin_details' => $request->details
        ]);

        $notify[] = ['success', 'Withdrawal marked as approved.'];
        return redirect()->route('moder.withdraw.pending')->withNotify($notify);
    }


    public function reject(Request $request)
    {
        $this->middleware('isDemo');

        $general = GeneralSetting::first();
        $request->validate(['id' => 'required|integer']);
        $withdraw = Withdrawal::where('id', $request->id)->where('status', 2)->firstOrFail();

        $withdraw->status = 3;
        $withdraw->admin_feedback = $request->details;
        $withdraw->save();

        $user = User::find($withdraw->user_id);
        $user->balance += $withdraw->amount;
        $user->save();


        $transaction = new Transaction();
        $transaction->user_id = $withdraw->user_id;
        $transaction->amount = $withdraw->amount;
        $transaction->post_balance = $user->balance;
        $transaction->charge = 0;
        $transaction->trx_type = '+';
        $transaction->details = showAmount($withdraw->amount) . ' ' . $general->cur_text . ' Refunded from withdrawal rejection';
        $transaction->trx = $withdraw->trx;
        $transaction->save();


        notify($user, 'WITHDRAW_REJECT', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => showAmount($withdraw->final_amount),
            'amount' => showAmount($withdraw->amount),
            'charge' => showAmount($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => showAmount($withdraw->rate),
            'trx' => $withdraw->trx,
            'post_balance' => showAmount($user->balance),
            'admin_details' => $request->details
        ]);

        $notify[] = ['success', 'Withdrawal has been rejected.'];
        return redirect()->route('moder.withdraw.pending')->withNotify($notify);
    }

}
