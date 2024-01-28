<script setup>
import { useForm } from "@inertiajs/vue3"
import { Modal } from 'flowbite-vue'


const emit = defineEmits()

const closeModal = () => {
    emit('close')
}
const props = defineProps({
    treatment: {
        type: Object,
        default: () => ({}),
    },
    services: {
        type: Object
    }
})
const form = useForm({
    date: props.treatment.date,
    time_in: props.treatment.time_in,
    time_out: props.treatment.time_out,
    service_rendered: props.treatment.service_rendered,
    clinical_findings: props.treatment.clinical_findings,
    diagnosis: props.treatment.diagnosis,
    prescription: props.treatment.prescription,
    remarks: props.treatment.remarks,
});

const update = () => form.put(
    route("employee.treatment.update", props.treatment.record_id), { preserveScroll: false, preserveState: false })
</script>

<template>
    <form @submit.prevent="update">
        <Modal size="3xl" @close="closeModal">
            <template #header>
                <div class="flex items-center px-4 text-lg">
                    Edit Treatment Record
                </div>
            </template>

            <template #body>
                <div class="p-4">
                    <!-- Row 1 -->
                    <div class="grid grid-cols-3 sm:grid-cols-3">
                        <div class="mb-4">
                            <label for="date" class="block font-semibold">Date</label>
                            <input id="date" v-model="form.date" type="date" class="w-[10rem] px-3 py-2 border rounded"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="time_in" class="block font-semibold">Time In</label>
                            <input id="time_in" v-model="form.time_in" type="time" step="60"
                                class="w-[10rem] px-3 py-2 border rounded" required>
                        </div>


                        <div class="mb-4">
                            <label for="time_out" class="block font-semibold">Time Out</label>
                            <input id="time_out" v-model="form.time_out" type="time" step="60"
                                class="w-[10rem] px-3 py-2 border rounded" required>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="grid grid-cols-1 left-10 gap-y-4">
                        <div class="mb-4">
                            <label for="service_rendered" class="block font-semibold">Service Rendered</label>
                            <select class="w-[12.9rem] px-3 py-2 border rounded" v-model="form.service_rendered" required>
                                <option disabled>Please select one</option>
                                <option v-for="service in services" :value=service.services> {{ service.services }}</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="grid grid-cols-2 sm:grid-cols-2">
                        <div class="mb-4">
                            <label for="clinical_findings" class="block font-semibold">Clinical Findings</label>
                            <textarea id="clinical_findings" v-model="form.clinical_findings" type="text"
                                class="w-[17rem] px-3 py-2 border rounded" required />
                        </div>

                        <div class="mb-4">
                            <label for="diagnosis" class="block font-semibold">Diagnosis</label>
                            <textarea id="diagnosis" v-model="form.diagnosis" type="text"
                                class="w-[17rem] px-3 py-2 border rounded" required />
                        </div>

                        <div class="mb-4">
                            <label for="prescription" class="block font-semibold">Prescription</label>
                            <textarea id="prescription" v-model="form.prescription" type="text"
                                class="w-[17rem] px-3 py-2 border rounded" required />
                        </div>

                        <div class="mb-4">
                            <label for="remarks" class="block font-semibold">Remarks</label>
                            <textarea id="remarks" v-model="form.remarks" type="text"
                                class="w-[17rem] px-3 py-2 border rounded" required />
                        </div>
                    </div>
                </div>
            </template>


            <template #footer>
                <div class="flex justify-center">
                    <button @click="closeModal" as="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3 mb-3">
                        Cancel
                    </button>
                    <button type="submit" as="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3">
                        Save Changes
                    </button>
                </div>
            </template>
        </Modal>
    </form>
</template>