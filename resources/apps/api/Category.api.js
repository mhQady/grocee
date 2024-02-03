import BaseApi from "@api/base.api";
import Http from "@service/http"

export default class Category extends BaseApi {

    static get entity() {
        return 'categories'
    }

    static async getFeatureCategories() {
        return await Http.get(`${this.entity}/feature`)
    }

    static async getCategoriesHasNewestProducts() {
        return await Http.get(`${this.entity}/has-newest-products`)
    }
}
