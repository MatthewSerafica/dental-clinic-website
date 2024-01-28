<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full overflow-x-hidden bg-white">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SLU Dental Clinic</title>
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favlogo.ico') }}">
    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body class="h-full">
    @inertia
</body>

</html>
