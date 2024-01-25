import Cookies from 'js-cookie'
import { Base64 } from 'js-base64'

export default class Storage {

    static defaultAttributes = {
        secure: true,
        sameSite: 'lax',
        path: '/'
    }

    static get(key, attributes = {}, base64Decode = true) {
        let item = Cookies.get(key, { ...this.defaultAttributes, ...attributes });

        if (item === 'undefined' || item === null) {
            return false;
        }

        if (base64Decode) {
            try {
                item = Base64.decode(item);
            } catch (e) {
            }
        }

        try {
            return JSON.parse(item);
        } catch (e) {
        }

        return item;
    }

    static set(key, value, attributes = {}, base64Encode = true) {

        if (typeof value === "object") {
            value = JSON.stringify(value);
        }

        if (base64Encode) {
            value = Base64.encode(value);
        }

        Cookies.set(key, value, { ...this.defaultAttributes, ...attributes });
    }

    static remove(key, attributes = {}) {
        Cookies.remove(key, attributes);
    }

    static clean(attributes = {}) {
        Object.keys(Cookies.get()).forEach((cookie) => {
            Cookies.remove(cookie, { ...this.defaultAttributes, ...attributes });
        });
    }
}
