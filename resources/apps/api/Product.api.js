import BaseApi from "@api/base.api";
import Http from "@service/http";

export default class Product extends BaseApi {

    static get entity() {
        return 'dashboard/products'
    }

    static async index(params = null) {
        return await Http.get(`dashboard/products`, params)
    }
}
