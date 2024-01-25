export default class Product {
    id = null;
    name = { ar: null, en: null };
    slug = { ar: null, en: null };
    description = { ar: null, en: null };
    status = null;
    price = 0;
    image = null;

    constructor(productObj) {

        this.id = productObj?.id;

        this.name = { ar: productObj?.name_ar, en: productObj?.name_en }

        this.slug.en = productObj?.slug_ar;
        this.slug.ar = productObj?.slug_ar;

        this.status = productObj?.status ?? 1;

        this.description.ar = productObj?.description_ar;
        this.description.en = productObj?.description_ar;

        this.price = productObj?.price ?? 0;

        this.image = productObj?.file[ 0 ];
    }

    static getStatuses() {
        return [
            { value: 1, label: 'published', badge: 'bg-success' },
            { value: 2, label: 'drafted', badge: 'bg-secondary' },
        ]
    }

    static getStatusBadge(status) {
        let result = Product.getStatuses().find(obj => obj.value === status);

        return `<span class="badge ${result.badge}">${result.label}</span>`;
    }
}
