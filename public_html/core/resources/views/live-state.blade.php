<div>
    <div wire:poll>
        @foreach ($offers as $offer)
            <div class="offer-wrapper animated zoomIn">
                @if ($offer->users && $offer->users->profile && $offer->users->profile->image)
                    @if (!empty($offer->users->google_id))
                        <img style="height: 25px;width:25px;margin-left:5px;" src="{{ $offer->users->profile->image }}"
                            alt="" />
                    @else
                        <img style="height: 25px;width:25px;margin-left:5px;"
                            src="{{ getImage(imagePath()['users']['path'] . '/' . $offer->users->profile->image) }}"
                            alt="" />
                    @endif
                @else
                    <img style="height: 25px;width:25px;margin-left:5px;"
                        src="{{ asset('asset/images/users/default.png') }}" alt="" />
                @endif
                <?php
                if ($offer->offers->name == 'AdscendMedia') {
                    $offername = 'Adscend';
                } elseif ($offer->offers->name == 'AdGateMedia') {
                    $offername = 'Adgate';
                } elseif ($offer->offers->name == 'CPX Research') {
                    $offername = 'CPX';
                } elseif ($offer->offers->name == 'OGads') {
                    $offername = 'OGAds';
                } else {
                    $offername = $offer->offers->name;
                }
                ?>
                <p style="display:flex;flex-direction:column">
                    <span style="color: #fff;margin-left:5px;margin-bottom:5px;">{{ $offername ?? '--' }} </span>
                    <span style="margin-left:5px;margin-bottom:5px;">{!! html_entity_decode(strtolower(substr($offer->users->username, 0, 10))) ?? '--' !!}</span>
                </p>
                <p class="offer-amount">
                    <span><img src="{{ asset('asset/img/coins.svg') }}" style="width:15px;"></span>
                    <span>{{ $offer->amount + 0 }}</span>
                </p>
            </div>
        @endforeach
    </div>
</div>
