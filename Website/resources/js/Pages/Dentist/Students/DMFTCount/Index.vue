<template>
    <div class="float-right">
        <div class="relative flex items-center w-85 left-6">
            <h1 class="text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">
                DMFT COUNT
            </h1>
        </div>

        <div class="flex items-center">
            <div class="relative top-2 left-7">
                <div class="grid grid-cols-2 gap-6 pb-2">
                    <label>Number of Teeth Present: </label>
                    <input v-model="numberOfTeethPresent"
                        class="w-32 text-center bg-white border-0 border-b border-solid border-b-gray-400" disabled />
                </div>
                <div class="grid grid-cols-2 gap-6 pb-2">
                    <label>Number of Caries Free Teeth: </label>
                    <input v-model="numberOfCaries"
                        class="w-32 text-center bg-white border-0 border-b border-solid border-b-gray-400" disabled />
                </div>
                <div class="grid grid-cols-2 gap-6 pb-2">
                    <label>Number of Teeth for Extraction: </label>
                    <input v-model="numberOfTeethForExtraction"
                        class="w-32 text-center bg-white border-0 border-b border-solid border-b-gray-400" disabled />
                </div>
                <div class="grid grid-cols-2 gap-6 pb-2">
                    <label>Number of Teeth for Restoration: </label>
                    <input v-model="numberOfTeethForRestoration"
                        class="w-32 text-center bg-white border-0 border-b border-solid border-b-gray-400" disabled />
                </div>
                <div class="grid grid-cols-2 gap-6 pb-2">
                    <label>Number of Missing Teeth: </label>
                    <input v-model="numberOfMissingTeeth"
                        class="w-32 text-center bg-white border-0 border-b border-solid border-b-gray-400" disabled />
                </div>
                <div class="grid grid-cols-2 gap-6 pb-2">
                    <label>Number of Filled Teeth: </label>
                    <input v-model="numberOfFilledTeeth"
                        class="w-32 text-center bg-white border-0 border-b border-solid border-b-gray-400" disabled />
                </div>
                <div class="grid grid-cols-2 gap-6 pb-2">
                    <label>Total DMFT Count: </label>
                    <input v-model="totalDMFT"
                        class="w-32 text-center bg-white border-0 border-b border-solid border-b-gray-400" disabled />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    exam: Object,
    chart: Object,
});

const excludedTeeth = [1, 16, 17, 32];

const numberOfTeethPresent = computed(() => {
    return props.chart.filter(
        (tooth) =>
            (tooth.tooth_number < 33 &&
                !["M", "Un"].includes(tooth.condition_two)) && (
                tooth.condition_one !== "M" &&
                tooth.condition_one !== "Un")
    ).length;
});

const numberOfCaries = computed(() => {
    return props.chart.filter(
        (tooth) =>
            (tooth.tooth_number < 33 &&
                !excludedTeeth.includes(tooth.tooth_number) &&
                ["/", "CD", "P", "Fb"].includes(tooth.condition_two)) ||
            ["Rf", "X"].includes(tooth.condition_one)
    ).length;
});

const numberOfTeethForExtraction = computed(() => {
    return props.chart.filter(
        (tooth) =>
            (tooth.tooth_number < 33 &&
                !excludedTeeth.includes(tooth.tooth_number) &&
                ["Rf", "X"].includes(tooth.condition_two)) ||
            ["Rf", "X"].includes(tooth.condition_one)
    ).length;
});

const numberOfTeethForRestoration = computed(() => {
    return props.chart.filter(
        (tooth) =>
            (tooth.tooth_number < 33 &&
                !excludedTeeth.includes(tooth.tooth_number) &&
                ["C", "Tf"].includes(tooth.condition_two)) ||
            ["C", "Tf", "Co", "Am"].includes(tooth.condition_one)
    ).length;
});

const numberOfMissingTeeth = computed(() => {
    return props.chart.filter(
        (tooth) =>
            (tooth.tooth_number < 33 && !excludedTeeth.includes(tooth.tooth_number) && (["M"].includes(tooth.condition_two) || ["M"].includes(tooth.condition_one)))
    ).length;
});

const numberOfFilledTeeth = computed(() => {
    return props.chart.filter(
        (tooth) =>
            (tooth.tooth_number < 33 && !excludedTeeth.includes(tooth.tooth_number) && (["Am", "Co", "Gf", "Jc", "S", "Ab", "Sc"].includes(tooth.condition_two) || ["Am", "Co", "Gf"].includes(tooth.condition_one)))).length;
});

const totalDMFT = computed(() => {
    return (
        numberOfCaries.value +
        numberOfTeethForExtraction.value +
        numberOfTeethForRestoration.value +
        numberOfMissingTeeth.value +
        numberOfFilledTeeth.value
    );
});
</script>
