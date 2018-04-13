import BaseModel from '../common/BaseModel'
import http from '../service/HttpService'
import exception from '../common/exception'

class ContentModel extends BaseModel {
  constructor() {
    super({
      types: []
    })
  }

  // async _loadCats() {
  //   this.types = await http.get('/categories')
  // }

  async loadSource(page, size, search, cat_id) {
    let params = { page, size, orders: 'id.desc' }
    if (search) {
      params.search = search
    }
    if (cat_id) {
      params.cat_id = cat_id
    }
    return await http.get('/categories', params)
  }

  async get(id) {
    return await http.get(`/categories/${id}`)
  }

  async create(entity) {
    return await http.post('/categories', entity)
  }

  async update(entity) {
    await http.patch(`/categories/${entity.id}`, entity)
  }

  async remove(entity) {
    await http.delete(`/categories/${entity.id}`)
  }

  // async createType(entity) {
  //   let result = await http.post(`/types/content`, entity)
  //   this.types.push(result)
  // }

  // async updateType(entity) {
  //   await http.patch(`/types/content/${entity.id}`, entity)
  // }

  // async removeType(entity) {
  //   await http.delete(`/types/content/${entity.id}`)
  //   this.types.splice(this.types.indexOf(entity), 1)
  // }
}

export default new ContentModel()
