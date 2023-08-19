<template>
    <div>
        <PatientInformation :patient="patient" />
    </div>
</template>

<script setup>
import PatientInformation from "@/Components/PatientInformation.vue";
defineProps({
    patient: Object,
});
</script>
