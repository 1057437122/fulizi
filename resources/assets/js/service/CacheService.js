class CacheService {
  constructor(storage) {
    this._storage = storage
  }

  get(name) {
    let value = this._storage.getItem(name)
    if (value) {
      return JSON.parse(value)
    } else {
      return value
    }
  }

  set(name, value) {
    this._storage.setItem(name, JSON.stringify(value))
  }
  remove(name) {
    this._storage.removeItem(name)
  }
}

export const session = new CacheService(window.sessionStorage)
export const local = new CacheService(window.localStorage)
