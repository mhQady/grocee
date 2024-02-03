export default class Product {
    id = null;
    name = { ar: null, en: null };
    slug = { ar: null, en: null };
    description = { ar: null, en: null };
    status = null;
    price = 0;
    old_price = 0;
    image = null;
    category_id = null;

    constructor(productObj) {
        this.id = productObj?.id;
        this.name = { ar: productObj?.name?.ar, en: productObj?.name?.en };
        this.slug = { ar: productObj?.slug?.ar, en: productObj?.slug?.en };
        this.description = { ar: productObj?.description?.ar, en: productObj?.description?.en };
        this.status = productObj?.status ?? 1;
        this.price = productObj?.price ?? 0;
        this.old_price = productObj?.old_price ?? 0;
        // this.image = productObj?.file[ 0 ];
        this.category_id = productObj?.category_id;
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
