<template>
  <header
    class="relative flex flex-wrap items-center justify-between px-4 py-4 transition-all bg-white shadow duration-250 ease-soft-in lg:flex-nowrap lg:justify-start">
    <div class="flex items-center w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <!-- Hamburger Menu -->
      <div class="text-sm transition-all ease-nav-brand text-slate-500 md:hidden lg:hidden xl:hidden" @click="isToggled"
        :class="{ 'ml-14': toggled }">
        <div class="w-4.5 overflow-hidden">
          <svg class="w-10 h-10 ease-soft mb-0.75" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black">
            <path fill-rule="evenodd"
              d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
              clip-rule="evenodd" />
          </svg>
        </div>
      </div>
      <!-- Right Side Menu -->
      <div class="flex items-center justify-end mt-2 grow sm:mt-2 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
        <ul class="flex pl-0 mb-0 list-none md-max:w-full">
          <li class="relative flex items-center pr-2 transition-all rounded-lg lex shrink-0 ease-nav-brand">
            <Menu as="div" class="relative ml-3">
              <div>
                <MenuButton v-if="page.props.user.user_type === 'student' || page.props.user.user_type === 'employee'"
                  class="relative flex text-sm rounded-full" @click="fetchNotifications">
                  <span class="absolute -inset-1.5" />
                  <span class="sr-only">View notifications</span>
                  <div class="relative">
                    <svg class="" width="25" height="25" viewBox="0 0 25 24" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_113_1473)">
                        <path d="M12.5 2.75V4.75" stroke="#121331" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                        <path
                          d="M17.96 13.67L19.75 17.25H5.25L7.04 13.67C7.18 13.39 7.25 13.09 7.25 12.78V10C7.25 7.1 9.6 4.75 12.5 4.75C15.4 4.75 17.75 7.1 17.75 10V12.78C17.75 13.09 17.82 13.4 17.96 13.67Z"
                          stroke="#121331" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                          d="M14.75 17.25V19C14.75 20.24 13.74 21.25 12.5 21.25C11.26 21.25 10.25 20.24 10.25 19V17.25"
                          stroke="#121331" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </g>
                      <defs>
                        <clipPath id="clip0_113_1473">
                          <rect width="24" height="24" fill="white" transform="translate(0.5)" />
                        </clipPath>
                      </defs>
                    </svg>
                    <div v-if="notificationCount"
                      class="absolute w-5 h-5 text-xs font-medium text-center text-white bg-red-700 border border-red-700 rounded-full bottom-4 left-3">
                      {{ notificationCount }}
                    </div>
                  </div>
                </MenuButton>
                <MenuButton v-else-if="page.props.user.user_type === 'dentist'" class="relative flex text-sm rounded-full"
                  @click="fetchDentistNotifications">
                  <span class="absolute -inset-1.5" />
                  <span class="sr-only">View notifications</span>
                  <div class="relative">
                    <svg class="" width="25" height="25" viewBox="0 0 25 24" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_113_1473)">
                        <path d="M12.5 2.75V4.75" stroke="#121331" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                        <path
                          d="M17.96 13.67L19.75 17.25H5.25L7.04 13.67C7.18 13.39 7.25 13.09 7.25 12.78V10C7.25 7.1 9.6 4.75 12.5 4.75C15.4 4.75 17.75 7.1 17.75 10V12.78C17.75 13.09 17.82 13.4 17.96 13.67Z"
                          stroke="#121331" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                          d="M14.75 17.25V19C14.75 20.24 13.74 21.25 12.5 21.25C11.26 21.25 10.25 20.24 10.25 19V17.25"
                          stroke="#121331" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </g>
                      <defs>
                        <clipPath id="clip0_113_1473">
                          <rect width="24" height="24" fill="white" transform="translate(0.5)" />
                        </clipPath>
                      </defs>
                    </svg>
                    <div v-if="notificationCount"
                      class="absolute w-5 h-5 text-xs font-medium text-center text-white bg-red-700 border border-red-700 rounded-full bottom-4 left-3">
                      {{ notificationCount }}
                    </div>
                  </div>
                </MenuButton>
                <MenuButton v-else-if="page.props.user.user_type === 'assistant'"
                  class="relative flex text-sm rounded-full" @click="fetchAssistantNotifications">
                  <span class="absolute -inset-1.5" />
                  <span class="sr-only">View notifications</span>
                  <div class="relative">
                    <svg class="" width="25" height="25" viewBox="0 0 25 24" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_113_1473)">
                        <path d="M12.5 2.75V4.75" stroke="#121331" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                        <path
                          d="M17.96 13.67L19.75 17.25H5.25L7.04 13.67C7.18 13.39 7.25 13.09 7.25 12.78V10C7.25 7.1 9.6 4.75 12.5 4.75C15.4 4.75 17.75 7.1 17.75 10V12.78C17.75 13.09 17.82 13.4 17.96 13.67Z"
                          stroke="#121331" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                          d="M14.75 17.25V19C14.75 20.24 13.74 21.25 12.5 21.25C11.26 21.25 10.25 20.24 10.25 19V17.25"
                          stroke="#121331" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </g>
                      <defs>
                        <clipPath id="clip0_113_1473">
                          <rect width="24" height="24" fill="white" transform="translate(0.5)" />
                        </clipPath>
                      </defs>
                    </svg>
                    <div v-if="notificationCount"
                      class="absolute w-5 h-5 text-xs font-medium text-center text-white bg-red-700 border border-red-700 rounded-full bottom-4 left-3">
                      {{ notificationCount }}
                    </div>
                  </div>
                </MenuButton>
              </div>
              <transition enter-active-class="transition duration-100 ease-out"
                enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0">
                <MenuItems
                  class="absolute right-0 z-10 py-1 mt-2 overflow-y-auto origin-top-right bg-white rounded-md shadow-lg w-80 ring-1 ring-black ring-opacity-5 focus:outline-none max-h-60">
                  <MenuItem v-if="page.props.user.user_type === 'student' || page.props.user.user_type === 'employee'"
                    v-slot="{ active }" v-for="notification in notifications.slice(0, 9)" :key="notification.id">
                  <a :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                    <span v-if="notification.type === 'App\\Notifications\\AppointmentBooked'">
                      <Link :href="`/patient/appointments/${notification.data.app_id}`">
                      <p>
                        You have been booked for {{ notification.data.app_type }}
                        on {{ formatDate(notification.data.app_date) }}
                        {{ formatTime(notification.data.app_time) }}
                      </p>
                      <p class="text-xs text-gray-400">
                        {{ formatDateTime(notification.created_at) }}
                      </p>
                      </Link>
                    </span>
                    <span v-if="notification.type === 'App\\Notifications\\AppointmentUpdatedStatus'">
                      <Link :href="`/patient/appointments/${notification.data.app_id}`">
                      <p v-if="notification.data.status === 'cancelled'">
                        Your appointment for {{ notification.data.app_type }}
                        on {{ formatDate(notification.data.app_date) }}
                        at {{ formatTime(notification.data.app_time) }}
                        is now {{ notification.data.status }} <br>
                        Reason: {{ notification.data.reason }}
                      </p>
                      <p v-else>
                        Your appointment for {{ notification.data.app_type }}
                        on {{ formatDate(notification.data.app_date) }}
                        at {{ formatTime(notification.data.app_time) }}
                        is now {{ notification.data.status }}
                      </p>
                      <p class="text-xs text-gray-400">
                        {{ formatDateTime(notification.created_at) }}
                      </p>
                      </Link>
                    </span>
                    <span v-if="notification.type === 'App\\Notifications\\AppointmentReminder'">
                      <Link :href="`/patient/appointments/${notification.data.app_id}`">
                      Reminder: You have an appointment tomorrow for {{ notification.data.app_type }}
                      at {{ formatTime(notification.data.app_time) }}. Please come early.
                      </Link>
                    </span>
                    <span v-if="notification.type === 'App\\Notifications\\AppointmentUpdated'">
                      <Link :href="`/patient/appointments/${notification.data.app_id}`">
                      Your appointment for {{ notification.data.app_type }} has been updated, it is now on {{
                        formatDate(notification.data.app_date) }} {{ formatTime(notification.data.app_time) }}.
                      <br>Please come to the clinic 15 mins before your appointment.
                      </Link>
                    </span>
                  </a>
                  </MenuItem>
                  <MenuItem v-else-if="page.props.user.user_type === 'dentist'" v-slot="{ active }"
                    v-for="notification in notifications.slice(0, 9)" :key="notification.notification.id">
                  <a :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                    <span v-if="notification.notification.type === 'App\\Notifications\\AppointmentBooked'">
                      <Link :href="`/appointment/${notification.notification.data.app_id}`">
                      {{ notification.user_name }} has booked for a {{
                        notification.notification.data.app_type }} with you
                      on {{ formatDate(notification.notification.data.app_date) }} {{
                        formatTime(notification.notification.data.app_time)
                      }}.<br> Their appointment is now {{ notification.notification.data.status }}.
                      </Link>
                    </span>
                    <span v-if="notification.notification.type === 'App\\Notifications\\AppointmentUpdatedStatus'">
                      <Link :href="`/appointment/${notification.notification.data.app_id}`">
                      {{ notification.user_name }} has {{ notification.notification.data.status }} their {{
                        notification.notification.data.app_type }} appointment with you
                      on {{ formatDate(notification.notification.data.app_date) }} {{
                        formatTime(notification.notification.data.app_time)
                      }}.
                      </Link>
                    </span>
                  </a>
                  </MenuItem>
                  <MenuItem v-else-if="page.props.user.user_type === 'assistant'" v-slot="{ active }"
                    v-for="assistnotif in notifications.slice(0, 9)" :key="assistnotif.notification.id">
                  <a :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                    <span v-if="assistnotif.notification.type === 'App\\Notifications\\AppointmentBooked'"
                      class="flex flex-col">
                      <Link :href="`/assistant/appointment/${assistnotif.notification.data.app_id}`">
                      <p>
                        {{ assistnotif.user_name }} has booked for a
                        {{ assistnotif.notification.data.app_type }}
                        on {{ formatDate(assistnotif.notification.data.app_date) }}
                        at {{ formatTime(assistnotif.notification.data.app_time) }}.
                        Their appointment is now {{ assistnotif.notification.data.status }}.
                      </p>
                      </Link>
                      <p class="text-xs text-gray-400">
                        {{ formatDateTime(assistnotif.notification.created_at) }}
                      </p>
                    </span>
                    <span v-if="assistnotif.notification.type === 'App\\Notifications\\AppointmentUpdatedStatus'"
                      class="flex flex-col">
                      <Link :href="`/assistant/appointment/${assistnotif.notification.data.app_id}`">
                      <p class="text-sm">
                        {{ assistnotif.user_name }} has {{ assistnotif.notification.data.status }} their
                        {{ assistnotif.notification.data.app_type }} appointment
                        on {{ formatDate(assistnotif.notification.data.app_date) }}
                        at {{ formatTime(assistnotif.notification.data.app_time) }}.
                      </p>
                      <p class="text-xs text-gray-400">
                        {{ formatDateTime(assistnotif.notification.created_at) }}
                      </p>
                      </Link>
                    </span>
                  </a>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>

          </li>

          <li class="relative flex items-center pr-2 transition-all rounded-lg lex shrink-0 ease-nav-brand">
            <!-- Profile dropdown -->
            <Menu as="div" class="relative ml-3 ">
              <div class="">
                <MenuButton class="relative flex text-sm rounded-full">
                  <span class="absolute -inset-1.5" />
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full"
                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="" />
                  <p class="hidden text-xs text-left ms-2 md:block">
                    <strong class="block font-medium">{{ page.props.user.name }}</strong>
                    <span class="text-gray-500 capitalize">{{ page.props.user.user_type }}</span>
                  </p>
                  <svg xmlns="http://www.w3.org/2000/svg"
                    class="hidden w-5 h-5 text-gray-500 transition ms-4 group-hover:text-gray-700 md:block"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </MenuButton>
              </div>
              <transition enter-active-class="transition duration-100 ease-out"
                enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0">
                <MenuItems
                  class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <MenuItem v-slot="{ active }">
                  <a :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                    <Link :href="route('logout')" method="delete" as="button" v-if="page.props.user"
                      class="flex items-center w-full"> Sign Out
                    </Link>
                  </a>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>
          </li>
        </ul>
      </div>
    </div>
  </header>
