import Swal from 'sweetalert2';
import i18n from "@lang";

const { t } = i18n.global;

const useToast = (rules, model) => {

    return Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

}

const useConfirm = () => {

    return Swal.mixin({
        title: t('are you sure?'),
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: t('confirm'),
        cancelButtonText: t('cancel'),
        reverseButtons: true,
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });
}

export {
    useToast,
    useConfirm
}
