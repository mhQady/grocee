import { defineStore } from 'pinia';

export const useLoaderStore = defineStore('loader', {
    state: () => {
        return {
            loading: false,
            requestsPending: 0,
        }
    },

    getters: {
        isLoading: (state) => state.loading,
    },

    actions: {
        addRequest() {
            this.showLoader();
            this.incrementRequests();
        },

        requestDone() {
            this.decrementRequests();
            this.hideLoader();
        },

        showLoader() {
            if (this.requestsPending === 0) {
                this.loading = true;
            }
        },

        hideLoader() {
            if (this.requestsPending <= 0) {
                this.loading = false;
            }
        },

        incrementRequests() {
            this.requestsPending++;
        },

        decrementRequests() {
            if (this.requestsPending >= 1) {
                this.requestsPending--;
            }
        }
    },
});