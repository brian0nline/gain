<?php

namespace App\Http\Controllers\System\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Traits\ManageTasks;
use App\Models\System\Config;
use App\Models\System\Jobs;
use App\Models\System\Tasks;
use App\Models\User;
use Illuminate\Http\Request;


class JobsController extends Controller
{
    use ManageTasks;


    public function listJobs(Tasks $tasks)
    {
        $search = request('s') ?? '';
        $sortBy = request('sort') ?? '';

        $tasks = $this->sortTasks($tasks, $sortBy);

        $category = Config::where('name', 'categoryFields')->first();

        $filterCate = request('cate') ?? null;

        $tasks = $this->filterByCategory($tasks, $filterCate);

        $response = $tasks->status(1)
            ->where('title', 'LIKE', "%$search%")
            ->with('jobs')
            ->orderBy('speed')
            ->paginate(getPaginate());

        return view('system.user.jobs.list', [
            'jobs' => $response,
            'category' => $category,
        ]);
    }

    protected function sortTasks($tasks, $sortBy)
    {
        if ($sortBy == 'recently')
            $tasks = $tasks->orderBy('created_at', 'desc');
        elseif ($sortBy == 'high-paying')
            $tasks = $tasks->orderBy('prize');
        elseif ($sortBy == 'low-paying')
            $tasks = $tasks->orderBy('prize', 'desc');
        elseif ($sortBy == 'auto-rate')
            $tasks = $tasks->orderBy('autoRate', 'desc');
        elseif ($sortBy == 'rate-days')
            $tasks = $tasks->orderBy('RateDays', 'desc');

        return $tasks;
    }

    protected function filterByCategory($tasks, $filterCate)
    {
        if (!is_null($filterCate))
            return $tasks->whereIn('category', $filterCate);

        return $tasks;
    }

    public function viewJobs($taskId)
    {
        return view('system.user.jobs.view', [
            'job' => Tasks::with('jobs')->status(1)->find($taskId),
        ]);
    }


    public function submitJob(Request $request)
    {
        if ($this->verifyJobCount($request) !== true)
            return $this->verifyJobCount($request);


        $request->validate([
            'proof' => 'sometimes|string|min:1|max:225',
            'answer' => 'sometimes|string|min:1|max:225',
            'attach' => 'sometimes|image|mimes:png,jpg,|max:2000',
        ]);

        $answer = $this->verifyJobAnswer($request);

        if ($answer && $answer != 'answered')
            return $answer;

        if ($answer == 'answered') {
            $notify[] = ['success', 'The job confirmed '];
            $validated = ['status' => 1, 'proof' => 'AutoRate'];
        } else {
            $notify[] = ['success', 'The tasks under confirm'];
            $validated = ['proof' => $request->proof];
        }


        $filename = null;

        if ($request->hasFile('attach')) {
            $path = imagePath()['jobs']['path'];
            $size = imagePath()['jobs']['size'];
            if ($request->hasFile('attach')) {
                try {
                    $filename = uploadImage($request->attach, $path, $size);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Image could not be uploaded.'];
                    return back()->withNotify($notify);
                }
            }
        }

        $query = array_merge($validated, [
            'user_id' => auth()->user()->id,
            'tasks_id' => $request->taskId,
            'attach' => $filename,
        ]);

        Jobs::create($query);
        return back()->withNotify($notify);
    }

    protected function verifyJobCount($request)
    {
        $tasks = Tasks::with('jobs')->findOrFail($request->taskId);

        if ($tasks->jobs->where('status', 1)->count() >= $tasks->maxWorkers) {
            $tasks->update(['status' => 3]);
            return $this->taskError();
        }

        if ($tasks->jobs->where('status', '!=', 2)->count() >= $tasks->maxWorkers) {
            return $this->taskError();
        }

        if ($tasks->taskPerWorker) {
            if ($tasks->jobs->where('status', '!=', 2)->where('user_id', auth()->user()->id)->count() >= $tasks->taskPerWorker) {
                return $this->taskError();
            }
        }

        return true;
    }

    protected function taskError()
    {
        $notify[] = ['error', 'Sorry, You cant submit more proofs for the task '];
        return back()->withNotify($notify);
    }

    protected function verifyJobAnswer($request)
    {
        $tasks = Tasks::with('jobs')->findOrFail($request->taskId);

        if ($tasks->autoRate) {
            $answer = json_decode($tasks->AQ, true)[1];

            if ($request->answer == $answer) {
                User::where('id', $tasks->user_id)->increment('balance', $tasks->prize);
                return 'answered';
            }
            $notify[] = ['Error', 'Wrong Answer'];
            return back()->withNotify($notify);
        }
        return false;
    }
}
