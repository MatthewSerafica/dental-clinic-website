<!--employees-->
<template>
    <MainLayout>
        <template v-slot:mainContent>

            <div class="flex flex-col ml-2">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Employees</h1>
                <h6 class="h-1 text-xs text-gray-400">
                    <a href="/admin">Home</a> > Employees
                </h6>
            </div>
            <div class="flex flex-col flex-grow mt-8 bg-white rounded-xl">
                <div class="grid mt-10 mb-2 ml-10 mr-10">
                    <div class="flex justify-between w-full py-1 mx-auto sm:items-center max-sm:flex-col max-sm:gap-4 ">
                        <div class="flex flex-row items-center gap-4">
                            <div class="relative max-sm:w-full">
                                <div
                                    class="absolute top-0 left-0 inline-flex items-center justify-center w-10 h-full text-gray-400">
                                    <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>

                                <input id="search" v-model="search" type="text" name="search"
                                    class="w-full h-10 pl-10 pr-4 text-sm placeholder-gray-500 border border-gray-300 rounded-lg sm:text-base focus:outline-none focus:border-indigo-400 bg-gray-50"
                                    placeholder="Search..." />
                            </div>
                            <!--filter-->
                            <div>
                                <dropdown placement="bottom" text="Filter">
                                    <ul class="bg-gray-200 rounded shadow-lg">
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.all" @change="selectAll" />
                                                All
                                            </label>
                                        </li>
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.male"
                                                    @change="filterBySex('male')" />
                                                Male
                                            </label>
                                        </li>
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.female"
                                                    @change="filterBySex('female')" />
                                                Female
                                            </label>
                                        </li>
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.teaching"
                                                    @change="filterByEmployeeType('Teaching')" class="hover:bg-gray-300" />
                                                Teaching
                                            </label>
                                        </li>
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.non_teaching"
                                                    @change="filterByEmployeeType('Non-Teaching')"
                                                    class="hover:bg-gray-300" />
                                                Non-Teaching
                                            </label>
                                        </li>
                                    </ul>
                                </dropdown>
                            </div>
                        </div>
                        <!-- Modal button-->
                        <div class="absolute right-[255px]">
                            <button @click="showModal2" type="button"
                                class="px-5 py-3 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg max-sm:w-full hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                Import
                            </button>
                            <Modal v-if="isShowModal2" @close="closeModal2">
                                <template #header>
                                    <div class="flex items-center text-lg font-semibold">
                                        Upload File Here
                                    </div>
                                </template>

                                <template #body>
                                    <form class="" @submit.prevent="uploadCsv" enctype="multipart/form-data">
                                        <div class="flex flex-col justify-center">
                                            <label class="mb-2 ml-2 text-sm font-medium text-gray-900 dark:text-white"
                                                for="file">Upload file</label>
                                            <input
                                                class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                id="file" type="file" @change="handleFileUpload">
                                        </div>
                                        <div class="flex justify-end gap-4 pt-8">
                                            <Button @click="closeModal2" color="alternative">
                                                Cancel
                                            </Button>
                                            <Button type="submit" color="green">
                                                Insert
                                            </Button>
                                        </div>
                                    </form>
                                </template>
                            </Modal>
                        </div>
                        <div class="">
                            <button @click="showModal" type="button"
                                class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-center text-white bg-green-500 rounded-lg max-sm:w-full hover:bg-green-600">
                                <AddApointment></AddApointment>
                                Add New Employee
                            </button>
                        </div>
                    </div>
                </div>
                <div class="grid mb-10 ml-10 mr-10">
                    <div class="gap-4 lg:grid-cols-2 lg:gap-8">
                        <div class="relative">
                            <table class="w-full my-5 overflow-hidden rounded-lg sm:bg-white sm:shadow-lg">
                                <thead class="w-full text-black">
                                    <tr
                                        class="flex flex-col mb-2 bg-gray-100 rounded-l-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0">
                                        <th class="p-3 text-left">PATIENTS</th>
                                        <th class="p-3 text-left max-sm:hidden">
                                            DEPARTMENT
                                        </th>
                                        <th class="p-3 text-left max-sm:hidden">SEX</th>
                                        <th class="p-3 text-left max-sm:hidden">
                                            LAST VISIT
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="flex-1 sm:flex-none">
                                    <tr class="flex flex-col mb-2 flex-no wrap sm:table-row sm:mb-0 max-sm:border max-sm:roun hover:bg-gray-100"
                                        v-for="employee in employees.data" :key="employee.id_number">
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                                            <Link :href="`/admin/employee/${employee.id}`" class="flex flex-col">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                    {{ employee.id_number }}
                                                </p>
                                                <p class="mr-2 text-base font-normal leading-none text-gray-700">
                                                    {{ employee.last_name }}, {{ employee.first_name }} {{
                                                        employee.middle_name }}
                                                </p>
                                            </div>
                                            </Link>
                                        </td>
                                        <Link :href="`/admin/employee/${employee.id}`" class="flex flex-col sm:hidden">
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                    {{ employee.id_number }}
                                                </p>
                                                <p class="mr-2 text-base font-normal leading-none text-gray-700">
                                                    {{ employee.last_name }}, {{ employee.first_name }}, {{
                                                        employee.middle_name }}
                                                </p>
                                            </div>

                                        </td>
                                        </Link>
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                                            <Link :href="`/admin/employee/${employee.id}`" class="flex flex-col">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                    {{ employee.department }}
                                                </p>
                                            </div>
                                            </Link>
                                        </td>
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                                            <Link :href="`/admin/employee/${employee.id}`" class="flex flex-col">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                    {{ employee.sex }}
                                                </p>
                                            </div>
                                            </Link>
                                        </td>
                                        <td class="p-3 border-b border-grey-light hover:bg-gray-100 max-sm:hidden">
                                            <Link :href="`/admin/employee/${employee.id}`" class="flex flex-col">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700"
                                                    v-if="!employee.treatments || !employee.treatments.length">
                                                    Did not visit yet
                                                </p>
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700"
                                                    v-else-if="employee.treatments[0].updated_at">
                                                    {{
                                                        formatDate(new Date(
                                                            employee.treatments[0].date
                                                        ).toLocaleDateString())
                                                    }}
                                                </p>
                                            </div>
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div v-if="employees.data.length" class="flex justify-center w-full mt-6">
                        <Pagination :links="employees.links" />
                    </div>
                </div>
                <Create v-if="isShowModal" :departments="departments" @close="closeModal" />
            </div>

            <Modal v-if="flashSuccess && isShowFlash" persistent size="lg">
                <template #body>
                    <div class="flex flex-col items-center gap-6 px-4 text-lg font-semibold">
                        <h1 class="text-xl text-center text-green-500 capitalize">
                            {{ flashSuccess }}
                        </h1>
                        <Success class="w-20 h-20"></Success>
                        <h2 class="w-56 pb-4 text-sm font-normal text-center text-gray-500">
                            {{ flashMessage }}
                        </h2>
                        <Button color="default" size="lg" class="w-full" @click="closeFlash">Got It</Button>
                    </div>
                </template>
            </Modal>
            <Modal v-if="flashError && isShowFlash" size="md" persistent>
                <template #body>
                    <div class="flex flex-col items-center gap-6 px-4 text-lg font-semibold">
                        <Error class="w-12 h-12"></Error>
                        <h1 class="w-56 text-lg font-semibold text-center text-red-500 capitalize">
                            {{ flashError }}
                        </h1>
                        <Button color="default" size="lg" class="w-full" @click="closeFlash">Got It</Button>
                    </div>
                </template>
            </Modal>
        </template>
    </MainLayout>
