<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="flex flex-col max-sm:px-5">
                <div class="relative pb-8 ml-2">
                    <h1 class="text-xl font-bold text-gray-800">Welcome, {{ page.props.user.name }}</h1>
                    <h2 class="text-lg text-gray-800">Have a nice day!</h2>
                </div>
                <div class="flex flex-col flex-grow gap-4 max-sm:ml-9 rounded-xl">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                        <div class="flex flex-col h-full gap-4 rounded-lg lg:col-span-2">
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                                <div class="flex flex-row items-center justify-between p-4 bg-purple-500 rounded-lg h-44">
                                    <div class="items-center">
                                        <div
                                            class="relative items-center w-16 h-16 text-center text-gray-100 bg-purple-400 rounded-full">
                                            <usersicon class="absolute scale-150 left-5 top-5"></usersicon>
                                        </div>
                                    </div>

                                    <div>
                                        <h5 class="text-3xl font-bold leading-none text-gray-200 dark:text-white">
                                            {{ totalPatients }}</h5>
                                        <p class="text-lg font-semibold text-gray-200 dark:text-gray-400">Total Patient
                                        </p>
                                        <div class="flex flex-row gap-8">
                                            <div>
                                                <h5
                                                    class="mt-1 text-xl font-semibold leading-none text-gray-200 dark:text-white">
                                                    {{ totalStudents }}
                                                </h5>
                                                <p class="text-sm font-semibold text-gray-200 dark:text-gray-400">Students
                                                </p>
                                            </div>
                                            <div>
                                                <h5
                                                    class="mt-1 text-xl font-semibold leading-none text-gray-200 dark:text-white">
                                                    {{ totalEmployees }}
                                                </h5>
                                                <p class="text-sm font-semibold text-gray-200 dark:text-gray-400"> Employees
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div
                                            class="flex items-center text-base font-semibold text-center text-green-300 dark:text-green-500">

                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center justify-between p-4 bg-red-500 rounded-lg h-44">
                                    <div class="items-center">
                                        <div
                                            class="relative items-center w-16 h-16 text-center text-gray-100 bg-red-400 rounded-full">
                                            <usersicon class="absolute scale-150 left-5 top-5"></usersicon>
                                        </div>
                                    </div>

                                    <div>
                                        <h5 class="text-3xl font-bold leading-none text-gray-200 dark:text-white">
                                            {{ completedPatients }}</h5>
                                        <p class="text-lg font-semibold text-gray-200 dark:text-gray-400">Total Patient
                                        </p>
                                        <div class="flex flex-row gap-8">
                                            <div>
                                                <h5
                                                    class="pl-1 mt-1 text-xl font-semibold leading-none text-gray-200 dark:text-white">
                                                    {{ completedStudents }}
                                                </h5>
                                                <p class="pl-1 text-sm font-semibold text-gray-200 dark:text-gray-400">
                                                    Students
                                                </p>
                                            </div>
                                            <div>
                                                <h5
                                                    class="mt-1 text-xl font-semibold leading-none text-gray-200 dark:text-white">
                                                    {{ completedEmployees }}
                                                </h5>
                                                <p class="text-sm font-semibold text-gray-200 dark:text-gray-400">Employees
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div
                                            class="flex items-center px-2.5 text-base font-semibold text-green-300 dark:text-green-500 text-center">

                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center justify-between p-4 bg-yellow-500 rounded-lg h-44">
                                    <div class="items-center">
                                        <div
                                            class="relative items-center w-16 h-16 text-center text-gray-100 bg-yellow-400 rounded-full">
                                            <appointmenticon class="absolute scale-150 left-5 top-5"></appointmenticon>
                                        </div>
                                    </div>

                                    <div>
                                        <h5 class="pl-1 text-3xl font-bold leading-none text-gray-100 dark:text-white">
                                            {{ completedAppointments }}</h5>
                                        <p class="pl-1 text-lg font-semibold text-gray-100 dark:text-gray-400">Appointments
                                            Today
                                        </p>
                                    </div>

                                    <div>
                                        <div
                                            class="flex items-center px-2.5 text-base font-semibold text-green-300 dark:text-green-500 text-center">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="w-full h-[35rem] bg-white rounded-lg p-8 flex flex-col items-center mt-10 md:mt-0 md:h-[35rem] drop-shadow-md">
                                <div class="relative left-0">
                                    <h class="text-lg font-medium text-black">Patients Accomodated</h>
                                </div>
                                <hr class="w-full h-0.5 mt-2 bg-gray-200">
                                <div class="w-full h-full md:h-[35rem] mt-10">
                                    <YearChart :yearlyData="yearlyData"></YearChart>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="w-full bg-white rounded-lg h-1/2 drop-shadow-md">
                                <div class="w-full">
                                    <VCalendar expanded title-position="left" :attributes="appointmentDates" />
                                </div>
                            </div>
                            <div class="w-full h-full bg-white rounded-lg drop-shadow-md">
                                <div class="flex flex-row gap-64">
                                    <div class="mt-4 ml-4">
                                        Today's Appointments
                                    </div>
                                    <div class="mt-4">
                                        <Link :href="route('assistant.appointment.index')" class="text-blue-500 font-base">View All
                                        </Link>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 mt-2 drop-shadow-md">
                                    <div v-for="appointment in appointments.slice(0, 5)"
                                        class="flex flex-col h-16 pt-2 pl-4 ml-4 mr-4 rounded-lg bg-gray-50">
                                        <div class="relative flex flex-row">
                                            <div class="flex flex-col">
                                                <div>
                                                    {{ appointment.user.name }}
                                                </div>
                                                <div>
                                                    {{ appointment.app_type }}
                                                </div>
                                                <div class="absolute pt-3 right-12">
                                                    {{ formatHour(appointment.app_time) }}
                                                </div>
                                            </div>
                                            <div class="absolute pt-3 right-4">
                                                <div v-if="appointment.status === 'cancelled'"
                                                    class="w-6 h-6 text-center text-red-500 bg-red-400 rounded-full">
                                                </div>
                                                <div v-if="appointment.status === 'approved'"
                                                    class="w-6 h-6 text-center text-blue-500 bg-blue-400 rounded-full">
                                                </div>
                                                <div v-if="appointment.status === 'pending'"
                                                    class="w-6 h-6 text-center text-orange-400 bg-orange-400 rounded-full">
                                                </div>
                                                <div v-if="appointment.status === 'completed'"
                                                    class="w-6 h-6 text-center text-green-500 bg-green-400 rounded-full">
                                                </div>
                                                <div v-if="appointment.status === 'ongoing'"
                                                    class="w-6 h-6 text-center text-yellow-400 bg-yellow-200 rounded-full">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template>
