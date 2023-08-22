<?php

namespace App\Http\Livewire\Admin\Layout;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\System\OfferLog;
use App\Http\Charts\AdminUsersChart;
use Illuminate\Support\Facades\Route;
use App\Models\Withdrawal;

class Home extends Component
{
    public $data = [];

    public function route()
    {
        return Route::get('/admin/home', static::class)
            ->middleware(['auth', 'permission:admin', 'adminTwoFactor'])
            ->name('admin.dashboard');
    }

    public function mount()
    {
        $balance = User::select('balance')->sum('balance');
        $referral = User::select('ref_by')->count();
        $currentOnline = User::where('updated_at', '>=', Carbon::now()->subMinutes(5)->toDateTimeString())->count();
        $currentOnline = User::where('updated_at', '>=', Carbon::now()->subMinutes(5)->toDateTimeString())->count();
        $offersCoins = OfferLog::sum('amount');
        $offersEarned = number_format(($offersCoins / 1000), 2); // conversion
        $todayWithdawls = Withdrawal::whereDate('created_at' , Carbon::today())->where('status', 1)->sum('amount');
        $todayWithdawls = number_format($todayWithdawls, 2);
        
        $this->fill(['data' => [
            'userBalance' => $balance,
            'totalRef' => $referral,
            'totalOffers' => OfferLog::count(),
            'currentOnline' => $currentOnline,
            'approvedOffers' => OfferLog::where('isPaid', 1)->count(),
            'pendingOffers' => OfferLog::where('isPaid', 0)->count(),
            'offersEarned' => $offersEarned,
            'todayWithdawls' => $todayWithdawls,
            'userChart' => (new AdminUsersChart())->chart(),
        ]]);
    }

    public function render()
    {
        return view('admin.dashboard')
            ->layout('admin.layout.primary');
    }
}
