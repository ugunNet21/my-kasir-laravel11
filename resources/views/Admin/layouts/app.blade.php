<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('Admin.partials.styles')
</head>

<body>
    <div class="container">
        <!-- sidebar -->
        @include('Admin.partials.sidebar')
        <!-- end sidebar -->
        <main class="main-content">
            <!-- header -->
            @include('Admin.partials.header')
            <!-- end header -->
            @include('Admin.partials.breadcrumb')
        <!-- main content -->
        @yield('content')
        </main>
        <!-- end main content -->
    </div>
    <!--bottom nav-->
    @include('Admin.partials.bottomnav')
    <!--end bottom nav-->
    {{-- footer --}}
    {{-- @include('Admin.partials.footer') --}}
    {{-- script --}}
    @include('Admin.partials.scripts')
</body>

</html>