</template>

<script setup>
import AddApointment from "@/Components/AddApointment.vue"
import Error from "@/Components/Error.vue"
import Pagination from '@/Components/Pagination.vue'
import Success from "@/Components/Success.vue"
import Create from '@/Pages/Admin/Employees/Create.vue'
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
import { Link, router, usePage } from '@inertiajs/vue3'
import axios from "axios"
import { Button, Dropdown, Modal } from 'flowbite-vue'
import moment from "moment"
import "moment-timezone"
import { computed, reactive, ref, watch } from 'vue'

const formatDate = (date) => {
    return moment(date, 'MM-DD-YYYY').format('DD-MM-YYYY');
};

const file = ref(null)

const handleFileUpload = () => {
    file.value = document.querySelector('#file').files[0]
}

const uploadCsv = async () => {
    let formData = new FormData()
    formData.append('file', file.value)

    try {
        const response = await axios.post('/admin/employee/bulk', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        console.log('File uploaded successfully')
        console.log(response.data)
        isShowModal2.value = false
        fetchData()
    } catch (err) {
        console.log('Error uploading file')
        console.error(err)
    }
}

const props = defineProps({
    employees: {
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
    departments: {
        type: Object,
        default: () => ({}),
    },
})
const isShowFlash = ref(false)

function closeFlash() {
    isShowFlash.value = false
}

const page = usePage()

const flashSuccess = computed(
    () => page.props.flash.success,
    isShowFlash.value = true
)

const flashMessage = computed(
    () => page.props.flash.message
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

const isShowModal2 = ref(false)

function closeModal2() {
    isShowModal2.value = false
}

function showModal2() {
    isShowModal2.value = true
}

let search = ref(props.filters.search);
let sortColumn = ref('id_number');
let sortDirection = ref('asc');
let searchSex = ref('');
// let searchPatientType = ref('');

const filter = reactive({
    male: false,
    female: false,
    teaching: false,
    non_teaching: false,
    employeeType: '',
    all: true,
})

let timeoutId = null;

const fetchData = () => {
    router.get(
        "/admin/employee",
        {
            search: search.value,
            sort: sortColumn.value,
            direction: sortDirection.value,
            sex: filter.all ? 'all' : (filter.male ? 'male' : (filter.female ? 'female' : '')),
            employee_type: filter.all ? 'all' : (filter.teaching ? 'teaching' : (filter.non_teaching ? 'non-teaching' : ''))
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

const toggleSorting = (column) => {
    if (column === sortColumn.value) {
        sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc';
    } else {
        sortColumn.value = column;
        sortDirection.value = 'asc';
    }
}

watch(search, () => {
    if (!search.value) {
        resetSorting();
    }
    debouncedFetchData();
})

const sort = (column) => {
    toggleSorting(column);
    debouncedFetchData();
}

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

const uncheckAllIfOtherChecked = (checkedKey) => {
    if (checkedKey !== 'all') {
        filter.all = false;
    }
}

const filterByEmployeeType = (type) => {
    uncheckAllIfOtherChecked(type);
    if (type === 'Teaching') {
        filter.teaching = true;
        filter.non_teaching = false;
    } else if (type === 'Non-Teaching') {
        filter.non_teaching = true;
        filter.teaching = false;
    }
    debouncedFetchData();
}

const selectAll = () => {
    filter.all = !filter.all;
    filter.male = false;
    filter.female = false;
    filter.teaching = false;
    filter.non_teaching = false;
    searchSex.value = '';
    search.value = '';
    debouncedFetchData();
}

</script>

