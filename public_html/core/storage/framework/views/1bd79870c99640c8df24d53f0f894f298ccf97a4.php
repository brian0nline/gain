

<?php $__env->startSection('title', 'Help Center | Gainify'); ?>

<?php $__env->startSection('content'); ?>

 <style>
    .rounded-container {
      border-radius: 15px;
      padding: 20px;
      background-color: #17242B;
    }

    .discord-gradient-button {
      background: linear-gradient(135deg, #7289da, #5865f2);
      border: none;
      color: #fff;
      box-shadow:none;
    }
    
    .discord-gradient-button:hover {
      background: linear-gradient(135deg, #7289da, #5865f2);
      border: none;
      color: #fff;
      box-shadow:none;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="rounded-container">
        <p class="text-center m-0">
          Join our Discord below and open a support ticket to receive help:
         
        </p>
        <div class="text-center mt-3">
          <a href="https://discord.gg/gainify" target="_blank" rel="noopener noreferrer" class="btn discord-gradient-button">Join Now</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/pages/help.blade.php ENDPATH**/ ?>