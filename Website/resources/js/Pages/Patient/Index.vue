<template>
    <!--Account-->
    <div
        class="flex flex-row justify-center items-center gap-2.5 absolute w-[106px] h-[38px] left-[1370px] top-[22px]"
    >
        <div
            class="flex flex-col justify-center items-start w-[70px] h-9 flex-none order-none self-stretch grow-0 p-0"
        >
            <p
                class="w-[70px] h-[21px] not-italic font-medium text-sm leading-[21px] tracking-[0.03em] text-[#212121] flex-none order-none grow-0 mt-[-3px] mb-[-3px] mx-0"
            >
                John Doe
            </p>
            <p
                class="w-11 h-[18px] not-italic font-light text-xs leading-[18px] tracking-[0.03em] text-[#212121] flex-none order-1 grow-0"
            >
                Dentist
            </p>
        </div>
        <img src="" alt="" />
    </div>
    <div class="absolute w-[1215px] h-full left-80 top-20 bg-[#f1f2f2]">
        <h1
            class="flex flex-col items-start gap-2 absolute w-[109px] h-[21px] p-0 left-6 top-4"
        >
            PATIENTS
        </h1>
        <div
            class="flex flex-col items-start absolute w-[1501px] h-[720px] p-0 left-6 top-[73px]"
        >
            <div v-for="patient in patients" :key="patient.id">
                <Link :href="`/patient/${patient.id}`">
                    {{ patient.id }} <PatientInformation :patient="patient" />
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import PatientInformation from "@/Components/PatientInformation.vue";
defineProps({
    patients: Array,
});
</script>
