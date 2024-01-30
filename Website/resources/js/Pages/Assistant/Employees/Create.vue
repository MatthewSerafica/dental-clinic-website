<template>
    <form @submit.prevent="create">
        <Modal size="4xl" class="md:flex md:space-y-0 md:space-x-4" @close="closeModal">
            <template #header>
                <div class="items-center px-4">
                    <h1 class="text-xl font-semibold text-gray-800 ">
                        Add Patient Record
                    </h1>
                </div>
            </template>

            <template #body>
                <h1 class="px-4 pb-1 text-gray-400">BASIC INFORMATION</h1>
                <div class="px-4">

                    <!---start of row 1-->
                    <div class="w-64 pb-2 max-sm:w-full">
                        <label for="patientId" class="block font-semibold">ID Number <label
                                class=" text-[red]">*</label></label>
                        <input id="patientId" v-model.number="form.id_number" type="text"
                            class="w-[15.7em] h-10 rounded-md drop-shadow-lg"
                            :class="{ 'border-red-600': form.errors.id_number }" placeholder="AE/FE/CF 0000" required>
                        <div v-if="form.errors.id_number" class="px-2 text-sm text-red-600">
                            {{ form.errors.id_number }}
                        </div>
                    </div>
                    <!--end of row 1-->
                    <!--start of row 2-->
                    <div class="flex flex-row gap-4 pb-2 max-sm:flex-col">
                        <div class="w-64 max-sm:w-full">
                            <label for="lname" class="block font-semibold">Last Name
                                <label class=" text-[red]">*</label>
                            </label>
                            <input id="lname" v-model="form.last_name" type="text"
                                class="w-full h-10 rounded-md drop-shadow-lg"
                                :class="{ 'border-red-600': form.errors.last_name }" placeholder="Dela Cruz" required>
                            <div v-if="form.errors.last_name" class="px-2 text-sm text-red-600">
                                {{ form.errors.last_name }}
                            </div>
                        </div>

                        <div class="w-64 max-sm:w-full">
                            <label for="fname" class="block font-semibold">
                                First Name
                                <label class=" text-[red]">*</label>
                            </label>
                            <input id="fname" v-model="form.first_name" type="text"
                                class="w-full h-10 rounded-md drop-shadow-lg"
                                :class="{ 'border-red-600': form.errors.first_name }" placeholder="Juan" required>
                            <div v-if="form.errors.first_name" class="px-2 text-sm text-red-600">
                                {{ form.errors.first_name }}
                            </div>
                        </div>

                        <div class="w-64 max-sm:w-full">
                            <label for="mname" class="block font-semibold">Middle Name</label>
                            <input id="mname" v-model="form.middle_name" type="text"
                                class="w-full h-10 rounded-md drop-shadow-lg" placeholder="Bautista">
                            <div v-if="form.errors.middle_name" class="px-2 text-sm text-red-600">
                                {{ form.errors.middle_name }}
                            </div>
                        </div>
                    </div>
                    <!---end of row 2-->

                    <!---start of row 3-->
                    <div class="flex flex-row gap-4 pb-2 max-sm:flex-col">

                        <div class="w-64 max-sm:w-full">
                            <label for="patientId" class="block font-semibold">SLU Email Address <label
                                    class=" text-[red]">*</label></label>
                            <input @keydown.space.prevent id="patientId" v-model.number="form.email" type="text"
                                class="w-full h-10 rounded-md drop-shadow-lg max-sm:w-full"
                                placeholder="ex. jbdelacruz@slu.edu.ph" required>
                        </div>


                        <div class="w-64 max-sm:w-full">
                            <label for="department" class="block font-semibold">School/Office <label
                                    class=" text-[red]">*</label></label>
                            <select class="w-full h-10 rounded-md drop-shadow-lg" v-model="form.department" required>
                                <option disabled>
                                    Please select one </option>
                                <option v-for="department in departments" :key="department.id">{{ department.departments }}
                                </option>
                            </select>
                        </div>

                    </div>
                    <!---end of row 3-->
                    <!---start of row 4-->
                    <div class="flex flex-row pb-2 gap-72 max-sm:flex-col max-sm:gap-4">
                        <div class="w-64 max-sm:w-full">
                            <label for="age" class="block font-semibold">Complete Address <label
                                    class=" text-[red]">*</label></label>
                            <input id="age" v-model="form.address" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[32.3em] max-sm:w-full"
                                :class="{ 'border-red-600': form.errors.address }"
                                placeholder="Street/Unit/Bldg/Village, Barangay, City/Municipality, Province" required>
                            <div v-if="form.errors.address" class="px-2 text-sm text-red-600">
                                {{ form.errors.address }}
                            </div>
                        </div>

                        <div class="w-64 max-sm:w-full">
                            <label for="contactNumber" class="block font-semibold">Contact
                                Number <label class=" text-[red]">*</label></label>
                            <input @keydown.space.prevent id="contactNumber" v-model="form.contact_number" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[15em] max-sm:w-full"
                                :class="{ 'border-red-600': form.errors.contact_number }" placeholder="09XXXXXXXXX"
                                required>
                            <div v-if="form.errors.contact_number" class="px-2 text-sm text-red-600">
                                {{ form.errors.contact_number }}
                            </div>
                        </div>
                    </div>
                    <!---end of row 4-->
                    <!---start of row 5-->
                    <div class="flex flex-row gap-4 pb-2 max-sm:flex-col">
                        <div class="">
                            <label for="sex" class="block font-semibold">Sex <label class=" text-[red]">*</label></label>
                            <select class="h-10 rounded-md drop-shadow-lg w-[8em] max-sm:w-full" v-model="form.sex"
                                required>
                                <option disabled value="">
                                    Please select one
                                </option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="">
                            <label for="civilStatus" class="block font-semibold">Civil
                                Status <label class=" text-[red]">*</label></label>
                            <select class="h-10 rounded-md drop-shadow-lg w-[11em] max-sm:w-full"
                                v-model="form.civil_status" required>
                                <option disabled> Please select one </option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Separated</option>
                                <option>Divorced</option>
                                <option>Widowed</option>
                            </select>
                        </div>

                        <div class="">
                            <label for="birth_date" class="block font-semibold after:whitespace-nowrap">Date of
                                Birth <label class=" text-[red]">*</label></label>
                            <VDatePicker id="birth_date" v-model="form.birth_date">
                                <template #default="{ togglePopover, inputValue }">
                                    <input :value="formatBirth(inputValue)"
                                        class="border border-black w-[25rem] px-3 py-2 rounded-md drop-shadow-lg"
                                        placeholder="DD/MM/YYYY" @click="togglePopover">
                                </template>
                            </VDatePicker>
                        </div>

                        <div class="">
                            <label for="age" class="block font-semibold">Age</label>
                            <input id="age" v-model="form.age" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[4em] max-sm:w-full" disabled>
                        </div>

                    </div>

                </div>
                <!--end of row 5-->

                <!--Medical History-->
                <h1 class="px-4 pt-3 pb-1 text-gray-400">MEDICAL HISTORY</h1>
                <div class="px-4">

                    <!--start of row 1-->
                    <div class="flex flex-row gap-6 pb-2 max-sm:flex-col">
                        <div class="">
                            <label for="allergy" class="block font-semibold">Allergies</label>
                            <input id="allergy" v-model="form.allergies" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[13rem] max-sm:w-full"
                                placeholder="input 'none' if none">
                        </div>

                        <div class="mb-4">
                            <label for="otherConditions" class="block font-semibold">Other
                                Conditions</label>
                            <input id="otherConditions" v-model="form.other_conditions" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[13rem] max-sm:w-full"
                                placeholder="input 'none' if none">
                        </div>
                    </div>
                    <!--end of row 1-->
                    <!--start of row 2-->
                    <div class="flex flex-row gap-6 pb-3 max-sm:flex-col">
                        <div class="w-52 max-sm:w-full">
                            <label for="Diabetes" class="block font-semibold">Diabetes</label>
                            <label class="block font-semibold">
                                <input v-model="form.diabetes_option" name="diabetes_option" id="no" type="radio" class=""
                                    value="NO" checked>
                                NO
                            </label>
                            <label class="block font-semibold">
                                <input v-model="form.diabetes_option" name="diabetes_option" id="yes" type="radio" class=""
                                    value="YES"> YES
                            </label>
                            <input v-if="form.diabetes_option === 'YES'" id="Diabetes" v-model="form.diabetes" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[13rem] mt-1 max-sm:w-full"
                                placeholder="if YES type here">
                        </div>

                        <div class="w-52 max-sm:w-full">
                            <label for="bloodDyscrasia" class="block font-semibold">
                                Blood Dyscrasia
                            </label>
                            <label class="block font-semibold">
                                <input v-model="form.blood_dyscrasia_option" name="blood_dysc_option" id="no" type="radio"
                                    class="" value="NO" checked>
                                NO
                            </label>
                            <label class="block font-semibold">
                                <input v-model="form.blood_dyscrasia_option" name="blood_dysc_option" id="yes" type="radio"
                                    class="" value="YES">
                                YES
                            </label>
                            <input v-if="form.blood_dyscrasia_option === 'YES'" id="bloodDyscrasia"
                                v-model="form.blood_dyscrasia" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[13rem] mt-1 max-sm:w-full"
                                placeholder="if YES type here">
                        </div>

                        <div class="w-52 max-sm:w-full">
                            <label for="cnsDisorder" class="block font-semibold">CNS Disorder</label>
                            <label class="block font-semibold">
                                <input v-model="form.cns_disorder_option" name="cns_option" id="no" type="radio" class=""
                                    value="NO" checked>
                                NO
                            </label>
                            <label class="block font-semibold">
                                <input v-model="form.cns_disorder_option" name="cns_option" id="yes" type="radio" class=""
                                    value="YES">
                                YES
                            </label>
                            <input v-if="form.cns_disorder_option === 'YES'" id="cnsDisorder" v-model="form.cns_disorder"
                                type="text" class="h-10 rounded-md drop-shadow-lg w-[13rem] mt-1 max-sm:w-full"
                                placeholder="if YES type here">
                        </div>
                    </div>

                    <!--end of row 2-->
                    <!--start of last row-->
                    <div class="flex flex-row gap-6 max-sm:flex-col">
                        <div class="w-52 max-sm:w-full">
                            <label for="cardiovascularDisease" class="block font-semibold">
                                Cardiovascular Disease
                            </label>
                            <label class="block font-semibold">
                                <input name="cardio_option" id="no" type="radio" class=""
                                    v-model="form.cardiovascular_disease_option" value="NO" checked>
                                NO
                            </label>
                            <label class="block font-semibold">
                                <input name="cardio_option" id="yes" type="radio" class=""
                                    v-model="form.cardiovascular_disease_option" value="YES">
                                YES
                            </label>
                            <input v-if="form.cardiovascular_disease_option === 'YES'" id="cardiovascularDisease"
                                v-model="form.cardiovascular_disease" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[13rem] mt-1 max-sm:w-full"
                                placeholder="if YES type here">
                        </div>

                        <div class="w-52 max-sm:w-full">
                            <label for="toothSurgery" class="block font-semibold">
                                Tooth Related Surgery
                            </label>
                            <label class="block font-semibold">
                                <input name="tooth_option" v-model="form.tooth_related_surgery_option" id="no" type="radio"
                                    class="" value="NO" checked>
                                NO
                            </label>
                            <label class="block font-semibold">
                                <input name="tooth_option" v-model="form.tooth_related_surgery_option" id="yes" type="radio"
                                    class="" value="YES">
                                YES
                            </label>
                            <input v-if="form.tooth_related_surgery_option === 'YES'" id="toothSurgery"
                                v-model="form.tooth_related_surgery" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[13rem] mt-1 max-sm:w-full"
                                placeholder="if YES type here">
                        </div>
                    </div>
                    <!--end of last row-->
                </div>
            </template>

            <!--CTAs-->
            <template #footer>
                <div class="flex justify-center max-sm:flex-col-reverse">
                    <button @click="closeModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3 mb-3">
                        Cancel
                    </button>
                    <button type="submit" as="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3">
                        Add Patient
                    </button>
                </div>
            </template>
        </Modal>
    </form>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3"
