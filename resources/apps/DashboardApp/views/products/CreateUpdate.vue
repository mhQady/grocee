<script setup>
import { onMounted, reactive, inject } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Product from '@model/Product';
import ProductApi from '@api/Product.api';
import CategoryApi from '@api/Category.api';
import { useValidation } from "@compo/useValidation";
import { useToast } from "@compo/useSwal";
import { required } from '@vuelidate/validators';
import FileUploader from '@dash/components/FileUploader.vue'

const route = useRoute();
const moment = inject('moment');
const router = useRouter();
const isUpdateForm = !!route.params.id;
let product = reactive(new Product);
let categories = reactive({});

const rules = {
    name: {
        ar: { required },
        en: { required }
    },
    slug: {
        ar: { required },
        en: { required }
    },
    description: {
        ar: { required },
        en: { required }
    },
    price: { required },
    old_price: {},
    sale_ends_at: {},
    status: { required }
}

let { v$, $externalResults } = useValidation(rules, product);

onMounted(() => {

    CategoryApi.index()
        .then((resp) => {
            categories = Object.assign(categories, resp.data.data);
        })

    if (isUpdateForm) {
        ProductApi.get(route.params.id)
            .then((resp) => {
                console.log(resp.data.data.product);
                product = Object.assign(product, new Product(resp.data.data.product));
            })
            .catch((error) => {
                console.log(error);
            })
    }
});

async function submit() {

    // if (!await v$.value.$validate()) return;


    console.log('validated');

    const Api = isUpdateForm ? ProductApi.update(product) : ProductApi.store(product);

    Api.then(resp => {
        // router.push({ name: 'products' });
        useToast().fire({
            icon: "success",
            title: resp.data.message
        });
    })
        .catch((error) => {
            if (error.response.status == 422) {
                $externalResults.value = error.response.data.errors;

                let error_data = [ 'price', 'location_en', 'online_link', 'photo', 'lat', 'lng' ];

                for (const index in error_data) {
                    if (error.response.data.errors.hasOwnProperty(error_data[ index ])) {
                        useToast().fire({
                            icon: "error",
                            title: error.response.data.errors[ error_data[ index ] ][ 0 ]
                        });
                    }
                }
            }
        });
}

</script>
<template>
    <form @submit.prevent="submit">
        <div class="row">
            <div class="col-lg-6">
                <h4>{{ route.meta.title }}</h4>
            </div>
            <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
                <button class="btn btn-primary bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2"
                    type="submit">Save</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="font-weight-bolder text-capitalize">{{ $t('main_info') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ $t('ar.name') }}</label>
                                    <input class="form-control" type="text" v-model="product.name.ar">
                                    <div class="text text-danger" v-if="v$.name.ar.$error">
                                        {{ v$.name.ar.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ $t('en.name') }}</label>
                                    <input class="form-control" type="text" v-model="product.name.en">
                                    <div class="text text-danger" v-if="v$.name.en.$error">
                                        {{ v$.name.en.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ $t('ar.slug') }}</label>
                                    <input class="form-control" type="text" v-model="product.slug.ar">
                                    <div class="text text-danger" v-if="v$.slug.ar.$error">
                                        {{ v$.slug.ar.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ $t('en.slug') }}</label>
                                    <input class="form-control" type="text" v-model="product.slug.en">
                                    <div class="text text-danger" v-if="v$.slug.en.$error">
                                        {{ v$.slug.en.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ $t('status') }}</label>
                                    <select v-model="product.status" class="form-select">
                                        <option v-for="status in Product.getStatuses()" :value="status.value">
                                            {{ status.label }}</option>
                                    </select>
                                    <div class="text text-danger" v-if="v$.status.$error">
                                        {{ v$.status.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ $t('category') }}</label>
                                    <select v-model="product.category_id" class="form-select">
                                        <option v-for="category in categories" :value="category.id">
                                            {{ category.name.ar }}
                                        </option>
                                    </select>
                                    <div class="text text-danger" v-if="v$.status.$error">
                                        {{ v$.status.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ $t('ar.description') }}</label>
                                    <textarea class="form-control" type="text" v-model="product.description.ar"></textarea>
                                    <div class="text text-danger" v-if="v$.description.ar.$error">
                                        {{ v$.description.ar.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ $t('en.description') }}</label>
                                    <textarea class="form-control" type="text" v-model="product.description.en"></textarea>
                                    <div class="text text-danger" v-if="v$.description.en.$error">
                                        {{ v$.description.en.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-lg-0 mt-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="font-weight-bolder">Product Image</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <FileUploader v-model="product.image" :files="product?.image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="font-weight-bolder">Pricing</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ $t('price') }}</label>
                                    <input class="form-control" type="number" v-model.number="product.price" min="0.0"
                                        step=".01">
                                    <div class="text text-danger" v-if="v$.price.$error">
                                        {{ v$.price.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ $t('old_price') }}</label>
                                    <input class="form-control" type="number" v-model.number="product.old_price" min="0.0"
                                        step=".01">
                                    <div class="text text-danger" v-if="v$.old_price.$error">
                                        {{ v$.old_price.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ $t('sale_ends_at') }}</label>
                                    <input class="form-control" type="datetime-local" step="300"
                                        v-model.date="product.sale_ends_at" :min="moment().format('YYYY-MM-DD HH:mm')">
                                    <div class="text text-danger" v-if="v$.sale_ends_at.$error">
                                        {{ v$.sale_ends_at.$errors[0].$message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
