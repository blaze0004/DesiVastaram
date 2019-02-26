<!--
    *** FOOTER ***
    _________________________________________________________
    -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">
                    Pages
                </h4>
                <ul class="list-unstyled">
                    <li>
                        <a href="text.html">
                            About us
                        </a>
                    </li>
                    <li>
                        <a href="text.html">
                            Terms and conditions
                        </a>
                    </li>
                    <li>
                        <a href="faq.html">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="contact.html">
                            Contact us
                        </a>
                    </li>
                </ul>
                <hr>
                    <h4 class="mb-3">
                        User section
                    </h4>
                    <ul class="list-unstyled">
                        <li>
                            <a data-target="#login-modal" data-toggle="modal" href="#">
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="register.html">
                                Regiter
                            </a>
                        </li>
                    </ul>
                </hr>
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">
                    Top categories
                </h4>
                <h5>
                    Men
                </h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="category.html">
                            T-shirts
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Shirts
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Accessories
                        </a>
                    </li>
                </ul>
                <h5>
                    Ladies
                </h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="category.html">
                            T-shirts
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Skirts
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Pants
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Accessories
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">
                    Where to find us
                </h4>
                <p>
                    <strong>
                        Obaju Ltd.
                    </strong>
                    <br>
                        13/25 New Avenue
                        <br>
                            New Heaven
                            <br>
                                45Y 73J
                                <br>
                                    England
                                    <br>
                                        <strong>
                                            Great Britain
                                        </strong>
                                    </br>
                                </br>
                            </br>
                        </br>
                    </br>
                </p>
                <a href="contact.html">
                    Go to contact page
                </a>
                <hr class="d-block d-md-none">
                </hr>
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">
                    Get the news
                </h4>
                <p class="text-muted">
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                </p>
                <form>
                    <div class="input-group">
                        <input class="form-control" type="text">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    Subscribe!
                                </button>
                            </span>
                        </input>
                    </div>
                    <!-- /input-group-->
                </form>
                <hr>
                    <h4 class="mb-3">
                        Stay in touch
                    </h4>
                    <p class="social">
                        <a class="facebook external" href="#">
                            <i class="fa fa-facebook">
                            </i>
                        </a>
                        <a class="twitter external" href="#">
                            <i class="fa fa-twitter">
                            </i>
                        </a>
                        <a class="instagram external" href="#">
                            <i class="fa fa-instagram">
                            </i>
                        </a>
                        <a class="gplus external" href="#">
                            <i class="fa fa-google-plus">
                            </i>
                        </a>
                        <a class="email external" href="#">
                            <i class="fa fa-envelope">
                            </i>
                        </a>
                    </p>
                </hr>
            </div>
            <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
    </div>
    <!-- /.container-->
</div>
<!-- /#footer-->
<!-- *** FOOTER END ***-->
<!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <p class="text-center text-lg-left">
                    ©2018 Your name goes here.
                </p>
            </div>
            <div class="col-lg-6">
                <p class="text-center text-lg-right">
                    Template design by
                    <a href="https://bootstrapious.com/e-commerce-templates">
                        Bootstrapious: E-commerce
                    </a>
                    <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :)-->
                </p>
            </div>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END ***-->
<!-- JavaScript files-->
<script src="{{ asset('js/app.js') }}">
</script>
<script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js')}}">
</script>
<script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js')}}">
</script>
<script src="{{ asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js')}}">
</script>
<script src="{{ asset('https://maps.googleapis.com/maps/api/js')}}">
</script>
<script src="{{ asset('js/front.js')}}">
</script>

<script type="text/javascript">
    
    data = [
        'afsfafa',
        'sfasfadfag',
        'afasfgasdf',
        'afasfgdfhaf',
        'adfafajdsh'
    ];

    $('#search').autocomplete({
        source: data,
        minLength: 2,
        select: function(key, value) {
            alert('ahs');
        }
    });
    /*$('#search').on('keyup', function (e) {
       var q = $(e.target).val();
       $.ajax({
          method: 'get', // Type of response and matches what we said in the route
      url: '{{ route('productSearchSuggestions') }}', // This is the url we gave in the route
          data: {'_token' : '{{ csrf_token() }}',
            'q' : q
          }, // a JSON object to send back
          success: function(response){ // What to do if we succeed
          //console.log(response);
            
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
    });*/
</script>

@yield('scripts')
