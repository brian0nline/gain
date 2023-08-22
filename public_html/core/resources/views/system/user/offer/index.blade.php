<?php
$offers_id = [];
?>

@foreach ($data['offers'] as $oneOffer)
    @php
        array_push($offers_id, $oneOffer->id);
    @endphp
@endforeach


@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        div#youmi_modal {
            padding-bottom: 134px;
        }


        @media screen and (max-width: 850px) {
            .paraff {
                font-size: 12px;
            }
        }

        @media screen and (min-width: 992px) {
            .paraff {
                font-size: 16px;
            }
        }

        @media screen and (max-width: 850px) {
            .hdue {
                font-size: 21px;
            }
        }

        @media screen and (min-width: 992px) {
            .hdue {
                font-size: 24px;
            }
        }


        @media screen and (max-width: 850px) {
            .offerwall-name {
                font-size: 12px;
            }
        }

        @media screen and (min-width: 992px) {
            .offerwall-name {
                font-size: 13px;
            }
        }

        .close {
            color: #fff;
            opacity: 1;
        }
    </style>
@endpush

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">


            {{-- Featured --}}

            {{-- <div class="offer-type-heading">
                <img src="{{ asset('asset/images/star.png') }}" class="offer-type-image">
                <span class="offer-type-title">Featured Partners</span>
            </div>

            <div class="offer-container">
                <div class="offerwall-card-container">
                    @foreach ($data['offers'] as $oneOffer)
                        @php
                            $subId = userInfo()->id;
                        @endphp
                        @if ($oneOffer->id == 51)
                            @include('system.user.offer._ogads')
                        @endif

                        @if ($oneOffer->id == 54)
                            @include('system.user.offer._digi')
                        @endif

                        @if ($oneOffer->id == 14)
                            <div class="offerwall-card">
                                <div class="offerwallsposition2 custom-offerwall-style2">
                                    <div
                                        class="innerwall <?= $oneOffer->id == 14 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                        <a href="https://notik.me/coins?api_key={{ $oneOffer->public_key }}&pub_id=PEP8{{ $oneOffer->publish_id }}&user_id={{ $subId }}"
                                            target="_blank" class="offer-url" title="{{ $oneOffer->name }}">
                                            <div class="innerwall2">

                                                <img src="{{ asset('asset/img/notik2.svg') }}"
                                                    style="pointer-events:none;">

                                                <div>
                                                    <p class="offerwall-name">Notik</p>
                                                </div>

                                                <div class="offerwall-bonus">10% Bonus!</div>
                                            </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div> --}}



            {{-- Offerwalls --}}


            <div class="headings-offerwall-container" style="user-select:none;">
                <h2 class="offerwall-heading">OfferWalls</h2>
                <div class="left-right-buttons">
                    <button type="button" class="left-button"><i class="fa fa-angle-left"></i></button>
                    <button type="button" class="right-button"><i class="fa fa-angle-right"></i></button>
                </div>
            </div>

            <div class="offer-container offerwall-section">
                <div class="offerwall-card-container">
                    @foreach ($data['offers'] as $oneOffer)
                        @php
                            $subId = userInfo()->id;
                        @endphp

                        @if ($oneOffer->iframe_url)
                            <div class="offerwall-card">
                                <div class="offerwallsposition2 custom-offerwall-style2">
                                    <a href="{{ Str::replace('subId', $subId, $oneOffer->iframe_url) }}" target="_blank"
                                        class="offer-url" title="{{ $oneOffer->name }}">
                                        <div class="innerwall2">
                                            <img
                                                src="{{ getImage(imagePath()['offers']['path'] . '/' . $oneOffer->image) }}">
                                            <div>
                                                <p class="offerwall-name">
                                                    "{{ $oneOffer->name }}"</p>

                                            </div>
                                            <div class="offerwall-bonus">Coming soon</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            @switch($oneOffer->id)
                                @case(4)
                                    {{-- Wannads --}}
                                    <div class="offerwall-card">
                                        <div class="offerwallsposition2 custom-offerwall-style2">
                                            <div
                                                class="innerwall <?= $oneOffer->id == 4 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                                <a href="https://wall.wannads.com?apiKey={{ $oneOffer->public_key }}&userId={{ $subId }}"
                                                    target="_blank" class="offer-url" title="{{ $oneOffer->name }}">

                                                    <div class="innerwall2">

                                                        <img src="{{ asset('asset/img/wannads2.svg') }}"
                                                            style="pointer-events: none;">

                                                        <div>
                                                            <p class="offerwall-name">Wannads</p>
                                                        </div>
                                                        <div class="offerwall-bonus">Coming soon</div>
                                                    </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                @break

                                @case(7)
                                    {{-- adgaterewards --}}
                                    <div class="offerwall-card">
                                        <div class="offerwallsposition2 custom-offerwall-style2">
                                            <div
                                                class="innerwall <?= $oneOffer->id == 7 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                                <a href="https://wall.adgaterewards.com/{{ $oneOffer->public_key }}/{{ $subId }}"
                                                    target="_blank" class="offer-url" title="{{ $oneOffer->name }}">

                                                    <div class="innerwall2">

                                                        <img src="{{ asset('asset/img/adgatemedia2.svg') }}"
                                                            style="pointer-events:none;">

                                                        <div>
                                                            <p class="offerwall-name">
                                                                Adgate</p>
                                                        </div>
                                                        <div class="offerwall-bonus">Coming soon</div>
                                                    </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                @break

                                @case(11)
                                    {{-- Kiwi Wall --}}
                                    <div class="offerwall-card">
                                        <div class="offerwallsposition2 custom-offerwall-style2">
                                            <div
                                                class="innerwall <?= $oneOffer->id == 11 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                                <a href="https://www.kiwiwall.com/wall/{{ $oneOffer->public_key }}/{{ $subId }}"
                                                    target="_blank" class="offer-url" title="{{ $oneOffer->name }}">

                                                    <div class="innerwall2">

                                                        <img src="{{ asset('asset/img/kiwiwall2.svg') }}"
                                                            style="pointer-events:none;">

                                                        <div>
                                                            <p class="offerwall-name">Kiwi Wall
                                                            </p>
                                                        </div>
                                                        <div class="offerwall-bonus">Coming soon</div>
                                                    </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                @break

                                @case(13)
                                    {{-- Monlix --}}
                                    <div class="offerwall-card">
                                        <div class="offerwallsposition2 custom-offerwall-style2">
                                            <div
                                                class="innerwall <?= $oneOffer->id == 13 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                                <a href="https://offers.monlix.com/?appid={{ $oneOffer->public_key }}&userid={{ $subId }}&subid={{ $oneOffer->publish_id }}"
                                                    target="_blank" class="offer-url" title="{{ $oneOffer->name }}">

                                                    <div class="innerwall2">

                                                        <img src="{{ asset('asset/img/monlix2.svg') }}"
                                                            style="pointer-events:none;">

                                                        <div>
                                                            <p class="offerwall-name">Monlix</p>
                                                        </div>
                                                        <div class="offerwall-bonus">Coming soon</div>
                                                    </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                @break

                                @case(15)
                                    {{-- Timewall --}}
                                    <div class="offerwall-card">
                                        <div class="offerwallsposition2 custom-offerwall-style2">
                                            <div
                                                class="innerwall <?= $oneOffer->id == 15 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                                <a href="https://timewall.io/users/login?oid={{ $oneOffer->public_key }}&uid={{ $subId }}"
                                                    target="_blank" class="offer-url" title="{{ $oneOffer->name }}">
                                                    <div class="innerwall2">

                                                        <img src="{{ asset('asset/img/timewall2.svg') }}"
                                                            style="pointer-events:none;">

                                                        <div>
                                                            <p class="offerwall-name">Timewall
                                                            </p>
                                                        </div>
                                                        <div class="offerwall-bonus">Coming soon</div>
                                                    </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                @break

                                @case(29)
                                    {{-- Revlum --}}
                                    <div class="offerwall-card">
                                        <div class="offerwallsposition2 custom-offerwall-style2">
                                            <div
                                                class="innerwall <?= $oneOffer->id == 29 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                                <a href="https://revlum.com/offerwall/{{ $oneOffer->public_key }}/{{ $subId }}"
                                                    target="_blank">
                                                    <div class="innerwall2">

                                                        <img src="{{ asset('asset/img/revlum2.svg') }}"
                                                            style="pointer-events:none;">

                                                        <div>
                                                            <p class="offerwall-name">Revlum</p>
                                                        </div>
                                                        <div class="offerwall-bonus">Coming soon</div>
                                                    </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                @break

                                @default
                            @endswitch
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- SurveyWall --}}


            <div class="headings-offerwall-container" style="user-select:none; margin-top: 50px">
                <h2 class="offerwall-heading">Surveywalls</h2>
                <div class="left-right-buttons">
                    <button type="button" class="survey-left-button"><i class="fa fa-angle-left"></i></button>
                    <button type="button" class="survey-right-button"><i class="fa fa-angle-right"></i></button>
                </div>
            </div>


            <div class="offer-container survey-section">
                <div class="offerwall-card-container">
                    @foreach ($data['offers'] as $oneOffer)
                        @php
                            $subId = userInfo()->id;
                        @endphp
                        @if ($oneOffer->id == 10)
                            <div class="offerwall-card">
                                <div class="offerwallsposition2 custom-offerwall-style2">
                                    <div
                                        class="innerwall <?= $oneOffer->id == 10 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                        <a href="https://wall.cpx-research.com/index.php?app_id={{ $oneOffer->public_key }}&ext_user_id={{ $subId }}"
                                            target="_blank" class="offer-url" title="{{ $oneOffer->name }}">

                                            <div class="innerwall2">

                                                <img src="{{ asset('asset/img/cpxresearch2.svg') }}"
                                                    style="pointer-events:none;">

                                                <div>
                                                    <p class="offerwall-name">CPX</p>
                                                </div>
                                                <div class="offerwall-bonus">New!</div>
                                            </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        @elseif ($oneOffer->id == 31)
                            {{-- InBrain --}}

                            <div class="offerwall-card">
                                <div class="offerwallsposition2 custom-offerwall-style2">
                                    <div
                                        class="innerwall <?= $oneOffer->id == 31 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                        <a href="https://www.surveyb.in/configuration?params=OUJEQnQxL0YrcHR1QlhpL1VGMDdmRDk2c201WFFUeWFRVnFUQmFoL1kxbmVMaGFBdGZtZytlcHNGdlJES0xuR0d1YTJBRCtGS0FkeWlxZU5UeWNtVDE5KzVOQnNySDY3ZnVmbkN4b1ZpWk80ZXBjWURKT04xazB3VWVEaW9OY2J0RXVEckFWS3NNdjAwbjhmajJaMXJGcnhXY2hhUytUVEl3NG55SFZreHFJbVE2bHBkRkN5TGhNVjdOaDZyejBQQ2p2ZG52eEcwcGxuVmdqREZpMk50Zz09&app_uid={{ $subId }}"
                                            target="_blank" class="offer-url" title="{{ $oneOffer->name }}">

                                            <div class="innerwall2">

                                                <img src="{{ asset('asset/img/inbrain2.svg') }}"
                                                    style="pointer-events:none;">

                                                <div>
                                                    <p class="offerwall-name">Inbrain</p>
                                                </div>
                                                <div class="offerwall-bonus">Coming soon</div>
                                            </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            @if (in_array('38', $offers_id) || in_array('39', $offers_id))
                {{-- Videos --}}
                <div style="user-select:none;">
                    <h2 class="offerwall-heading" style="margin-top:50px;">Videos</h2>
                </div>

                <div class="offer-container">
                    <div class="offerwall-card-container">
                        @foreach ($data['offers'] as $oneOffer)
                            @php
                                $subId = userInfo()->id;
                            @endphp
                            @if ($oneOffer->id == 38)
                                <div class="offerwall-card">
                                    <div class="offerwallsposition2 custom-offerwall-style2">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 38 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://partner.hideout.tv/click.php?aff=116158&camp=2992522&from=19214&prod=4&prod_channel=5&sub1={{ $subId }}"
                                                target="_blank">

                                                <div class="innerwall2">

                                                    <img src="{{ asset('asset/img/hideout2.svg') }}"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name">HideoutTV</p>
                                                    </div>
                                                    <div class="offerwall-bonus">Coming soon</div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            @elseif ($oneOffer->id == 39)
                                {{-- LootTV --}}

                                <div class="offerwall-card">
                                    <div class="offerwallsposition2 custom-offerwall-style2">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 39 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://google.com" target="_blank">

                                                <div class="innerwall2">


                                                    <img src="{{ asset('asset/img/loottv2.svg') }}"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name">LootTV</p>

                                                    </div>
                                                    <div class="offerwall-bonus">Coming soon</div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            @endif


            @if (in_array('52', $offers_id))
                {{-- Games --}}
                <div style="user-select:none;">
                    <h2 class="offerwall-heading" style="margin-top:50px;">Games</h2>
                </div>

                <div class="offer-container">
                    <div class="offerwall-card-container">
                        @foreach ($data['offers'] as $oneOffer)
                            @php
                                $subId = userInfo()->id;
                            @endphp
                            @if ($oneOffer->id == 52)
                                <div class="offerwall-card">
                                    <div class="offerwallsposition2 custom-offerwall-style2">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 52 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://google.com" target="_blank">

                                                <div class="innerwall2">

                                                    <img src="{{ asset('asset/img/playtime2.svg') }}"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name">Playtime
                                                        </p>
                                                    </div>
                                                    <div class="offerwall-bonus">Coming soon</div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>


 <div class="container mt-5">
    <div class="custom-container" style="padding:20px;border-radius:20px;background: #17242B;">
      <div class="d-flex align-items-center">
        <div class="flex-grow-1">
          <p>Follow us on social media for free coins!</p>
        </div>
        <button class="btn btn-primary" style="box-shadow:none;" data-bs-toggle="modal" data-bs-target="#Promodal">Claim</button>
      </div>
    </div>
  </div>


 <!-- Modal -->
  <div class="modal fade" id="Promodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Claim your code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              
              <input type="code" class="form-control" id="code" placeholder="Enter your code">
            </div>
            <button type="submit" class="btn btn-primary float-end">Claim Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="iframe_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" style="border-radius:12px;">
            <div class="modal-header" style="border-top-left-radius:12px;border-top-right-radius:12px;">
                <h5 class="modal-title" id="offer_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="box-shadow:none;"></button>
            </div>
            <div class="modal-body position-relative p-0">
                <div class="iframe-loader">
                    <span class="iframe-loader-line"></span>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item scrollable" src=''></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('[data-target="#youmi_modal"]').click(function(e) {
            e.preventDefault();
            $('.modal#youmi_modal').modal('show');
        });

        $('[data-target="#ogads_modal"]').click(function(e) {
            e.preventDefault();
            $('.modal#ogads_modal').modal('show');
        });

        $('[data-target="#digi_modal"]').click(function(e) {
            e.preventDefault();
            $('.modal#digi_modal').modal('show');
        });
        $('.offer-url').click(function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let title = $(this).attr('title');
            $('.modal#iframe_modal #offer_title').html(title);
            let src = $('.modal#iframe_modal iframe').attr('src', url);

            $('.iframe-loader').css('display', 'block');

            $('.iframe-loader-line').animate({
                width: '100%'
            }, 2000);

            $('.modal#iframe_modal').modal('show');

            setTimeout(function() {
                $('.iframe-loader').css('display', 'none');
            }, 3000);
        })

        const itemsContainer = document.querySelector('.offerwall-section .offerwall-card-container');
        const leftButton = document.querySelector('.left-button');
        const rightButton = document.querySelector('.right-button');
        const scrollAmount = 200;
        leftButton.addEventListener('click', () => {
            console.log('called left');
            itemsContainer.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        rightButton.addEventListener('click', () => {
            console.log('called rigt');
            itemsContainer.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });


        const itemsContainer2 = document.querySelector('.survey-section .offerwall-card-container');
        const leftButton2 = document.querySelector('.survey-left-button');
        const rightButton2 = document.querySelector('.survey-right-button');
        const scrollAmount2 = 200;
        leftButton2.addEventListener('click', () => {
            itemsContainer2.scrollBy({
                left: -scrollAmount2,
                behavior: 'smooth'
            });
        });
        rightButton2.addEventListener('click', () => {
            itemsContainer2.scrollBy({
                left: scrollAmount2,
                behavior: 'smooth'
            });
        });


    });
</script>
