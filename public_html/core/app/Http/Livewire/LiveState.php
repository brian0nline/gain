<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\System\OfferLog;


class LiveState extends Component
{
    public function render()
    {
        $offers =  OfferLog::with(['offers:id,name', 'users.profile:user_id,image'])
        ->orderBy('created_at', 'desc')
        //->where('created_at', '>=', Carbon::now()->subSeconds(2))
        ->take(15)
        ->get();
           
        return view('live-state', compact('offers'));
    }
}