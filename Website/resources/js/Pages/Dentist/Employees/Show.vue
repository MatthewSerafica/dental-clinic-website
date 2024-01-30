<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="absolute flex flex-col laptop:w-[96.5em] desktop:w-[100em]">
            <div class="absolute right-80 w-80">
                <Toast x-data="{shown: false, timeout:null}"
                    x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);"
                    x-show.transition.opacity.out.duration.5000ms="shown" v-if="flashSuccess && isShowFlash" closable
                    type="success">
                    {{ flashSuccess }}
                </Toast>
                <Toast x-data="{shown: false, timeout:null}"
                    x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);"
                    x-show.transition.opacity.out.duration.5000ms="shown" v-if="flashError && isShowFlash" closable
                    type="danger">
                    {{ flashError }}
                </Toast>
            </div>
            <div class="flex flex-col ml-2">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Employee&nbsp;Details</h1>
                <h6 class="h-1 text-xs text-gray-400">
                    <a href="/admin">Home</a> > <a href="/admin/employee"> Employees </a> >
                    Employee Details
                </h6>
            </div>
            <div class="flex flex-row ml-auto mt-[-2em] space-x-5 desktop:mr-[0em] laptop:mr-[19.4em]">
                    <a :href="route('employee.record', employee.id)" target="_blank" class="inline-block px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">Print Record</a>
                    <a :href="route('employee.cert', employee.id)" target="_blank" class="inline-block px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">Print Certificate</a>
                </div>

            
            <div class="flex flex-col flex-grow h-full mt-8 bg-white rounded-xl laptop:origin-[left_top] inline-block scale-[0.8] desktop:scale-[1]">
                <div class="flex flex-col justify-between gap-4 lg:gap-8">
                    <div class="h-full rounded-lg">
                        <div class="flex flex-col gap-4">
                            <div class="relative flex flex-row justify-between mt-8 ml-6 mr-6">
                                <div class="flex flex-row gap-5">
                                    <h1 class="text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">
                                        PERSONAL INFORMATION</h1>
                                    <div class="">
                                        <button @click="showModal" type="button"
                                            class="z-50 w-10 h-8 bg-blue-500 rounded-lg hover:bg-blue-700">
                                            <editicon class="mx-auto"></editicon>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <EmployeeRecord :employee="employee" />
                            <MedicalHistory :medical="medical" />
                            <DentalChart :chart="chart" @openNewRecordModal="openNewRecordModal"  />
                            <div class="relative flex flex-row gap-28 top-8">
                                <OHCEmployees :exam="exam" />
                                <DMFTCount :chart="chart" :exam="exam" />
                            </div>

                            <div class="flex flex-row gap-5 ml-6">
                                <h1 class="text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">
                                    TREATMENT RECORD</h1>
                                <div class="">
                                    <button @click="openNewRecordModal" type="button"
                                        class="w-8 h-8 pt-0 text-xl font-medium text-center text-green-700 border-2 border-green-500 rounded-lg hover:bg-green-500 hover:text-green-50">
                                        +
                                    </button>
                                </div>
                            </div>

                            <TreatmentRecord :services="services" :employee="employee" :treatments="treatment"
                                @openEditTreatment="openEditTreatment" class="h-full" />

                        </div>
                    </div>
                    <div class="mt-16 mb-6 ml-6">
                            <button @click="confirmArchive(employee)"
                                        class="flex items-center gap-2 px-4 py-1 font-bold text-white bg-red-500 rounded-lg hover:bg-red-600 "
                                        type="button" as="button">
                                        <ArchiveIcon class="w-5 h-5" />Archive Record
                            </button>
                            <p class="mt-5 mb-3">personal information last updated by: {{ employee.updated_by }}</p>
                    </div>
                </div>
            </div>
                <Edit :employee="employee" :departments="departments" v-if="isShowModal" @close="closeModal" />
                <CreateTreatment :treatment="treatment" :services="services" :employee="employee" v-if="showNewRecordModal"
                    @close="closeNewRecordModal" />
                <EditTreatment :services="services" :treatment="selectedRecord" v-if="showEditTreatment"
                    @close="closeEditModal"></EditTreatment>
        </div>
        <div v-show="showConfirmationModal" class="fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="p-8 bg-white rounded-md shadow-md">
                    <p class="mb-4 text-lg font-semibold">Are you sure you want to archive this employee record?</p>
                    <div class="flex justify-end">
                        <button @click="cancelArchive" class="px-4 py-2 mr-4 text-white bg-gray-500 rounded-md">Cancel</button>
                        <button @click="archive(employee)" class="px-4 py-2 text-white bg-red-500 rounded-md">Archive</button>
                    </div>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template> 
<script setup>
import ArchiveIcon from '@/Components/ArchiveIcon.vue'
import editicon from '@/Components/EditIcon.vue'
import DMFTCount from '@/Pages/Dentist/Employees/DMFTCount/Index.vue'
import DentalChart from '@/Pages/Dentist/Employees/DentalChart/Index.vue'
import Edit from '@/Pages/Dentist/Employees/EmployeeRecord/Edit.vue'
import EmployeeRecord from '@/Pages/Dentist/Employees/EmployeeRecord/Index.vue'
import MedicalHistory from '@/Pages/Dentist/Employees/MedicalHistory/Index.vue'
import OHCEmployees from '@/Pages/Dentist/Employees/OralHealthCondition/Index.vue'
import CreateTreatment from "@/Pages/Dentist/Employees/TreatmentRecord/Create.vue"
import TreatmentRecord from '@/Pages/Dentist/Employees/TreatmentRecord/Index.vue'
import EditTreatment from "@/Pages/Dentist/Employees/TreatmentRecord/Edit.vue"
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
import { useForm, usePage } from '@inertiajs/vue3'
import Alpine from 'alpinejs'
import { Toast } from 'flowbite-vue'
import { computed, ref } from 'vue'

Alpine.start()

const props = defineProps({
    employee: Object,
    medical: Object,
    treatment: Object,
    chart: Object,
    exam: Object,
    departments: Object,
    services: Object,
});
const isShowFlash = ref(false)

const page = usePage()

const flashSuccess = computed(
    () => page.props.flash.success, isShowFlash.value = true
)

const flashError = computed(
    () => page.props.flash.error, isShowFlash.value = true
)


const isShowModal = ref(false)

function closeModal() {
    isShowModal.value = false
}

function showModal() {
    isShowModal.value = true
}
const showNewRecordModal = ref(false)

const openNewRecordModal = () => {
    showNewRecordModal.value = true
}

const closeNewRecordModal = () => {
    showNewRecordModal.value = false
}

let selectedRecord = ref('')

const showEditTreatment = ref(false)

const openEditTreatment = (record) => {
    selectedRecord = record
    showEditTreatment.value = true
}

const closeEditModal = () => {
    showEditTreatment.value = false
}

const archivedRecords = useForm({
    archived_at: Date.now(),
    is_active: false,
})

function archive(employee) {
    archivedRecords.put(route('employee.archive', employee.id))
    showConfirmationModal.value = false;
}

const showConfirmationModal = ref(false);

const confirmArchive = (employee) => {
  showConfirmationModal.value = true;
}

const cancelArchive = () => {
  showConfirmationModal.value = false;
}
</script>
