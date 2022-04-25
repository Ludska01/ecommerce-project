@php
$categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp 



<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

@foreach ( $categories as $category )


        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa {{ $category->category_icon }}" aria-hidden="true"></i>{{ (session()->get('language')=='serbian') ? $category->category_name_srb : $category->category_name_en  }}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                @php
                      $subcats = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                    @endphp
                    @foreach ($subcats as $subcat)
                <div class="col-sm-12 col-md-3">
                  @php
                  $subsubcats = App\Models\SubSubCategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
                @endphp
                 
                 <a href="{{ url('subcategory/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en ) }}"><h2 class="title">{{(session()->get('language')=='serbian') ?  $subcat->subcategory_name_srb : $subcat->subcategory_name_en }}</h2></a>
                  <ul class="links">
                    @foreach ( $subsubcats as $subsubcat)
                      <li><a href="{{ url('subsubcategory/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_en ) }}">{{(session()->get('language')=='serbian') ? $subsubcat->subsubcategory_name_srb : $subsubcat->subsubcategory_name_en }}</a></li>
                    @endforeach
                    
                    
                  </ul>
                </div>
               @endforeach
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> 
        </li>
        <!-- /.menu-item -->
@endforeach                
      
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu --> 