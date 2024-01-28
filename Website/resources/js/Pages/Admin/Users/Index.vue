<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="flex flex-col ml-2 max-sm:px-5">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700 max-sm:ml-4">Users</h1>
                <h6 class="h-1 text-xs text-gray-400 max-sm:ml-4">
                    <a href="/admin">Home</a> > users
                </h6>
            </div>

            <div class="relative flex flex-col flex-grow mt-8 rounded-xl">
                <!-- old class of div above  class="relative laptop:w-[75rem] laptop:h-[36rem] left-10 desktop:top-16 laptop:top-10 desktop:w-[99rem] ml-[13.5em]">
                        -->
                <div class="w-full bg-white rounded-xl h-[42rem] drop-shadow-lg">
                    <div v-if="flashSuccess" x-data="{shown: false, timeout:null}"
                        x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);"
                        x-show.transition.opacity.out.duration.2000ms="shown"
                        class="absolute top-2 p-2 mb-4 bg-green-200 border border-green-200 rounded-md shadow-sm left-[42rem] w-56 dark:border-green-800 dark:bg-green-900 text-center">
                        {{ flashSuccess }}
                    </div>

                    <div v-if="flashError" x-data="{shown: false, timeout:null}"
                        x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);"
                        x-show.transition.opacity.out.duration.2000ms="shown"
                        class="absolute top-2 p-2 mb-4 bg-red-400 border border-red-200 rounded-md shadow-sm left-[42rem] w-56 dark:border-red-800 dark:bg-red-900 text-center text-white">
                        {{ flashError }}
                    </div>
                    <div class="px-5 py-6">
                        <div class="grid items-center gap-4 laptop:grid-cols-16 desktop:grid-cols-12">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="col-start-1 laptop:col-end-5 desktop:col-end-4">
                                <input type="text" id="simple-search" v-model="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 p-2.5 dark:bg-white-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search User Name...">
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

                            <div class="laptop:col-start-5 desktop:col-start-4">
                                <dropdown placement="bottom" text="Filter">
                                    <ul class="bg-gray-200 rounded shadow-lg">
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.all"
                                                    @change="filterByUserType('student')" />
                                                All
                                            </label>
                                        </li>
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.student"
                                                    @change="filterByUserType('student')" />
                                                Student
                                            </label>
                                        </li>
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.dentist"
                                                    @change="filterByUserType('dentist')" />
                                                Dentist
                                            </label>
                                        </li>
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.employee"
                                                    @change="filterByUserType('employee')" />
                                                Employee
                                            </label>
                                        </li>
                                        <li class="hover:bg-gray-300">
                                            <label>
                                                <input type="checkbox" v-model="filter.assistant"
                                                    @change="filterByUserType('assistant')" />
                                                Assistant
                                            </label>
                                        </li>
                                    </ul>
                                </dropdown>
                            </div>
                            <div class="grid items-center row-start-1 laptop:col-start-14 col-end-17 desktop:col-start-13">
                                <dropdown placement="bottom" text="Add New User">
                                    <ul class="rounded shadow-lg">
                                        <li class="">
                                            <Link :href="`/admin/student`"
                                                class="flex items-center gap-3 px-5 py-2 font-medium text-white bg-green-500 rounded hover:bg-green-700">
                                            Student
                                            </Link>
                                        </li>
                                        <li>
                                            <Link :href="`/admin/employee`"
                                                class="flex items-center gap-3 px-5 py-2 mt-2 font-medium text-white bg-green-500 rounded hover:bg-green-700">
                                            Employee
                                            </Link>
                                        </li>
                                        <li>
                                            <Link :href="`/admin/dentist/create`"
                                                class="flex items-center gap-3 px-5 py-2 mt-2 font-medium text-white bg-green-500 rounded hover:bg-green-700">
                                            Dentist
                                            </Link>
                                        </li>
                                        <li>
                                            <Link :href="`/admin/assistant/create`"
                                                class="flex items-center gap-3 px-5 py-2 mt-2 font-medium text-white bg-green-500 rounded hover:bg-green-700">
                                            Assistant
                                            </Link>
                                        </li>
                                    </ul>
                                </dropdown>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-left text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-6">
                                        <button @click="sort('id')">
                                            <div class="flex items-center">
                                                ID
                                                <SortIcon />
                                            </div>
                                        </button>

                                    </th>
                                    <th class="p-6">
                                        <button @click="sort('name')">Name</button>
                                    </th>
                                    <th class="p-6">User Type</th>
                                    <th class="p-6">Email</th>
                                    <th class="p-6">Date Created</th>
                                    <th class="p-6"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" v-for="user in users.data" :key="user.id">
                                    <th class="px-6 py-4">
                                        {{ user.id }}
                                    </th>
                                    <th class="px-6 py-4 capitalize">
                                        {{ user.name }}
                                    </th>
                                    <th class="px-6 py-4 capitalize">
                                        {{ user.user_type }}
                                    </th>
                                    <th class="px-6 py-4">
                                        {{ user.email }}
                                    </th>
                                    <th class="px-6 py-4">
                                        {{ formatDate(new Date(user.created_at).toLocaleDateString()) }}
                                    </th>
                                    <th class="px-6 py-4">
                                        <div class="w-full col-start-1 col-end-3">
                                            <Link :href="route('admin.user.edit', user.id)" as="button"
                                                class="grid items-center grid-cols-2 px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700">
                                            <editicon></editicon>
                                            Edit
                                            </Link>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div v-if="users.data.length" class="absolute flex justify-center w-full mt-8 mb-8">
                        <Pagination :links="users.links" />
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script setup>
import editicon from '@/Components/EditIcon.vue'
import Pagination from '@/Components/Pagination.vue'
import SortIcon from '@/Components/SortIcon.vue'
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
import { Link, router, usePage } from '@inertiajs/vue3'
import Alpine from 'alpinejs'
import { Dropdown } from 'flowbite-vue'
import moment from "moment"
import "moment-timezone"
import { computed, reactive, ref, watch } from 'vue'

Alpine.start()


const formatDate = (date) => {
    return moment(date, 'MM-DD-YYYY').format('DD-MM-YYYY');
};


const props = defineProps({
    users: {
        type: Object,
        default: () => ({}),
        computed: {
            date() {
                const date = new Date(users.created_at)
                return date
            }
        }
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
})

const page = usePage()

const flashSuccess = computed(
    () => page.props.flash.success,
)

const flashError = computed(
    () => page.props.flash.error,
)

let search = ref(props.filters.search)
let sortColumn = ref('id')
let sortDirection = ref('asc')
let searchUserType = ref('')


const filter = reactive({
    all: true,
    patient: false,
    dentist: false,
    employee: false,
    assistant: false,
})

let timeoutId = null

const fetchData = () => {
    router.get(
        "/admin/users",
        {
            search: search.value,
            sort: sortColumn.value,
            direction: sortDirection.value,
            user_type: searchUserType.value,
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
    sortColumn.value = 'id'
    sortDirection.value = 'asc'
}


const toggleSorting = (column) => {
    if (column === sortColumn.value) {
        sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc'
    } else {
        sortColumn.value = column
        sortDirection.value = 'asc'
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

const filterByUserType = (user_type) => {
    uncheckAllIfOtherChecked(user_type);
    searchUserType.value = filter[user_type] ? user_type : ''
    search.value = ''
    debouncedFetchData()
}

const uncheckAllIfOtherChecked = (checkedKey) => {
    for (const key in filter) {
        if (key !== checkedKey) {
            filter[key] = false;
        }
    }
}
</script>
