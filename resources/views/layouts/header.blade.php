<header class="header mb-5">

  <!--

*** TOPBAR ***

_________________________________________________________

-->

  <div id="top">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-6 offer mb-3 mb-lg-0">

          <a href="#" class="btn btn-success btn-sm">Launch Offer

          </a>

          <a href="#" class="ml-1">Get 10% discount on orders above ₹1500
          </a>

        </div>

        <div class="col-lg-6 text-center text-lg-right">

          <ul class="menu list-inline mb-0">
              <li class="list-inline-item">

              <div id="google_translate_element"></div>
              </a>

            </li>
            @guest

            <li class="list-inline-item">

              <a href="#" data-toggle="modal" data-target="#login-modal">Login

              </a>

            </li>

            @if (Route::has('register'))

            <li class="list-inline-item">

              <a href="{{ route('register')}}">Register

              </a>

            </li>

            @endif

            @else

            <li class="list-inline-item">

              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                {{ Auth::user()->email }} 

                <span class="caret">

                </span>

              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                <a style="color: black" class="dropdown-item" href="{{ route('dashboard') }}">

                  {{ __('My Account') }}

                </a>

                <a style="color: black" class="dropdown-item" href="{{ route('logout') }}"

                   onclick="event.preventDefault();

                            document.getElementById('logout-form').submit();">

                  {{ __('Logout') }}

                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                  @csrf

                </form>

              </div>

            </li>

            @endguest

            <li class="list-inline-item">

              <a href="contact.html">Contact

              </a>

            </li>

            <li class="list-inline-item">

              <a href="#">Recently viewed

              </a>

            </li>

          </ul>

        </div>

      </div>

    </div>

    <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">

      <div class="modal-dialog modal-sm">

        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title">Customer login

            </h5>

            <button type="button" data-dismiss="modal" aria-label="Close" class="close">

              <span aria-hidden="true">

              </span>

            </button>

          </div>

          <div class="modal-body">

            <form method="POST" action="{{ route('login') }}">

              @csrf

              <div class="form-group row">

                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}

                </label>

                <div class="col-md-6">

                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))

                  <span class="invalid-feedback" role="alert">

                    <strong>{{ $errors->first('email') }}

                    </strong>

                  </span>

                  @endif

                </div>

              </div>

              <div class="form-group row">

                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}

                </label>

                <div class="col-md-6">

                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))

                  <span class="invalid-feedback" role="alert">

                    <strong>{{ $errors->first('password') }}

                    </strong>

                  </span>

                  @endif

                </div>

              </div>

              <div class="form-group row">

                <div class="col-md-6 offset-md-4">

                  <div class="form-check">

                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">

                      {{ __('Remember Me') }}

                    </label>

                  </div>

                </div>

              </div>

              <div class="form-group row mb-0">

                <div class="col-md-8 offset-md-4">

                  <button type="submit" class="btn btn-primary">

                    {{ __('Login') }}

                  </button>

                  @if (Route::has('password.request'))

                  <a class="btn btn-link" href="{{ route('password.request') }}">

                    {{ __('Forgot Your Password?') }}

                  </a>

                  @endif

                </div>

              </div>

            </form>

            <p class="text-center text-muted">Not registered yet?

            </p>

            <p class="text-center text-muted">

              <a href="{{ route('register')}}">

                <strong>Register now

                </strong>

              </a>! It is easy and done in 1 minute and gives you access to special discounts and much more!

            </p>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- *** TOP BAR END ***-->

  <nav class="navbar navbar-expand-lg">

    <div class="container-fluid">

      <a href="{{ url('/')}}" class="navbar-brand home">{{ config('app.name')}}

      </a>

      <div class="navbar-buttons">

        <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler">

          <span class="sr-only">Toggle navigation

          </span>

          <i class="fa fa-align-justify">

          </i>

        </button>

        <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler">

          <span class="sr-only">Toggle search

          </span>

          <i class="fa fa-search">

          </i>

        </button>

        <a href="{{ route('showUserCart') }}" class="btn btn-outline-secondary navbar-toggler">

          <i class="fa fa-shopping-cart">

          </i>

        </a>

      </div>
