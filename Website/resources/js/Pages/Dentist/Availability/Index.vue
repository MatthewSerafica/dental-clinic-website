<template>
  <MainLayout>
    <template v-slot:mainContent>
      <div class="flex flex-col ml-2 max-sm:px-5">
        <h1 class="w-20 h-8 text-2xl font-bold text-gray-700 max-sm:ml-4">Availability</h1>
        <h6 class="h-1 text-xs text-gray-400 max-sm:ml-4">
          <a href="/">Home</a> > Availability
        </h6>
      </div>

      <div class="relative flex flex-col flex-grow mt-8 bg-white max-sm:ml-10 rounded-xl">
        <!--search bar-->
        <div class="grid mt-10 mb-2 ml-10 mr-10">
          <div class="flex justify-between w-full py-1 mx-auto sm:items-center max-sm:flex-col max-sm:gap-4 ">
            <div class="flex flex-row items-center gap-4">
              <div class="relative max-sm:w-full">
                <!-- Search Icon 
                              <div
                              
                                  class="absolute top-0 left-0 inline-flex items-center justify-center w-10 h-full text-gray-400">
                                  <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                      <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                  </svg>
                              </div>
                              -->

                <!-- Search 
                              <input id="search" type="text" name="search"
                                  class="w-full h-10 pl-10 pr-4 text-sm placeholder-gray-500 border border-gray-300 rounded-lg sm:text-base focus:outline-none focus:border-indigo-400 bg-gray-50"
                                  placeholder="Search..." />
                              -->
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
                Add New Availability
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
                      AVAILABLE DAYS
                    </th>
                    <th class="p-3 text-left">
                      START TIME
                    </th>
                    <th class="p-3 text-left">
                      END TIME
                    </th>
                    <th class="p-3 text-left max-sm:hidden">
                      DATE CREATED
                    </th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                  <tr
                    class="flex flex-col mb-2 flex-no wrap sm:table-row sm:mb-0 max-sm:border max-sm:roun hover:bg-gray-100"
                    v-for="(availability, index) in availability.data" :key="availability.availability_id">
                    <td class="p-3 px-6 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                      <p class="mr-2 text-base font-medium leading-none text-gray-700">
                        {{ (page - 1) * perPage + index + 1 }}
                      </p>
                    </td>
                    <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                      <p class="mr-2 text-base font-medium leading-none text-gray-700">
                        {{ availability.day }}
                      </p>
                    </td>
                    <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                      <p class="mr-2 text-base font-medium leading-none text-gray-700">
                        {{ availability.start_time }}
                      </p>
                    </td>
                    <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                      <p class="mr-2 text-base font-medium leading-none text-gray-700">
                        {{ availability.end_time }}
                      </p>
                    </td>
                    <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden w-52">
                      <p class="mr-2 text-base font-medium leading-none text-gray-700">
                        {{ formatDate(new Date(availability.created_at).toLocaleDateString()) }}
                      </p>
                    </td>
                    <td class="w-2 p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                      <div class="flex flex-row">
                        <button @click="showEdit(availability)" type="button"
                          class="p-2 text-gray-100 bg-yellow-500 rounded-lg max-sm:w-full hover:bg-yellow-700 hover:text-white ">
                          Edit
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div v-if="availability.data.length" class="flex justify-center w-full mt-6">
            <Pagination :links="availability.links" />
          </div>
        </div>
        <div class="flex justify-center w-full mt-6">
        </div>

        <Create v-if="isShowModal" @closeModal="closeModal" :dentist="dentist"/>
        <Edit v-if="isShowEdit" :availability="selectedDay" @closeEdit="closeEdit" :dentist="dentist"/>
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
import Create from "@/Pages/Dentist/Availability/Create.vue";
import Edit from "@/Pages/Dentist/Availability/Edit.vue";
import MainLayout from '@/Pages/Layouts/MainLayout.vue';
import { usePage } from "@inertiajs/vue3";
import { Button, Modal } from 'flowbite-vue';
import moment from "moment"
import "moment-timezone"
import { computed, ref } from 'vue';

const formatDate = (date) => {
  return moment(date, 'MM-DD-YYYY').format('DD-MM-YYYY');
};

const props = defineProps({
  dentist: Object,
  availability: {
    type: Object,
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
})

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

let selectedDay = ref(null)

const isShowEdit = ref(false)

function closeEdit() {
  if (isShowEdit.value) {
    selectedDay.value = null
    isShowEdit.value = false
  }
}

function showEdit(department) {
  if (!isShowEdit.value) {
    selectedDay.value = department
    isShowEdit.value = true
  }
}

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
</script>