<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <title>@yield('title')</title>
    @include('admin.includes.head')
    @yield('style')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.includes.sidebar')
            <!-- Layout container -->
            <div class="layout-page">
                @include('admin.includes.header')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                   @yield('content')

                    @include('admin.includes.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @yield('script');
    @include('admin.includes.foot')
    @include('sweetalert::alert')
</body>

</html>