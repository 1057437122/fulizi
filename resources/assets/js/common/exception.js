import Vue from 'vue'

export default function (message) {
  return function (target, key, descriptor) {
    let method = descriptor.value
    descriptor.value = async function (...args) {
      try {
        return await method.apply(target, args)
      } catch (e) {
        Vue.$dispatchEvent('alert', {
          text: message || ('请求失败: ' + e.message)
        })
        throw e
      }
    }
    return descriptor
  }
}
