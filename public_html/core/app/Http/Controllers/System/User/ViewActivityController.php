<?php

namespace App\Http\Controllers\System\User;


use App\Http\Controllers\Controller;
use App\Models\System\Jobs;
use App\Models\System\OfferLog;
use App\Models\System\Tasks;
use Illuminate\Http\Request;

class ViewActivityController extends Controller
{

    public function employersTasks(Request $request, Tasks $tasks)
    {
        $userTasks = $tasks->with('jobs')->select('*')
            ->where('user_id', auth()->user()->id);

        if ($request->has('search')) {
            $userTasks->where('title', 'like', "%$request->search%");
        }

        return view(
            'system.user.tasks.list',
            ['tasks' => $userTasks->paginate(getPaginate(15))]
        );
    }

    public function viewTasks($task)
    {
        return view('system.user.tasks.view', [
            'task' => Tasks::with('jobs')->findOrFail($task)
        ]);
    }

    public function analysisTasks($task)
    {
        return view('system.user.tasks.analysis', [
            'task' => Tasks::with('jobs')->findOrFail($task)
        ]);
    }

    public function analysisTasksByStatus($task, $status)
    {
        return view('system.user.tasks.analysis', [
            'task' => Tasks::with('jobs')->findOrFail($task),
            'status' => $status,
        ]);
    }

    public function viewUserJobs()
    {
        return view('system.user.jobs.worker-list', [
            'jobs' => Jobs::with('tasks')->where('user_id', auth()->user()->id)->paginate(getPaginate()),
        ]);
    }

    public function UserJobsByStatus($status)
    {
        return view('system.user.jobs.worker-list', [
            'jobs' => Jobs::with('tasks')->where('status', $status)->paginate(getPaginate()),
        ]);
    }

    public function userOfferReports($status = 1)
    {
        if ($status == 1 || $status == 0) {
            return view('system.user.offer.reports', [
                'offers' => OfferLog::where('user_id', userInfo()->id)
                    ->where('isPaid', $status)
                    ->orderBy('updated_at', 'desc')
                    ->get(),
            ])->render();
        }
    }
    
    public function checkUserNotify(){
        return response()->json(true);
    }
    
    public function updateUserNotify(){
        return true;
    }
}   
