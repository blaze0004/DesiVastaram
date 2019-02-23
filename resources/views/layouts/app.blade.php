@include('../layouts.head')
<body>
    <!-- navbar-->
    @include('../layouts.header')
    <div id="all">
        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('breadcrumb')
                </div>
                <div class="row">
                    @yield('left-sidebar')
      				@yield('content')
                </div>
                @yield('homeContent')
            </div>
        </div>
    </div>
    @include('../layouts.footer')
</body>
