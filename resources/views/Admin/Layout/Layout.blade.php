<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Emmat Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/Admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ url('/') }}/Admin/ckeditor/ckeditor.js"></script>
  </head>
  @php
  use Illuminate\Support\Facades\Route;
  $currentPath= Route::getFacadeRoot()->current()->uri();
  @endphp
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('admin-home') }}">Emmat</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
      	<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
           <!--  <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li> -->
            <!-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li> -->
            <li><a class="dropdown-item" href="{{ route('admin-logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
    </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ url('/') }}/Admin/images/dummy.jpg" alt="User Image" height="50px">
        <div>
          <p class="app-sidebar__user-name">Hii, Admin</p>
          <p class="app-sidebar__user-designation">Emmat Admin</p>
        </div>
      </div> 
      <ul class="app-menu">
        <li><a class="app-menu__item {{url()->current() == route('admin-home') ? 'active' : 'activate'}}" href="{{ route('admin-home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        @if(Auth::user()->id == 5)
        <li><a class="app-menu__item {{url()->current() == route('admin-category') ? 'active' : 'activate'}}" href="{{ route('admin-category') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Categories</span></a></li>

        <li><a class="app-menu__item {{url()->current() == route('admin-sub-category') ? 'active' : 'activate'}}" href="{{ route('admin-sub-category') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Subcategory</span></a></li>
    
        <li><a class="app-menu__item {{url()->current() == route('get-attribute') ? 'active' : 'activate'}}" href="{{ route('get-attribute') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Attributes</span></a></li>
        
        <li><a class="app-menu__item {{url()->current() == route('seo') ? 'active' : 'activate'}}" href="{{ route('seo') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Seo Section</span></a></li>
        @endif
        
        <li><a class="app-menu__item {{url()->current() == route('get-products') ? 'active' : 'activate'}}" href="{{ route('get-products') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Products</span></a></li>

        <li><a class="app-menu__item {{url()->current() == route('get-order') ? 'active' : 'activate'}}" href="{{ route('get-order') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Orders</span></a></li>
        
        

      </ul>
    </aside>
    @yield('content')
    <!-- Essential javascripts for application to work-->
    <script src="{{ url('/') }}/Admin/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('/') }}/Admin/js/popper.min.js"></script>
    <script src="{{ url('/') }}/Admin/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/Admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ url('/') }}/Admin/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ url('/') }}/Admin/js/plugins/chart.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/Admin/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/Admin/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({
      "ordering": false
    });</script>
    <script type="text/javascript">
      CKEDITOR.replace( 'editor1' );
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    <script>
      // $(document).ready(function(){

      // });
      function getCategory(val)
      {
        $.ajax({
          url:'{{ route("get-subcategory") }}',
          type:'get',
          data:{ cat_id : val },
          success:function(success){
            console.log(success);
            $('.subcategory').html(success);
          },
          error:function(error){
            console.log(error);
          }
        });
      }
      $(document).ready(function(){
        $('.variable').hide();
        $('#checkbox').click(function(){
          if(this.checked)
          {
            $('#type').val('variable');
            $('.multiple').hide();
            $('.variable').show();
          }
          else{
            $('#type').val('simple');
            $('.multiple').show();
            $('.variable').hide();
          }
        });
        var i = 0;
       
        $("#add").click(function(){
       
            ++i;
       
            $("#dynamicTable").append('<tr><td><input type="text" name="attribute['+i+'][attr_name]" placeholder="Enter Attribute Value" class="form-control" /></td><td><input type="file" name="attribute['+i+'][attr_image]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="attribute['+i+'][attr_price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });
       
        $(document).on('click', '.remove-tr', function(){  
             $(this).parents('tr').remove();
        });  
        
      });
    </script>
  </body>
</html>