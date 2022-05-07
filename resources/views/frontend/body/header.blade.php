
<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i class="icon fa fa-check"></i>Order Traking</a></li>
              <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
              <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
              <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
              <li>
                @auth
                <a href="{{ route('user.profile') }}"><i class="icon fa fa-user"></i>
                  @if(session()->get('language') == 'serbian') Moj profil @else My Account @endif
                              </a>
                {{-- <a href="{{ route('login') }}"><i class="icon fa fa-user"></i>User profile</a> --}}
                @else
                <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a>
               @endauth
              
              
              </li>
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">

              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"> 
                @if (session()->get('language') == 'serbian')
                  Jezik: Srpski
                  @else
                  Language: English
                  @endif
              </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  @if (session()->get('language') == 'serbian')
                  <li><a href="{{ route('english.language') }}">English</a></li>
                  @else
                  <li><a href="{{ route('serbian.language') }}">Srpski</a></li>
                  @endif
                  
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            @php
            $setting = App\Models\SiteSetting::find(1);
             @endphp
            <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form method="post" action="{{ route('product.search') }}">
                @csrf
                
                <input class="search-field" name="search" placeholder="Search here..." />
                  <button class="search-button" type="submit"></button> 
                
               
              </form>
              <div id="searchProducts"></div>
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                <div class="total-price-basket"> <span class="lbl">cart -</span> 
                  <span class="total-price"> <span class="sign">$</span>
                  <span class="value" id="cartSubTotal"> </span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div id="miniCart">

                  </div>
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span>
                      <span class='price'  id="cartSubTotal"> </span> </div>
                    <div class="clearfix"></div>
                    <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="{{ route('index') }}">Home</a> </li>
                 
                  @php
                    
                  $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();

                  @endphp

                @foreach ( $categories as $category)
                  
                

                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ (session()->get('language')=='serbian') ?   $category->category_name_srb : $category->category_name_en }}</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            @php
                              $subcats = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                            @endphp
                            @foreach ($subcats as $subcat)
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              @php
                              $subsubcats = App\Models\SubSubCategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
                            @endphp
                             
                              <a href="{{ url('subcategory/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en ) }}"><h2 class="title">{{(session()->get('language')=='serbian') ?  $subcat->subcategory_name_srb : $subcat->subcategory_name_en }}</h2></a>
                              <ul class="links">
                                @foreach ( $subsubcats as $subsubcat)
                                  <li><a href="{{ url('subsubcategory/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_en ) }}">{{(session()->get('language')=='serbian') ?  $subsubcat->subsubcategory_name_srb : $subsubcat->subsubcategory_name_en }}</a></li>
                                @endforeach
                                
                                
                              </ul>
                            </div>
                            @endforeach
                            
                            
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  @endforeach
                  
                  <li class="dropdown  navbar-right special-menu"> <a href="{{ route('home.blog') }}">Blog</a> </li>
                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 

    <!-- Order Tracking Modal -->
<div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('order.tracking') }}">
          @csrf
         <div class="modal-body">
          <label>Invoice Code</label>
          <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">           
         </div>

         <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>

        </form> 


      </div>

    </div>
  </div>
</div>
    
  </header>


</header>


