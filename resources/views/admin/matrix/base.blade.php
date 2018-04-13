<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/matrix/css/bootstrap.min.css" />
<link rel="stylesheet" href="/matrix/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/matrix/css/fullcalendar.css" />
<link rel="stylesheet" href="/matrix/css/matrix-style.css" />
<link rel="stylesheet" href="/matrix/css/matrix-media.css" />
<link href="/matrix/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/matrix/css/jquery.gritter.css" />
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="/{{ $background }}">{{ $title }}</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{ $user->name }}</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i>修改</a></li>
        
      </ul>
    </li>
    
    
    <li class=""><a title="" href="{{ url($background.'/logout') }} "><i class="icon icon-share-alt"></i> <span class="text">注销</span></a></li>
    <li class=""><a title="" href="{{ url($background.'/setting') }} "><i class="icon icon-cog"></i> <span class="text">设计</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 控制台</a>
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>设计</span></a> </li>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>单页面</span></a> </li>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>栏目</span></a> </li>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>导航条</span></a> </li>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>公司简介</span></a> </li>
    <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>产品介绍</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>负氧离子知识</span></a> </li>
    <li><a href="tables.html"><i class="icon icon-th"></i> <span>招商</span></a></li>
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>联系我们</span></a></li>
    
  </ul>
</div>
<!--sidebar-menu-->

@yield('content')


<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> made by :libaishun <email>libaishun007@gmail.com</email></div>
</div>

<!--end-Footer-part-->

<script src="/matrix/js/excanvas.min.js"></script> 
<script src="/matrix/js/jquery.min.js"></script> 
<script src="/matrix/js/jquery.ui.custom.js"></script> 
<script src="/matrix/js/bootstrap.min.js"></script> 
<script src="/matrix/js/jquery.flot.min.js"></script> 
<script src="/matrix/js/jquery.flot.resize.min.js"></script> 
<script src="/matrix/js/jquery.peity.min.js"></script> 
<script src="/matrix/js/fullcalendar.min.js"></script> 
<script src="/matrix/js/matrix.js"></script> 
<script src="/matrix/js/matrix.dashboard.js"></script> 
<script src="/matrix/js/jquery.gritter.min.js"></script> 
<script src="/matrix/js/matrix.interface.js"></script> 
<script src="/matrix/js/matrix.chat.js"></script> 
<script src="/matrix/js/jquery.validate.js"></script> 
<script src="/matrix/js/matrix.form_validation.js"></script> 
<script src="/matrix/js/jquery.wizard.js"></script> 
<script src="/matrix/js/jquery.uniform.js"></script> 
<script src="/matrix/js/select2.min.js"></script> 
<script src="/matrix/js/matrix.popover.js"></script> 
<script src="/matrix/js/jquery.dataTables.min.js"></script> 
<script src="/matrix/js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
