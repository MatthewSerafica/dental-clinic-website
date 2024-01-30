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

            <div class="flex flex-col ml-2 max-sm:px-5">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700 max-sm:ml-4">Archives</h1>
                <h6 class="h-1 text-xs text-gray-400 max-sm:ml-4">
                    <a href="/admin">Home</a> > Archives
                </h6>
            </div>

            <div class="relative flex flex-col flex-grow mt-8 bg-white rounded-xl">
                <div class="px-5 py-6">
                    <div class="grid items-center gap-4 laptop:grid-cols-16 desktop:grid-cols-12">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="col-start-1 laptop:col-end-5 desktop:col-end-4">
                            <input type="text" id="simple-search" v-model="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 p-2.5 dark:bg-white-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Patient Name..." />
                            <div
                                class="absolute laptop:left-60 desktop:left-72 top-8 p-2 ml-4 text-sm font-medium text-[#808080]">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </div>
                        </div>
                        <!--filter-->
                        <div class="laptop:col-start-5 desktop:col-start-4">
                            <dropdown placement="bottom" text="Filter">
                                <ul class="bg-gray-200 rounded shadow-lg">
                                    <li class="hover-bg-gray-300">
                                        <label>
                                            <input type="checkbox" v-model="filter.all" @change="selectAll()" />
                                            All
                                        </label>
                                    </li>
                                    <li class="hover-bg-gray-300">
                                        <label>
                                            <input type="checkbox" v-model="filter.male" @change="filterBySex('male')" />
                                            Male
                                        </label>
                                    </li>
                                    <li class="hover-bg-gray-300">
                                        <label>
                                            <input type="checkbox" v-model="filter.female"
                                                @change="filterBySex('female')" />
                                            Female
                                        </label>
                                    </li>
                                    <li class="hover-bg-gray-300">
                                        <label>
                                            <input type="checkbox" v-model="filter.student"
                                                @change="filterByPatientType('student')" />
                                            Student
                                        </label>
                                    </li>
                                    <li class="hover-bg-gray-300">
                                        <label>
                                            <input type="checkbox" v-model="filter.employee"
                                                @change="filterByPatientType('employee')" />
                                            Employee
                                        </label>
                                    </li>
                                </ul>
                            </dropdown>
                        </div>

                    </div>

                    <div class="relative desktop:top-2">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-left text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-6">
                                        <button @click="sort('id_number')">
                                            <div class="flex items-center">
                                                ID NUMBER
                                            </div>
                                        </button>
                                    </th>
                                    <th class="p-6">
                                        <button @click="sort('last_name')">
                                            LAST NAME
                                        </button>
                                    </th>
                                    <th class="p-6">
                                        <button @click="sort('first_name')">
                                            FIRST NAME
                                        </button>
                                    </th>
                                    <th class="p-6">SEX</th>
                                    <th class="p-6">SCHOOL</th>
                                    <th class="p-6">COURSE</th>
                                    <th class="p-6">DEPARTMENT</th>
                                    <th class="p-6"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr :href="`/admin/archives/${record.id}`" class="table-row bg-white border-b"
                                    v-for="record in archivedRecords.data" :key="record.id">

                                    <th class="px-6 py-4">
                                        {{ record.id_number }}
                                    </th>

                                    <th class="px-6 py-4">
                                        {{ record.last_name }}
                                    </th>

                                    <th class="px-6 py-4">
                                        {{ record.first_name }}
                                    </th>

                                    <th class="px-6 py-4">
                                        {{ record.sex }}
                                    </th>

                                    <th class="px-6 py-4">
                                        {{ record.school }}
                                    </th>

                                    <th class="px-6 py-4">
                                        {{ record.course }}
                                    </th>

                                    <th class="px-6 py-4">
                                        {{ record.department }}
                                    </th>

                                    <th>
                                        <button @click="showUnarchiveConfirmation(record)"
                                            class="w-24 h-10 bg-yellow-400 rounded-lg max-sm:w-full hover:bg-yellow-500 hover:text-white text-gray-50">Unarchive</button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div v-show="showConfirmationModal" class="fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="bg-white p-8 rounded-md shadow-md">
                            <p class="mb-4 text-lg font-semibold">Are you sure you want to unarchive this record?</p>
                            <div class="flex justify-end">
                                <button @click="closeConfirmationModal" class="mr-4 px-4 py-2 text-white bg-gray-500 rounded-md">Cancel</button>
                                <button @click="unarchiveConfirmed" class="px-4 py-2 text-white bg-yellow-500 rounded-md">Unarchive</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-full mt-6">
                    <Pagination :links="archivedRecords.links" />
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script setup>
import Pagination from "@/Components/Pagination.vue";
import MainLayout from '@/Pages/Layouts/MainLayout.vue';
import { router, useForm, usePage } from '@inertiajs/vue3';
import { Dropdown, Toast } from "flowbite-vue";
import { reactive, ref, watch, computed } from 'vue';
import Alpine from 'alpinejs';

