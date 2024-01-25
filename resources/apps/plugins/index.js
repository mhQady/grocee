import moment from "./moment";

export default {
    install: (app, options) => {
        app.use(moment);
    }
}
