import BaseModel from '../common/BaseModel'
import http from '../service/HttpService'

class FileModel extends BaseModel {
  constructor() {
    super({})
  }
  getUrl(file) {
    return `/files/${file.file}`
  }

  async loadSource(page, size, search) {
    return await http.get('/files', { page, size, orders: 'id.desc', search })
  }

  async create(entity) {
    return await http.post('/files', entity)
  }

  async update(entity) {
    await http.patch(`/files/${entity.id}`, entity)
  }

  async remove(entity) {
    await http.delete(`/files/${entity.id}`)
  }
}

export default new FileModel()
