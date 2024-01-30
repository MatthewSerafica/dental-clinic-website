<template>
  <MainLayout>
    <template v-slot:mainContent>
      <div class="flex flex-col ml-2">
        <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Appointments</h1>
        <h6 class="h-1 text-xs text-gray-400">
          <a href="/">Home</a> > Appointments
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
                    <th class="p-3 text-left max-md:hidden">DATE</th>
                    <th class="p-3 text-left md:hidden">APPOINTMENTS</th>
                    <th class="p-3 text-left max-md:hidden">
                      TIME
                    </th>
                    <th class="p-3 text-left max-md:hidden">NAME</th>
                    <th class="p-3 text-left max-md:hidden">
                      TYPE
                    </th>
                    <th class="p-3 text-left max-md:hidden">NOTES</th>
                    <th class="p-3 text-left max-md:hidden">STATUS</th>
                    <th class="p-3 text-left max-md:hidden max-xl:hidden">ACTIONS</th>
                  </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                  <tr
                    class="flex flex-col mb-2 flex-no wrap md:table-row max-md:mb-0 max-md:border hover:bg-gray-100 border-grey-light sm:border-b"
                    v-for="appointment in appointments.data" :key="appointment.app_id">
                    <div class="lg:hidden">
                      <td class="p-3 border-grey-light hover:bg-gray-100 ">
                        <Link :href="`/assistant/appointment/${appointment.app_id}`">
                        <div class="flex flex-col">
                          <p class="mr-2 text-base font-medium leading-none text-gray-700">
                            {{ formatDate(appointment.app_date) }} at {{ formatTime(appointment.app_time) }}
                          </p>
                        </div>
                        </Link>
                      </td>
                    </div>
                    <td class="p-3 border-grey-light hover:bg-gray-100 max-md:hidden">
                      <Link :href="`/assistant/appointment/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">
                          {{ formatDate(appointment.app_date) }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 hover:bg-gray-100 max-md:hidden">
                      <Link :href="`/assistant/appointment/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">
                          {{ formatTime(appointment.app_time) }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 hover:bg-gray-100 ">
                      <Link :href="`/assistant/appointment/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">
                          {{ appointment.user.name }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 hover:bg-gray-100">
                      <Link :href="`/assistant/appointment/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-normal leading-none text-gray-700 lg:hidden">Appointment Type:</p>
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">

                          {{ appointment.app_type }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 hover:bg-gray-100 max-md:hidden">
                      <Link :href="`/assistant/appointment/${appointment.app_id}`">
                      <div class="flex flex-col">
                        <p class="mr-2 text-base font-medium leading-none text-gray-700">
                          {{ appointment.pat_notes }}
                        </p>
                      </div>
                      </Link>
                    </td>
                    <td class="p-3 hover:bg-gray-100">
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
                    </td>
                    <td class="p-2.5 hover:bg-gray-100 xl:absolute">
                      <Button color="default" type="button" v-if="appointment.status === 'ongoing'"
                        @click="markAsCompleted(appointment)">
                        Completed
                      </Button>
                      <dropdown
                        v-if="appointment.status !== 'completed' && appointment.status !== 'cancelled' && appointment.status !== 'ongoing'"
                        placement="bottom" text="Select">
                        <ul class="bg-gray-200 rounded-lg shadow-lg">
                          <li class="hover-bg-gray-300" v-if="appointment.status !== 'approved'">
                            <label>
                              <button type="button" @click="markAsApproved(appointment)"
                                class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Approve
                              </button>
                            </label>
                          </li>

                          <li v-if="appointment.status !== 'approved' && appointment.status !== 'pending'">
                            <label>
                              <button
                                class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                type="button" @click="markAsPending(appointment)">
                                Pending
                              </button>
                            </label>
                          </li>

                          <li v-if="appointment.status !== 'pending'">
                            <label>
                              <button
                                class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                type="button" @click="markAsOngoing(appointment)">
                                Ongoing
                              </button>
                            </label>
                          </li>

                          <li v-if="appointment.status !== 'pending'">
                            <label>
                              <button
                                class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                type="button" @click="markAsCompleted(appointment)">
                                Completed
                              </button>
                            </label>
                          </li>

                          <li>
                            <label>
                              <button class="block w-full px-4 py-2 bg-red-400 rounded-b hover:bg-red-500" type="button"
                                @click="showCancel(appointment)">
                                Cancel
                              </button>
                            </label>
                          </li>
                        </ul>
                      </dropdown>
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
      <Create :dentists="dentists" :services="services" v-if="isShowModal" @close="closeModal"></Create>
      <Cancel v-if="isShowCancel" :appointment="selectedAppointment" @closeCancel="closeCancel"></Cancel>
    </template>
  </MainLayout>
</template>

<script setup>
import Cancel from '@/Pages/Assistant/Appointment/Cancel.vue'
import AddApointment from "@/Components/AddApointment.vue";
import Pagination from "@/Components/Pagination.vue"
import Success from "@/Components/Success.vue"
import Error from "@/Components/Error.vue"
import Create from "@/Pages/Assistant/Appointment/Create.vue";
import MainLayout from "@/Pages/Layouts/MainLayout.vue";
import { Link, useForm, usePage, router } from "@inertiajs/vue3";
import { Dropdown, Modal, Button } from "flowbite-vue";
import moment from "moment";
import "moment-timezone";
import { computed, ref, reactive } from "vue";


const isShowModal = ref(false);

const page = usePage();

function closeModal() {
  isShowModal.value = false;
}
function showModal() {
  isShowModal.value = true;
}

function formatTime(time) {
  return moment(time, "HH:mm").format("hh:mm A");
}

const formatDate = (date) => {
  return moment(date, 'YYYY-MM-DD').format('MMMM D, YYYY');
};

const props = defineProps({
  appointments: {
    type: Array,
  },
  dentists: {
    type: Array,
  },
});

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

const pending = useForm({
  status: "pending",
  reason: "pending",
  made_appointment: 1,
});

const approve = useForm({
  status: "approved",
  reason: "approved",
  made_appointment: 1,
});

const ongoing = useForm({
  status: "ongoing",
  reason: "ongoing",
  made_appointment: 1,
});

const complete = useForm({
  status: "completed",
  reason: "completed",
  made_appointment: 0,
});

function markAsPending(appointment) {
  pending.put(route("assistant.appointment.update", appointment.app_id));
}
function markAsApproved(appointment) {
  approve.put(route("assistant.appointment.update", appointment.app_id));
}
function markAsOngoing(appointment) {
  ongoing.put(route("assistant.appointment.update", appointment.app_id));
}
function markAsCompleted(appointment) {
  complete.put(route("assistant.appointment.update", appointment.app_id));
}

let selectedAppointment = ref(null)

const isShowCancel = ref(false)

function closeCancel() {
  if (isShowCancel.value) {
    selectedAppointment.value = null
    isShowCancel.value = false
  }
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
    "/assistant/appointment",
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
