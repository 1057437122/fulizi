if (!Reflect.has(Array.prototype, 'first')) {
  Reflect.defineProperty(Array.prototype, 'first', {
    get: function () {
      let len = this.length
      if (len > 0) {
        return this[0]
      }
    }
  })
}
if (!Reflect.has(Array.prototype, 'last')) {
  Reflect.defineProperty(Array.prototype, 'last', {
    get: function () {
      let len = this.length
      if (len > 0) {
        return this[len - 1]
      }
    }
  })
}
if (!Reflect.has(Array.prototype, 'remove')) {
  Reflect.defineProperty(Array.prototype, 'remove', {
    value: function (target) {
      let index = this.indexOf(target)
      if (index >= 0) {
        this.splice(index, 1)
      }
      return index
    }
  })
}
