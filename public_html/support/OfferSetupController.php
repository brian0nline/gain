<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;

class OfferSetupController extends Controller
{
    public function __construct()
    {
        $this->middleware('isDemo')->except(['index', 'create', 'edit', 'analysis']);
    }

    public function index()
    {
        return view('system.admin.offer-wall.list', [
            'offers' => OfferSetup::where('isBuiltin', false)->paginate(),
        ]);
    }

    
    public function create()
    {
        return view('system.admin.offer-wall.index');
    }

    public function store(OfferRequest $request)
    {
        $this->middleware('isDemo');

        $validated = $request->validated();

        $validated['image'] = $this->imageName($request);

        OfferSetup::create($validated);

        return redirect()->route('moder.offer.index')
            ->withNotify([['success', 'Offerwall added successfully']]);
    }

    public function edit($offerId)
    {

        $offer = OfferSetup::where('id', $offerId)->firstOrFail();

        return view('system.admin.offer-wall.edit', compact('offer'));
    }

    public function update(OfferRequest $request, $offerId)
    {
        $this->middleware('isDemo');

        $validated = $request->validated();

        $offer = OfferSetup::where('id', $offerId)->firstOrFail();

        $validated['image'] = $request->hasFile('image') ? $this->imageName($request, $offer) : $offer->image;

        $offer->update($validated);

        return redirect()->route('moder.offer.index')
            ->withNotify([['success', 'Offerwall updated successfully']]);
    }
   

    public function updateStatus($offerId)
    {
        $offer = OfferSetup::where('id', $offerId)->firstOrFail();

        $offer->update([
            'isActive' => !$offer->isActive,
        ]);

        return back()->withNotify([['success', 'Offerwall updated successfully']]);
    }

    public function updatePay($offerId)
    {
        $offer = OfferSetup::where('id', $offerId)->firstOrFail();

        $offer->update([
            'isAutoPay' => !$offer->isAutoPay,
        ]);

        return back()->withNotify([['success', 'Offerwall updated successfully']]);
    }
// 
    public function delete($offerId)
    {
        $this->middleware('isDemo');

        $offer = OfferSetup::where('id', $offerId)->firstOrFail();

        $offer->delete();

        return back()->withNotify([['success', 'Offerwall deleted successfully']]);
    }

    public function analysis()
    {
        return view('system.admin.offer-wall.analysis',
        ['offers' => OfferLog::all()]
        );
    }

    public function imageName($request, $offer = null)
    {
        $filename = null;

        $path = imagePath()['offers']['path'];
        $size = imagePath()['offers']['size'];
        if ($request->hasFile('image')) {
            try {
                $offer
                 ? $filename = uploadImage($request->image, $path, $size, $offer->image)
                 : $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        return  $filename;
    }

}
