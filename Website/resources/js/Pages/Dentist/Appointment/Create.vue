<template>
    <form @submit.prevent="create">
        <Modal size="6xl" @close="closeModal">
            <template #header>
                <div class="items-center px-4">
                    <h1 class="text-xl font-semibold text-gray-800 ">
                        Book An Appointment
                    </h1>
                </div>
            </template>

            <template #body>
                <div class="p-2">
                    <div class="flex flex-row gap-12 max-md:flex-col">
                        <!-- Left Column -->
                        <div class="w-[25rem]">
                            <div class="w-[25rem] mb-4">
                                <label for="patientId" class="block font-semibold">ID Number</label>
                                <input id="patientId" v-model="idNumber" type="text"
                                    class="w-full px-3 py-2 rounded-md drop-shadow-lg" placeholder="Enter ID Number">
                            </div>

                            <div class="w-[25rem] mb-4">
                                <label for="patientName" class="block font-semibold">Patient Name</label>
                                <input id="patientName" type="text" v-model="full_name"
                                    class="w-full px-3 py-2 rounded-md drop-shadow-lg" placeholder="Patient Name" disabled>
                            </div>

                            <div class="mb-4 w-[25rem]">
                                <label for="dentist" class="block font-semibold">Dentist</label>
                                <select id="dentist" v-model.number="form.dentist_id"
                                    class="border border-black w-[25rem] px-3 py-2 rounded-md drop-shadow-lg">
                                    <option disabled value="">
                                        Please select a dentist
                                    </option>
                                    <option v-for="dentist in dentists" :value="dentist.dentist_id">
                                        Dr. {{ dentist.first_name }} {{ dentist.last_name }} </option>
                                </select>
                                <div v-if="form.errors.dentist_id" class="text-red-600">
                                    {{ form.errors.dentist_id }}
                                </div>
                            </div>


                            <div class="w-[25rem] mb-4">
                                <label for="appointmentDate" class="block font-semibold">Appointment Date</label>
                                <VDatePicker id="appointmentDate" v-model.string="form.app_date" :input-debounce="500"
                                    :disabled-dates="disabledDates" :min-date="new Date()"
                                    :max-date="new Date().setDate(new Date().getDate() + 6)" :masks="masks">
                                    <template #default="{ togglePopover, inputValue }">
                                        <input :value="inputValue"
                                            class="border border-black w-[25rem] px-3 py-2 rounded-md drop-shadow-lg"
                                            placeholder="Select Appointment Date" @click="togglePopover">
                                    </template>
                                </VDatePicker>
                            </div>



                            <div class="mb-4 w-[25rem]">
                                <label for="appointmentType" class="block font-semibold">Appointment Type</label>
                                <select id="appointmentType" v-model="form.app_type"
                                    class="border border-black w-[25rem] px-3 py-2 rounded-md drop-shadow-lg">
                                    <option value="" disabled selected>
                                        Please select one </option>
                                    <option v-for="service in services" :value=service.services> {{ service.services }}
                                    </option>
                                </select>
                                <div v-if="form.errors.app_type" class="text-red-600">
                                    {{ form.errors.app_type }}
                                </div>
                            </div>

                            <div class="mb-4 w-[25rem]">
                                <label for="appointmentDescription" class="block font-semibold">Appointment
                                    Description</label>
                                <textarea id="appointmentDescription" class="w-full px-3 py-2 rounded-md drop-shadow-lg"
                                    v-model="form.pat_notes" placeholder="Enter Appointment Description"></textarea>
                                <div v-if="form.errors.pat_notes" class="text-red-600">
                                    {{ form.errors.pat_notes }}
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="">
                            <h2 v-if="form.dentist_id" class="mb-2 text-lg font-semibold text-center">Morning Session</h2>
                            <div class="grid grid-cols-5 gap-4 mb-4">
                                <div v-for="available in availableTime.morning">
                                    <Button v-if="!available.isBooked"
                                        @click="setTime(available.time, available.times_id)" type="button"
                                        as="button"
                                        class="px-4 py-4 border-2 focus:bg-blue-800 focus:border-blue-800 focus:ring-blue-800 focus:text-white active:bg-blue-800 active:border-blue-800 active:ring-blue-800"
                                        outline>
                                        <p class="text-base">
                                            {{ formatTime(available.time) }}
                                        </p>
                                    </Button>
                                    
                                </div>
                            </div>

                            <h2 v-if="form.dentist_id" class="mb-2 text-lg font-semibold text-center">Afternoon Session</h2>
                            <div class="grid grid-cols-5 gap-4">
                                <div v-for="available in availableTime.afternoon">
                                    <Button v-if="!available.isBooked"
                                        @click="setTime(available.time, available.times_id)" type="button"
                                        as="button" class="px-4 py-4 border-2 " outline>
                                        <p class="text-base">
                                            {{ formatTime(available.time) }}
                                        </p>
                                    </Button>
                                    <Button v-else @click="setTime(available.time, available.times_id)" type="button"
                                        as="button" class="px-4 py-4 border-2 border-red-600" color="red" disabled>
                                        <p class="text-base">
                                            {{ formatTime(available.time) }}
                                        </p>
                                    </Button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <input type="hidden" v-model="form.app_time">
                    </div>
                </div>
            </template>

            <template #footer>
                <div class="flex justify-center">
                    <button @click="closeModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3 mb-3">
                        Cancel
                    </button>
                    <button type="submit" as="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3">
                        Book
                    </button>
                </div>
            </template>
        </Modal>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import axios from "axios"
