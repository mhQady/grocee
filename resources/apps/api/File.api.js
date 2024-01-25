import Http from "@service/http";
import BaseApi from "@api/base.api";

export default class FileApi extends BaseApi {
    static get entity() {
        return 'files'
    }
}
