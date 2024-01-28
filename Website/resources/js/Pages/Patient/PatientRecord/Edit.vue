<template>
    <h1 class="py-2 pl-6 text-3xl font-bold text-white bg-gray-500">
        Edit Patient
    </h1>
    <div
        class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-start sm:pt-0"
    >
        <div
            class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg"
        >
            <form @submit.prevent="update">
                <div>
                    <InputLabel for="date" value="Date" />
                    <input
                        v-model="form.date"
                        type="date"
                        class="block w-full mt-1 rounded"
                    />
                    <InputError class="mt-2" :message="form.errors.date" />
                </div>
                <div>
                    <InputLabel for="time_in" value="Time-In" />
                    <input
                        v-model="form.time_in"
                        type="time"
                        class="block w-full mt-1 rounded"
                    />
                    <InputError class="mt-2" :message="form.errors.time" />
                </div>
                <div>
                    <InputLabel
                        for="service_rendered"
                        value="Service Rendered"
                    />
                    <input
                        v-model="form.service_rendered"
                        type="text"
                        class="block w-full mt-1 rounded"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.service_rendered"
                    />
                </div>
                <div>
                    <InputLabel
                        for="finding_diagnosis"
                        value="Clinical Findings/Diagnosis/Prescription"
                    />
                    <input
                        v-model="form.finding_diagnosis"
                        type="text"
                        class="block w-full mt-1 rounded"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.finding_diagnosis"
                    />
                </div>
                <div>
                    <InputLabel for="remarks" value="Remarks" />
                    <input
                        v-model="form.remarks"
                        type="text"
                        class="block w-full mt-1 rounded"
                    />
                    <InputError class="mt-2" :message="form.errors.remarks" />
                </div>
                <div>
                    <InputLabel for="time_out" value="Time-Out" />
                    <input
                        v-model="form.time_out"
                        type="time"
                        class="block w-full mt-1 rounded"
                    />
                    <InputError class="mt-2" :message="form.errors.time_out" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton
                        type="submit"
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Save Changes
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    treatment: Object,
});
const form = useForm({
    date: props.treatment.date,
    time: props.treatment.time_in,
    service_rendered: props.treatment.service_rendered,
    finding_diagnosis: props.treatment.finding_diagnosis,
    remarks: props.treatment.remarks,
    time_out: props.treatment.time_out,
});

const update = () => form.put(`/treatment/${props.treatment.id}`);
</script>
