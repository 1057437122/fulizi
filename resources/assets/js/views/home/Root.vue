<template>
  <app-view>
    <router-view></router-view>
  </app-view>
</template>
<script>
import AppView from '../components/AppView'
import adminModel from '../../model/AdminModel'
export default {
  components: { AppView },
  beforeCreate() {
  	if( !adminModel.current ){
  		this.$router.push({
  			name:'login'
  		})
  	}
  }
}
</script>
<style lang="scss" scoped>

</style>
