<template>
    <div class="flex flex-col items-center">
        <div class="flex items-center ml-[-50px]">
            <SLULogo class="w-12 h-12 mr-3"></SLULogo>
            <div>
                <h2 class="text-lg font-medium text-gray-500 title-font">Saint Louis University</h2>
                <h2 class="px-8 text-lg font-medium text-gray-500 title-font">Dental Clinic</h2>
            </div>
        </div>
        <div class="relative top-[10px] flex flex-col gap-10 items-center">
            <div>
                <h2 class="text-lg font-medium text-black title-font">DAILY OUTPUT SUMMARY</h2>
                <h2 class="px-5 text-lg font-medium text-black title-font">for DENTAL SERVICES</h2>
            </div>
        </div>
        <div class="ml-auto">
            <h2 class="pt-5 text-lg font-medium text-black items-lef title-font">Date: <label class="underline">{{
                formattedDate }}</label></h2>
        </div>
    </div>
    <div>
        <div>
            <h2 class="mb-[0.5em] text-lg font-medium text-black title-font">STUDENTS</h2>
        </div>

        <div class="relative flex flex-col gap-10 items-right">
            <table class="border border-spacing-2 border-slate-700">
                <thead>
                    <tr>
                        <th class="border border-slate-700 w-[10em]">SERVICES</th>
                        <th v-for="school in schools" :key="school" class="border border-slate-700 w-[8em]"><i>{{ school }}</i>
                        </th>
                        <th class="border border-slate-700 w-[7em] "><i>TOTAL</i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border border-slate-700 inline-center" v-for="appType in appTypes" :key="appType">
                        <td class="border border-slate-700 inline-center">{{ appType }}</td>
                        <td class="text-center border border-slate-700 inline-center" v-for="school in schools"
                            :key="school">
                            {{ frequencyTable[appType][school] || 0 }}
                        </td>
                        <td class="text-center">
                            {{ getTotalForAppType(appType) }}
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <div class="relative flex flex-col float-right">
            <table class="w-[15.7em] border border-slate-700 ">
              <tr class="border-t-[0.1px] border-slate-300 text-[large] font-medium italic"> &nbsp; Overall Total
               <td class="pr-9"> {{ getOverallTotal() }}</td>
             </tr>
             <tr></tr>
           </table>
        </div>
        <div class="mt-[2em]">
            <h2 class="text-lg font-medium text-black title-font">Annual Check-up</h2>
            <table class="w-3/4 border border-spacing-2 border-slate-700 mt-[0.5em] w-[32em]">
                <thead>
                    <tr>
                        <th class="border border-slate-700  w-[6em]"></th>
                        <th class="border border-slate-700" v-for="year in years" :key="year">{{ year }}</th>
                        <th class="border border-slate-700">Total</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr class="" v-for="course in courses" :key="course">
                        <td class="border border-slate-700">{{ course }}</td>
                        <td class="text-center border border-slate-700 w-[6em]" v-for="year in years" :key="year">{{
                            annualTable[course][year] || 0 }}</td>
                        <td class="w-[6em] text-center border border-slate-700 ">
                            {{ getTotalForYear(course) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="relative flex flex-col ml-[16.15em] ">
            <table class="w-[15.85em] border border-slate-700">
              <tr class="border-t-[0.1px] border-slate-350 text-[large] font-medium italic"> &nbsp; Overall Total
               <td class="pr-9"> {{ getAnnualTotal() }}</td>
             </tr>
             <tr></tr>
           </table>
        </div>
        <div>
            <div class="absolute text-[25px] font-medium ml-[15.2em] mt-[7.5em]">
                GRAND TOTAL: <label class="underline">{{ getGrandTotal }}</label> 
            </div>
            <h2 class="text-lg font-medium text-black title-font mt-[1em]">EMPLOYEES</h2>
            <table class=" border border-spacing-2 border-slate-700 mt-[0.5em] w-[19em]">
                <thead>
                    <tr>
                        <th class="border border-slate-700">Services</th>
                        <th class="border border-slate-700">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(count, appType) in employeeTable" :key="appType">
                        <td class="border border-slate-700">{{ appType }}</td>
                        <td class="w-[8em] text-center border border-slate-700">{{ count }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="relative flex flex-col ml-[5.2em] ">
            <table class="w-[13.8em] border border-slate-700">
              <tr class="border-t-[0.1px] border-slate-350 text-[large] font-medium italic"> &nbsp; Overall Total
               <td class="pr-9"> {{ getEmployeeTotal }}</td>
             </tr>
             <tr></tr>
           </table>
        </div>
        </div>
        <div>
        </div>
        <div class="float-left ml-5 mt-[2em]">
            <h1 class="text-[large] font-medium">Prepared By:</h1>
            <div class="ml-[6.6em] border-b-[black] border-b border-solid w-[11em]"></div>
        </div>
        <div class="float-right mr-[4.5em] mt-[2em]">
            <h1 class="text-[large] mr-[9.5em] font-medium">Approved By:</h1>
            <div class="ml-[7em] border-b-[black] border-b border-solid w-[11em]"></div>
            <div>
            <div class="float-right mr-2">
            <h1 class="text-[large] font-medium">HEAD, Dental Clinic</h1>
            </div>
        </div>
        </div>
    </div>
</template>

<script setup>
import SLULogo from '@/Components/SLULogo.vue';
import { computed, ref } from 'vue';

const props = defineProps({
    dailySummary: Object,
    dailyAnnual: Object,
    dailyEmployee: Object,
})

const frequencyTable = ref({})

frequencyTable.value = props.dailySummary

const appTypes = Object.keys(frequencyTable.value || {})

const schools = Array.from(
    new Set(Object.values(frequencyTable.value || {}).flatMap(Object.keys))
)

schools.sort()

appTypes.forEach((appType) => {
    if (!frequencyTable.value[appType]) {
        frequencyTable.value[appType] = {}
    }
    schools.forEach((school) => {
        if (!frequencyTable.value[appType][school]) {
            frequencyTable.value[appType][school] = 0
        }
    })
})

const annualTable = ref({})

annualTable.value = props.dailyAnnual

const courses = Object.keys(annualTable.value || {})

const years = Array.from(
    new Set(Object.values(annualTable.value || {}).flatMap(Object.keys))
)

years.sort()

courses.forEach((course) => {
    if (!annualTable.value[course]) {
        annualTable.value[course] = {}
    }
    years.forEach((year) => {
        if (!annualTable.value[course][year]) {
            annualTable.value[course][year] = 0
        }
    })
})

const employeeTable = ref({})

employeeTable.value = props.dailyEmployee

Object.keys(employeeTable.value).forEach((appType) => {
    if (employeeTable.value[appType] === null) {
        employeeTable.value[appType] = 0
    }
})

const getTotalForAppType = (appType) => Object.values(frequencyTable.value[appType] || {}).reduce((total, count) => total + count, 0)

const getOverallTotal = () => Object.values(frequencyTable.value || {}).flatMap(Object.values).reduce((total, count) => total + count, 0)

const getTotalForYear = (year) => Object.values(annualTable.value[year] || {}).reduce((total, count) => total + count, 0)

const getAnnualTotal = () => Object.values(annualTable.value || {}).flatMap(Object.values).reduce((total, count) => total + count, 0)

const getEmployeeTotal = computed(() => {
    return Object.values(employeeTable.value).reduce((total, count) => total + count, 0)
})

const getGrandTotal = computed(() => {
    return getOverallTotal() + getAnnualTotal() + getEmployeeTotal.value
})

const currentDate = new Date()

const formattedDate = currentDate.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
})

</script>
