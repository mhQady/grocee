import Http from "@service/http"

export default class AuthApi {
    static async csrf() {
        return await Http.get(`${import.meta.env.VITE_APP_URl}csrf-cookie`)
    }
    static async checkAuth() {
        return await Http.get(`user`)
    }

    static async register(credentials) {
        return await Http.post('register', credentials)
    }

    static async login(credentials) {
        return await Http.post('login', credentials)
    }

    static async logout() {
        return await Http.post('logout')
    }

    static async resetPassword(resetData) {
        return await Http.post('reset-password', resetData)
    }

    /* Admin auth */

    static async loginAdmin(credentials) {
        return await Http.post('dashboard/login', credentials)
    }
}
