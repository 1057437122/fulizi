<template>
  <app-page class="apppage" @reachBottom="onReachBottom">
  <div id="content">
<!--breadcrumbs-->
  <div id="category-header">
    <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
        <h5>{{ title }}</h5>
        <normal-button cls="btn btn-success" @click="onBack"  :name=operator ></normal-button>
        <normal-button cls="btn btn-primary" @click="onAdd"  name="添加"></normal-button>
      </div>
      <component ref="list" v-bind:is="list" @modify="onModify" @show="onShow" :catid="getCatId" ></component>
    </div>
  </div>
  <component ref="detail" v-bind:is="detail" @created="onCreated" :catid="getCatId"></component>
</div>
</app-page>
</template>
<script >
  import categoryModel from '../../model/CategoryModel'
  import CategoryDetail from './CategoryDetail.vue'
  import CategoryList from './CategoryList.vue'
  import AppPage from '../components/AppPage.vue'


  import ContentList from './ContentList.vue'
  import ContentDetail from './ContentDetail.vue'

  import NormalButton from '../components/NormalButton.vue'
  
  export default {
    components: { CategoryDetail,CategoryList,AppPage,ContentList,NormalButton },
    data() {
      return {
        source: [],
        tag:'category',
        cat_id: 0,
        name:'',
      }
    },
    computed:{
      list(){
        return this.tag == 'category' ? CategoryList : ContentList;
      },
      detail(){
        return this.tag == 'category' ? CategoryDetail : ContentDetail;
      },
      getCatId(){
        return this.cat_id
      },
      title(){
        if(this.tag == 'category'){
          return '栏目列表'
        }else if(this.tag == 'content'){
          return  '文章列表'
        }
      },
      operator(){
        if(this.tag == 'category'){
          return '主页'
        }else if(this.tag == 'content'){
          return '返回'
        }
      }
    },
    mounted(){
      
    },
    
    methods: {
      onReachBottom() {
          this.$refs.list.loadNextPage()
      },
      onAdd() {
        this.$refs.detail.show()
      },
      onBack() {
        this.tag = 'category'
      },

      onModify(item) {
        this.$refs.detail.show(item)
      },
      onShow(item) {
        if( this.tag == 'category' ) {
          //
          this.tag = 'content'
          this.cat_id = item.id
        }
      },
      async onDelete(item) {
        await articleModel.remove(item)
        item.close = !item.close
      },
      onCreated(item) {
        // 
        this.$refs.list.onCreated(item)
        
      }
    },
    
  }
</script>