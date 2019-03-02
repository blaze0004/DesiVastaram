@include('../layouts.head')
<body>
 
         <!-- navbar-->
    @include('../layouts.header')
    <div id="app">
        <div id="content">
            <div class="container">
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
