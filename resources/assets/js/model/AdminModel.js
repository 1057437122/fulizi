import BaseModel from '../common/BaseModel'
import http from '../service/HttpService'
import { session } from '../service/CacheService'

class AdminModel extends BaseModel {
  constructor() {
    super({
      source: [],
      current: false
    })
  }

  async _loadSource() {
    this.source = await http.get('/admins')
    console.log(this.source)
  }

  _loadCurrent() {
    this.current = session.get('current')
  }

  async login(name, password) {
    await http.post('/admins/auth', { name, password })
    session.set('current', { name })
    this.current = { name }
  }

  quit() {
    this.current = false
    session.remove('current')
  }

  async create(admin) {
    let result = await http.post('/admins', admin)
    this.source.push(result)
  }

  async update(admin) {
    await http.patch(`/admins/${admin.id}`, admin)
  }

  async remove(admin) {
    await http.delete(`/admins/${admin.id}`)
  }
}

export default new AdminModel()
