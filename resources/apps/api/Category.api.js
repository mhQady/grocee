import BaseApi from "@api/base.api";

export default class Category extends BaseApi {

    static get entity() {
        return 'dashboard/categories'
    }
}
