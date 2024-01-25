import Http from "@service/http"

export default class AdminAuthApi {
    static async csrf() {
        return await Http.get(`${import.meta.env.VITE_APP_URl}csrf-cookie`)
    }
    static async checkAuth() {
        return await Http.get(`user`)
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
}
