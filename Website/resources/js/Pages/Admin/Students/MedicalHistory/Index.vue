<template>
    <div>
        <div class="relative desktop:w-96 laptop:w-80 left-6 laptop:top-10 desktop:top-7">
            <h1 class="font-bold border-b-2 border-gray-200 desktop:text-2xl laptop:text-2xl ">
                MEDICAL AND DENTAL HISTORY
            </h1>
        </div> 
        <div class="relative left-6 desktop:top-10 laptop:top-12">
            <div class="flex h-[6em] desktop:gap-x-16 laptop:gap-x-[4.5em] laptop:justify">
                <div>
                    <h1
                        class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                        Allergy</h1>
                    <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                        medical.allergies }}</h2>
                </div>
                <div>
                    <h1
                        class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                        Diabetes</h1>
                    <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                        medical.diabetes }}</h2>
                </div>
                <div class="">
                    <h1
                        class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                        Blood Dyscrasia</h1>
                    <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                        medical.blood_dyscrasia }}</h2>
                </div>
                <div>
                    <h1
                        class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                        CNS Disorder</h1>
                    <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                        medical.cns_disorder }}</h2>
                </div>
            </div>
            <div class="flex h-[6em] desktop:gap-x-16 laptop:gap-x-[4.5em] laptop:justify">
                <div>
                    <h1
                        class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                        Cardio Vascular Disease</h1>
                    <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                        medical.cardiovascular_disease }}</h2>
                </div>
                <div class="">
                    <h1
                        class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                        Other Conditions</h1>
                    <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                        medical.other_conditions }}</h2>
                </div>
                <div>
                    <h1
                        class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                        Tooth Related Surgery</h1>
                    <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                        medical.tooth_related_surgery }}</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    medical: Object,
})
</script>