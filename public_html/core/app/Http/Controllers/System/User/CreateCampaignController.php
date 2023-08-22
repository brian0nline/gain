<?php


namespace App\Http\Controllers\System\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Traits\ManageTasks;
use App\Http\Requests\CreateTaskRequest;
use App\Models\System\Tasks;
use Illuminate\Http\Request;

class CreateCampaignController extends Controller

{
    use ManageTasks;

    public $config, $countries = [], $cat = [], $campaign;

    public function __construct(Tasks $task)
    {

        $this->campaign = $task;
        $this->countries = $this->countries();
        $this->cat = $this->category();
        $this->config = $this->config();
    }

    public function index()
    {

        return view(
            'system.user.tasks.create',
            [
                'campaign' => $this->campaign,
                'countries' => $this->countries,
                'cat' => $this->cat,
                'config' => $this->config,
            ]
        );
    }

    public function create(CreateTaskRequest $createTaskRequest)
    {
        $validated = $createTaskRequest->validated();

        $this->workers = $createTaskRequest->maxWorkers;
        $this->prize = $createTaskRequest->prize;

        if (!$this->checkUserBalance()) {
            $notify[] = ['danger', 'You don\'t have enough balance.'];
            return back()->withInput()->withNotify($notify);
        }

        $this->updateUserBalance();

        $validated['user_id'] = auth()->user()->id;
        $validated['countries'] = json_encode($createTaskRequest->countries);
        $validated['AQ'] = json_encode([$createTaskRequest->aq_question, $createTaskRequest->aq_answer]);

        Tasks::create($validated);

        $notify[] = ['success', 'Your task under confirm.'];

        return back()->withNotify($notify);
    }

    public function cal(Request $request)
    {
        $this->workers = $request->workers;
        $this->prize = $request->prize;

        return $request->ajax()
            ? response()->json([
                'cal' => $this->calculateTaskPrize(),
            ])
            : null;
    }
}
