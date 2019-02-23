@extends("layouts.app")

@section('breadcrumb')
<div class="col-lg-12">
    <!-- breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    Home
                </a>
            </li>
            <li aria-current="page" class="breadcrumb-item active">
                My orders
            </li>
        </ol>
    </nav>
</div>
@endsection
@section('left-sidebar')
@include('layouts.customerSectionSidebar')
@endsection
@section("content")
<div class="col-lg-9" id="customer-order">
    <div class="box">
        <h1>
            Order #1735
        </h1>
        <p class="lead">
            Order #1735 was placed on
            <strong>
                15/03/2019
            </strong>
            and is currently
            <strong>
                Being prepared
            </strong>
            .
        </p>
        <p class="text-muted">
            If you have any questions, please feel free to
            <a href="contact.html">
                contact us
            </a>
            , our customer service center is working for you 24/7.
        </p>
        <hr>
            <div class="table-responsive mb-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                Product
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Unit price
                            </th>
                            <th>
                                Discount
                            </th>
                            <th>
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="#">
                                    <img alt="silk saree" src="img/banner4.jpg"/>
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    Cream & Pink Kanjeevaram silk saree
                                </a>
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                ₹2999
                            </td>
                            <td>
                                ₹0
                            </td>
                            <td>
                                ₹5998
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">
                                    <img alt=" Silk Sraee" src="img/silk2.jpg"/>
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    Salwar Suit
                                </a>
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                ₹1000
                            </td>
                            <td>
                                ₹0
                            </td>
                            <td>
                                ₹1000
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-right" colspan="5">
                                Order subtotal
                            </th>
                            <th>
                                ₹6998
                            </th>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="5">
                                Shipping and handling
                            </th>
                            <th>
                                ₹0
                            </th>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="5">
                                Tax
                            </th>
                            <th>
                                Rs.0
                            </th>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="5">
                                Total
                            </th>
                            <th>
                                ₹6998
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.table-responsive-->
            <div class="row addresses">
                <div class="col-lg-6">
                    <h2>
                        Invoice address
                    </h2>
                    <p>
                        Sunil Mishra
                        <br>
                            Q-298 Pallav Puram
                            <br>
                                Phase-1
                                <br>
                                    Modipuram
                                    <br>
                                        Meter
                                    </br>
                                </br>
                            </br>
                        </br>
                    </p>
                </div>
                <div class="col-lg-6">
                    <h2>
                        Shipping address
                    </h2>
                    <p>
                        Sunil Mishra
                        <br>
                            Q-298 Pallav Puram
                            <br>
                                Phase-1
                                <br>
                                    Modipuram
                                    <br>
                                        Meter
                                    </br>
                                </br>
                            </br>
                        </br>
                    </p>
                </div>
            </div>
        </hr>
    </div>
</div>
@endsection
