<div class="col-lg-3">
    <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
    <div class="card sidebar-menu mb-4">
        <div class="card-header">
            <h3 class="h4 card-title">
                Filters
            </h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column category-menu">
                <li>
                    <label for="categories">
                        Select Categories
                    </label>
                  
                    <select id="categories" multiple="true" class="form-control" name="categories[]">
                    
                    @foreach($products->categories as $category)

                      <option value="{{$category->id}}" selected>{{$category->title}}</option>
                      
                    @endforeach
                    </select>
                </li>
            </ul>
        </div>
    </div>
   <!--  <div class="card sidebar-menu mb-4">
       <div class="card-header">
           <h3 class="h4 card-title">
               Brands
               <a class="btn btn-sm btn-danger pull-right" href="#">
                   <i class="fa fa-times-circle">
                   </i>
                   Clear
               </a>
           </h3>
       </div>
       <div class="card-body">
           <form>
               <div class="form-group">
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               Khadi  (10)
                           </input>
                       </label>
                   </div>
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               Paridhan  (12)
                           </input>
                       </label>
                   </div>
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               Vastaram  (15)
                           </input>
                       </label>
                   </div>
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               Ambar  (14)
                           </input>
                       </label>
                   </div>
               </div>
               <button class="btn btn-default btn-sm btn-primary">
                   <i class="fa fa-pencil">
                   </i>
                   Apply
               </button>
           </form>
       </div>
   </div>
   <div class="card sidebar-menu mb-4">
       <div class="card-header">
           <h3 class="h4 card-title">
               Colours
               <a class="btn btn-sm btn-danger pull-right" href="#">
                   <i class="fa fa-times-circle">
                   </i>
                   Clear
               </a>
           </h3>
       </div>
       <div class="card-body">
           <form>
               <div class="form-group">
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               <span class="colour white">
                               </span>
                               White (14)
                           </input>
                       </label>
                   </div>
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               <span class="colour blue">
                               </span>
                               Blue (10)
                           </input>
                       </label>
                   </div>
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               <span class="colour green">
                               </span>
                               Green (20)
                           </input>
                       </label>
                   </div>
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               <span class="colour yellow">
                               </span>
                               Yellow (13)
                           </input>
                       </label>
                   </div>
                   <div class="checkbox">
                       <label>
                           <input type="checkbox">
                               <span class="colour red">
                               </span>
                               Red (10)
                           </input>
                       </label>
                   </div>
               </div>
               <button class="btn btn-default btn-sm btn-primary">
                   <i class="fa fa-pencil">
                   </i>
                   Apply
               </button>
           </form>
       </div>
   </div> -->
    <!-- *** MENUS AND FILTERS END ***-->
    <div class="banner">
        <a href="#">
            <img alt="navaratri special" class="img-fluid" src="img/banner3.jpg"/>
        </a>
    </div>
</div>
