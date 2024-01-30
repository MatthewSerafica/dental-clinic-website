<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="flex flex-col ml-2">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Record</h1>
                <h6 class="h-1 text-xs text-gray-400">
                    <a href="/patient">Home</a> > Record
                </h6>
            </div>
            
            <div class="flex flex-col flex-grow h-full mt-8 bg-white rounded-xl">
                <div class="flex flex-row gap-5 mt-6 ml-6 mr-6">
                    <h1 class="text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">
                        PERSONAL INFORMATION</h1>
                </div>

                <div class="relative mt-6 ml-6 mr-6">
                    <div class="flex flex-col justify-between">
                        <div class="flex flex-row gap-36 max-sm:flex-col max-sm:gap-0">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-800 max-sm:text-2xl">
                                    {{ patient[0].last_name }}, {{ patient[0].first_name }}, {{ patient[0].middle_name }}
                                </h1>
                                <div class="max-sm:flex max-sm:flex-row max-sm:justify-between">
                                    <div class="flex flex-row items-center">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;ID:&nbsp;</p>
                                        <h2 class="text-lg font-semibold text-gray-800">{{ patient[0].id_number }}</h2>
                                    </div>
                                    <div class="flex flex-row items-center" v-if="patient[0].course">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;SCHOOL:&nbsp;
                                        </p>
                                        <h2 class="text-lg font-semibold text-gray-800">{{ patient[0].school }}</h2>
                                    </div>
                                    <div class="flex flex-row items-center" v-else-if="patient[0].department">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;DEPARTMENT:&nbsp;
                                        </p>
                                        <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ patient[0].department }}</h2>
                                    </div>
                                    <div class="flex flex-row items-center" v-if="patient[0].course">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;COURSE and
                                            YEAR:&nbsp;</p>
                                        <h2 class="text-lg font-semibold text-gray-800">{{ patient[0].course }}-{{ patient[0].year }}</h2>
                                    </div>
                                    <div class="flex flex-row items-center" v-else-if="patient[0].employee_type">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;EMP. TYPE:&nbsp;
                                        </p>
                                        <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ patient[0].employee_type }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between gap-36 max-sm:gap-0">
                                <div class="justify-between max-sm:flex max-sm:flex-col">
                                    <div class="flex flex-row items-center">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;DATE OF
                                            BIRTH:&nbsp;</p>
                                        <h2 class="text-lg font-semibold text-gray-800">{{ formatDate(patient[0].birth_date) }}</h2>
                                    </div>
                                    <div class="flex flex-row items-center">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;AGE:&nbsp;</p>
                                        <h2 class="text-lg font-semibold text-gray-800">{{ patient[0].age }}</h2>
                                    </div>
                                    <div class="flex flex-row items-center">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;SEX:&nbsp;</p>
                                        <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ patient[0].sex }}</h2>
                                    </div>
                                    <div class="flex flex-row items-center">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;CIVIL STATUS:&nbsp;
                                        </p>
                                        <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ patient[0].civil_status }}</h2>
                                    </div>
                                </div>
                                <div class="max-sm:flex max-sm:flex-col">
                                    <div class="flex flex-row items-center">
                                        <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                        <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;ADDRESS:&nbsp;</p>
                                        <h2 class="text-lg font-semibold text-gray-800">{{ patient[0].address }}</h2>
                                    </div>
                                    <div class="max-sm:flex max-sm:flex-col max-sm:justify-between">
                                        <div class="flex flex-row items-center">
                                            <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                            <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;CONTACT
                                                NUMBER:&nbsp;</p>
                                            <h2 class="text-lg font-semibold text-gray-800">{{ patient[0].contact_number }}</h2>
                                        </div>
                                        <div class="flex flex-row items-center">
                                            <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                            <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;E-MAIL
                                                ADDRESS:&nbsp;</p>
                                            <h2 class="text-lg font-semibold text-gray-800">{{ patient[0].user.email }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row gap-5 mt-6 ml-6 mr-6">
                    <h1 class="text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">
                        MEDICAL AND DENTAL HISTORY</h1>
                </div>
                <div class="relative left-6 desktop:top-10 laptop:top-12">
                    <div class="flex h-[6em] desktop:gap-x-16 laptop:gap-x-[4.5em] laptop:justify">
                        <div>
                            <h1
                                class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                                Allergy</h1>
                            <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                                patient[0].medicals.allergies }}</h2>
                        </div>
                        <div>
                            <h1
                                class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                                Diabetes</h1>
                            <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                                patient[0].medicals.diabetes }}</h2>
                        </div>
                        <div class="">
                            <h1
                                class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                                Blood Dyscrasia</h1>
                            <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                                patient[0].medicals.blood_dyscrasia }}</h2>
                        </div>
                        <div>
                            <h1
                                class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                                CNS Disorder</h1>
                            <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                                patient[0].medicals.cns_disorder }}</h2>
                        </div>
                    </div>
                    <div class="flex h-[6em] desktop:gap-x-16 laptop:gap-x-[4.5em] laptop:justify">
                        <div>
                            <h1
                                class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                                Cardio Vascular Disease</h1>
                            <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                                patient[0].medicals.cardiovascular_disease }}</h2>
                        </div>
                        <div class="">
                            <h1
                                class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                                Other Conditions</h1>
                            <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                                patient[0].medicals.other_conditions }}</h2>
                        </div>
                        <div>
                            <h1
                                class="overflow-hidden text-gray-400 whitespace-nowrap text-ellipsis desktop:text-base laptop:text-xs">
                                Tooth Related Surgery</h1>
                            <h2 class="overflow-hidden whitespace-nowrap text-ellipsis desktop:text-base laptop:text-sm">{{
                                patient[0].medicals.tooth_related_surgery }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template>
<script setup>
import moment from "moment"
import "moment-timezone"


const formatDate = (date) => {
    return date ? moment(date).format('DD-MM-YYYY') : ''
}
import MainLayout from "@/Pages/Layouts/MainLayout.vue"

const props = defineProps({
    patient: Object,
})

</script>
