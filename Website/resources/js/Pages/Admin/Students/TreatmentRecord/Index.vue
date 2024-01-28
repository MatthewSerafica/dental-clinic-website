<template>
    <div class="relative h-full left-6">
        <div class="relative flex flex-row items-center">
        </div>
        <div class="relative desktop:top-2">
            <table class="text-sm text-left text-gray-500 w-[95rem] ">
                <thead class="text-xs text-left text-gray-400 bg-gray-50">
                    <tr>
                        <th class="p-6">Date</th>
                        <th class="p-6">Time-in</th>
                        <th class="p-6">Dentist</th>
                        <th class="p-6">Service Rendered</th>
                        <th class="p-6">Clinical Findings</th>
                        <th class="p-6">Diagnosis</th>
                        <th class="p-6">Prescription</th>
                        <th class="p-6">Remarks</th>
                        <th class="p-6">Time-out</th>
                        <th class="p-6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="treatment in treatments.data" :key="treatment.record_id"
                        class="bg-white border-b relative md:top-[5px]">
                        <th class="px-6 py-4">
                            {{ treatment.date }}
                        </th>
                        <th class="px-6 py-4">
                            {{ formatTime(treatment.time_in) }}
                        </th>
                        <th class="px-6 py-4">
                            Dr. {{ treatment.dentist.first_name }} {{ treatment.dentist.last_name }}
                        </th>
                        <th class="px-6 py-4">
                            {{ treatment.service_rendered }}
                        </th>
                        <th class="px-6 py-4">{{ treatment.clinical_findings }}</th>
                        <th class="px-6 py-4">{{ treatment.diagnosis }}</th>
                        <th class="px-6 py-4">{{ treatment.prescription }}</th>
                        <th class="px-6 py-4">{{ treatment.remarks }}</th>
                        <th class="px-6 py-4">{{ formatTime(treatment.time_out) }}</th>
                        <th class="px-6 py-4">
                            <button @click="$emit('openEditTreatment', treatment)" type="button"
                                class="w-10 h-6 pl-3 text-white bg-blue-500 rounded-lg hover:bg-blue-700">
                                <editicon></editicon>
                            </button>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div v-if="treatments.data.length" class="flex justify-center w-full mt-6">
            <Pagination :links="treatments.links" />
        </div>
    </div>
</template>

<script setup>
import editicon from '@/Components/EditIcon.vue';
import Pagination from "@/Components/Pagination.vue"
import moment from 'moment';
import 'moment-timezone';


const props = defineProps({
    treatments: {
        type: Array,
        default: () => ({}),
    },
    student: {
        type: Object
    },
    services: {
        type: Object
    }
})


function formatTime(time) {
    return moment(time, 'HH:mm').format('hh:mm A')
}


</script>