<div id="navigation" class="collapse navbar-collapse">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item">

            <a href="http://localhost:8000" class="nav-link active">Home

            </a>

          </li>

          <li class="nav-item dropdown menu-large">

            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Women

              <b class="caret">

              </b>

            </a>

            <ul class="dropdown-menu megamenu">

              <li>

                <div class="row">

                  <div class="col-md-6 col-lg-3">

                    <h5>SAREES 



                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="\category\tussar-sarees" class="nav-link">Tussar Sarees

                        </a>

                      </li>

                      <li class="nav-item"><a href="\category\mulberry-silk-sarees" class="nav-link">
                           Mulberry Silk Sarees

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="\category\paithani-sarees" class="nav-link">Paithani Sarees

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="\category\organic-dye-sarees" class="nav-link">Organic Dye Sarees

                        </a>

                      </li>

                       <li class="nav-item">

                        <a href="\category\raw-silk-sarees" class="nav-link">Raw Silk Sarees

                        </a>

                      </li>

                            <li class="nav-item">

                        <a href="\category\designer-sarees" class="nav-link">Designer Sarees


                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Kurti

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="\category\A-line-kurti" class="nav-link"> 

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="\category\straight-kurti" class="nav-link"> Straight Kurti
                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="\category\flared-kurti" class="nav-link"> Flared Kurti
                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="\category\anarkali-kurti" class="nav-link"> Anarkali Kurti
                        </a>

                      </li>

                    </ul>

                  </div>

                </div>

              </li>

            </ul>

          </li>
          <li class="nav-item dropdown menu-large">

            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Accessories

              <b class="caret">

              </b>

            </a>

            <ul class="dropdown-menu megamenu">

              <li>

                <div class="row">

                  <div class="col-md-6 col-lg-3">

                    <h5>Categoris

                    </h5>

                    <ul class="list-unstyled mb-3">-->

                      <li class="nav-item">

                        <a href="http://localhost:8000" class="nav-link">Scarfs

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Potalis

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category-right.html" class="nav-link">Dupattas

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category-full.html" class="nav-link">Pagdi

                        </a>

                      </li>

                    </ul>

                  </div>

                  <!--<div class="col-md-6 col-lg-3">

                    <h5>User

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="register.html" class="nav-link">Register / login

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="customer-orders.html" class="nav-link">Orders history

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="customer-order.html" class="nav-link">Order history detail

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="customer-wishlist.html" class="nav-link">Wishlist

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="customer-account.html" class="nav-link">Customer account / change password

                        </a>

                      </li>

                    </ul>

                  </div>-->

                  <!--<div class="col-md-6 col-lg-3">

                    <h5>Order process

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="basket.html" class="nav-link">Shopping cart

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="checkout1.html" class="nav-link">Checkout - step 1

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="checkout2.html" class="nav-link">Checkout - step 2

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="checkout3.html" class="nav-link">Checkout - step 3

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="checkout4.html" class="nav-link">Checkout - step 4

                        </a>

                      </li>

                    </ul>

                  </div>-->

                  <!--<div class="col-md-6 col-lg-3">

                    <h5>Pages and blog

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="blog.html" class="nav-link">Blog listing

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="post.html" class="nav-link">Blog Post

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="faq.html" class="nav-link">FAQ

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="text.html" class="nav-link">Text page

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="text-right.html" class="nav-link">Text page - right sidebar

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="404.html" class="nav-link">404 page

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="contact.html" class="nav-link">Contact

                        </a>

                      </li>

                    </ul>

                  </div>-->

                </div>

              </li>

            </ul>

          </li>
          <li class="nav-item dropdown menu-large">

            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Home Textiles

              <b class="caret">

              </b>

            </a>

            <ul class="dropdown-menu megamenu">

              <li>

                <div class="row">

                  <div class="col-md-6 col-lg-3">

                    <h5>Categories

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Bed Covers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Handbag

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Dhurries
                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Towels
                        </a>

                      </li>

                    </ul>

                  </div>

                  <!--<div class="col-md-6 col-lg-3">

                    <h5>Shoes

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Accessories

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Featured

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                    </ul>

                    <h5>Looks and trends

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                    </ul>

                  </div>-->

                </div>

              </li>

            </ul>

          </li>
          <li class="nav-item dropdown menu-large">

            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Fabric

              <b class="caret">

              </b>

            </a>

            <ul class="dropdown-menu megamenu">

              <li>

                <div class="row">

                  <div class="col-md-6 col-lg-3">

                    <h5>Categories

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Georgette

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Khadi

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Silk

                        </a>

                      </li>

                      <!--<li class="nav-item">

                        <a href="category.html" class="nav-link">
                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Shoes

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Accessories

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Featured

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                    </ul>

                    <h5>Looks and trends

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                    </ul>

                  </div>-->

                </div>

              </li>

            </ul>

          </li>
          <li class="nav-item dropdown menu-large">

            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Events &amp; Exhibitions

              <b class="caret">

              </b>

            </a>

            <!--<ul class="dropdown-menu megamenu">

              <li>

                <div class="row">

                  <div class="col-md-6 col-lg-3">

                    <h5>Clothing

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">T-shirts

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Shirts

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Pants

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Accessories

                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Shoes

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Accessories

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Casual

                        </a>

                      </li>

                    </ul>

                  </div>

                  <div class="col-md-6 col-lg-3">

                    <h5>Featured

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                    </ul>

                    <h5>Looks and trends

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Trainers

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Sandals

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="category.html" class="nav-link">Hiking shoes

                        </a>

                      </li>

                    </ul>

                  </div>

                </div>

              </li>

            </ul>-->

          </li>
          <li class="nav-item dropdown menu-large">

            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Men

              <b class="caret">

              </b>

            </a>

            <ul class="dropdown-menu megamenu">

              <li>

                <div class="row">

                  <div class="col-md-6 col-lg-3">

                    <h5>Clothing

                    </h5>

                    <ul class="list-unstyled mb-3">

                      <li class="nav-item">

                        <a href="\category\kurta" class="nav-link">Kurta

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="\category\jodhpuri" class="nav-link">Jodhpuri

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="\category\eri-silk" class="nav-link">Eri Silk

                        </a>

                      </li>

                      <li class="nav-item">

                        <a href="\category\dhoti-kurta" class="nav-link">Dhoti Kurta

                        </a>

                      </li>

                    </ul>

                  </div>

                  
                  </div>

                </li></ul></li></ul>
                <div class="navbar-buttons d-flex justify-content-end">

          <!-- /.nav-collapse-->

          <div id="search-not-mobile" class="navbar-collapse collapse">

          </div>

          <a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block">

            <span class="sr-only">Toggle search

            </span>

            <i class="fa fa-search">

            </i>

          </a>
          @if(isset(Auth::user()->id))
          <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">

            <a href="{{ route('showUserCart') }}" class="btn btn-primary navbar-btn">

              <i class="fa fa-shopping-cart">

              </i>

              <span>{{ Auth::user()->cartItems->count() }} items in cart

              </span>

            </a>

          </div>
          @endif

        </div>

      </div>

    </div>

  </nav>

  
  <div id="search" class="collapse">

    <div class="container-fluid">

     <form class="ml-auto" id="searchForm">

        <div class="input-group">

          <input type="text" placeholder="Search" id="searchQuery" class="form-control" name="query">

          <div class="input-group-append">

            <input type="submit" id="searchQueryBtn" class="btn btn-primary">

              <i class="fa fa-search">

              </i>

            </input>

          </div>

        </div>

      </form>

    </div>

  </div>
</header>