<script setup>
import { onMounted, ref, watch, computed } from 'vue';
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import Select from 'datatables.net-select';
import ColReorder from 'datatables.net-colreorder';
import RowReorder from 'datatables.net-rowreorder';
import { useRoute, useRouter } from 'vue-router';
import { useConfirm, useToast } from "@compo/useSwal";


DataTable.use(DataTablesCore);
DataTable.use(Select);
DataTable.use(ColReorder);
DataTable.use(RowReorder);

const route = useRoute();
const router = useRouter();

const props = defineProps({
    columns: {
        type: Array,
        required: true
    },
    dataApi: {
        required: true
    },
    editRoute: {
        type: String
    },
    enableDelete: {
        type: Boolean,
        default: true
    },
    options: {
        type: Object,
        default: {
            searching: false,
            paging: false,
            lengthChange: false,
            autoWidth: false,
            deferRender: true,
            info: false,
            colReorder: true,
            rowReorder: {
                dataSrc: 'sequence'
            }
        }
    },
});

const loading = ref(true);
const data = ref([]);
const dataApi = props.dataApi;
const options = ref(props.options);
const myTable = ref(null);
const columns = computed(() => {
    let cols = props.columns;

    // if (myTable.value) {
    cols.unshift({
        data: 'id',
        render: (data, type, row, meta) => ((route.query.page - 1) * myTable.value.dt.page.len()) + meta.row + 1
    });
    // }

    if (props.editRoute || props.enableDelete) {
        cols.push({
            data: 'id',
            render: (data) => {
                let elements = '';

                if (props.editRoute) {
                    const to = router.resolve({ name: props.editRoute, params: { id: data } });
                    elements += `<a class="edit-link" href="${to.fullPath}">
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>`;
                }

                if (props.enableDelete) {
                    elements += `<a class="delete-link" href="${data}">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </a>`;
                }

                return `<div class="d-flex gap-3">
                            ${elements}
                        </div>`;
            }
        });
    }

    return cols;
});


onMounted(() => {
    loadData();

    myTable.value?.dt.on('user-select', function (e, dt, type, cell, originalEvent) {
        console.log([ e, dt, type, cell, originalEvent ]);
        // if (originalEvent.target.nodeName.toLowerCase() === 'img') {
        //     e.preventDefault();
        // }
    });

    if (props.editRoute) {
        myTable.value?.dt.on('draw', function () {
            document.querySelectorAll('.edit-link').forEach((link) => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    router.push(e.currentTarget.getAttribute('href'));
                });
            });

            document.querySelectorAll('.delete-link').forEach((link) => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();

                    let id = e.currentTarget.getAttribute('href');

                    useConfirm().fire().then((result) => {
                        console.log(result);

                        if (result.isConfirmed) deleteRecord(id);

                    });
                });
            });
        });
    }
});

async function deleteRecord(id) {
    let resp = await dataApi.delete(id);

    await useToast().fire({
        icon: "success",
        title: resp.data.message,
    });
}

// watch(() => route.query.page, () => {
//     loadData();
// })

function loadData(url = null) {
    loading.value = true;
    data.value.data = [];

    let page = route.query.page ?? 1;

    if (url) {
        url = new URL(url);
        page = new URLSearchParams(url.search).get('page');
    }

    router.push({
        query: {
            page: page
        }
    });

    dataApi.index({
        page
    }).then((response) => {
        data.value = response.data.data;

        myTable.value?.dt?.page?.len(response.data.data.per_page)
        // console.log(myTable.value.dt);
        myTable.value.dt.draw();
    })
        .finally(() => {
            loading.value = false;
        });
}
</script>
<template>
    <div class="table-wrapper" :class="{ loading: loading }">
        <DataTable :options="options" :columns="columns" :data="data.data" ref="myTable">
            <slot></slot>
        </DataTable>
        <div class="d-flex justify-content-between py-2">
            <span>
                {{ "showing" + data.from + " to " + data.to + " of " + data.total + " records" }}
            </span>
            <div class="data-paginator">
                <button v-for="(link, index) in data?.links" :class="{ 'active': link.active }" @click="loadData(link.url)"
                    :disabled="(data?.prev_page_url === null && index === 0) || (data?.next_page_url === null && index === data?.links.length - 1) || link.active">
                    <i v-if="index === 0" class="fa-solid fa-backward"></i>
                    <i v-else-if="index === data?.links.length - 1" class="fa-solid fa-forward"></i>
                    <span v-else v-html="link.label"></span>
                </button>
            </div>
        </div>
    </div>
</template>

<style>
@import 'datatables.net-dt';

.data-paginator {
    display: flex;
    gap: 0.4rem;
}

.data-paginator button {
    width: 32px;
    height: 32px;
    font-size: 0.8rem;
    border-radius: 4px;
    color: --clr-slate600;
    border: 1px solid var(--clr-gray100);
}

.data-paginator button.active,
.data-paginator button.active:disabled {
    color: var(--clr-light);
    border: 1px solid var(--clr-green);
    background-color: var(--clr-green);
}

.data-paginator button.active:hover {
    color: var(--clr-light);
    border: 1px solid var(--clr-green);
    background-color: var(--clr-green);
}

.data-paginator button:hover {
    background-color: var(--clr-slate400);
}

.data-paginator button:disabled {
    background-color: var(--clr-gray100);
    color: var(--clr-gray400);
    pointer-events: none;
    cursor: not-allowed;
}

.table-wrapper.loading {
    position: relative;
}

.table-wrapper.loading::before {
    font-size: 2rem;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: Font Awesome\ 6 Free;
    font-weight: 700;
    content: "\f110";
    display: flex;
    justify-content: center;
    align-items: center;
    color: var(--clr-green);
    background-color: rgb(228, 228, 228, 0.8);
    width: 100%;
    height: 100%;
    position: absolute;
}
</style>
