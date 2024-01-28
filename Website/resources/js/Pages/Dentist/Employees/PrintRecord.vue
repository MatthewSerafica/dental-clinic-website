<template v-slot:mainContent>
    <div class="flex flex-col flex-grow h-full bg-white rounded-xl origin-[left_top] inline-block scale-[0.9]">
        <div class="flex flex-col justify-between gap-4 lg:gap-8">
            <div class="h-full rounded-lg">
                <div class="flex flex-col gap-4">
                    <div class="relative flex flex-row justify-between ml-6 mr-6">
                        <div class="flex flex-row gap-5">
                            <h1 class="text-xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">
                                PERSONAL INFORMATION</h1>
                            <div class="">
                            </div>
                        </div>
                    </div>

                    <PrintInfo :employee="employee" />
                    <PrintMedHistory :medical="medical" />
                    <div class=" h-[45em] w-[100em]">
                        <PrintChart :chart="chart" />
                    
                        <div class="relative flex flex-row gap-28 top-8">
                        <PrintEmpOHC :exam="exam" />
                        <DMFTCount :chart="chart" :exam="exam" />
                        </div>
        

                </div>
            </div>
            <div class="mt-16 mb-6 ml-6">
            </div>
        </div>
        </div>

    </div>
</template>

<script setup>
import PrintChart from '@/Pages/Dentist/Employees/DentalChart/PrintChart.vue'
import DMFTCount from '@/Pages/Dentist/Employees/DMFTCount/Index.vue'
import PrintInfo from '@/Pages/Dentist/Employees/EmployeeRecord/PrintInfo.vue'
import PrintMedHistory from '@/Pages/Dentist/Employees/MedicalHistory/PrintMedHistory.vue'
import PrintEmpOHC from '@/Pages/Dentist/Employees/OralHealthCondition/PrintEmpOHC.vue'


const props = defineProps({
    employee: Object,
    medical: Object,
    chart: Object,
    exam: Object,
})


</script>
