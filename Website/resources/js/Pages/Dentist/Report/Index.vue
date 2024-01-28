<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="flex flex-col ml-2 max-sm:px-5">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700 max-sm:ml-4">
                    Reports
                </h1>
                <h6 class="h-1 text-xs text-gray-400 max-sm:ml-4">
                    <a href="/">Home</a> > Reports
                </h6>
            </div>

            <div class="relative top-[50px] drop-shadow-lg flex flex-col gap-10 items-center">

                <div class="flex items-center gap-10 font-medium text-center desktop:left-[88rem] laptop:left-[66rem]">
                    <a :href="route('reports.daily')" target="_blank"
                        class="w-40 px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-green-400">
                        Print Daily Report
                    </a>

                    <a :href="route('reports.monthly')" target="_blank"
                        class="w-40 px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-green-400">
                        Print Monthly Report
                    </a>
                </div>
                <div class="flex items-center gap-10">
                    <div>
                        <div
                            class="w-[350px] md:w-[700px] bg-[#ffffff] rounded-lg p-8 flex flex-col items-center mt-10 md:mt-0">
                            <h2 class="text-lg font-medium text-black title-font">Daily Report</h2>
                            <hr class="w-full h-1 mt-3 bg-gray-200">
                            <div class="mt-4">
                                <label for="chartType" class="mr-2">Patient:</label>
                                <select id="chartType" v-model="selectedPatient"
                                    class="px-2 py-1 border border-gray-300 rounded">
                                    <option disabled value=" ">Select patient type</option>
                                    <option value="student">Student</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                            <div v-if="selectedPatient === 'student'" class="mt-10">
                                <OverallDaily :dailyData="dailyData"></OverallDaily>
                            </div>
                            <div v-if="selectedPatient === 'employee'" class="mt-10">
                                <OverallDaily :dailyData="dailyDepartmentData"></OverallDaily>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div
                            class="w-[350px] md:w-[700px] bg-[#ffffff] rounded-lg p-8 flex flex-col items-center mt-10 md:mt-0">
                            <h2 class="text-lg font-medium text-black title-font">Monthly Report</h2>
                            <hr class="w-full h-1 mt-3 bg-gray-200">
                            <div class="mt-4">
                                <label for="chartType" class="mr-2">Patient:</label>
                                <select id="chartType" v-model="selectedType"
                                    class="px-2 py-1 border border-gray-300 rounded">
                                    <option disabled value=" ">Select patient type</option>
                                    <option value="student">Student</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                            <div v-if="selectedType === 'student'" class="mt-10">
                                <OverallMonthly :monthlyData="monthlyData"></OverallMonthly>
                            </div>
                            <div v-if="selectedType === 'employee'" class="mt-10">
                                <OverallMonthly :monthlyData="departmentData"></OverallMonthly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-10">
                    <div>
                        <div
                            class="w-[350px] md:w-[700px] bg-[#ffffff] rounded-lg p-8 flex flex-col items-center mt-10 md:mt-0">
                            <h2 class="text-lg font-medium text-black title-font">Daily Report</h2>
                            <hr class="w-full h-1 mt-3 bg-gray-200">
                            <div class="mt-4">
                                <label for="chartType" class="mr-2">School:</label>
                                <select id="chartType" v-model="selectedDaily"
                                    class="px-2 py-1 border border-gray-300 rounded">
                                    <option disabled value=" ">Please select a school</option>
                                    <option value="samcis">SAMCIS</option>
                                    <option value="sea">SEA</option>
                                    <option value="som">SOM</option>
                                    <option value="sas">SAS</option>
                                    <option value="sol">SOL</option>
                                    <option value="stela">STELA</option>
                                    <option value="sonahbs">SONAHBS</option>
                                </select>
                            </div>
                            <div v-if="selectedDaily === 'samcis'" class="mt-10">
                                <DailyBar :dailyData="samcisDailyData"></DailyBar>
                            </div>
                            <div v-if="selectedDaily === 'sea'" class="mt-10">
                                <DailyBar :dailyData="seaDailyData"></DailyBar>
                            </div>
                            <div v-if="selectedDaily === 'som'" class="mt-10">
                                <DailyBar :dailyData="somDailyData"></DailyBar>
                            </div>
                            <div v-if="selectedDaily === 'sas'" class="mt-10">
                                <DailyBar :dailyData="sasDailyData"></DailyBar>
                            </div>
                            <div v-if="selectedDaily === 'sol'" class="mt-10">
                                <DailyBar :dailyData="solDailyData"></DailyBar>
                            </div>
                            <div v-if="selectedDaily === 'stela'" class="mt-10">
                                <DailyBar :dailyData="stelaDailyData"></DailyBar>
                            </div>
                            <div v-if="selectedDaily === 'sonahbs'" class="mt-10">
                                <DailyBar :dailyData="sonahbsDailyData"></DailyBar>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div
                            class="w-[350px] md:w-[700px] bg-[#ffffff] rounded-lg p-8 flex flex-col items-center mt-10 md:mt-0">
                            <h2 class="text-lg font-medium text-black title-font">Monthly Report</h2>
                            <hr class="w-full h-1 mt-3 bg-gray-200">
                            <div class="mt-4">
                                <label for="chartType" class="mr-2">School:</label>
                                <select id="chartType" v-model="selectedMonthly"
                                    class="px-2 py-1 border border-gray-300 rounded">
                                    <option disabled value=" ">Please select a school</option>
                                    <option value="samcis">SAMCIS</option>
                                    <option value="sea">SEA</option>
                                    <option value="som">SOM</option>
                                    <option value="sas">SAS</option>
                                    <option value="sol">SOL</option>
                                    <option value="stela">STELA</option>
                                    <option value="sonahbs">SONAHBS</option>
                                </select>
                            </div>
                            <div v-if="selectedMonthly === 'samcis'" class="mt-10">
                                <MonthlyBar :monthlyData="samcisMonthlyData"></MonthlyBar>
                            </div>
                            <div v-if="selectedMonthly === 'sea'" class="mt-10">
                                <MonthlyBar :monthlyData="seaMonthlyData"></MonthlyBar>
                            </div>
                            <div v-if="selectedMonthly === 'som'" class="mt-10">
                                <MonthlyBar :monthlyData="somMonthlyData"></MonthlyBar>
                            </div>
                            <div v-if="selectedMonthly === 'sas'" class="mt-10">
                                <MonthlyBar :monthlyData="sasMonthlyData"></MonthlyBar>
                            </div>
                            <div v-if="selectedMonthly === 'sol'" class="mt-10">
                                <MonthlyBar :monthlyData="solMonthlyData"></MonthlyBar>
                            </div>
                            <div v-if="selectedMonthly === 'stela'" class="mt-10">
                                <MonthlyBar :monthlyData="stelaMonthlyData"></MonthlyBar>
                            </div>
                            <div v-if="selectedMonthly === 'sonahbs'" class="mt-10">
                                <MonthlyBar :monthlyData="sonahbsMonthlyData"></MonthlyBar>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script setup>
import DailyBar from '@/Pages/Dentist/Report/Charts/DailyBar.vue'
import MonthlyBar from '@/Pages/Dentist/Report/Charts/MonthlyBar.vue'
import OverallDaily from '@/Pages/Dentist/Report/Charts/OverallDaily.vue'
import OverallMonthly from '@/Pages/Dentist/Report/Charts/OverallMonthly.vue'
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
import { ref } from 'vue'

const props = defineProps({
    schools: Array,
    departments: Array,
    monthlyData: Object,
    departmentData: Object,
    dailyDepartmentData: Object,
    dailyData: Object,
    samcisMonthlyData: Object,
    seaMonthlyData: Object,
    somMonthlyData: Object,
    sasMonthlyData: Object,
    solMonthlyData: Object,
    stelaMonthlyData: Object,
    sonahbsMonthlyData: Object,
    samcisDailyData: Object,
    seaDailyData: Object,
    somDailyData: Object,
    sasDailyData: Object,
    solDailyData: Object,
    stelaDailyData: Object,
    sonahbsDailyData: Object,
})

const selectedPatient = ref(' ')

const selectedType = ref(' ')

const selectedDaily = ref(' ')

const selectedMonthly = ref(' ')
</script>