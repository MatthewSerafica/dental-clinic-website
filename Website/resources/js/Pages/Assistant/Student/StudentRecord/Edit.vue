<template>
    <form @submit.prevent="update">
        <Modal size="4xl" class="md:flex md:space-y-0 md:space-x-4" @close="closeModal">
            <template #header>
                <div class="items-center px-4">
                    <h1 class="text-xl font-semibold text-gray-800 ">
                        Edit Patient Record
                    </h1>
                </div>
            </template>

            <template #body>
                <h1 class="px-4 pb-1 text-gray-400">BASIC INFORMATION </h1>
                <div class="px-4">
                    <!---start of row 1-->
                    <div class="w-64 pb-2 max-md:w-full">
                        <label for="patientId" class="block font-semibold">ID Number <label
                                class=" text-[red]">*</label></label>
                        <input id="patientId" v-model.number="form.id_number" type="text"
                            class="w-[15.6em] h-10 rounded-md drop-shadow-lg"
                            :class="{ 'border-red-600': form.errors.id_number }" placeholder="ex. 2201234" required>
                        <div v-if="form.errors.id_number" class="px-2 text-sm text-red-600">
                            {{ form.errors.id_number }}
                        </div>
                    </div>
                    <!---end of row 1-->
                    <!---start of row 2-->
                    <div class="flex flex-row gap-4 pb-2 max-md:flex-col">
                        <div class="w-64 max-md:w-full">
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

                        <div class="w-64 max-md:w-full">
                            <label for="fname" class="block font-semibold">First Name <label
                                    class=" text-[red]">*</label></label>
                            <input id="fname" v-model="form.first_name" type="text"
                                class="w-full h-10 rounded-md drop-shadow-lg"
                                :class="{ 'border-red-600': form.errors.first_name }" placeholder="Juan" required>
                            <div v-if="form.errors.first_name" class="px-2 text-sm text-red-600">
                                {{ form.errors.first_name }}
                            </div>
                        </div>

                        <div class="w-64 max-md:w-full">
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
                    <div class="flex flex-row gap-4 pb-2 max-md:flex-col max-md:pb-4">
                        <div class="max-md:w-full">
                            <label for="school" class="block font-semibold">School <label
                                    class=" text-[red]">*</label></label>
                            <select class="h-10 rounded-md drop-shadow-lg max-md:w-full" v-model="form.school"
                                @change="fetchCourses" required>
                                <option disabled> Please select one </option>
                                <option v-for="school in schools" :key="school.id">{{ school.school }}</option>
                            </select>
                        </div>

                        <!--Course textfield changed to dropdown-->
                        <div class="w-64 max-md:w-full">
                            <label for="course" class="block font-semibold">Course <label
                                    class=" text-[red]">*</label></label>
                            <select class="w-64 h-10 rounded-md drop-shadow-lg max-md:w-full" v-model="form.course_name"
                                required>
                                <option disabled> Please select one </option>
                                <option v-for="course in form.course" :key="course.course" :value="course.course">{{
                                    course.course
                                }}
                                </option>
                            </select>
                        </div>

                        <div class="">
                            <label for="year" class="block font-semibold">Year level <label
                                    class=" text-[red]">*</label></label>
                            <select class="rounded-md h-10 drop-shadow-lg w-[8.6em] max-md:w-full" v-model="form.year"
                                required>
                                <option disabled>
                                    Please select one </option>
                                <option>1st Year</option>
                                <option>2nd Year</option>
                                <option>3rd Year</option>
                                <option>4th Year</option>
                            </select>
                        </div>
                    </div>
                    <!---end of row 2-->
                    <!---start of row 3-->
                    <div class="flex flex-row pb-2 gap-72 max-md:flex-col max-md:gap-4">
                        <div class="w-64 max-md:w-full">
                            <label for="age" class="block font-semibold">Complete Address <label
                                    class=" text-[red]">*</label></label>
                            <input id="age" v-model="form.address" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[33em] max-md:w-full"
                                :class="{ 'border-red-600': form.errors.address }"
                                placeholder="Street/Unit/Bldg/Village, Barangay, City/Municipality, Province" required>
                            <div v-if="form.errors.address" class="px-2 text-sm text-red-600">
                                {{ form.errors.address }}
                            </div>
                        </div>

                        <div class="w-64 max-md:w-full">
                            <label for="contactNumber" class="block font-semibold">Contact
                                Number <label class=" text-[red]">*</label></label>
                            <input id="contactNumber" v-model="form.contact_number" type="tel"
                                class="h-10 rounded-md drop-shadow-lg w-[15em] max-md:w-full"
                                :class="{ 'border-red-600': form.errors.contact_number }" placeholder="09XXXXXXXXX"
                                required>

                            <div v-if="form.errors.contact_number" class="px-2 text-sm text-red-600">
                                {{ form.errors.contact_number }}
                            </div>
                        </div>
                    </div>
                    <!---end of row 3-->
                    <!---start of row 4-->
                    <div class="flex flex-row gap-4 pb-2 max-md:flex-col">
                        <div class="">
                            <label for="sex" class="block font-semibold">Sex <label class=" text-[red]">*</label></label>
                            <select class="h-10 rounded-md drop-shadow-lg w-[8em] max-md:w-full" v-model="form.sex"
                                required>
                                <option disabled value="">
                                    Please select one
                                </option>
                                <option>male</option>
                                <option>female</option>
                            </select>
                        </div>

                        <div class="">
                            <label for="civilStatus" class="block font-semibold">Civil
                                Status <label class=" text-[red]">*</label></label>
                            <select class="h-10 rounded-md drop-shadow-lg w-[11em] max-sm:w-full"
                                v-model="form.civil_status" required>
                                <option disabled>
                                    Please select one </option>
                                <option>single</option>
                                <option>married</option>
                                <option>separated</option>
                                <option>divorced</option>
                                <option>widowed</option>

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

                <!--Medical History-->
                <h1 class="px-4 pt-3 pb-1 text-gray-400">MEDICAL HISTORY</h1>
                <div class="px-4">

                    <!--start of row 1-->
                    <div class="flex flex-row gap-6 pb-2 max-md:flex-col max-md:gap-4">

                        <div class="">
                            <label for="allergy" class="block font-semibold">Allergies</label>
                            <input id="allergy" v-model="form.allergies" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[13rem] max-sm:w-full" placeholder="type here">
                        </div>

                        <div class="">
                            <label for="otherConditions" class="block font-semibold">Other
                                Conditions</label>
                            <input id="otherConditions" v-model="form.other_conditions" type="text"
                                class="h-10 rounded-md drop-shadow-lg w-[13rem] max-sm:w-full" placeholder="type here">
                        </div>
                    </div>
                    <!--end of row 1-->
                    <!--start of row 2-->
                    <div class="flex flex-row gap-6 pb-3 max-md:flex-col max-md:gap-4">
                        <div class="w-52 max-md:w-full">
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

                        <div class="w-52 max-md:w-full">
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
                                class="h-10 mt-1 rounded-md drop-shadow-lg w-[13rem] max-sm:w-full"
                                placeholder="if YES type here">
                        </div>

                        <div class="w-52 max-md:w-full">
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
                                type="text" class="h-10 mt-1 rounded-md drop-shadow-lg w-[13rem] max-sm:w-full"
                                placeholder="if YES type here">
                        </div>
                    </div>

                    <!--end of row 2-->
                    <!--start of last row-->
                    <div class="flex flex-row gap-6 max-md:flex-col max-md:gap-4">
                        <div class="w-52 max-md:w-full">
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

                        <div class="w-52 max-md:w-full">
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

            <template #footer>
                <div class="flex justify-center max-md:flex-col-reverse">
                    <button @click="closeModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3 mb-3">
                        Cancel
                    </button>
                    <button type="submit" as="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3">
                        Save Changes
                    </button>
                </div>
            </template>
        </Modal>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import axios from 'axios'
