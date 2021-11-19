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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            var validurl = true;
            $(document).ready(function() {
                console.log('loaded application !!');
                $('input[name="destination"]').on('keydown' , function() {
                    console.log('changed url : ');
                    $('.error').addClass('hidden');
                    $('.error').removeClass('block');
                    $('input[name="destination"]').removeClass('border');
                    $('input[name="destination"]').removeClass('border-red-300');
                });
                $('.shortlen-form').submit(function(event) {
                    validateUrl();
                    if (!validurl) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                })
            })

            function validateUrl() {
                if ($('input[name="destination"]').val() !== '') {
                    if(/^[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($('input[name="destination"]').val())){
                        console.log("valid URL");
                        $('.error').addClass('hidden');
                        $('.error').removeClass('block');
                        validurl = true;
                    } else {
                        console.log("invalid URL");
                        $('.error').addClass('hidden');
                        $('input[name="destination"]').addClass('border');
                        $('input[name="destination"]').addClass('border-red-300');
                        $('.invalid-url-msg').addClass('block');
                        $('.invalid-url-msg').removeClass('hidden');
                        validurl = false;
                    }
                } else {
                    console.log('empty destination !!');
                    $('.error').addClass('hidden');
                    $('.empty-url-msg').addClass('block');
                    $('.empty-url-msg').removeClass('hidden');
                    $('input[name="destination"]').addClass('border');
                    $('input[name="destination"]').addClass('border-red-300');
                    validurl = false;
                }
            }

            function submitDestination() {
                $('.shortlen-form').submit();
            }

        </script>

    </body>
</html>
