<script setup>
import { inject } from 'vue'
import ProductApi from '@api/Product.api';
import Product from '@model/Product';

import TableData from '@dash/components/TableData.vue';

const moment = inject('moment');
const columns = [
    {
        data: 'name',
        render: (data) => {
            return `<div class="d-flex flex-column gap-1">
                        <span>${data.ar}</span>
                        <span>${data.en}</span>
                    </div>`
        }
    },
    {
        data: 'status',
        render: (data) => Product.getStatusBadge(data)
    },
    {
        data: 'slug', render: (data) => {
            return `<div class="d-flex flex-column gap-1">
                        <span>${data.ar}</span>
                        <span>${data.en}</span>
                    </div>`
        }
    },
    { data: 'price', type: 'num' },
    {
        data: 'created_at',
        render: (data) => moment(data).format('YYYY-MM-DD')

    },
];

</script>
<template>
    <TableData :columns="columns" :data-api="ProductApi" edit-route="products.edit">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ $t('name') }}</th>
                <th>{{ $t('status') }}</th>
                <th>{{ $t('slug') }}</th>
                <th>{{ $t('price') }}</th>
                <th>{{ $t('created_at') }}</th>
                <th data-sortable="false"></th>
            </tr>
        </thead>
    </TableData>
</template>
