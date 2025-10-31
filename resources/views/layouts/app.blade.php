<!doctype html>
<html lang="en">

<!-- Mirrored from demo.tailadmin.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Aug 2025 12:16:15 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        POWERCARE | @yield('title')
    </title>
    <link rel="shortcut icon" href="{{ asset('front/assets/img/shape/icon.png') }}" type="image/x-icon">
    <link href="{{ asset('back/assets/styles.css') }}" rel="stylesheet">
    <script data-cfasync="false" nonce="8d036958-0ba5-4b67-a595-e7156884d730" src="{{ asset('back/assets/scripts.js') }}"></script>
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <script src="{{ asset('back/assets/tailwindcss.js') }}"></script>
</head>

<body class="bg-gray-100" x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
    <!-- ===== Preloader Start ===== -->
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed top-0 left-0 flex items-center justify-center w-screen h-screen bg-white z-999999 dark:bg-black">
        <div class="w-16 h-16 border-4 border-solid rounded-full animate-spin border-brand-500 border-t-transparent">
        </div>
    </div>

    <!-- ===== Preloader End ===== -->

        <!-- ===== Page Wrapper Start ===== -->
        <div class="flex h-screen overflow-hidden">
            <!-- ===== Sidebar Start ===== -->
            @include('partial.sidebar')
            <!-- ===== Sidebar End ===== -->


            <!-- ===== Content Area Start ===== -->
            <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
                <!-- Small Device Overlay Start -->
                <div :class="sidebarToggle ? 'block xl:hidden' : 'hidden'"
                    class="fixed z-50 w-full h-screen bg-gray-900/50">
                </div>
                <!-- Small Device Overlay End -->

                <!-- ===== Main Content Start ===== -->
                <main>
                    <!-- ===== Navbar Start ===== -->
                    @include('partial.navbar')
                    <!-- ===== Navbar End ===== -->

                    @yield('content')
                </main>
            </div>
        </div>

    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script defer src="{{ asset('back/assets/bundle.js') }}"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"973a8a3019321bbb","version":"2025.8.0","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"67f7a278e3374824ae6dd92295d38f77","b":1}'
        crossorigin="anonymous"></script>
</body>

</html>