import { Modal } from 'flowbite-vue'
import { computed, onMounted, ref, watch } from 'vue'
import moment from "moment";
import "moment-timezone";

const emit = defineEmits()

const closeModal = () => {
    emit('close')
}

const props = defineProps({
    student: {
        type: Object,
        default: () => ({}),
    },
    schools: {
        type: Object,
        default: () => ({}),
    },
})

const form = useForm({
    id_number: props.student.id_number,
    last_name: props.student.last_name,
    first_name: props.student.first_name,
    middle_name: props.student.middle_name,
    birth_date: props.student.birth_date,
    age: props.student.age,
    sex: props.student.sex,
    contact_number: props.student.contact_number,
    address: props.student.address,
    civil_status: props.student.civil_status,
    school: ref(props.student.school),
    course_name: props.student.course,
    course: null,
    year: props.student.year,

    allergies: props.student.medicals.allergies,
    diabetes: props.student.medicals.diabetes,
    blood_dyscrasia: props.student.medicals.blood_dyscrasia,
    cns_disorder: props.student.medicals.cns_disorder,
    cardiovascular_disease: props.student.medicals.cardiovascular_disease,
    tooth_related_surgery: props.student.medicals.tooth_related_surgery,
    other_conditions: props.student.medicals.other_conditions,
})

const schoolCourseMapping = computed(() => {
    let mapping = {}
    props.schools.forEach(school => {
        mapping[school.school] = school.id
    })
    return mapping
})


const fetchCourses = async () => {
    try {
        const courseId = schoolCourseMapping.value[form.school]
        if (courseId) {
            const response = await axios.get(route('assistant.student.course.index', courseId))
            form.course = response.data
            form.course_id = response.data.length > 0 ? response.data[0].id : null
        }
    } catch (error) {
        console.log(error)
    }
}


watch(form.school, fetchCourses)

onMounted(fetchCourses)

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
            age--
        }
        form.age = age.toString()
    } else {
        form.age = null
    }
})

watch(() => form.last_name, (newValue) => {
    form.errors.last_name = !newValue
        ? 'Last name is required'
        : /^\d+$/.test(newValue)
            ? 'Last name should only contain letters'
            : ''
})

watch(() => form.first_name, (newValue) => {
    form.errors.first_name = !newValue
        ? 'First name is required'
        : /^\d+$/.test(newValue)
            ? 'First name should only contain letters'
            : ''
})

watch(() => form.contact_number, (newValue) => {
    form.errors.contact_number = !newValue
        ? 'Contact Number is required'
        : !/^[09]\d+$/.test(newValue)
            ? 'Contact number should start with 09'
            : /^\D+$/.test(newValue)
                ? 'Contact number should only contain numbers'
                : ''
})

watch(() => form.id_number, async (newValue) => {
    form.errors.id_number = !newValue
        ? 'ID number is required'
        : /^\D+$/.test(newValue)
            ? 'ID number should only contain numbers'
            : ''

    if (!form.errors.id_number) {
        try {
            const { data } = await axios.get(route('assistant.student.check', newValue));
            if (data.exists) {
                form.errors.id_number = 'ID number is already taken'
            }
        } catch (error) {
            console.error(error)
        }
    }
})

watch(() => form.address, (newValue) => {
    form.errors.address = !newValue ? 'Complete address is required' : ''
})

const update = async () => {
    form.birth_date = form.birth_date ? moment(form.birth_date).format('YYYY-MM-DD') : null
    form.put(route('assistant.student.update', props.student.id_number), { preserveScroll: false, preserveState: false })
}
</script>