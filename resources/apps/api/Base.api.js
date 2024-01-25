import Http from "@service/http"

export default class BaseApi {
    static get entity() {
        throw new Error('entity getter not defined')
    }

    static async index(params = {}) {
        return await Http.get(`${this.entity}`, params)
    }

    static async get(model, params = {}) {
        const id = (typeof model === "object") ? model.id : model;
        return await Http.get(`${this.entity}/${id}`, params)
    }

    static async store(model) {
        return await Http.post(`${this.entity}`, model)
    }

    static async update(model) {
        return await Http.put(`${this.entity}/${model.id}`, model)
    }

    static async delete(model) {
        const id = (typeof model === "object") ? model.id : model;
        return await Http.delete(`${this.entity}/${id}`)
    }

    static async request(requestBody) {
        return await Http.request(requestBody)
    }

}
