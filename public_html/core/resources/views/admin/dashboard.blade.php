
  
@push('style')
 <link rel="stylesheet" href="{{asset('asset/vendor/vectormapjs/jquery-jvectormap-2.0.5.css')}}"/>
@endpush

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">  
                                    <i><img src="{{ asset('asset/img/usersadmin.svg') }}"></i> {{ \App\Models\User::count() }}
                                </div>
                                <h3 style="margin-top:8px;font-size:20px;">@lang('Total Users')</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">  
                                    <i><img src="{{ asset('asset/img/balancedashboard.svg') }}"></i> {{ showAmount(\App\Models\User::sum('balance')) }}
                                </div>
                                <h3 style="margin-top:8px;font-size:20px;">@lang('Total Users Balance')</h3>
                            </div>
                        </div>
                    </div>
                </div>
                             
                <div class="col-xl-3 col-sm-6">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">
                                    <i><img src="{{ asset('asset/img/totaloffersadmin.svg') }}"></i> {{ $data['totalOffers'] }}
                                </div>
                                <h3 style="margin-top:8px;font-size:20px;">@lang('Total Offers')</h3>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-xl-3 col-sm-6">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">
                                    <i><img src="{{ asset('asset/img/pendingoffersadmin.svg') }}"></i> {{ $data['pendingOffers'] }}
                                </div>
                                <h3 style="margin-top:8px;font-size:20px;">@lang('Pending Offers')</h3>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-xl-3 col-sm-6">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">
                                    <i><img src="{{ asset('asset/img/onlineadmin.svg') }}"></i> {{ $data['currentOnline'] }}
                                </div>
                                <h3 style="margin-top:8px;font-size:20px;">@lang('Current Online')</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">  
                                    <i><img src="{{ asset('asset/img/withdrawalsadmin.svg') }}"></i> {{ $data['offersEarned'] }} 
                                </div>
                                <h3 style="margin-top:8px;font-size:20px;">@lang('Total Earnings')</h3>
                            </div>
                        </div>
                    </div>
                </div>
                     <div class="col-xl-6 col-12">
                        <div class="earning-box shadow-sm">
                            <div class="animated flipInY">
                                <div class="tile-stats">
                                    <div class="icon" style="font-size:25px;">  
                                        <i><img src="{{ asset('asset/img/withdrawalstoday.svg') }}"></i> {{ $data['todayWithdawls'] }} <img src="{{ asset('asset/img/coins.svg') }}">
                                    </div>
                                    <h3 style="margin-top:8px;font-size:20px;">@lang('Today Withdrawals')</h3>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <h6 style="margin-top:10px;">{{ $data['userChart']->options['chart_title'] }}</h6>
                    {!! $data['userChart']->renderHtml() !!}
        </div>
         
        <div class="col-md-12 mt-5">
          <div id="map" style="height:500px"></div>
        </div>
        
    </div>
    
    @push('script')
    
    {!! $data['userChart']->renderChartJsLibrary() !!}
    {!! $data['userChart']->renderJs() !!}
    
    
      
        <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
        <script src="/asset/vendor/vectormapjs/jquery-jvectormap-2.0.5.min.js"></script>
        <script src="/asset/vendor/vectormapjs/jquery-world_mill_en.js"></script>
        <script>
            $(function(){
                
             $.getJSON('/admin/api/users/counrites/count').then(function(data){
                   $('#map').vectorMap({
                      map: 'world_mill_en',
                      series: {
                        regions: [{
                          values: data,
                          scale: ['#C8EEFF', '#0071A4'],
                          normalizeFunction: 'polynomial'
                        }]
                      },
                      onRegionTipShow: function(e, el, code) {
                        var users = data[code];
                        users = users == undefined ? 0 : users  
                        el.html(el.html() + ':' + users);
                      }
                    });
                });
             });  
        </script>
    
    @endpush
    
</div>
