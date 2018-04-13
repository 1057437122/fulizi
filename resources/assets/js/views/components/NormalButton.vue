<template>
	<button :class=cls @click="$emit('click', $event)" >{{ name }} </button>
</template>

<script>
export default {
	//
	props: {
		cls: {
			type: String,
			default: '',
		},
		name: {
			type: String,
			default: '按钮',
		}
	},
	data() {
		return {
			
		}
	},
}
</script>