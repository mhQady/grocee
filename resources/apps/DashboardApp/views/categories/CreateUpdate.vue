<script setup>
import { onMounted, reactive } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Category from '@model/Category';
import CategoryApi from '@api/Category.api';
import { useValidation } from "@compo/useValidation";
import { useToast } from "@compo/useSwal";
import { required } from '@vuelidate/validators';
import FileUploader from '@dash/components/FileUploader.vue'

const route = useRoute();
const router = useRouter();
const isUpdateForm = !!route.params.id;
let category = reactive(new Category);

const rules = {
    name: {
        ar: { required },
        en: { required }
    },
}

let { v$, $externalResults } = useValidation(rules, category);

onMounted(() => {
    if (isUpdateForm) {
        CategoryApi.get(route.params.id)
            .then((resp) => {
                category = Object.assign(category, new Category(resp.data.data));
            })
            .catch((error) => {
                console.log(error);
            })
    }
});

async function submit() {

    if (!await v$.value.$validate()) return;

    const Api = isUpdateForm ? CategoryApi.update(category) : CategoryApi.store(category);

    Api.then(resp => {
        router.push({ name: 'categories' });
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
        <div class="row mt-4">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">{{ route.meta.title }}</h4>
                        <button class="btn btn-primary bg-gradient-primary mb-0 btn-sm" type="submit">Save</button>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <FileUploader v-model="category.image" :uploadedFiles="category?.uploadedFiles" />
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ $t('ar.name') }}</label>
                                            <input class="form-control" type="text" v-model="category.name.ar">
                                            <div class="text text-danger" v-if="v$.name.ar.$error">
                                                {{ v$.name.ar.$errors[0].$message }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>{{ $t('en.name') }}</label>
                                        <input class="form-control" type="text" v-model="category.name.en">
                                        <div class="text text-danger" v-if="v$.name.en.$error">
                                            {{ v$.name.en.$errors[0].$message }}
                                        </div>
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
