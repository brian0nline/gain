<?php

namespace App\Http\Controllers\System\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Traits\ManageTasks;
use App\Models\System\Jobs;
use App\Models\System\Tasks;

class TasksController extends Controller
{
    use ManageTasks;

    protected $task;

    public function __construct(Tasks $tasks)
    {
        $this->task = $tasks;
    }

    public function tasksByStatus($status)
    {

        $task = $this->task->with('users')->status($status)->paginate(getPaginate());
        return view('system.admin.tasks.list', [
            'tasks' => $task,
        ]);
    }


    public function viewTasks($task)
    {
        return view('system.admin.tasks.view', [
            'task' => Tasks::with('users')->findOrFail($task),
        ]);
    }

    public function searchTasks()
    {
        if (request()->has('search')) {
            if (request()->has('status'))
                return back()->with(
                    'filter', $this->filterTask(request('search'), request('status'))
                );

            return back()->with(
                'filter', $this->filterTask(request('search'))
            );
        }
    }

    public function analysisTasks($task, $status = 0)
    {
        $job = Jobs::with(['users', 'tasks'])->where('tasks_id', $task)
            ->paginate(getPaginate());
        return view('system.admin.tasks.analysis', [
            'tasks' => $job,
            'taskId' => $task,
            'status' => $status
        ]);
    }

    public function viewJobs($job)
    {
        return view('system.admin.tasks.jobs-view',
            ['job' => Jobs::with(['users', 'tasks'])->findOrFail($job)]
        );
    }

}
