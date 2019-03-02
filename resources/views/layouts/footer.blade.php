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
                                Register
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
                            Kurta
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Jodhpuri
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Eri Silk
                        </a>
                    </li>
                </ul>
                <h5>
                    Women
                </h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="category.html">
                            Sarees
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Salwar Suit
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Puans
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
                        DesiVastaram Ltd
                    </strong>
                    <br>
                        xxx Road
                        <br>
                            Meerut
                            <br>
                                250103
                                <br>
                                    Uttar Pradesh
                                    <br>
                                        <strong>
                                            India
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
                    ©2019 DesiVastaram Ltd
                </p>
            </div>
            <!--<div class="col-lg-6">
                <p class="text-center text-lg-right">
                    Template design by
                    <a href="https://bootstrapious.com/e-commerce-templates">
                        Bootstrapious: E-commerce
                    </a>
                    Not removing these links is part of the licence conditions of the template. Thanks for understanding :)
                </p>
            </div>-->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
<script type="text/javascript">

    
    $('#searchForm').on('submit' , function (e) {
        e.preventDefault();
        var query = $('#searchQuery').val();

        if (query == '') {
            alert('Please Enter Some Keyword!');
        } else {
            document.location.replace('/search/'+query);
        }
    });
        
 var path = "{{ route('productSearchSuggestions') }}";
    $('#search').typeahead({
         minLength: 2,
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });


</script>

@yield('scripts')
