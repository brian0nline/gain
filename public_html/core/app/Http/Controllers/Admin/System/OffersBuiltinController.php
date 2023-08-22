<?php 

namespace App\Http\Controllers\Admin\System;

use Illuminate\Http\Request;
use App\Models\System\OfferSetup;
use App\Http\Requests\OfferRequest;
use App\Http\Controllers\Controller;

class OffersBuiltinController extends Controller
{

    public function index(Request $request)
    {
        $offers = OfferSetup::where('isBuiltin', true);
        
        if($request->search)
            $offers->where('name', 'like', '%' . $request->search . '%');
        
        return view('system.admin.offer-wall.builtin.list', [
            'offers' => $offers->paginate(10),
        ]);
    }

    public function store(OfferRequest $request)
    {
        $validated = $request->validated();
        
        $validated['image'] = $this->imageName($request);

        $validated['useAPI'] = $request->useAPI ? 1 : 0;
        $validated['isActive'] = $request->isActive ? 1 : 0;
        $validated['isAutoPay'] = $request->isAutoPay ? 1 : 0;

        OfferSetup::create($validated);

        return redirect()->route('moder.offer.builtin.index')
            ->withNotify([['success', 'OfferWall Added Successfully']]);
    }

    public function edit(Request $request)
    {
        return response()->json([
            'data' => OfferSetup::findOrFail($request->id)
        ]);
    }


    public function update(OfferRequest $request, $offerId)
    {
        $validated = $request->validated();

        $offer = OfferSetup::where('id', $offerId)->firstOrFail();

        $validated['image'] = $request->hasFile('image') ? $this->imageName($request, $offer) : $offer->image;

        $validated['useAPI'] = $request->useAPI ? 1 : 0;
        $validated['isActive'] = $request->isActive ? 1 : 0;
        $validated['isAutoPay'] = $request->isAutoPay ? 1 : 0;
        $validated['is_available'] = $request->is_available ? 0 : 1;

        $offer->update($validated);
        
        return redirect()->route('moder.offer.builtin.index')
            ->withNotify([['success', 'OfferWall Updated Successfully']]);
    }


    public function imageName($request, $offer = null)
    {
        $filename = null;

        $path = imagePath()['offers']['path'];
        $size = imagePath()['offers']['size'];
        if ($request->hasFile('image')) {
            if($request->image->getClientOriginalExtension() == 'svg'){
                try {
                    $offer
                     ? $filename = uploadFile($request->image, $path, $size, $offer->image)
                     : $filename = uploadFile($request->image, $path, $size);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Image Could not be Uploaded.'];
                    return back()->withNotify($notify);
                }
            }else{
                try {
                    $offer
                     ? $filename = uploadImage($request->image, $path, $size, $offer->image)
                     : $filename = uploadImage($request->image, $path, $size);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Image Could not be Uploaded.'];
                    return back()->withNotify($notify);
                }
            }
        }

        return  $filename;
    }

}