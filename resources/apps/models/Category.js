export default class Category {
    id = null;
    name = { ar: null, en: null };
    image = null;
    uploadedFiles = [];

    constructor(categoryObj) {

        if (categoryObj) {
            this.id = categoryObj?.id;
            this.name = { ar: categoryObj?.name?.ar, en: categoryObj?.name?.en };
            this.uploadedFiles = categoryObj?.files;
        }
    }
}
