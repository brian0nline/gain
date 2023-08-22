<?php

namespace App\Http\Livewire\System\User\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Livewire\System\Traits\CreateTask;
use App\Models\System\Tasks;

class Create extends Controller
{

    use CreateTask;

    public $task, $countries, $cat, $config;

    public $calculate = 0;

    protected $campaign = [];


    public function __construct(Tasks $task)
    {

        $this->campaign = $task;
        $this->countries = $this->countries();
        $this->cat = $this->category();
        $this->config = $this->config();
    }

    // public function route()
    // {
    //     return Route::get('/employers/create' , [static::class, 'render'])
    //         ->name('employers.create')
    //         ->middleware('auth');
    // }

    public function render()
    {
        return view('system.user.tasks.create');
    }

    public function save()
    {
        $this->validate(
            $this->rules(),
            ['required' => 'This is required field ']
        );
        if (isset($this->task['autoRate'])) {
            $this->validate([
                'task.aq.question' => 'required',
                'task.aq.answer' => 'required|string',
            ]);
        }

        dd($this->task);
    }

    public function rules()
    {
        return [
            'task.title' => 'required|string|max:225',
            'task.requirements' => 'required|string|min:10',
            'task.countries' => 'required|string',
            'task.numProof' => ['required', 'numeric'],
            'task.maxWorkers' => 'required|numeric',
            'task.rateDays' => 'required|numeric',
            'task.speed' => 'required|numeric|min:0|max:100',
            'task.prize' => 'required|string',
        ];
    }

    public function calculate()
    {
        if (is_numeric($this->task['maxWorkers']) && is_numeric($this->task['prize'])) {
            $adminFee = ($this->config['tasksFee'] / 100) * ($this->task['maxWorkers'] * $this->task['prize']);
            $this->calculate = ($this->task['maxWorkers'] * $this->task['prize']) + $adminFee;
        }
        $this->calculate = 0;
    }
}
