@extends('layouts.master-guest')

@section('content')

    <!-- content wrapper -->

    <div class="content-wrapper">

        <!-- container -->

        <div class="container">

            <!-- content-header has breadcrumbs -->

            <section class="content-header">

                {{-- <div class="grid-results">

                    <div class="fb-like"
                         data-share="true"
                         data-width="450"
                         data-show-faces="true">
                    </div>

                </div> --}}

                <h1>
                    ระบบบริการลูกค้า
                    <small>สี่สหายขนส่ง</small>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Landing</a></li>
                    <li class="active">Site Landing Page</li>
                </ol>

            </section>

            <!-- end content-header -->

            <!-- content -->

            <section class="content">

                @include('admin.components.admin-v2.admin-map-box')

                <!-- box -->

                <div class="box box-default">

                    <!-- box-header -->

                    <div class="box-header with-border">

                        <h1>SISAHYGO ระบบบริการลูกค้าสี่สหายขนส่ง</h1>

                    </div>

                    <!-- end box-header -->

                    <!-- box-body -->

                    <div class="box-body">

                        สื่อกลางสำหรับการติดต่อระหว่างบริษัทกับลูกค้า...

                    </div>

                    <!--  end box-body -->

                </div>

                <!-- end box -->

            </section>

            <!-- end content section -->

        </div>

        <!--  end container -->

    </div>
    <!-- end content-wrapper -->


@endsection

@section('scripts')

    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    
    <!-- map script -->

    <script>

        /* jVector Maps
         * ------------
         * Create a world map with markers
         */
        $('#world-map-markers').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: 'rgba(210, 214, 222, 1)',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    "fill-opacity": 0.7,
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {}
            },
            markerStyle: {
                initial: {
                    fill: '#00a65a',
                    stroke: '#111'
                }
            },
            markers: [
                {latLng: [41.50, -87.37], name: 'Chicago'},
                {latLng: [-34.60, -58.38], name: 'Buenos Aires'},
                {latLng: [32.46, -96.46], name: 'Dallas'},
                {latLng: [36.10, -115.12], name: 'Las Vegas'},
                {latLng: [34.3, -118.15], name: 'Los Angeles'},
                {latLng: [40.43, -74.00], name: 'New York City'},
                {latLng: [41.90, 12.45], name: 'Vatican City'},
                {latLng: [43.73, 7.41], name: 'Monaco'},
                {latLng: [-0.52, 166.93], name: 'Nauru'},
                {latLng: [-8.51, 179.21], name: 'Tuvalu'},
                {latLng: [43.93, 12.46], name: 'San Marino'},
                {latLng: [47.14, 9.52], name: 'Liechtenstein'},
                {latLng: [7.11, 171.06], name: 'Marshall Islands'},
                {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
                {latLng: [3.2, 73.22], name: 'Maldives'},
                {latLng: [35.88, 14.5], name: 'Malta'},
                {latLng: [12.05, -61.75], name: 'Grenada'},
                {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
                {latLng: [13.16, -59.55], name: 'Barbados'},
                {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
                {latLng: [-4.61, 55.45], name: 'Seychelles'},
                {latLng: [7.35, 134.46], name: 'Palau'},
                {latLng: [42.5, 1.51], name: 'Andorra'},
                {latLng: [14.01, -60.98], name: 'Saint Lucia'},
                {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
                {latLng: [1.3, 103.8], name: 'Singapore'},
                {latLng: [1.46, 173.03], name: 'Kiribati'},
                {latLng: [-21.13, -175.2], name: 'Tonga'},
                {latLng: [15.3, -61.38], name: 'Dominica'},
                {latLng: [-20.2, 57.5], name: 'Mauritius'},
                {latLng: [26.02, 50.55], name: 'Bahrain'},
                {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
            ]
        });

        /* SPARKLINE CHARTS
         * ----------------
         * Create a inline charts with spark line
         */

        //-----------------
        //- SPARKLINE BAR -
        //-----------------
        $('.sparkbar').each(function () {
            var $this = $(this);
            $this.sparkline('html', {
                type: 'bar',
                height: $this.data('height') ? $this.data('height') : '30',
                barColor: $this.data('color')
            });
        });

    
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