Alpine.start()

const props = defineProps({
    archivedRecords: Object,

    students: {
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
    schools: {
        type: Object,
        default: () => ({}),
    },
})

const isShowFlash = ref(false)

const page = usePage()

const flashSuccess = computed(
    () => page.props.flash.success, isShowFlash.value = true
)

const flashError = computed(
    () => page.props.flash.error, isShowFlash.value = true
)

const archivedRecords = ref(props.archivedRecords)

const unarchiveRecord = useForm({
    archived_at: '',
    is_active: true,
})

function unarchive(record) {
    if (record.user.user_type == 'student') {
        unarchiveRecord.put(route('admin.archive.student.unarchive', record.id))
    } else if (record.user.user_type == 'employee') {
        unarchiveRecord.put(route('admin.archive.employee.unarchive', record.id))
    }
}


const showConfirmationModal = ref(false);
let recordToUnarchive;

const showUnarchiveConfirmation = (record) => {
    recordToUnarchive = record;
    showConfirmationModal.value = true;
}

const closeConfirmationModal = () => {
    showConfirmationModal.value = false;
}

const unarchiveConfirmed = () => {
    unarchive(recordToUnarchive);
    window.location.reload();
    closeConfirmationModal();
}

let search = ref(props.filters.search);
let sortColumn = ref('id_number');
let sortDirection = ref('asc');
let searchSex = ref('');
let searchPatientType = ref('');

const filter = reactive({
    male: false,
    female: false,
    employee: false,
    student: false,
    all: true,
})

let timeoutId = null;

const fetchData = () => {
    router.get(
        "/admin/archives",
        {
            search: search.value,
            sex: searchSex.value,
            patientType: searchPatientType.value,
        },
        {
            preserveState: true,
            replace: true,
        }
    )
}

const debouncedFetchData = () => {
    if (timeoutId) {
        clearTimeout(timeoutId);
    }
    timeoutId = setTimeout(() => {
        fetchData();
    }, 500);
}

const resetSorting = () => {
    sortColumn.value = 'id_number';
    sortDirection.value = 'asc';
}


watch(search, () => {
    if (!search.value) {
        resetSorting();
    }
    debouncedFetchData();
})

const filterBySex = (sex) => {
    uncheckAllIfOtherChecked(sex);
    if (sex === 'male') {
        filter.male = true;
        filter.female = false;
        searchSex.value = 'male';
    } else if (sex === 'female') {
        filter.female = true;
        filter.male = false;
        searchSex.value = 'female';
    }
    search.value = '';
    debouncedFetchData();
}

const filterByPatientType = (patientType) => {
    uncheckAllIfOtherChecked(patientType)
    switch (patientType) {
        case 'student':
            filter.student = true;
            filter.employee = false;
            searchPatientType.value = 'student';
            break;
        case 'employee':
            filter.employee = true;
            filter.student = false;
            searchPatientType.value = 'employee';
            break;
    }
    searchPatientType.value = patientType;
    search.value = '';
    debouncedFetchData();
}

const uncheckAllIfOtherChecked = (checkedKey) => {
    if (checkedKey !== 'all') {
        filter.all = false;
    }
}

const selectAll = () => {
    filter.all = !filter.all;
    filter.all = true;
    filter.male = false;
    filter.female = false;
    filter.student = false;
    filter.employee = false;
    searchPatientType.value = '';
    searchSex.value = '';
    search.value = '';
    debouncedFetchData();
}

</script>