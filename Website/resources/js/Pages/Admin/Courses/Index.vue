<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="flex flex-col ml-2">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Courses</h1>
                <h6 class="h-1 text-xs text-gray-400">
                    <a href="/admin">Home</a> > Courses
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
                                <input id="search" type="text" name="search" v-model="search"
                                    class="w-full h-10 pl-10 pr-4 text-sm placeholder-gray-500 border border-gray-300 rounded-lg sm:text-base focus:outline-none focus:border-indigo-400 bg-gray-50"
                                    placeholder="Search..." />
                            </div>
                            <!--filter
                            <div>
                                <dropdown placement="bottom" text="Filter">
                                    <ul class="bg-gray-200 rounded shadow-lg">

                                    </ul>
                                </dropdown>
                            </div>-->
                        </div>

                        <!-- Modal button-->
                        <div class="">
                            <button @click="showModal" type="button"
                                class="px-5 py-3 text-sm font-medium text-center text-white bg-green-500 rounded-lg max-sm:w-full hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Add New Course
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
                                        <th class="p-3 px-6 text-left">#</th>
                                        <th class="p-3 text-left">
                                            COURSES
                                        </th>
                                        <th class="p-3 text-left">
                                            SCHOOL
                                        </th>
                                        <th class="p-3 text-left max-sm:hidden">
                                            DATE CREATED
                                        </th>
                                        <th class="p-3 text-left max-sm:hidden">
                                            ACTIONS
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="flex-1 sm:flex-none">
                                    <tr class="flex flex-col mb-2 flex-no wrap sm:table-row sm:mb-0 max-sm:border max-sm:roun hover:bg-gray-100"
                                        v-for="(course, index) in courses.data" :key="course.id">
                                        <td
                                            class="p-3 px-6 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                                            <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                {{ (page - 1) * perPage + index + 1 }}
                                            </p>
                                        </td>
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                                            <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                {{ course.course }}
                                            </p>
                                        </td>
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                                            <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                {{ course.school.school }}
                                            </p>
                                        </td>
                                        <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                                            <p class="mr-2 text-base font-medium leading-none text-gray-700">
                                                {{ formatDate(new Date(course.created_at).toLocaleDateString()) }}
                                            </p>
                                        </td>
                                        <td class="w-2 p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                                            <div class="flex flex-row gap-2">
                                                <button @click="showEdit(course)" type="button"
                                                    class="px-4 py-2 text-gray-100 bg-blue-500 rounded-lg max-sm:w-full hover:bg-blue-700 hover:text-white">
                                                    Edit
                                                </button>
                                                <button @click="showDelete(course)" type="button"
                                                    class="p-2 text-gray-100 bg-red-500 rounded-lg max-sm:w-full hover:bg-red-700 hover:text-white ">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div v-if="courses.data.length" class="flex justify-center w-full mb-5">
                    <Pagination :links="courses.links" />
                </div>

                <Create v-if="isShowModal" :schools="schools" @closeModal="closeModal" />
                <Edit v-if="isShowEdit" :schools="schools" :course="selectedCourse" @closeEdit="closeEdit" />
                <Delete v-if="isShowDelete" :course="selectedCourse" @closeDelete="closeDelete" />
                <Modal v-if="flashSuccess && isShowFlash" persistent size="lg">
                    <template #body>
                        <div class="flex flex-col items-center gap-6 px-4 text-lg font-semibold">
                            <Success class="w-20 h-20"></Success>
                            <h1 class="text-xl text-center text-green-500 capitalize">
                                {{ flashSuccess }}
                            </h1>
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
            </div>
        </template>
    </MainLayout>
</template>

<script setup>
import Error from "@/Components/Error.vue";
import Pagination from "@/Components/Pagination.vue";
import Success from "@/Components/Success.vue";
import Create from "@/Pages/Admin/Courses/Create.vue";
import Delete from "@/Pages/Admin/Courses/Delete.vue";
import Edit from "@/Pages/Admin/Courses/Edit.vue";
import MainLayout from '@/Pages/Layouts/MainLayout.vue';
import { router, usePage } from "@inertiajs/vue3";
import { Button, Modal } from 'flowbite-vue';
import moment from "moment";
import "moment-timezone";
import { computed, ref, watch } from 'vue';

const formatDate = (date) => {
    return moment(date, 'MM-DD-YYYY').format('DD-MM-YYYY');
};

const props = defineProps({
    courses: {
        type: Object,
        default: () => ({}),
    },
    schools: {
        type: Array,
        default: () => ({}),
    },
    page: {
        type: Number,
        default: 1,
    },
    perPage: {
        type: Number,
        default: 10,
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
})

const isShowFlash = ref(false)

function closeFlash() {
    isShowFlash.value = false
}

function showFlash() {
    isShowFlash.value = true
}

const uPage = usePage()

const flashSuccess = computed(
    () => uPage.props.flash.success,
    isShowFlash.value = true
)

const flashError = computed(
    () => uPage.props.flash.error,
    isShowFlash.value = true
)

const isShowModal = ref(false)

function closeModal() {
    if (isShowModal.value) {
        isShowModal.value = false
    }
}

function showModal() {
    if (!isShowModal.value) {
        isShowModal.value = true
    }
}

const isShowEdit = ref(false)

let selectedCourse = ref(null)

function closeEdit() {
    if (isShowEdit.value) {
        selectedCourse.value = null
        isShowEdit.value = false
    }
}

function showEdit(department) {
    if (!isShowEdit.value) {
        selectedCourse.value = department
        isShowEdit.value = true
    }
}

const isShowDelete = ref(false)

function closeDelete() {
    if (isShowDelete.value) {
        selectedCourse.value = null
        isShowDelete.value = false
    }
}

function showDelete(department) {
    if (!isShowDelete.value) {
        selectedCourse.value = department
        isShowDelete.value = true
    }
}

const fetchData = () => {
    localStorage.setItem('search', search.value);
    router.get(
        "/admin/courses",
        {
            search: search.value,
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
    sortColumn.value = 'id';
    sortDirection.value = 'asc';
}

let search = ref(props.filters.search);
let sortColumn = ref('id');
let sortDirection = ref('asc');
let timeoutId = null;

watch(search, () => {
    if (!search.value) {
        resetSorting();
    }
    debouncedFetchData();
})

</script>