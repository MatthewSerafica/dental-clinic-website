<template>
    <div>
        {{ patient.pat_type }} | {{ patient.last_name }},
        {{ patient.first_name }} | {{ patient.birth_date }} |
        {{ patient.address }} | {{ patient.sex }} |
        {{ patient.civil_status }}
    </div>
</template>

<script setup>
defineProps({
    patient: Object,
});
</script>
