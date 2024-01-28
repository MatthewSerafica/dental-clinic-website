<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="relative flex flex-col">
                <div
                    class="relative h-full desktop:w-[100rem] laptop:w-[76rem] top-12 left-5 bg-[#ffffff] rounded-xl drop-shadow-lg sm:w-full sm:top-0 sm:left-0">

                    <div class="relative flex items-center mb-10 md:justify-center top-4 left-1 md:left-0">
                        <span class="lg:text-3xl sm:text-xl">{{ viewDate.format('MMMM YYYY') }}</span>

                        <div class="absolute flex gap-1 right-2 md:right-10 md:gap-5">

                            <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded btn-primary hover:bg-blue-700"
                                @click="reset()">Today</button>
                            <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded btn hover:bg-blue-700"
                                @click="shiftMonth(-1)">Previous</button>
                            <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded btn hover:bg-blue-700"
                                @click="shiftMonth(1)">Next</button>

                        </div>

                    </div>

                    <div class="grid grid-cols-7 gap-1">
                        <div v-for="d in weekDays" class="text-center">
                            <div class="sm:text-xs">{{ d }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-7">
                        <div v-for="p in daystoPrepend"></div>
                        <div class="flex flex-col h-32 border rounded-lg border-slate-200" v-for="d in units"
                            :class="{ 'bg-green-200': d.isAppointment }">
                            <div :class="[d.date.isToday() ? 'bg-blue-300 rounded-lg' : '']"
                                class="text-lg text-center text-bold">{{
                                    d.date.format('D') }}
                            </div>
                            <div v-if="d.isAppointment"
                                class="items-center justify-center w-full p-5 text-sm text-green-700 sm:text-xs">
                                <p class="w-44">{{ d.appointmentDetails }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script setup lang="ts">
import { ISODate } from '$/common/types/Notebook'
import MainLayout from "@/Pages/Layouts/MainLayout.vue"
import dayjs from 'dayjs'
import isToday from 'dayjs/plugin/isToday'
import moment from 'moment'
import 'moment-timezone'
import { computed, ref } from 'vue'


dayjs.extend(isToday)

type Props = {
    modelValue?: any
    startDate?: ISODate
    display?: 'month' | 'year' | 'week' | 'day'
    appointments?: Array<any>
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: () => null,
    display: () => 'month',
    startDate: () => new Date(),
    appointments: () => []
})

const emits = defineEmits(['update:modelValue']);

const viewDate = ref(dayjs(props.startDate));

const daystoPrepend = computed(() => {
    const startOfMonth = viewDate.value.startOf("month");
    const startOfFirstWeek = startOfMonth.startOf("week");
    const daysToFirstDay = startOfMonth.diff(startOfFirstWeek, "day");
    return Array.from(new Array(daysToFirstDay).keys());
})

const units = computed(() => {
    let ranges = [];
    let startOfRange = viewDate.value.startOf('month').add(-1, 'day');
    let endOfRange = viewDate.value.endOf('month').add(-1, 'day');

    let currentDate = startOfRange;

    while (currentDate.isBefore(endOfRange) || currentDate.isSame(endOfRange)) {
        currentDate = currentDate.add(1, 'day');
        const appointment = props.appointments.find(appointment =>
            dayjs(appointment.app_date).isSame(currentDate, 'day')
        );
        const isAppointment = !!appointment;
        ranges.push({
            date: currentDate,
            isAppointment,
            appointmentDetails: isAppointment ? getAppointmentDetails(currentDate) : null,
        });
    }
    return ranges;
})

const shiftMonth = function (amount: number) {
    viewDate.value = viewDate.value.add(amount, 'month');
}
const reset = function () {
    viewDate.value = dayjs();
}

const getAppointmentDetails = (date) => {
    const appointment = props.appointments.find(appointment =>
        dayjs(appointment.app_date).isSame(date, 'day')
    );
    return `Appointment with Dr. ${appointment.dentist.last_name} at ${formatHour(appointment.app_time)} for ${appointment.app_type} `;
}

function formatHour(time) {
    return moment(time, 'HH:mm').format('hh:mm A')
}

const weekDays = [
    'Sunday',
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
]
</script>
