@include('../layouts.head')
  <body>
    <!-- navbar-->
    @include('../layouts.header')
    <div id="all">
      <div id="content">
        @yield('content')
      </div>
    </div>

   @include('../layouts.footer')
  