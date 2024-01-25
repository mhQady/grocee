<script setup>
import { reactive, onMounted, watch } from 'vue';
import FileApi from '@api/File.api';
import * as FilePond from 'filepond';
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateType);

let pond = reactive({});

const emit = defineEmits([ "update:modelValue" ]);
const source = axios.CancelToken.source();
const props = defineProps({
    label: {
        type: String,
    },
    multiple: {
        type: Boolean,
        default: false,
    },
    required: {
        type: Boolean,
        default: false,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    uploadedFiles: {
        type: Array,
    }
});


watch(() => props.uploadedFiles, (files) => {

    if (files.length === 0) return;

    files.forEach((file) => {
        pond.addFiles([
            {
                source: new URL(file.url).pathname,
                options: {
                    type: 'local',
                },
            }
        ])
    })
    // let url = new URL(file.url).pathname

    // pond.addFiles([
    //     {
    //         source: url,
    //         options: {
    //             type: 'local',
    //         },
    //     },
    // ]);
    console.log('watched', files)
})

const process = (fieldName, file, metadata, load, error, progress, abort) => {
    console.log('process file', fieldName, '  |  ', file);
    const formData = new FormData();
    formData.append(fieldName, file);



    uploadFile(formData, progress, load, source);

    return {
        abort: () => {
            source.cancel('Operation canceled by the user.');
            abort();
        }
    };
}

function uploadFile(data, progress, load, cancelSource) {
    FileApi.request({
        method: 'POST',
        url: FileApi.entity,
        data,
        cancelToken: cancelSource.token,
        onUploadProgress: (e) => progress(e.lengthComputable, e.loaded, e.total)
    })
        .then(response => {
            load(response.data.file.id)
            console.log(response.data)
            emit('update:modelValue', response.data.file.id)

        }).catch((thrown) => {
            console.log('Error Happened', thrown.message);
        });
}

const remove = (source, load, error) => {

    const parts = source.split('/');
    const id = parts[ parts.length - 2 ];
    FileApi.request({
        method: 'DELETE',
        url: `${FileApi.entity}/${id}`,
        cancelToken: source.token,
        onUploadProgress: (e) => progress(e.lengthComputable, e.loaded, e.total)
    })
        .then(response => {
            // emit('update:modelValue', null)
            load();
        }).catch((thrown) => {
            console.log('Error Happened', thrown.message);
            error('Error Happened');
        })

}

let options = reactive({
    allowMultiple: props.multiple,
    required: props.required,
    disabled: props.disabled,
    name: 'file',
    server: { process, remove, load: '/' },
    credits: false,
})

onMounted(() => { pond = Object.assign(pond, FilePond.create(document.getElementById('pondInput'), options)) });
</script>

<template>
    <input type="file" id="pondInput" />
</template>
