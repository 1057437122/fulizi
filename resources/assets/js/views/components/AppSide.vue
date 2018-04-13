<template>
    <div class="app-side">
        <!--sidebar-menu-->
        <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 控制台</a>
          <ul>
            <li><router-link to="/design" :class="{on:route==='design'}"><i class="icon icon-fullscreen"></i> <span>设计</span></router-link></li>
            <li><router-link to="/single" :class="{on:route==='single'}"><i class="icon icon-signal"></i> <span>单页面</span></router-link></li>
            <li><router-link to="/category" :class="{on:route==='category'}"><i class="icon icon-inbox"></i> <span>栏目</span></router-link></li>
            <li><a href="index.html"><i class="icon icon-home"></i> <span>栏目</span></a> </li>
            <li><a href="index.html"><i class="icon icon-home"></i> <span>导航条</span></a> </li>
            <li><a href="index.html"><i class="icon icon-home"></i> <span>公司简介</span></a> </li>
            <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>产品介绍</span></a> </li>
            <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>负氧离子知识</span></a> </li>
            <li><a href="tables.html"><i class="icon icon-th"></i> <span>招商</span></a></li>
            <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>联系我们</span></a></li>
            
          </ul>
        </div>
        <!--sidebar-menu-->
    </div>
</template>
<script>
export default {
  computed: {
    route() {
      return this.$route.name
    }
  }
}
</script>