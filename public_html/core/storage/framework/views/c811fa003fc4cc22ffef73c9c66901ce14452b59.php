
  
<?php $__env->startPush('style'); ?>
 <link rel="stylesheet" href="<?php echo e(asset('asset/vendor/vectormapjs/jquery-jvectormap-2.0.5.css')); ?>"/>
<?php $__env->stopPush(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">  
                                    <i><img src="<?php echo e(asset('asset/img/usersadmin.svg')); ?>"></i> <?php echo e(\App\Models\User::count()); ?>

                                </div>
                                <h3 style="margin-top:8px;font-size:20px;"><?php echo app('translator')->get('Total Users'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">  
                                    <i><img src="<?php echo e(asset('asset/img/balancedashboard.svg')); ?>"></i> <?php echo e(showAmount(\App\Models\User::sum('balance'))); ?>

                                </div>
                                <h3 style="margin-top:8px;font-size:20px;"><?php echo app('translator')->get('Total Users Balance'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                             
                <div class="col-xl-3 col-sm-6">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">
                                    <i><img src="<?php echo e(asset('asset/img/totaloffersadmin.svg')); ?>"></i> <?php echo e($data['totalOffers']); ?>

                                </div>
                                <h3 style="margin-top:8px;font-size:20px;"><?php echo app('translator')->get('Total Offers'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-xl-3 col-sm-6">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">
                                    <i><img src="<?php echo e(asset('asset/img/pendingoffersadmin.svg')); ?>"></i> <?php echo e($data['pendingOffers']); ?>

                                </div>
                                <h3 style="margin-top:8px;font-size:20px;"><?php echo app('translator')->get('Pending Offers'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-xl-3 col-sm-6">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">
                                    <i><img src="<?php echo e(asset('asset/img/onlineadmin.svg')); ?>"></i> <?php echo e($data['currentOnline']); ?>

                                </div>
                                <h3 style="margin-top:8px;font-size:20px;"><?php echo app('translator')->get('Current Online'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="earning-box shadow-sm">
                        <div class="animated flipInY">
                            <div class="tile-stats">
                                <div class="icon" style="font-size:25px;">  
                                    <i><img src="<?php echo e(asset('asset/img/withdrawalsadmin.svg')); ?>"></i> <?php echo e($data['offersEarned']); ?> <img src="<?php echo e(asset('asset/img/coins.svg')); ?>">
                                </div>
                                <h3 style="margin-top:8px;font-size:20px;"><?php echo app('translator')->get('Total Earnings'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                     <div class="col-xl-6 col-12">
                        <div class="earning-box shadow-sm">
                            <div class="animated flipInY">
                                <div class="tile-stats">
                                    <div class="icon" style="font-size:25px;">  
                                        <i><img src="<?php echo e(asset('asset/img/withdrawalstoday.svg')); ?>"></i> <?php echo e($data['todayWithdawls']); ?> <img src="<?php echo e(asset('asset/img/coins.svg')); ?>">
                                    </div>
                                    <h3 style="margin-top:8px;font-size:20px;"><?php echo app('translator')->get('Today Withdrawals'); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <h6 style="margin-top:10px;"><?php echo e($data['userChart']->options['chart_title']); ?></h6>
                    <?php echo $data['userChart']->renderHtml(); ?>

        </div>
         
        <div class="col-md-12 mt-5">
          <div id="map" style="height:500px"></div>
        </div>
        
    </div>
    
    <?php $__env->startPush('script'); ?>
    
    <?php echo $data['userChart']->renderChartJsLibrary(); ?>

    <?php echo $data['userChart']->renderJs(); ?>

    
    
      
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
    
    <?php $__env->stopPush(); ?>
    
</div>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>