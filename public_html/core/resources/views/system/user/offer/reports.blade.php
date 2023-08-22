<head>
    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" href="{{ asset('asset/img/favicon.svg') }}" />
</head>

@push('style')

<style>
    .dashboard{
        display:block !important
    }
</style>

@endpush
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card"  style="border-radius:10px;border:none;">
                    <div class="card-header" style="border-radius:0px;border:none;background: #35515F;">
                        <div class="card-body"  style="border:none;">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="paraff">@lang('Offer Name')</th>
                                            <th class="paraff">@lang('Amount')</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offers as $offer)
                                            <tr>
                                                <td class="paraff">{{ $offer->offers->name }}</td>
                                               
                                                <td  class="paraff">{{ $offer->amount }} <i><img src="{{ asset('asset/img/coins.svg') }}" style="width:20px;"></i></td>
                                                
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
  if (typeof navigator.serviceWorker !== 'undefined') {
    navigator.serviceWorker.register('sw.js')
  }
</script>
   

<script>
    $(document).ready(function(){
        $('.offer_type').click(function(e){
            e.preventDefault()
            let url = $(this).attr('href');
            $.ajax({
                url:url,
                type:"GET",
                success:function(res){
                    $('#user_reports').html(res);
                }
            })
        })
    })
</script>
