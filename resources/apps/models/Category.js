export default class Category {
    id = null;
    name = { ar: null, en: null };
    image = null;

    constructor(categoryObj) {

        this.id = categoryObj?.id;

        this.name = { ar: categoryObj?.name_ar, en: categoryObj?.name_en }

        this.image = categoryObj?.files[ 0 ];
    }
}
