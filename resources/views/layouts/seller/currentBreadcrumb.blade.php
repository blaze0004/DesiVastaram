	<div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role->name}}</a></li>
                  <li aria-current="page" class="breadcrumb-item active">{{__('Dashboard')}}</li>

                </ol>
              </nav>
            </div>
