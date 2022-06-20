<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <style>
        .text-white{
            color: #fff;
        }
    </style>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles


</head>

<body class="font-sans antialiased">
<div class="mx-auto container-fluid">


<div class="grid grid-cols-2 gap-2 md:grid-cols-3">


    <div class="col-span-2 px-6">
        <livewire:appointments-calendar week-starts-at="1" pollMillis="500"       />
    </div>
    <div>
        <h1 class="pt-4 mt-4 text-3xl font-black text-center">
            Events
        </h1>
        <livewire:eventpreview/>
    </div>

</div>
    











</div>


  <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @livewireScripts
    @livewireCalendarScripts

    <script>
    Livewire.on('editevent', function() {
    alert('A post was added with the id of: ');
    $('#large-modal').toggle();
})
    </script>

</body>
</html>