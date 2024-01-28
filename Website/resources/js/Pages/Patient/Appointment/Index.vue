<template>
  <MainLayout>
    <template v-slot:mainContent>
      <div class="flex flex-col ml-2">
        <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Appointments</h1>
        <h6 class="h-1 text-xs text-gray-400">
          <a href="/patient">Home</a> > Appointments
        </h6>
      </div>
      <div class="flex flex-col flex-grow mt-8 bg-white rounded-xl">
        <!-- Insert Button and Filters -->
        <div class="flex flex-row justify-between mt-10 mb-2 ml-10 mr-10 max-md:flex-col">
          <!-- Use a container for buttons and link -->
          <div class="flex items-center w-full gap-3 left-2">
            <button @click="
              filterAppointments('all')
              "
              class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
              All
            </button>
            <button @click="
              filterAppointments(
                'upcoming'
              )
              "
              class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
              Upcoming
            </button>
            <button @click="
              filterAppointments('past')
              "
              class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
              Past
            </button>
          </div>
          <div class="max-md:mt-2">
            <div>
              <button @click="showModal" type="button"
                class="flex items-center gap-3 px-5 py-2 font-medium text-white bg-green-500 rounded hover:bg-green-700">
                <AddApointment></AddApointment>
                Book&nbsp;Appointment
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
                    class="flex flex-col mb-0 bg-gray-100 rounded-l-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0">
                    <th class="p-3 text-left max-md:hidden">STATUS</th>
                    <th class="p-3 text-left max-md:hidden">DATE</th>
                    <th class="p-3 text-left max-md:hidden">TIME</th>
                    <th class="p-3 text-left max-md:hidden">TYPE</th>
                    <th class="p-3 text-left max-md:hidden">NOTES</th>
                    <th class="p-3 text-left max-md:hidden">ACTION</th>
                    <th class="p-3 text-left md:hidden">APPOINTMENTS</th>
                  </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                  <tr
                    class="flex flex-col mb-2 flex-no wrap md:table-row max-md:mb-0 max-md:border hover:bg-gray-100 border-grey-light sm:border-b"
                    v-for="appointment in appointments.data" :key="appointment.app_id">
                    <td class="p-3 hover:bg-gray-100">
                      <Link :href="`/patient/appointments/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <div v-if="appointment.status === 'cancelled'"
                          class="w-24 py-1 text-center text-red-500 bg-red-200 rounded-full">
                          Cancelled
                        </div>
                        <div v-if="appointment.status === 'approved'"
                          class="w-24 py-1 text-center text-blue-500 bg-blue-200 rounded-full">
                          Approved
                        </div>
                        <div v-if="appointment.status ===
                          'pending'
                          " class="w-24 py-1 text-center text-orange-400 bg-orange-200 rounded-full">
                          Pending
                        </div>
                        <div v-if="appointment.status === 'completed'"
                          class="w-24 py-1 text-center text-green-500 bg-green-200 rounded-full">
                          Completed
                        </div>
                        <div v-if="appointment.status === 'ongoing'"
                          class="w-24 py-1 text-center text-yellow-400 bg-yellow-100 rounded-full">
                          Ongoing
                        </div>
                      </div>
                      </Link>
                    </td>
                    <div class="lg:hidden">
                      <td class="p-3 border-grey-light hover:bg-gray-100 ">
                        <Link :href="`/patient/appointments/${appointment.app_id}`">
                        <div class="flex flex-col">
                          <p class="mr-2 text-base font-medium leading-none text-gray-700">
                            {{ formatDate(appointment.app_date) }} at {{ formatTime(appointment.app_time) }}
                          </p>
                        </div>
                        </Link>
                      </td>
                    </div>
                    <td class="p-3 border-grey-light hover:bg-gray-100 max-md:hidden">
                      <Link :href="`/patient/appointments/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">
                          {{ formatDate(appointment.app_date) }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 hover:bg-gray-100 max-md:hidden">
                      <Link :href="`/patient/appointments/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">
                          {{ formatTime(appointment.app_time) }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 hover:bg-gray-100">
                      <Link :href="`/patient/appointments/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-normal leading-none text-gray-700 lg:hidden">Appointment Type:</p>
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">

                          {{ appointment.app_type }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 hover:bg-gray-100 max-md:hidden">
                      <Link :href="`/patient/appointments/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">
                          {{ appointment.pat_notes }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100">
                      <button type="button" @click.prevent="showCancel(appointment)"
                        v-if="appointment.status === 'approved' || appointment.status === 'pending'"
                        class="flex items-center space-x-1 text-[#f24a4a] text-sm w-24 py-2 bg-red-200 hover:bg-red-300 rounded-xl">
                        <Cancel class="px-1 ml-2"></Cancel><span>Cancel</span>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div v-if="appointments.data.length" class="flex justify-center w-full mt-6">
            <Pagination :links="appointments.links" />
          </div>
        </div>
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
      <Create :dentists="dentists" :user="nuser" :services="services" v-if="isShowModal" @close="closeModal"></Create>
      <CancelModal v-if="isShowCancel" :appointment="selectedAppointment" @closeCancel="closeCancel"></CancelModal>
    </template>
  </MainLayout>
  <!--   <MainLayout>
    <template v-slot:mainContent>
      <div class="flex flex-col ml-2 max-sm:px-5">
        <h1 class="w-20 h-8 text-2xl font-bold text-gray-700 max-sm:ml-4">Appointments</h1>
        <h6 class="h-1 text-xs text-gray-400 max-sm:ml-4">
          <a href="/patient">Home</a> > Appointments
        </h6>
      </div>

      <div class="flex flex-col flex-grow mt-8 bg-white max-sm:ml-9 rounded-xl">
        <div class="grid mt-10 mb-2 ml-10 mr-10">
          <div class="flex justify-between w-full py-1 mx-auto sm:items-center max-sm:flex-col max-sm:gap-4 ">
            <div class="flex flex-row items-center gap-4">
            
              <div>
                <div class="relative top-0 flex flex-row justify-between w-full">
               
                  <div class="flex items-center justify-between gap-3 left-2">
                    <button @click="filterAppointments('all')"
                      class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                      All
                    </button>
                    <button @click="
                      filterAppointments(
                        'upcoming'
                      )
                      "
                      class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                      Upcoming
                    </button>
                    <button @click="
                      filterAppointments('past')
                      "
                      class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                      Past
                    </button>
                  </div>

                </div>
              </div>
            </div>
            <div class="">
              <div>
                <button @click="showModal" type="button"
                  class="flex items-center gap-3 px-5 py-2 font-medium text-white bg-green-500 rounded hover:bg-green-700">
                  Book Appointment
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
                      <th class="p-3 text-left">STATUS</th>
                      <th class="p-3 text-left">DATE</th>
                      <th class="p-3 text-left">TIME</th>
                      <th class="p-3 text-left">TYPE</th>
                      <th class="p-3 text-left">NOTES</th>
                      <th class=""></th>
                    </tr>
                  </thead>
                  <tbody class="flex-1 sm:flex-none">
                    <tr
                      class="flex flex-col mb-2 flex-no wrap sm:table-row sm:mb-0 max-sm:border max-sm:roun hover:bg-gray-100"
                      v-for="appointment in appointments.data" :key="appointment.app_id">
                      <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                        <div v-if="appointment.status === 'cancelled'"
                          class="w-24 py-1 text-center text-red-500 bg-red-200 rounded-full">Cancelled</div>
                        <div v-if="appointment.status === 'approved'"
                          class="w-24 py-1 text-center text-blue-500 bg-blue-200 rounded-full">Approved</div>
                        <div v-if="appointment.status === 'pending'"
                          class="w-24 py-1 text-center text-orange-400 bg-orange-200 rounded-full">Pending</div>
                        <div v-if="appointment.status === 'completed'"
                          class="w-24 py-1 text-center text-green-500 bg-green-200 rounded-full">Completed</div>
                        <div v-if="appointment.status === 'ongoing'"
                          class="w-24 py-1 text-center text-yellow-400 bg-yellow-100 rounded-full">Ongoing</div>
                      </td>
                      <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                        <div class="flex flex-col">
                          <p class="mr-2 text-base font-medium leading-none text-gray-700">
                            {{
                              formatDate(
                                appointment.app_date
                              )
                            }}
                          </p>
                        </div>
                      </td>
                      <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                        <div class="flex flex-col">
                          <p class="mr-2 text-base font-medium leading-none text-gray-700">
                            {{
                              formatHour(
                                appointment.app_time
                              )
                            }}
                          </p>
                        </div>
                      </td>
                      <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                        <div class="flex flex-col">
                          <p class="mr-2 text-base font-medium leading-none text-gray-700">
                            {{ appointment.app_type }}
                          </p>
                        </div>
                      </td>
                      <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                        <div class="flex flex-col">
                          <p class="mr-2 text-base font-medium leading-none text-gray-700">
                            {{ appointment.pat_notes }}
                          </p>
                        </div>
                      </td>
                      <td class="p-3 border-grey-light sm:border-b hover:bg-gray-100 max-sm:hidden">
                        <button type="button" @click.prevent="showCancel(appointment)"
                          v-if="appointment.status === 'approved' || appointment.status === 'pending'"
                          class="flex items-center space-x-1 text-[#f24a4a] text-sm w-24 py-2 bg-red-200 hover:bg-red-300 rounded-xl">
                          <Cancel class="px-1 ml-2"></Cancel><span>Cancel</span>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
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
          <div v-if="appointments.data.length" class="flex justify-center w-full mt-6">
            <Pagination :links="appointments.links" />
          </div>
        </div>
       
        <Create :dentists="dentists" :user="nuser" :services="services" v-if="isShowModal" @close="closeModal"></Create>
        <CancelModal v-if="isShowCancel" :appointment="selectedAppointment" @closeCancel="closeCancel"></CancelModal>
      </div>
    </template>
  </MainLayout> -->
</template>

<script setup>
import Cancel from '@/Components/Cancel.vue'
import Error from "@/Components/Error.vue"
import Pagination from "@/Components/Pagination.vue"
import Success from "@/Components/Success.vue"
import MainLayout from "@/Pages/Layouts/MainLayout.vue"
import CancelModal from '@/Pages/Patient/Appointment/Cancel.vue'
import Create from '@/Pages/Patient/Appointment/Create.vue'
import { Link, router, usePage } from "@inertiajs/vue3"
import { Button, Modal } from 'flowbite-vue'
import moment from 'moment'
import 'moment-timezone'
import { computed, reactive, ref } from 'vue'


const props = defineProps({
  dentists: {
    type: Array,
  },
  nuser: {
    type: Object,
  },
  appointments: {
    type: Array
  },
  services: {
    type: Object,
    default: () => ({}),
  }
})

const page = usePage();

const isShowFlash = ref(false);

function closeFlash() {
  isShowFlash.value = false;
}

function showFlash() {
  isShowFlash.value = true;
}

const flashSuccess = computed(
  () => page.props.flash.success,
  (isShowFlash.value = true)
);

const flashMessage = computed(() => page.props.flash.message);

const flashError = computed(
  () => page.props.flash.error,
  (isShowFlash.value = true)
);

function formatHour(time) {
  return moment(time, 'HH:mm').format('hh:mm A')
}

const formatDate = (date) => {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  const formattedDate = new Date(date).toLocaleDateString(undefined, options);
  return formattedDate;
}

const isShowModal = ref(false)

function closeModal() {
  isShowModal.value = false
}
function showModal() {
  isShowModal.value = true
  console.log(isShowModal.value)
}


let selectedAppointment = ref(null)

const isShowCancel = ref(false)

function closeCancel() {
  if (isShowCancel.value) {
    selectedAppointment.value = null
    isShowCancel.value = false
  }
}

function formatTime(time) {
  return moment(time, "HH:mm").format("hh:mm A");
}

function showCancel(apppointment) {
  if (!isShowCancel.value) {
    selectedAppointment.value = apppointment
    isShowCancel.value = true
  }
}

const filter = reactive({
  upcoming: false,
  past: false,
  all: true,
});

let timeoutId = null;

const fetchData = () => {
  router.get(
    "/patient/appointments",
    {
      filterAppointments: filter.all
        ? "all"
        : filter.upcoming
          ? "upcoming"
          : filter.past
            ? "past"
            : "",
    },
    {
      preserveState: true,
      replace: true,
    }
  );
};

const debouncedFetchData = () => {
  if (timeoutId) {
    clearTimeout(timeoutId);
  }
  timeoutId = setTimeout(() => {
    fetchData();
  }, 500);
};

const filterAppointments = (status) => {
  if (status === "upcoming") {
    filter.upcoming = true;
    filter.past = false;
    filter.all = false;
  } else if (status === "past") {
    filter.past = true;
    filter.upcoming = false;
    filter.all = false;
  } else if (status === "all") {
    filter.all = true;
    filter.upcoming = false;
    filter.past = false;
  }
  debouncedFetchData();
};
</script>
  
  
  
  
  
  
