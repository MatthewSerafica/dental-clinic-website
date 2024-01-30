<template v-slot:mainContent>
    <div class="flex flex-col flex-grow h-full bg-white rounded-xl origin-[left_top] scale-[0.9]">
        <div class="flex flex-col justify-between gap-4 lg:gap-8">
            <div class="h-full rounded-lg">
                <div class="flex flex-col gap-4">
                    <div class="relative flex flex-row justify-between ml-6 mr-6">
                        <div class="flex flex-row gap-5">
                            <h1 class="text-xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">
                                PERSONAL INFORMATION</h1>
                            
                        </div>
                    </div>
                    <PrintPersonalInfo :student="student" class="" />

                    <PrintMedicalHistory :medical="medical" />
                    <div class=" h-[45em] w-[100em]">
                        <PrintDentalChart :chart="chart"/>
                        <div class="relative flex flex-row gap-28 top-8">
                            <PrintStudOHC :exam="exam" />
                            <DMFTCount :chart="chart" :exam="exam" />
                        </div>

                        <div class="mt-16 mb-6 ml-6">
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</template>
 
<script setup>
import DMFTCount from '@/Pages/Dentist/Students/DMFTCount/Index.vue'
import PrintDentalChart from '@/Pages/Dentist/Students/DentalChart/PrintDentalChart.vue'
import PrintMedicalHistory from '@/Pages/Dentist/Students/MedicalHistory/PrintMedicalHistory.vue'
import PrintStudOHC from '@/Pages/Dentist/Students/OralHealthCondition/PrintStudOHC.vue'
import PrintPersonalInfo from './StudentRecord/PrintPersonalInfo.vue'

const props = defineProps({
    student: Object,
    medical: Object,
    chart: Array,
    exam: Object,
})

</script>
