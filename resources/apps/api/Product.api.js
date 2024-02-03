import BaseApi from "@api/base.api";
import Http from "@service/http";
import Category from './../models/Category';

export default class Product extends BaseApi {

    static get entity() {
        return 'products'
    }

    static async getLatest(categoryId = '') {
        return await Http.get(`${this.entity}/latest/${categoryId}`)
    }

}
