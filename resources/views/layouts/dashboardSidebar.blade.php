@if (isset($trainee))

<div class="col-lg-3">
    <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
    <div class="card sidebar-menu">
        <div class="card-header">
            <h3 class="h4 card-title">
               
                    User Panel
               
            </h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column">
                <a class="nav-link active" href="{{ route('trainer.showTraineeDashboard', $trainee->id) }}">
                    <i class="fa fa-list">
                    </i>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('myaccount', $trainee->user->id) }}">
                    <i class="fa fa-user">
                    </i>
                    My Account
                </a>
      

                <!-- For Video and Chat -->
                <a class="nav-link" href="{{ route('chats') }}">
                    <i class="fa fa-user"></i>
                    Messages And Alert
                </a>    

                <a class="nav-link" href="{{ route('my_addresses', $trainee->user->id) }}">
                     <i class="fa fa-user">
                    </i>
                    My Addresses
                </a>
                 <a class="nav-link" href="{{ route('order_history', $trainee->user->id) }}">
                     <i class="fa fa-user">
                    </i>
                    My Orders
                </a>
                @if(Auth::user()->role_id == '1' || Auth::user()->role_id == '2' || Auth::user()->role_id == '4')
                <a class="nav-link" href="{{ route('productCRUD.showUserProducts', $trainee->user->id) }}">
                    <i class="fa fa-user">
                    </i>
                    Products
                </a>
                 <a class="nav-link" href="{{ route('product-order.list', $trainee->user->id) }}">
                    <i class="fa fa-user">
                    </i>
                    My Product Sell
                 </a>
                @endif

                
             
            </ul>
        </div>
    </div>
</div>


@else
<div class="col-lg-3">
    <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
    <div class="card sidebar-menu">
        <div class="card-header">
            <h3 class="h4 card-title">
                @if(Auth::user()->role_id == '1')
                    Admin Panel
                @else
                    User Panel
                @endif

            </h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <i class="fa fa-list">
                    </i>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('myaccount', Auth::user()->id) }}">
                    <i class="fa fa-user">
                    </i>
                    My Account
                </a>
                @if(Auth::user()->role_id == '1')
                <a class="nav-link" href="{{ route('admin.addUser') }}">
                    <i class="fa fa-user"></i>
                    Add Users
                </a>
                @endif

                <!-- For Video and Chat -->
                <a class="nav-link" href="{{ route('chats') }}">
                    <i class="fa fa-user"></i>
                    Messages And Alert
                </a>    

                @if(Auth::user()->role_id == '4')
                <a class="nav-link" href="{{ route('trainer.add-trainee-form', Auth::id()) }}">
                    <i class="fa fa-user"></i>
                    Add Users
                </a>
                @endif

                @if(Auth::user()->role_id == '1')
                <a class="nav-link" href="{{ route('admin.sellers.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Sellers
                </a>

                @endif

                @if(Auth::user()->role_id == '1')
                <a class="nav-link" href="{{ route('admin.buyers.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Buyers
                </a>
                @endif

                @if(Auth::user()->role_id == '1')
                <a class="nav-link" href="{{ route('admin.trainers.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Trainers
                </a>
                @endif

                @if(Auth::user()->role_id == '1')
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Category
                </a>
                @endif

                @if(Auth::user()->role_id == '1')
                 <a class="nav-link" href="{{ route('admin.address.create') }}">
                    <i class="fa fa-user">
                    </i>
                    City, State, Country Add/Remove
                </a>
                @endif
                <a class="nav-link" href="{{ route('my_addresses', Auth::id()) }}">
                     <i class="fa fa-user">
                    </i>
                    My Addresses
                </a>
                 <a class="nav-link" href="{{ route('order_history', Auth::id()) }}">
                     <i class="fa fa-user">
                    </i>
                    My Orders
                </a>
                @if(Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
                <a class="nav-link" href="{{ route('productCRUD.showUserProducts', Auth::id()) }}">
                    <i class="fa fa-user">
                    </i>
                    Products
                </a>
                 <a class="nav-link" href="{{ route('product-order.list', Auth::id()) }}">
                    <i class="fa fa-user">
                    </i>
                    My Product Sell
                </a>
                @endif

                @if(Auth::user()->role_id == '4')   
                 <a class="nav-link" href="{{ route('trainer.my-trainee', Auth::id()) }}">
                    <i class="fa fa-user">
                    </i>
                    My Trainee
                </a>
                @endif
             
            </ul>
        </div>
    </div>
</div>

@endif
