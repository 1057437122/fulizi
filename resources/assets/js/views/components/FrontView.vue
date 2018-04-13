<template>
	<div class="front-view">
		<front-head></front-head>
  		<div class="main">
	    	<slot></slot>
           <front-foot></front-foot>   
        </div>
    </div>
</template>
<script>
import FrontFoot from './FrontFoot.vue'
import FrontHead from './FrontHead.vue'
export default {
  components: { FrontHead,FrontFoot }
}
</script>
