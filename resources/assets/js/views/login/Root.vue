<template>
  <div id="loginbox">            
      
   <div class="control-group normal_text"> <h3>ZIYIBABA</h3></div>
          <div class="control-group">
              <div class="controls">
                  <div class="main_input_box">
                      <span class="add-on bg_lg"><i class="icon-user"> </i></span><input v-model="name" type="text" placeholder="请输入登录邮箱" />
                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="main_input_box">
                      <span class="add-on bg_ly"><i class="icon-lock"></i></span><input v-model="password" type="password" placeholder="请输入密码" />
                  </div>
              </div>
          </div>
          <div class="form-actions">
              <span ><button @click="onLogin" class="btn btn-success" /> 登录</button></span>
          </div>
          <div class="error">{{ error }}</div>
    
      
  </div>
</template>
<script>
import adminModel from '../../model/AdminModel'
export default {
  components: {  },
  data() {
    return {
      name: '',
      password: '',
      error: ''
    }
  },
  methods: {
    async onLogin() {
      
        try {
          await adminModel.login(this.name, this.password)
          this.$router.push({
            name: 'home'
          })
        } catch (e) {
          this.error = '登录失败，用户不存在或密码不正确'
        }
      
    }
  }
}
</script>

<style lang="scss" scoped>
    @import "/matrix/css/matrix-login.css";
    @import "/matrix/css/bootstrap.min.css";
    @import "/matrix/css/font-awesome.css";
    @import "/matrix/css/bootstrap-responsive.min.css";
</style> 