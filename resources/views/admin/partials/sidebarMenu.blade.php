<div class="col-lg-3">
    <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
    <div class="card sidebar-menu">
        <div class="card-header">
            <h3 class="h4 card-title">
                Admin Panel
            </h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column">
                <a class="nav-link active" href="{{ route('admin.index') }}">
                    <i class="fa fa-list">
                    </i>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('admin.profile.edit', Auth::user()->id) }}">
                    <i class="fa fa-user">
                    </i>
                    My Account
                </a>

                <a href="{{ route('admin.addUser') }}">
                    <i class="fa fa-user"></i>
                    Add Users
                </a>
                <a class="nav-link" href="{{ route('admin.sellers.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Sellers
                </a>
                <a class="nav-link" href="{{ route('admin.buyers.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Buyers
                </a>
                <a class="nav-link" href="{{ route('admin.trainers.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Trainers
                </a>
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Products
                </a>
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="fa fa-user">
                    </i>
                    Category
                </a>
                 <a class="nav-link" href="{{ route('admin.address.create') }}">
                    <i class="fa fa-user">
                    </i>
                    City, State, Country Add/Remove
                </a>
                <a class="nav-link" href="{{ route('my_addresses', Auth::id()) }}">
                    
                    My Addresses
                </a>
             
            </ul>
        </div>
    </div>
</div>