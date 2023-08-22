<head>
    <link rel="manifest" href="/manifest.json">

</head>




<?php $__env->startSection('title', 'Gainify'); ?>

<?php $__env->startPush('css'); ?>
  <link rel="stylesheet" href="/asset/css/horizon-scroll.css">
    <style>
        #MainSiteBanner .container {
            background: ;
            background-repeat: no-repeat;
            padding: 15px;
            background-size: cover;

        }

        @media (max-width: 992px) {

            #MainSiteBanner .container {
                background: ;
                background-repeat: no-repeat;
                padding: 15px;
                background-size: contain;
                font-size: 14px;
            }
        }

        @media (max-width: 992px) {

            #loottxt .container {

                font-size: 11px;
            }
        }


        .rounded-box {
            border-radius: 15px;
            background-color: #35515F;
            padding: 20px;
            text-align: center;
        }

        @media (max-width: 995.98px) {
            .rounded-box {
                margin-bottom: 20px;
            }
        }

        .dark-container {
            background-color: #17242B;
            color: white;
            padding: 50px;
            text-align: center;
            margin: 50px auto;
            max-width: 800px;
            border-radius: 28px;
        }

        .logo-slider {
            width: 125px;
            height: auto;
        }

        .logo-container {
            margin-top: 77px;
        }


        .logo-column {
            display: inline-block;
            padding: 0 15px;
            vertical-align: middle;
        }



        .feature-boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .feature-box {
            background-color: #35515F;
            padding: 21px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
            flex: 0 0 calc(33.33% - 20px);
        }

        .feature-box img {
            max-width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .centered-button {
            text-align: center;
            margin-top: 30px;
        }

        .centered-text {
            text-align: center;
            margin-top: 50px;
        }

        .trustpilot-logo {
            width: 150px;
            vertical-align: middle;
            margin-left: 10px;
        }

        .custom-container {
            max-width: 600px;

        }

        @media (max-width: 767px) {
            .custom-container {
                margin-top: 20px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section style="user-select:none;padding-top:40px;">


        <header class="header" id="MainSiteBanner">
            <div class="container">

                <div class="text-center loottxt">
                    <h1 style="color: #fff !important;">Welcome to Gainify</h1>


                </div>
            </div>
        </header>

    </section>


    <div class="container text-center mt-5">
        <h3 class="mb-4">How it works</h3>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="rounded-box">
                    <p style="font-size:18px;font-weight:700;">Sign up</p>
                    <img src="/asset/img/userboxes.svg" class="img-fluid mb-3" style="width:50px;margin-top:10px;">

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="rounded-box">
                    <p style="font-size:18px;font-weight:700;">Earn Points</p>
                    <img src="/asset/img/clickboxes.svg" class="img-fluid mb-3" style="width:50px;margin-top:10px;">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="rounded-box">
                    <p style="font-size:18px;font-weight:700;">Withdraw</p>
                    <img src="/asset/img/withdrawboxes.svg" class="img-fluid mb-3" style="width:50px;margin-top:10px;">

                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-6">

            <div class="dark-container custom-container">
                <h3 class="centered-heading">Withdraw your points via</h3>
                <div class="logo-container">
                    <div class="logo-column">
                        <img src="/asset/img/bitcoinslider.svg" alt="Logo 1" class="logo-slider">
                    </div>
                    <div class="logo-column">
                        <img src="/asset/img/litecoinslider.svg" alt="Logo 2" class="logo-slider">
                    </div>
                    <div class="logo-column">
                        <img src="/asset/img/appleslider.svg" alt="Logo 3" class="logo-slider">
                    </div>
                    <div class="logo-column">
                        <img src="/asset/img/googleplayslider.svg" alt="Logo 3" class="logo-slider">
                    </div>
                    <div class="logo-column">
                        <img src="/asset/img/nitroslider.svg" alt="Logo 3" class="logo-slider">
                    </div>
                    <div class="logo-column">
                        <img src="/asset/img/steamslider.svg" alt="Logo 3" class="logo-slider">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dark-container custom-container">
                <div class="feature-boxes">
                    <div class="feature-boxes">
                        <div class="feature-box">
                            <p style="font-size:18px;font-weight:700;">Total Users</p>
                            <p style="font-size:20px;"><?php echo e(\App\Models\User::count()); ?></p>
                        </div>
                        <div class="feature-box">
                            <p style="font-size:18px;font-weight:700;">Offers Completed</p>
                            <p style="font-size:20px;"><?php echo e(\App\Models\System\OfferLog::where('isPaid', true)->count()); ?>

                            </p>
                        </div>
                        <div class="feature-box">
                            <p style="font-size:18px;font-weight:700;">USD Earned</p>
                            <p style="font-size:20px;">$
                                <?php echo e(\App\Models\System\OfferLog::where('isPaid', true)->sum('amount')); ?>

                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>







    <div class="centered-text">
        <p style="font-size:18px;">See our reviews on <a href="https://www.trustpilot.com/your-company-reviews"
                target="_blank">
                <img src="/asset/img/trustpilotlogo.svg" alt="Trustpilot Logo" class="trustpilot-logo">
            </a></p>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#logoSlider').carousel({
                interval: 3000,
            });
        });
    </script>
    <script>
        if (typeof navigator.serviceWorker !== 'undefined') {
            navigator.serviceWorker.register('sw.js')
        }
    </script>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\gainify\core\resources\views/layouts/welcome.blade.php ENDPATH**/ ?>