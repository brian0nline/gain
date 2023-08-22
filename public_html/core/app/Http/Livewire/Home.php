<?php

namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;
use Illuminate\Support\Facades\Route;

class Home extends Component
{
    public $data = [], $user;

    public function route()
    {
        return Route::get('earn', static::class)
            ->middleware(['auth','checkStatus'])->name('user.home');
    }


    public function mount()
    {
        $this->user = User::findOrFail(auth()->user()->id);
        $referral = User::where('ref_by', $this->user->id)->count();

        $this->fill(['data' => [
            'userBalance' => $this->user->balance,
            'totalOffers' => OfferLog::where('user_id', $this->user->id)->count(),
            'approvedOffers' => OfferLog::where('user_id', $this->user->id)->where('isPaid', 1)->count(),
            'pendingOffers' => OfferLog::where('user_id', $this->user->id)->where('isPaid', 0)->count(),
            'offers' => OfferSetup::active()->select('name', 'id', 'iframe_url', 'public_key', 'publish_id', 'image','isActive','is_available')->get(),
        ]]);
    }

    public function render()
    {
        return view('home')
            ->layout('layouts.theme.default');
    }
}
