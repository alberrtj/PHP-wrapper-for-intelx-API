<!DOCTYPE html>
<html lang="fa">
@include('layouts.admin.blocks.head')

<body class="text-right" dir="ltr">

<!-- Begin page -->
<div id="wrapper">

@include('layouts.admin.blocks.menu')

<!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        @yield('breadcrumb')
                    </div>
                </div>
                <!-- end page title -->

                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->

        @include('layouts.admin.blocks.footer')

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

@include('layouts.admin.blocks.script')
@include('layouts.admin.blocks.message')

</body>

</html>
