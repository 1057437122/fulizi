<template>
  <div class="mask" v-if="visible">
  	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>{{ title }}</h5>
					</div>
					<slot></slot>
				</div>
			</div>
		</div>
	</div>
    
  </div>
</template>
<script>
export default {
	//
	props: {
		value: {
			type: Boolean,
			default: false,
		},
		title: {
			type: String,
			default: '标题',
		}
	},
	data() {
		return {
			visible: false,
		}
	},
	watch: {
		value() {
			this.visible = this.value
		},
		visible() {
			this.$emit('input',this.visible)
		}
	}
}
</script>

<style lang="scss" scoped>
.mask {
}
.panel {
  width: 60%;
  height: 80%;
  padding: 10px;
  display: flex;
  flex-direction: column;
  .panel-toolbar {
    display: flex;
    align-items: center;
    height: 50px;
    margin-bottom: 10px;
    > div {
      flex: 1;
    }
  }
  .panel-content {
    flex: 1;
    overflow: auto;
  }
}
</style>