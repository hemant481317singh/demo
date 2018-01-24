  <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @if($menu == 'home')
              <li class="treeview active">
            @else
              <li class="treeview">
            @endif
              <a href="{{URL::route('home')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            @if($menu == 'slider')
              <li class="treeview active">
            @else
              <li class="treeview">
            @endif
              <a href="{{URL::route('slider.index')}}">
                <i class="fa fa-files-o"></i><span>Main-Slider</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            @if($menu == 'categories')
              <li class="treeview active">
            @else
              <li class="treeview">
            @endif
              <a href="{{URL::route('categories.index')}}">
                <i class="fa fa-th"></i> <span>Categories</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            @if($menu == 'producttype')
              <li class="treeview active">
            @else
              <li class="treeview">
            @endif
              <a href="{{URL::route('producttype.index')}}">
                <i class="fa fa-pie-chart"></i><span>Product Type</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            @if($menu == 'products')
              <li class="treeview active">
            @else
              <li class="treeview">
            @endif
              <a href="{{URL::route('products.index')}}">
                <i class="fa fa-laptop"></i><span>Products</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            @if($menu == 'mailbox')
              <li class="treeview active">
            @else
              <li class="treeview">
            @endif
              <a href="{{URL::route('mailbox.index')}}">
                <i class="fa fa-envelope"></i><span>Mail box</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <!-- <li class="header">LABELS</li> -->
            <!-- LABELS are used to add label to left-aside menu e.g. Main Navigation-->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>