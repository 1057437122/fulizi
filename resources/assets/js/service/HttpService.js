import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)

export const HttpService = class HttpService {
  constructor(domain) {
    this._domain = domain
  }

  async request(method, url, { params, body, headers }) {
    if (!/^https?:\/\//i.test(url)) {
      url = this._domain + url
    }
    let time = Date.now()
    try {
      let result = await Vue.http({ method, url, params, body, headers })
      let cost = Date.now() - time
      console.log(method, cost, url)
      return result.body
    } catch (e) {
      console.error(method, url)
      throw new Error(`[${e.status}]${e.body}`)
    }
  }

  get(url, params) {
    return this.request('get', url, { params })
  }

  post(url, body, params) {
    return this.request('post', url, { params, body })
  }

  put(url, body, params) {
    return this.request('put', url, { params, body })
  }

  patch(url, body, params) {
    return this.request('patch', url, { params, body })
  }

  delete(url, params) {
    return this.request('delete', url, { params })
  }
}

export default new HttpService('/api')
