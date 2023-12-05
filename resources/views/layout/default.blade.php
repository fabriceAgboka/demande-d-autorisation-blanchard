    <!DOCTYPE html>

    <html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
        data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template">
    @include('layout.head')

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @include('layout.aside')


                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('layout.nav')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @yield('content')
                            <!-- /Contact -->
                        </div>
                        <!-- / Content -->
                        @include('layout.footer')
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        @include('layout.scripts')
    </body>

    </html>
