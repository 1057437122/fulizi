<template>
	<div class="app-head">
		<div id="header">
		  <h1><a href="/">MATRIX</a></h1>
		</div>
		<!--top-Header-menu-->

		<div id="user-nav" class="navbar navbar-inverse">
		  <ul class="nav">
		    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{ user['name'] }} </span><b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li><a href="#"><i class="icon-user"></i>修改</a></li>
		        
		      </ul>
		    </li>
		    
		    
		    <li class=""><a title="" href="LOGOUT"><i class="icon icon-share-alt"></i> <span class="text">注销</span></a></li>
		    <li class=""><a title="" href="SETTING"><i class="icon icon-cog"></i> <span class="text">设计</span></a></li>
		  </ul>
		</div>
		<!--close-top-Header-menu-->
		<!--start-top-serch-->
		<div id="search">
		  <input type="text" placeholder="Search here..."/>
		  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
		</div>
		<!--close-top-serch-->
	</div>
</template>
<script>
import adminModel from '../../model/AdminModel'
export default {
  data() {
  	return {
  		user:adminModel.current,
  	}
  }
}
</script>
<style lang="scss">
    @import "/matrix/css/bootstrap.min.css";
    @import "/matrix/css/bootstrap-responsive.min.css";
    @import "/matrix/css/matrix-style.css";
    @import "/matrix/css/matrix-media.css";
    @import "/matrix/css/jquery.gritter.css";
    @import "../../../sass/app.scss";
</style> 