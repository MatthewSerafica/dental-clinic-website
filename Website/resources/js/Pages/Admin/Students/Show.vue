<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="absolute right-4 w-80">
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
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Student&nbsp;Details</h1>
                <h6 class="h-1 text-xs text-gray-400">
                    <a href="/admin">Home</a> > <a href="/admin/student"> Students </a> >
                    Student Details
                </h6>
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
                            <StudentRecord :student="student" class="" />

                            <MedicalHistory :medical="medical" />
                            <DentalChart :chart="chart" @openNewRecordModal="openNewRecordModal"/>
                            <div class="relative flex flex-row gap-28 top-8">
                                <OHCStudents :exam="exam" />
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

                            <TreatmentRecord :services='services' :student="student" :treatments="treatment"
                                @openEditTreatment="openEditTreatment" class="h-full" />
                        </div>

                    </div>
                    <div class="mt-16 mb-6 ml-6">
                            <button @click="confirmArchive(student)"
                                        class="flex items-center gap-2 px-4 py-1 font-bold text-white bg-red-500 rounded-lg hover:bg-red-600 "
                                        type="button" as="button">
                                        <ArchiveIcon class="w-5 h-5" />Archive Record
                            </button>
                            <p class="mt-5 mb-3">personal information last updated by: {{ student.updated_by }}</p>
                    </div>

                </div>
                <Edit :student="student" :schools="schools" v-if="isShowModal" @close="closeModal" />
                <CreateTreatment :services='services' :treatment="treatment" :student="student" v-if="showNewRecordModal"
                    @close="closeNewRecordModal" />
                <EditTreatment :services="services" :treatment="selectedRecord" v-if="showEditTreatment"
                    @close="closeEditModal"></EditTreatment>
            </div>

            <div v-show="showConfirmationModal" class="fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="bg-white p-8 rounded-md shadow-md">
                    <p class="mb-4 text-lg font-semibold">Are you sure you want to archive this student record?</p>
                    <div class="flex justify-end">
                        <button @click="cancelArchive" class="mr-4 px-4 py-2 text-white bg-gray-500 rounded-md">Cancel</button>
                        <button @click="archive(student)" class="px-4 py-2 text-white bg-red-500 rounded-md">Archive</button>
                    </div>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template> 
   
 
<script setup>
import editicon from '@/Components/EditIcon.vue'
import ArchiveIcon from '@/Components/ArchiveIcon.vue'
import DentalChart from '@/Pages/Admin/Students/DentalChart/Index.vue'
import MedicalHistory from '@/Pages/Admin/Students/MedicalHistory/Index.vue'
import OHCStudents from '@/Pages/Admin/Students/OralHealthCondition/Index.vue'
import DMFTCount from '@/Pages/Admin/Students/DMFTCount/Index.vue'
import Edit from '@/Pages/Admin/Students/StudentRecord/Edit.vue'
import StudentRecord from '@/Pages/Admin/Students/StudentRecord/Index.vue'
import CreateTreatment from "@/Pages/Admin/Students/TreatmentRecord/Create.vue"
import EditTreatment from "@/Pages/Admin/Students/TreatmentRecord/Edit.vue"
import TreatmentRecord from '@/Pages/Admin/Students/TreatmentRecord/Index.vue'
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
import { useForm, usePage } from '@inertiajs/vue3'
import Alpine from 'alpinejs'
import { Toast } from 'flowbite-vue'
import { computed, ref } from 'vue'

Alpine.start()

const props = defineProps({
    student: Object,
    medical: Object,
    treatment: Object,
    chart: Array,
    exam: Object,
    schools: Object,
    services: Object,
})

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

function archive(student) {
    archivedRecords.put(route('admin.student.archive', student.id))
    showConfirmationModal.value = false;
}

const showConfirmationModal = ref(false);

const confirmArchive = (student) => {
  showConfirmationModal.value = true;
}

const cancelArchive = () => {
  showConfirmationModal.value = false;
}

</script>
