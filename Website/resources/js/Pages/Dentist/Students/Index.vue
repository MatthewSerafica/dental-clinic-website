<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="flex flex-col ml-2">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Students</h1>
                <h6 class="h-1 text-xs text-gray-400">
                    <a href="/">Home</a> > Students
                </h6>
            </div>
            <div class="flex flex-col flex-grow mt-8 bg-white rounded-xl">
                <!--search bar-->
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
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.all" @change="filterAll()" />
                                                All
                                            </label>
                                        </li>
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.male"
                                                    @change="filterBySex('male')" />
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
                                        <!-- School filter options -->
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.schools.SAMCIS"
                                                    @change="filterBySchool('SAMCIS')" />
                                                SAMCIS
                                            </label>
                                        </li>
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.schools.SAS"
                                                    @change="filterBySchool('SAS')" />
                                                SAS
                                            </label>
                                        </li>
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.schools.SEA"
                                                    @change="filterBySchool('SEA')" />
                                                SEA
                                            </label>
                                        </li>
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.schools.SOL"
                                                    @change="filterBySchool('SOL')" />
                                                SOL
                                            </label>
                                        </li>
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.schools.SOM"
                                                    @change="filterBySchool('SOM')" />
                                                SOM
                                            </label>
                                        </li>
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.schools.SONAHBS"
                                                    @change="filterBySchool('SONAHBS')" />
                                                SONAHBS
                                            </label>
                                        </li>
                                        <li class="hover-bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.schools.STELA"
                                                    @change="filterBySchool('STELA')" />
                                                STELA
                                            </label>
                                        </li>
                                    </ul>
                                </dropdown>
                            </div>
                        </div>
                        <!-- Modal button-->
                        <div class="">
                            <button @click="showModal" type="button"
                                class="flex flex-row items-center gap-2 px-5 py-3 text-sm font-medium text-center text-white bg-green-500 rounded-lg max-sm:w-full hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <AddApointment></AddApointment>
                                Add New Student
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
                                            COURSE/SCHOOL
                                        </th>
                                        <th class="p-3 text-left max-sm:hidden">SEX</th>
                                        <th class="p-3 text-left max-sm:hidden">
                                            LAST VISIT
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="flex-1 sm:flex-none">
                                    <tr class="flex flex-col mb-2 flex-no wrap sm:table-row sm:mb-0 max-sm:border max-sm:roun hover:bg-gray-100"
                                        v-for="student in students.data" :key="student.id">
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                                            <Link :href="`/student/${student.id}`" class="flex flex-col">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                    {{ student.id_number }}
                                                </p>
                                                <p class="mr-2 text-base font-normal leading-none text-gray-700">
                                                    {{ student.last_name }}, {{ student.first_name }} {{
                                                        student.middle_name }}
                                                </p>
                                            </div>
                                            </Link>
                                        </td>
                                        <Link :href="`/student/${student.id}`" class="flex flex-col sm:hidden">
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                    {{ student.id_number }}
                                                </p>
                                                <p class="mr-2 text-base font-normal leading-none text-gray-700">
                                                    {{ student.last_name }}, {{ student.first_name }}, {{
                                                        student.middle_name }}
                                                </p>
                                            </div>

                                        </td>
                                        </Link>
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                                            <Link :href="`/student/${student.id}`" class="flex flex-col">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                    {{ student.course }}
                                                </p>
                                                <p class="mr-2 text-base font-normal leading-none text-gray-700">
                                                    {{ student.school }}
                                                </p>
                                            </div>
                                            </Link>
                                        </td>
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                                            <Link :href="`/student/${student.id}`" class="flex flex-col">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                    {{ student.sex }}
                                                </p>
                                            </div>
                                            </Link>
                                        </td>
                                        <td class="p-3 border-b border-grey-light hover:bg-gray-100 max-sm:hidden">
                                            <Link :href="`/student/${student.id}`" class="flex flex-col">
                                            <div class="flex flex-col">
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700" v-if="!student.treatments || !student.treatments.length">
                                                    Did not visit yet
                                                </p>
                                                <p class="mr-2 text-base font-medium leading-none text-gray-700" v-else-if="student.treatments[0].updated_at">
                                                    {{
                                                        formatDate(new Date(
                                                            student.treatments[0].date
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
                    <div v-if="students.data.length" class="flex justify-center w-full mt-6">
                        <Pagination :links="students.links" />
                    </div>
                </div>
                <!--modal component-->
                <Create v-if="isShowModal" @close="closeModal" :schools="schools" />

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
import AddApointment from "@/Components/AddApointment.vue";
import Error from "@/Components/Error.vue"
import Pagination from "@/Components/Pagination.vue"
import Success from "@/Components/Success.vue"
import Create from "@/Pages/Dentist/Students/Create.vue"
import MainLayout from "@/Pages/Layouts/MainLayout.vue"
import { Link, router, usePage } from "@inertiajs/vue3"
import moment from "moment"
import "moment-timezone"
import { Button, Dropdown, Modal } from "flowbite-vue"
import { computed, reactive, ref, watch } from "vue"


const formatDate = (date) => {
    return moment(date, 'MM-DD-YYYY').format('DD-MM-YYYY');
};

const isShowModal = ref(false)

function closeModal() {
    isShowModal.value = false
}

function showModal() {
    isShowModal.value = true
}

const props = defineProps({
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

let search = ref(props.filters.search)
let sortColumn = ref("id_number")
let sortDirection = ref("asc")
let searchSex = ref("")
// let searchPatientType = ref('');

const filter = reactive({
    all: true,
    male: false,
    female: false,
    schools: {
        SAMCIS: false,
        SAS: false,
        SEA: false,
        SOL: false,
        SOM: false,
        SONAHBS: false,
        STELA: false,
    }
})

let timeoutId = null

const fetchData = () => {
    router.get(
        "/student",
        {
            search: search.value,
            sort: sortColumn.value,
            direction: sortDirection.value,
            sex: searchSex.value,
            school: filter.school,
        },
        {
            preserveState: true,
            replace: true,
        }
    )
}

const debouncedFetchData = () => {
    if (timeoutId) {
        clearTimeout(timeoutId)
    }
    timeoutId = setTimeout(() => {
        fetchData()
    }, 500)
}

const resetSorting = () => {
    sortColumn.value = "id_number"
    sortDirection.value = "asc"
}

const toggleSorting = (column) => {
    if (column === sortColumn.value) {
        sortDirection.value = sortDirection.value === "asc" ? "desc" : "asc"
    } else {
        sortColumn.value = column;
        sortDirection.value = "asc"
    }
}

watch(search, () => {
    if (!search.value) {
        resetSorting()
    }
    debouncedFetchData()
})

const sort = (column) => {
    toggleSorting(column)
    debouncedFetchData()
}

const filterAll = () => {
    searchSex.value = '';
    filter.all = true;
    filter.male = false;
    filter.female = false;
    filter.school = '';
    Object.keys(filter.schools).forEach(school => {
        filter.schools[school] = false;
    });
    debouncedFetchData();
};

const filterBySex = (sex) => {
    if (sex === 'male') {
        filter.female = false;
    } else if (sex === 'female') {
        filter.male = false;
    }
    filter.all = false;
    searchSex.value = filter[sex] ? sex : '';
    search.value = '';
    debouncedFetchData();
}

const filterBySchool = (school) => {
    Object.keys(filter.schools).forEach((key) => {
        if (key !== school) {
            filter.schools[key] = false;
        }
    });
    filter.all = false;
    filter.school = filter.school === school ? '' : school;
    search.value = '';
    debouncedFetchData();
}
</script>