</template>


<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Link, usePage } from '@inertiajs/vue3'
import axios from 'axios'
import { computed, ref, } from 'vue'


const toggled = ref(false);
const emit = defineEmits()

function isToggled() {
  toggled.value = !toggled.value;
  emit('isClicked', toggled.value)
}

const page = usePage()
const notifications = ref([])

const notificationCount = computed(
  () => Math.min(page.props.user.notificationCount, 9),
)

const fetchNotifications = async () => {
  try {
    const response = await axios.get(route('patient.notifications'))
    notifications.value = response.data.notifications

    await axios.post(route('patient.notifications.seen'))
    page.props.user.notificationCount = 0;
  } catch (err) {
    console.error(err)
  }
}

const fetchDentistNotifications = async () => {
  try {
    const response = await axios.get(route('notifications'))
    notifications.value = response.data.notifications

    await axios.post(route('notifications.seen'))
    page.props.user.notificationCount = 0;
  } catch (err) {
    console.error(err)
  }
}

const fetchAssistantNotifications = async () => {
  try {
    const response = await axios.get(route('assistant.notifications'))
    notifications.value = response.data.notifications

    await axios.post(route('assistant.notifications.seen'))
    page.props.user.notificationCount = 0;
  } catch (err) {
    console.error(err)
  }
}



const formatDate = (date) => {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  const formattedDate = new Date(date).toLocaleDateString(undefined, options);
  return formattedDate;
}

const formatTime = (time) => {
  const [hours, minutes] = time.split(':');
  const period = hours >= 12 ? 'PM' : 'AM';
  const formattedHours = hours % 12 || 12;
  const formattedTime = `${formattedHours}:${minutes} ${period}`;
  return formattedTime;
}

const formatDateTime = (datetime) => {
  const date = new Date(datetime);
  const formattedDate = formatDate(date);
  const formattedTime = formatTime(date.toTimeString().split(' ')[0]);
  return `${formattedDate} | ${formattedTime}`;
}


</script>
