<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Secret Message APP</title>
    <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    
    <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="/assets/css/app.css" rel="stylesheet">
    
    <link href="/assets/css/icons.css" rel="stylesheet">

    <!-- Fonts -->
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="antialiased">
    <?php echo $__env->yieldContent('content'); ?>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
	

    <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets/js/index.js"></script>
	<!--app JS-->
	<script src="/assets/js/app.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /home/bintang/Dokumen/PHP/secretmess/resources/views/welcome.blade.php ENDPATH**/ ?>