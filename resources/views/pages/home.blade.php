@extends('layouts.master-auth')

@section('content')

    <!-- content-wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container-fluid">

            <!-- content-header has breadcrumbs -->

            <section class="content-header">

                <h1>

                    Dashboard

                    <small>you are logged in!</small>

                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">User Dashboard</li>
                </ol>

            </section>

            <!-- end content-header section -->

            <!-- content -->

            <section class="content">

                <!-- Your Page Content Here -->

            </section>

            <!-- end content section -->

        </div>

        <!-- end container -->

    </div>

    <!-- end content-wrapper -->
    @section('scripts')
    <script>
        if ('serviceWorker' in navigator && 'PushManager' in window) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
    @endsection
@endsection


