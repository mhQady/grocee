import BaseApi from "@api/base.api";
import Http from "@service/http";
import Category from './../models/Category';

export default class Product extends BaseApi {

    static get entity() {
        return 'dashboard/products'
    }

    // static async index(params = null) {
    //     return await Http.get(`dashboard/products`, params)
    // }

    static async getLatest(categoryId = '') {
        return await Http.get(`products/latest/${categoryId}`)
    }

}
