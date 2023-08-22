<?php

namespace App\Http\Livewire\Components;

use App\Http\Controllers\System\OfferController;
use App\Models\System\OfferLog;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOfferAnalysis extends Component
{
    use WithPagination;

    public $search;

    public $isPaid = false;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('system.admin.offer-wall.livewire-analysis', [
            'offers' => $this->filter()->paginate(),
        ]);
    }

    public function filter()
    {
        $query = OfferLog::with(['users', 'offers']);

        if ($this->search) {
            $query->where('trx', 'like', '%' . $this->search . '%')
                ->orWhereHas('users', function ($query) {
                    return $query->where('username', 'like', '%' . $this->search . '%');
                });
        }

        if ($this->isPaid == 'paid') {
            $query->where('isPaid', true);
        }

        if ($this->isPaid == 'not_paid') {
            $query->where('isPaid', false);
        }

        return $query;
    }

    public function sendPayment($offerId)
    {
        if(env('APP_DEMO')){
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $offer = OfferLog::where('id', $offerId)->firstOrFail();

        (new OfferController)->rewardUser($offer->user_id, $offer->amount);

        $offer->update(['isPaid' => true]);

        $this->emit('showToast', 'success', 'The payment sent!');
    }

    public function reversePayment($offerId)
    {
        if(env('APP_DEMO')){
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $offer = OfferLog::where('id', $offerId)->firstOrFail();

        (new OfferController)->reverseRewardUser($offer->user_id, $offer->amount);

        $offer->update(['isPaid' => false]);

        $this->emit('showToast', 'success', 'The payment reversed!');
    }

    public function delete($offerId)
    {
        if(env('APP_DEMO')){
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $offer = OfferLog::where('id', $offerId)->firstOrFail();

        $offer->delete();

        $this->emit('showToast', 'success', 'The offer deleted!');
    }

}