import { Button, Modal } from 'flowbite-vue'
import moment from 'moment'
import 'moment-timezone'
import { ref, watch } from 'vue'

const emit = defineEmits()

const closeModal = () => {
    emit('close')
}

const masks = ref({
    modelValue: 'YYYY-MM-DD',
});

const disabledDates = ref([
    {
        repeat: {
            weekdays: [1],
        },
    },
]);

const props = defineProps({
    dentists: {
        type: Array,
    },
    students: {
        type: Object,
        default: () => ({}),
    },
    employees: {
        type: Object,
        default: () => ({}),
    },
})

const idNumber = ref('');
watch(idNumber, () => {
    fetchData();
});

const students = ref({
    last_name: '',
    first_name: '',
    middle_name: '',
    course: '',
    year: '',
});

let services = ref('')

const employees = ref({
    last_name: '',
    first_name: '',
    middle_name: '',
});

const full_name = ref('');

const fetchData = async () => {
    if (idNumber.value.length === 7) {
        try {
            if (idNumber.value.includes(' ')) {
                const response = await axios.get(`appointment/employee/${idNumber.value}`);
                const employeeData = response.data;

                employees.value.last_name = employeeData.last_name;
                employees.value.first_name = employeeData.first_name;
                employees.value.middle_name = employeeData.middle_name;
                full_name.value = employees.value.last_name + ", " + employees.value.first_name + ", " + employees.value.middle_name;
                form.name = employees.value.last_name + ", " + employees.value.first_name;

                const servicesResponse = await axios.get(route('employee.getemployeeservice'));
                services = servicesResponse.data;

            } else {
                const response = await axios.get(`appointment/student/${idNumber.value}`);
                const studentData = response.data;

                students.value.last_name = studentData.last_name;
                students.value.first_name = studentData.first_name;
                students.value.middle_name = studentData.middle_name;
                students.value.course = studentData.course;
                students.value.year = studentData.year;
                full_name.value = students.value.last_name + ", " + students.value.first_name + ", " + students.value.middle_name;
                form.name = students.value.last_name + ", " + students.value.first_name;

                if ((studentData.course == 'Doctor of Medicine' || studentData.course == 'BSN') && studentData.year != '1st Year') {
                    const servicesResponse = await axios.get(route('student.getannualservices'));
                    services = servicesResponse.data;
                } else {
                    const servicesResponse = await axios.get(route('student.getregularservices'));
                    services = servicesResponse.data;
                }
            }

        } catch (error) {
            console.error(error);
        }
    }
    else {
        full_name.value = '';
    }
};


const availableTime = ref({})

const fetchAvailableTime = async (id, date) => {
    try {
        const response = await axios.get(route('appointment.getAvailableTime', { id, date }))
        availableTime.value = response.data
    } catch (error) {
        console.error(error)
    }
}

const form = useForm({
    name: null,
    dentist_id: null,
    app_date: null,
    app_time: null,
    app_type: null,
    pat_notes: null,
    time_id: null,
})

watch(() => ({ dentist_id: form.dentist_id, app_date: form.app_date }), ({ dentist_id, app_date }) => {
    if (dentist_id && app_date) {
        fetchAvailableTime(dentist_id, app_date)
    }
})

const setTime = (time, id) => {
    form.app_time = format24(time)
    form.time_id = id
}

function format24(time) {
    return moment(time, "hh:mm A").format("HH:mm:ss");
}


function formatTime(time) {
    return moment(time, "HH:mm").format("hh:mm A");
}

const create = () => form.post(route('appointment.store'), { preserveScroll: false, preserveState: false })
</script>
