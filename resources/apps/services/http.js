import router from "@dash/router";
// import { useLoaderStore } from "@store/loader";
import { useUserStore } from "@store/userStore";
import { useAdminStore } from "@/store/adminStore";
// import { useToast } from "vue-toastification";
import Storage from '@service/storage';

class Http {

    #client;

    constructor() {

        this.#client = axios.create({
            baseURL: import.meta.env.VITE_VUE_APP_ROOT_API,
            withCredentials: true,
            withXSRFToken: true,
            headers: {
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-Locale": "en",
            }
        });

        // this.interceptRequests();
        // this.interceptResponse();
    }

    get client() {
        return this.#client;
    }

    get(resource, params = null, headers = {}) {
        return this.#client.get(resource, {
            params: params,
            headers: headers
        })
    }

    post(resource, data) {
        return this.#client.post(resource, data)
    }

    put(resource, data) {
        return this.#client.put(resource, data)
    }

    delete(resource) {
        return this.#client.delete(resource)
    }

    /**
     * Perform a custom axios request.
     *
     * data is an object containing the following properties:
     *  - method
     *  - url
     *  - data ... request payload
     *  - auth (optional)
     *    - username
     *    - password
     **/
    request(data) {
        return this.#client(data)
    }

    // setHeader(key, value) {
    //     this.#client.defaults.headers.common[ key ] = value;
    // }

    // getHeader(key) {
    //     return this.#client.defaults.headers.common;
    // }

    // setHeaders(headers) {
    //     for (let header in headers) {
    //         this.#client.defaults.headers.common[ header ] = headers[ header ];
    //     }
    // }

    // removeHeader(key) {
    //     delete this.#client.defaults.headers.common[ key ];
    // }

    /* setAuthHeader() {
        this.setHeader("Authorization", `Bearer ${TokenService.getToken()}`);
    } */

    /* removeAuthHeader() {
        this.removeHeader("Authorization");
    } */

    // clearHeaders() {
    //     this.#client.defaults.headers.common = {}
    // }

    // interceptRequests() {
    //     this.#client.interceptors.request.use(function (config) {
    //         // Do something before request is sent

    //         useLoaderStore().addRequest();
    //         if (useLoaderStore().isLoading) {
    //             // NProgress.start();
    //         }

    //         return config;
    //     }, function (error) {
    //         // Do something with request error
    //         return Promise.reject(error);
    //     });
    // }

    interceptResponse() {
        this.#client.interceptors.response.use(
            response => {
                // Scroll to page top
                // window.scrollTo(0, 0);

                // End the progress bar
                // useLoaderStore().requestDone();
                // if (!useLoaderStore().isLoading) {
                //     // NProgress.done();
                // }

                if (_.has(response, 'data.status') && response.data.status != 200) {
                    response.status = response.data.status;
                    let res = _.cloneDeep(response);
                    res = _.set(res, 'status', res.data.status);
                    return this.errorResponseHandler(res);
                }

                // Return axios response
                return response
            },
            this.errorResponseHandler
        )
    }

    errorResponseHandler(error) {
        // End the progress bar
        // useLoaderStore().requestDone();
        // if (!useLoaderStore().isLoading) {
        //     // NProgress.done();
        // }

        if (error.response) {
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx

            // Get status code
            let statusCode = error.response.status;
            // console.info('Resp Code:', error.response.status);

            // Redirect to login at 401 (Unauthenticated user error)
            if (statusCode == 401) {
                Storage.clean();
                useUserStore().$reset();
                userAdminStore().$reset();

                if (router.currentRoute.value.name == 'login') {
                    // Vue.prototype.$snotify.error(error.response.data.error);
                    return false;
                }

                console.info('Redirect to login');
                // console.info(router.push({ path: '/login' }));
                router.push({
                    path: '/login'
                });
                // return window.location.href = '/login';
                return Promise.reject(error);
            }

            // Return response at 422 (validation errors)
            if ([ 422 ].includes(statusCode)) {
                return Promise.reject(error);
            }

            // Do nothing in these errors
            if ([ 429 ].includes(statusCode)) {
                return false;
            }

            console.error(error.response.data);
            console.error(error.response.status);
            console.error(error.response.headers);

            if ((error.response.data.message &&
                typeof error.response.data.message !== 'undefined') ||
                (error.response.data.errors &&
                    typeof error.response.data.errors !== 'undefined')) {
                useToast().error(error.response.data.message || error.response.data.errors);
            }
            return Promise.reject(error);
        } else if (error.request) {
            // The request was made but no response was received
            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
            // http.#clientRequest in node.js
            console.log(error.request);
        } else {
            // Something happened in setting up the request that triggered an Error
            console.log("Error", error.message);
        }
        console.log(error.config);
    }
}

export default new Http();
