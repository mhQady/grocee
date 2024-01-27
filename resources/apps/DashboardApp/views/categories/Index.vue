<script setup>
import CategoryApi from '@api/Category.api';

import TableData from '@dash/components/TableData.vue';

const columns = [
    {
        data: 'files',
        render: (data) => {

            let url = data.length > 0 ? data[ 0 ].url : '';

            return `<div class="avatar">
                        <img src="${url}" alt="">
                    </div>`
        }
    },
    {
        data: 'name',
        render: (data) => data.ar
    },
    {
        data: 'name',
        render: (data) => data.en
    },
];

</script>
<template>
    <TableData :columns="columns" :data-api="CategoryApi" edit-route="categories.edit">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ $t('image') }}</th>
                <th>{{ $t('ar.name') }}</th>
                <th>{{ $t('en.name') }}</th>
                <th data-sortable="false"></th>
            </tr>
        </thead>
    </TableData>
</template>
