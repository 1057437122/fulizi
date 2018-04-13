<template>
  <app-page @reachBottom="onReachBottom">
  <div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
        <h5>单页面文章列表</h5>
        <button class="btn btn-primary" @click="onAdd">添加</button>
      </div>
  <content-list ref="contentList" @modify="onModify"></content-list>
</div>
</div>

  <content-detail ref="contentDetail" @created="onCreated"></content-detail>
</div>
</app-page>
</template>
<script >
  import contentModel from '../../model/ContentModel'
  import ContentDetail from './ContentDetail.vue'
  import ContentList from './ContentList.vue'
  import AppPage from '../components/AppPage.vue'
  
  export default {
    components: { ContentDetail,ContentList,AppPage },
    data() {
      return {
        source: [],
      }
    },
    
    methods: {
      onReachBottom() {
        
          this.$refs.contentList.loadNextPage()
        
      },
      onAdd() {
        this.$refs.contentDetail.show()
      },
      onModify(item) {
        this.$refs.contentDetail.show(item)
      },
      async onDelete(item) {
        await articleModel.remove(item)
        item.close = !item.close
      },
      onCreated(item) {
        console.log('on created in root')
        
        this.$refs.contentList.onCreated(item)
        
      }
    },
    
  }
</script>