<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="absolute flex flex-col w-[98em]">
                <div class="absolute right-80 w-80">
                    <Toast x-data="{shown: false, timeout:null}"
                        x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);"
                        x-show.transition.opacity.out.duration.5000ms="shown" class="" v-if="flashSuccess && isShowFlash"
                        closable type="success">
                        {{ flashSuccess }}
                    </Toast>
                    <Toast x-data="{shown: false, timeout:null}"
                        x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);"
                        x-show.transition.opacity.out.duration.5000ms="shown" class="" v-if="flashError && isShowFlash"
                        closable type="danger">
                        {{ flashError }}
                    </Toast>
                </div>
                <div class="h-[30rem] rounded">
                    <div class="flex flex-col ml-2 max-sm:px-5">
                        <h1 class="w-full h-8 text-2xl font-bold text-gray-700 max-sm:ml-4">Employee Details</h1>
                        <h6 class="h-1 text-xs text-gray-400 max-sm:ml-4">
                            <a href="/assistant">Home</a> > <a href="/assistant/employee"> Employees</a> > Employee Details
                        </h6>
                    </div>
                    <div
                        class="flex flex-col flex-grow h-full mt-8 bg-white rounded-xl laptop:origin-[left_top] inline-block scale-[0.8] desktop:scale-[1]">
                        <div class="flex flex-col justify-between gap-4 lg:gap-8">
                            <div class="h-full rounded-lg">
                                <div class="flex flex-col gap-4">
                                    <div class="relative flex flex-row justify-between mt-8 ml-6 mr-6">
                                        <div class="flex flex-row gap-5">
                                            <h1
                                                class="text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <Edit :employee="employee" :departments="departments" v-if="isShowModal" @close="closeModal" />
                </div>
            </div>
        </template>
    </MainLayout>
</template> 

<script setup>
import editicon from '@/Components/EditIcon.vue'
import Edit from '@/Pages/Assistant/Employees/EmployeeRecord/Edit.vue'
import EmployeeRecord from '@/Pages/Assistant/Employees/EmployeeRecord/Index.vue'
import MedicalHistory from '@/Pages/Assistant/Employees/MedicalHistory/Index.vue'
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
import { usePage } from '@inertiajs/vue3'
import Alpine from 'alpinejs'
import { Toast } from 'flowbite-vue'
import { computed, ref } from 'vue'

Alpine.start()

const props = defineProps({
    employee: Object,
    medical: Object,
    departments: Object,
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
</script>
