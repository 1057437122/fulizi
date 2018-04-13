<template>
	<front-view>
	    <router-view></router-view>
	</front-view>
</template>
<script>
	import FrontView from '../components/FrontView.vue'
	export default {
		components: { FrontView }
	}
</script>