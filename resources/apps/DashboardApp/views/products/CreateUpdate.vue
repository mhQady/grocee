<script setup>
import { onMounted, reactive } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Product from '@model/Product';
import ProductApi from '@api/Product.api';
import { useValidation } from "@compo/useValidation";
import { useToast } from "@compo/useSwal";
import { required } from '@vuelidate/validators';
import FileUploader from '@dash/components/FileUploader.vue'

const route = useRoute();
const router = useRouter();
const isUpdateForm = !!route.params.id;
let product = reactive(new Product);

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
    status: { required }
}

let { v$, $externalResults } = useValidation(rules, product);

onMounted(() => {
    if (isUpdateForm) {
        ProductApi.get(route.params.id)
            .then((resp) => {
                product = Object.assign(product, new Product(resp.data.product));
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
        {{ product }}
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Product Image</h5>
                        <div class="row">
                            <div class="col-12">
                                <!-- <FilePond v-model="product.image" :files="product?.image" /> -->
                                <FileUploader v-model="product.image" :files="product?.image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder text-capitalize">{{ $t('main_info') }}</h5>
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
                                <label>{{ $t('en.name') }}</label>
                                <input class="form-control" type="text" v-model="product.name.en">
                                <div class="text text-danger" v-if="v$.name.en.$error">
                                    {{ v$.name.en.$errors[0].$message }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                <label>{{ $t('en.slug') }}</label>
                                <input class="form-control" type="text" v-model="product.slug.en">
                                <div class="text text-danger" v-if="v$.slug.en.$error">
                                    {{ v$.slug.en.$errors[0].$message }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="mt-4">{{ $t('price') }}</label>
                                <input class="form-control" type="number" v-model.number="product.price" min="0">
                                <div class="text text-danger" v-if="v$.price.$error">
                                    {{ v$.price.$errors[0].$message }}
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="mt-4">{{ $t('status') }}</label>
                                <select v-model="product.status" class="form-select">
                                    <option v-for="status in Product.getStatuses()" :value="status.value">
                                        {{ status.label }}</option>
                                </select>
                                <div class="text text-danger" v-if="v$.status.$error">
                                    {{ v$.status.$errors[0].$message }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
        <!--  <div class="row mt-4">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Socials</h5>
                        <label>Shoppify Handle</label>
                        <input class="form-control" type="text" value="@soft" onfocus="focused(this)"
                            onfocusout="defocused(this)" spellcheck="false" data-ms-editor="true">
                        <label class="mt-4">Facebook Account</label>
                        <input class="form-control" type="text" value="https://" onfocus="focused(this)"
                            onfocusout="defocused(this)" spellcheck="false" data-ms-editor="true">
                        <label class="mt-4">Instagram Account</label>
                        <input class="form-control" type="text" value="https://" onfocus="focused(this)"
                            onfocusout="defocused(this)" spellcheck="false" data-ms-editor="true">
                    </div>
                </div>
            </div>
            <div class="col-sm-8 mt-sm-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="font-weight-bolder">Pricing</h5>
                            <div class="col-3">
                                <label>Price</label>
                                <input class="form-control" type="number" value="99.00" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                            <div class="col-4">
                                <label>Currency</label>
                                <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true"
                                    aria-expanded="false">
                                    <div class="choices__inner"><select class="form-control choices__input"
                                            name="choices-sizes" id="choices-currency-edit" hidden="" tabindex="-1"
                                            data-choice="active">
                                            <option value="Choice 1">USD</option>
                                        </select>
                                        <div class="choices__list choices__list--single">
                                            <div class="choices__item choices__item--selectable" data-item="" data-id="1"
                                                data-value="Choice 1" data-custom-properties="null" aria-selected="true">USD
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                        <div class="choices__list" role="listbox">
                                            <div id="choices--choices-currency-edit-item-choice-1"
                                                class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                role="option" data-choice="" data-id="1" data-value="Choice 6"
                                                data-select-text="Press to select" data-choice-selectable=""
                                                aria-selected="true">BTC</div>
                                            <div id="choices--choices-currency-edit-item-choice-2"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option" data-choice="" data-id="2" data-value="Choice 4"
                                                data-select-text="Press to select" data-choice-selectable="">CNY</div>
                                            <div id="choices--choices-currency-edit-item-choice-3"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option" data-choice="" data-id="3" data-value="Choice 2"
                                                data-select-text="Press to select" data-choice-selectable="">EUR</div>
                                            <div id="choices--choices-currency-edit-item-choice-4"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option" data-choice="" data-id="4" data-value="Choice 3"
                                                data-select-text="Press to select" data-choice-selectable="">GBP</div>
                                            <div id="choices--choices-currency-edit-item-choice-5"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option" data-choice="" data-id="5" data-value="Choice 5"
                                                data-select-text="Press to select" data-choice-selectable="">INR</div>
                                            <div id="choices--choices-currency-edit-item-choice-6"
                                                class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                role="option" data-choice="" data-id="6" data-value="Choice 1"
                                                data-select-text="Press to select" data-choice-selectable="">USD</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <label>SKU</label>
                                <input class="form-control" type="text" value="71283476591" onfocus="focused(this)"
                                    onfocusout="defocused(this)" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="mt-4">Tags</label>
                                <div class="choices" data-type="select-multiple" role="combobox" aria-autocomplete="list"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div class="choices__inner"><select class="form-control choices__input"
                                            name="choices-tags" id="choices-tags-edit" multiple="" hidden="" tabindex="-1"
                                            data-choice="active">
                                            <option value="Choice 1">In Stock</option>
                                            <option value="Two">Out of Stock</option>
                                        </select>
                                        <div class="choices__list choices__list--multiple">
                                            <div class="choices__item choices__item--selectable" data-item="" data-id="1"
                                                data-value="Choice 1" data-custom-properties="null" aria-selected="true"
                                                data-deletable="">In Stock<button type="button" class="choices__button"
                                                    aria-label="Remove item: 'Choice 1'" data-button="">Remove item</button>
                                            </div>
                                            <div class="choices__item choices__item--selectable" data-item="" data-id="2"
                                                data-value="Two" data-custom-properties="null" aria-selected="true"
                                                data-deletable="">Out of Stock<button type="button" class="choices__button"
                                                    aria-label="Remove item: 'Two'" data-button="">Remove item</button>
                                            </div>
                                        </div><input type="text" class="choices__input choices__input--cloned"
                                            autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox"
                                            aria-autocomplete="list" aria-label="false">
                                    </div>
                                    <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                        <div class="choices__list" aria-multiselectable="true" role="listbox">
                                            <div id="choices--choices-tags-edit-item-choice-1"
                                                class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                role="option" data-choice="" data-id="1" data-value="Choice 4"
                                                data-select-text="Press to select" data-choice-selectable=""
                                                aria-selected="true">Black Friday</div>
                                            <div id="choices--choices-tags-edit-item-choice-5"
                                                class="choices__item choices__item--choice choices__item--disabled"
                                                role="option" data-choice="" data-id="5" data-value="One"
                                                data-select-text="Press to select" data-choice-disabled=""
                                                aria-disabled="true">Expired</div>
                                            <div id="choices--choices-tags-edit-item-choice-3"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option" data-choice="" data-id="3" data-value="Choice 2"
                                                data-select-text="Press to select" data-choice-selectable="">Out of
                                                Stock
                                            </div>
                                            <div id="choices--choices-tags-edit-item-choice-4"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option" data-choice="" data-id="4" data-value="Choice 3"
                                                data-select-text="Press to select" data-choice-selectable="">Sale</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </form>
</template>