import axios from "axios";
import { Modal } from 'flowbite-vue'
import { watch } from 'vue'
import moment from "moment"
import "moment-timezone"

const emit = defineEmits()

const closeModal = () => {
    emit('close')
}

const props = defineProps({
    employees: {
        type: Object,
        default: () => ({}),
    },
    departments: {
        type: Object,
        default: () => ({}),
    },
})
const form = useForm({
    email: null,
    id_number: null,
    last_name: null,
    first_name: null,
    middle_name: null,
    sex: null,
    address: null,
    contact_number: null,
    civil_status: null,
    department: null,
    age: null,
    birth_date: null,

    allergies: 'none',
    diabetes: 'none',
    blood_dyscrasia: 'none',
    cns_disorder: 'none',
    cardiovascular_disease: 'none',
    tooth_related_surgery: 'none',
    other_conditions: 'none',
});


const formatBirth = (date) => {
    return date ? moment(date).format('DD/MM/YYYY') : ''
}

watch(() => form.birth_date, (newBirthDate) => {
    if (newBirthDate) {
        const birth_date = new Date(newBirthDate)
        const today = new Date()
        let age = today.getFullYear() - birth_date.getFullYear()

        if (today.getMonth() < birth_date.getMonth() ||
            (today.getMonth() === birth_date.getMonth() && today.getDate() < birth_date.getDate())
        ) {
            age--;
        }
        form.age = age.toString();
    } else {
        form.age = null
    }
})


