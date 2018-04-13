<template>
  
      <div class="widget-content">
        <div class="todo">
          <ul v-for="(item,index) in source" :key="index">

            <li class="clearfix">
              <div class="txt"> {{ item.name }}<span class="by label">{{ item.user }}</span></div>
              <div class="pull-right"> 
                <button @click="onModify(item)" class="btn btn-mini btn-primary"><i class="icon-pencil"></i>修改</button> 
                <button @click="onDelete(item)" class="btn btn-mini btn-danger"><i class="icon-pencil"></i>删除</button> 
                
              </div>
            </li>
            
          </ul>
        </div>
      </div>
    
</template>
<script>
  import contentModel from '../../model/ContentModel'
  export default {
    data() {
      return {
        page: -1,
        size: 20,
        source: [],
        loading: false,
        end: false,
        search: '',
        cat_id: 0,
      }
    },
    mounted() {
      this.loadNextPage()
    },
    methods: {
      async loadNextPage ()  {
        if (this.loading || this.end){
          return 
        }
        this.loading = true
        try {
          let list = await contentModel.loadSource(this.page + 1, this.size, this.search, this.cat_id)
          this.end = list.length < this.size
          this.source = [...this.source, ...list]
          this.page++
        } finally {
          this.loading = false
        }
      },
      onCreated(item) {
        console.log(item)
        this.source.unshift(item)
      },
      onModify(item) {
        this.$emit('modify', item)
      },
      async onDelete(item){
        await contentModel.remove(item)
        this.source.splice(this.source.indexOf(item), 1)
      }
    }
  }
</script>
