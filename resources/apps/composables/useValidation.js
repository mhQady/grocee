import { ref } from "vue";
import { useVuelidate } from "@vuelidate/core";

export function useValidation(rules, model) {
    const $externalResults = ref({});

    const v$ = useVuelidate(rules, model, { $externalResults, $autoDirty: true });

    return { v$, $externalResults }
}