watch(() => form.last_name, (newValue) => {
    form.errors.last_name = !newValue
        ? 'Last name is required'
        : /^\d+$/.test(newValue)
            ? 'Last name should only contain letters'
            : /^\s/.test(newValue)
                ? 'Last name must start with a letter'
                : ''
})

watch(() => form.first_name, (newValue) => {
    form.errors.first_name = !newValue
        ? 'First name is required'
        : /^\d+$/.test(newValue)
            ? 'First name should only contain letters'
            : /^\s/.test(newValue)
                ? 'First name must start with a letter'
                : ''
})

watch(() => form.middle_name, (newValue) => {
    form.errors.middle_name = /^\s/.test(newValue)
        ? 'Middle name must start with a letter'
        : ''
})

watch(() => form.contact_number, (newValue) => {
    form.errors.contact_number = !newValue
        ? 'Contact Number is required'
        : !/^[09]\d{10}$/.test(newValue)
            ? 'Contact number should start with 09 and be exactly 11 digits'
            : /^\D+$/.test(newValue)
                ? 'Contact number should only contain numbers'
                : ''
})

watch(() => form.id_number, async (newValue) => {
    form.errors.id_number = !newValue
        ? 'ID number is required'
        : !/^(FE|AE|CF)\s\d{4}$/.test(newValue)
            ? 'ID number should start with AE, FE, or CF'
            : ''

    if (!form.errors.id_number) {
        try {
            const { data } = await axios.get(route('assistant.employee.check', newValue));
            if (data.exists) {
                form.errors.id_number = 'ID number is already taken'
            }
        } catch (error) {
            console.error(error)
        }
    }
})

watch(() => form.address, (newValue) => {
    form.errors.address = !newValue
        ? 'Complete address is required'
        : /^\s/.test(newValue)
            ? 'Address must start with a letter'
            : ''
})

const create = async () => { 
    form.birth_date = form.birth_date ? moment(form.birth_date).format('YYYY-MM-DD') : null
    form.post(route("assistant.employee.store"), { preserveScroll: false, preserveState: false })
}
</script>