<script setup>

import MainLayout from "@/Pages/Layouts/MainLayout.vue"
import YearChart from "@/Pages/Dentist/Report/Charts/YearChart.vue"
import usersicon from "@/Components/UsersIcon.vue";
import appointmenticon from "@/Components/AppointmentIcon.vue"
import { Link, usePage } from '@inertiajs/vue3'
import dayjs from 'dayjs'
import moment from 'moment'
import 'moment-timezone'
import { computed } from "vue"

const props = defineProps({
    calendarAppointments: {
        type: Array,
    },
    appointments: {
        type: Array,
    },
    yearlyData: Object,
    totalStudents: Object,
    totalEmployees: Object,
    totalPatients: Object,
    completedStudents: Object,
    completedEmployees: Object,
    completedPatients: Object,
    completedAppointments: Object,
    today: Object,
})

const page = usePage()


function formatHour(time) {
    return moment(time, 'HH:mm').format('hh:mm A')
}

const colors = ['red', 'blue', 'green', 'yellow', 'purple'];

const appointmentDates = computed(() => {
    return props.calendarAppointments.map((appointment, index) => {
        const color = colors[index % colors.length];
        const isPastDate = dayjs(appointment.app_date).isBefore(dayjs(), 'day');
        return {
            key: `appointment-${index}`,
            dot: !isPastDate ? {
                style: {
                    backgroundColor: color,
                }
            } : {},
            dates: appointment.app_date,
            color: color,
            popover: {
                label: `
                    ${appointment.user.name} |
                    ${appointment.app_type} |
                    ${formatHour(appointment.app_time)} |
                    ${appointment.status}
                `,
            },
        };
    });
});
</script>