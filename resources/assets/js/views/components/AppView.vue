<template>
  <div class="app-view">
    <app-head></app-head>
    <app-side></app-side>
    <div class="app-content">
      <slot></slot>
    </div>
    <app-foot></app-foot>
  </div>
</template>
<script>
import AppHead from './AppHead.vue'
import AppSide from './AppSide.vue'
import AppFoot from './AppFoot.vue'
export default {
  components: { AppHead, AppSide, AppFoot }
}
</script>
