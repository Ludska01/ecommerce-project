@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();

@endphp




<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						 
						  <h3><b>Admin</b> dashboard</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route=='dashboard')? 'active':''}}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
        @php
        $brand = (auth()->guard('admin')->user()->brand == 1);
        $category = (auth()->guard('admin')->user()->category == 1);
        $product = (auth()->guard('admin')->user()->product == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $coupons = (auth()->guard('admin')->user()->coupons == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $blog = (auth()->guard('admin')->user()->blog == 1);
        $setting = (auth()->guard('admin')->user()->setting == 1);
        $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $orders = (auth()->guard('admin')->user()->orders == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $reports = (auth()->guard('admin')->user()->reports == 1);
        $alluser = (auth()->guard('admin')->user()->alluser == 1);
        $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp
		
      @if($brand == true) 
        <li class="treeview  {{ ($prefix =='/brand')? 'active':''}}">
          <a href="#">
            <i data-feather="aperture"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($prefix =='/brand')? 'active':''}}"><a href="{{ route('all.brands') }}"><i class="ti-more"></i>All brands</a></li>
            
          </ul>
        </li> 
        @else
        @endif
        @if($product == true)
        <li class="treeview  {{ ($prefix =='/category')? 'active':''}}">
          <a href="#">
            <i data-feather="layers"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('all.category') }}"><i class="ti-more {{ ($route == 'all.category') ? 'active':''}}"></i>All categories</a></li>
            <li><a href="{{ route('all.subcategory') }}"><i class="ti-more {{ ($route == 'all.subcategory') ? 'active':''}}"></i>All SubCategories</a></li>
            <li><a href="{{ route('all.subsubcategory') }}"><i class="ti-more {{ ($route == 'all.subsubcategory') ? 'active':''}}"></i>All Sub->SubCategories</a></li>
          </ul>
        </li>
		
        <li class="treeview {{ ($prefix =='/product')? 'active':''}}">
          <a href="#">
            <i data-feather="shopping-bag"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Products</a></li>
            <li><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Products</a></li>
            <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>
          </ul>
        </li> 
        
        @else
        @endif

        @if($slider == true)
        <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage.slider')? 'active':'' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>



          </ul>
        </li> 

        <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
          <a href="#">
            <i data-feather="percent"></i>
            <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage.coupon')? 'active':'' }}"><a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($shipping == true)
        <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
          <a href="#">
            <i data-feather="truck"></i>
            <span>Shipping area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage.division')? 'active':'' }}"><a href="{{ route('manage.division') }}"><i class="ti-more"></i>Shipping State</a></li>
            <li class="{{ ($route == 'manage.district')? 'active':'' }}"><a href="{{ route('manage.district') }}"><i class="ti-more"></i>Ship District</a></li>
            <li class="{{ ($route == 'manage-state')? 'active':'' }}"><a href="{{ route('manage.state') }}"><i class="ti-more"></i>Ship Region</a></li>
          </ul>
        </li>  
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Orders </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
            <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

            <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
    
          <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>
    
          <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>
    
         <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>
    

            
          </ul>
        </li>
		    @else
        @endif



     @if($reports == true)
        <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>All Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>

        
          </ul>
        </li> 
        @else
        @endif


        @if($adminuserrole == true)
        <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
          <a href="#">
            <i data-feather="users"></i>
            <span>All Users </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>
        <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin Users </a></li>


          </ul>
        </li>    
        @else
        @endif





        @if($blog == true)
        <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
          <a href="#">
            <i data-feather="edit"></i>
            <span>Manage Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>
        <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>List Blog Post</a></li>

        <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Add Blog Post</a></li>




          </ul>
        </li>    
        @else
        @endif




     @if($setting == true)
        <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
          <a href="#">
            <i data-feather="link"></i>
            <span>Manage Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>
        <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li>

          </ul>
        </li>   
        @else
        @endif




     @if($returnorder == true)
        <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
          <a href="#">
            <i data-feather="corner-down-left"></i>
            <span>Return Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a></li>

        <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>


          </ul>
        </li>    
        @else
        @endif

     @if($review == true)

        <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
          <a href="#">
            <i data-feather="book-open"></i>
            <span>Manage Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>

        <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>


          </ul>
        </li>    


      </ul>
      @else
      @endif
        
    </section>
	
	
  </aside>