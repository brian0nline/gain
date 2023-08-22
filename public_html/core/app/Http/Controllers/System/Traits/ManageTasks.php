<?php

namespace App\Http\Controllers\System\Traits;

use App\Models\System\Config;
use App\Models\System\Jobs;
use App\Models\System\Tasks;
use App\Models\User;

trait ManageTasks
{
    public $workers = 0, $prize = 0;

    public function countries()
    {
        return (array)json_decode(
            file_get_contents(resource_path('js/country.json')),
            true
        );
    }

    public function category()
    {
        $cat = Config::where('name', 'categoryFields')->first();

        return explode(',', $cat->value);
    }

    public function updateUserBalance($admin = false)
    {
        $this->middleware('isDemo');

        $user = User::find(auth()->user()->id);

        $admin ?
            $user->increment(
                'balance',
                $this->calculateTaskPrize()
            )
            : $user->decrement(
            'balance',
            $this->calculateTaskPrize()
        );
    }

    public function calculateTaskPrize()
    {

        $adminFee = ($this->config()['tasksFee'] / 100) * ((int)$this->workers * (int)$this->prize);
        return ((int)$this->workers * (int)$this->prize) + $adminFee;
    }

    public function config()
    {
        $name = [];

        $config = Config::all();

        foreach ($config->toArray() as $value) {
            $name[$value['name']] = $value['value'];
        }
        return $name;
    }

    public function changeTaskStatus(Tasks $tasks, $status)
    {
        $this->middleware('isDemo');

        $tasks->update(['status' => $status]);

        if ($status == 4) {
            $this->checkUserBalance(true);
        }

        if (request()->has('r'))
            $tasks->update(['statusReason' => request('r')]);

        $notify[] = ['info', "The task " . bolToText(
                $tasks->status,
                false,
                'marked as pending',
                'approved',
                'marked as completed',
                'rejected') . "!"];

        return back()->withNotify($notify);
    }

    public function checkUserBalance()
    {
        $user = User::find(auth()->user()->id);
        return $user->balance > $this->calculateTaskPrize() ? true : false;
    }

    public function filterTask($keyword = '', $status = null, $user = false)
    {
        $query = Tasks::with('users');

        $query->where('title', 'like', "%$keyword%")
            ->orWhere('requirements', 'like', "%$keyword%")
            ->orWhere('countries', 'like', "%$keyword%")
            ->orWhere('category', 'like', "%$keyword%");

        if (!is_null($status)) {
            $query->where('status', '=', $status);
        }

        if ($user) {
            $query->where('user_id', '=', auth()->user()->id);
        }

        return $query->paginate(getPaginate());
    }

    public function approveJobs($job)
    {
        $this->middleware('isDemo');

        $status = Jobs::with('tasks')->findOrFail($job);

        $status->update(['status' => 1]);

        //update user balance
        User::where('id', $status->user_id)->increment('balance', $status->tasks->prize);

        $notify[] = ['info', 'The task approved'];

        return back()->withNotify($notify);
    }

    public function rejectJobs($job)
    {
        $this->middleware('isDemo');

        $status = Jobs::findOrFail($job);

        $status->update(['status' => 2]);

        $notify[] = ['info', 'The job rejected'];

        return back()->withNotify($notify);
    }
}
