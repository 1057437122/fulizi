<template>
  <div>
    <slot></slot>
  </div>
</template>
<script>
export default {
  mounted() {
    document.addEventListener('scroll', this.onScroll)
  },
  beforeDestroy() {
    document.removeEventListener('scroll', this.onScroll)
  },
  methods: {
    onScroll(e) {
      let offset = this.$el.clientHeight - window.innerHeight
      if (offset > 0 && Math.abs(offset - window.scrollY < 10)) {
        this.$emit('reachBottom')
      }
    }
  }
}
</script>
