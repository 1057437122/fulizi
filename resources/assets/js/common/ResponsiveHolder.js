import Vue from 'vue'
const EXPIRED = 5000

function createGetter(obj, key) {
  let loadFunction = obj[`_load${key[0].toUpperCase()}${key.substr(1)}`]
  let lastModifiedTime = 0
  let loading = false
  return function () {
    if (!loading && loadFunction) {
      const now = Date.now()
      if (now - lastModifiedTime > EXPIRED) {
        loading = true
        let result = loadFunction.apply(obj)
        if (result instanceof Promise) {
          result.then(() => {
            lastModifiedTime = now
          }).catch(err => {
            console.error(err)
          }).finally(() => {
            loading = false
          })
        } else {
          lastModifiedTime = now
          loading = false
        }
      }
    }
    return obj._$data[key]
  }
}

function createSetter(obj, key) {
  return function (value) {
    obj._$data[key] = value
  }
}

export default class ResponsiveHolder {
  constructor(data = {}) {
    this._$data = data
    this._$vm = new Vue({ data })
    Object.keys(data).forEach(key => {
      /* eslint-disable no-proto */
      let descriptor = Reflect.getOwnPropertyDescriptor(this.__proto__, key) || {}
      if (!descriptor.get) {
        descriptor.get = createGetter(this, key)
      }
      if (!descriptor.set) {
        descriptor.set = createSetter(this, key)
      }
      Reflect.defineProperty(this.__proto__, key, descriptor)
    })
  }

  appendResponsive(target, name, value) {
    this._$vm.$set(target, name, value)
  }
}
