<template>

<panel v-model="visible" title="内容">
  <div>{{ error }}</div>
  <div class="widget-content nopadding">
    <div  class="form-horizontal">
      <div class="control-group">
        <label class="control-label">名称 :</label>
        <div class="controls">
          <input type="text" class="span11" v-model="source.name" placeholder="请输入名称" />
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label">内容:</label>
        <div class="controls">
          <vue-editor class="span11" v-model="source.detail" useCustomImageHandler @imageAdded="handleImageAdded" ></vue-editor>
        </div>
      </div>
      <input type="hidden" v-model="source.cat_id" />
      
      <div class="form-actions">
        <button @click="onSave" class="btn btn-success">保存</button>
        <button @click="visible = false" class="btn btn-primary">取消</button>
      </div>
    </div>
  </div>
      
</panel>
</template>
<script >
  import contentModel from '../../model/ContentModel'
  import fileModel from '../../model/FileModel'
  import { VueEditor, Quill } from 'vue2-editor'
  import Panel from '../components/Panel.vue'

  // var Font = Quill.import('formats/font');
  // // We do not add Aref Ruqaa since it is the default
  // Font.whitelist = ['mirza', 'roboto'];
  // Quill.register(Font, true);

  export default {
    components: { Panel,VueEditor },
    props: ['catid'],
    data() {
      return {
        error: '',
        source: {
          detail: '',
          name: '',
          cat_id: 0,
          show_on_side: 0,
          show_on_nav: 0,
        },
        empty_data: {
          detail: '',
          name: '',
          cat_id: 0,
          show_on_side: 0,
          show_on_nav: 0,
        },
        visible: false,
        
      }
    },
    mounted(){
      this.cat_id = this.catid
      this.source.cat_id = this.catid
      this.empty_data.cat_id = this.catid
      console.log(this.source)
      console.log(this.empty_data)
    },
    methods: {
      async show(source) {
        
        if (source) {
          console.log('have source')
          let data = await contentModel.get(source.id)
          Object.assign(source, data)
          this.source = source
          
          this.error = ''
        }
        this.visible = true
        
      },
      onCreated() {
        console.log('now show on detail')
      },
      async handleImageAdded(file, Editor, cursorLocation, resetUploader) {
        //
        let data = new FormData()
        data.append('file', file)
        let result = await fileModel.create(data)
        
        Editor.insertEmbed(cursorLocation, 'image', '/'+result.file);
        resetUploader();  
      },
      async onSave(){
        try{
            if (this.source.id) {
              console.log('update old')
              console.log(this.source)
              await contentModel.update(this.source)
              this.source = this.empty_data
            } else {
              console.log('create new')
              console.log(this.source)
              let result = await contentModel.create(this.source)
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