<template>

<panel v-model="visible" title="栏目">
  <div>{{ error }}</div>
  <div class="widget-category nopadding">
    <div  class="form-horizontal">
      <div class="control-group">
        <label class="control-label">名称 :</label>
        <div class="controls">
          <input type="text" class="span11" v-model="source.name" placeholder="请输入名称" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">在侧边显示 :</label>
        <div class="controls">
          <input type="checkbox" class="span11" v-model="source.show_on_side"  />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">在导航显示 :</label>
        <div class="controls">
          <input type="checkbox" class="span11" v-model="source.show_on_nav"  />
        </div>
      </div>
      
      <div class="form-actions">
        <button @click="onSave" class="btn btn-success">保存</button>
        <button @click="visible = false" class="btn btn-primary">取消</button>
      </div>
    </div>
  </div>
      
</panel>
</template>
<script >
  import categoryModel from '../../model/CategoryModel'
  import Panel from '../components/Panel.vue'
  export default {
    components: { Panel },
    data() {
      return {
        error: '',
        source: {
          name: '',
          show_on_side: 0,
          show_on_nav: 0,
        },
        empty_data: {
          name: '',
          show_on_side:0,
          show_on_nav:0,
        },
        visible: false,
        
      }
    },
    methods: {
      async show(source) {
        
        if (source) {
          console.log('have source')
          let data = await categoryModel.get(source.id)
          Object.assign(source, data)
          this.source = source
          
          this.error = ''
        }
        this.visible = true
        
      },
      
      async onSave(){
        try{
            if (this.source.id) {
              await categoryModel.update(this.source)
              this.source = this.empty_data
            } else {
              let result = await categoryModel.create(this.source)
              this.$emit('created', result)
              this.source = this.empty_data
            }
            this.visible = false
        } catch (e) {
          //
          this.error = e.message
        }
        
      },
    },
    
  }
</script>