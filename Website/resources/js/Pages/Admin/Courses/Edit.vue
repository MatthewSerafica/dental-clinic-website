<template>
    <form @submit.prevent="update">
        <Modal size="xl" class="block space-y-4 md:flex md:space-y-0 md:space-x-4" @close="closeEdit">
            <template #header>
                <div class="items-center px-4">
                    <h1 class="text-xl font-semibold text-gray-700 ">
                        Edit Course
                    </h1>
                </div>
            </template>

            <template #body>
                <div class="w-full mb-4 max-sm:m-0">
                    <label for="department" class="block font-semibold">Course Name
                        <label class=" text-[red]">*</label>
                    </label>
                    <input id="department" v-model="editForm.course" type="text"
                        class="w-full px-3 py-2 rounded-md drop-shadow-lg"
                        :class="{ 'border-red-600': editForm.errors.course }" placeholder="Enter course name..." required>
                    <div v-if="editForm.errors.course" class="px-2 text-sm text-red-600">
                        {{ editForm.errors.course }}
                    </div>
                </div>
                <div class="w-full mb-4 max-sm:m-0">
                    <label for="school" class="block font-semibold">School <label class=" text-[red]">*</label></label>
                    <select class="h-10 rounded-md drop-shadow-lg" v-model="editForm.school">
                        <option disabled> Please select one </option>
                        <option v-for="school in schools" :key="school.id" :value="school.id">{{ school.school }}</option>
                    </select>
                    <div v-if="editForm.errors.school" class="text-red-600">
                        {{ editForm.errors.school }}
                    </div>
                </div>
            </template>
            <template #footer>
                <div class="relative w-full h-8">
                    <button type="submit" as="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3 absolute right-0">
                        Save Changes
                    </button>
                </div>
            </template>
        </Modal>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { Modal } from 'flowbite-vue';

const emit = defineEmits()

const closeEdit = () => {
    props.course = null
    emit('closeEdit')
}

const props = defineProps({
    course: {
        type: Object,
        default: () => ({}),
    },
    schools: Object,
})

const editForm = useForm({
    course: props.course.course ? props.course.course : '',
    id: props.course.id,
    school: props.course.school_id
})


const update = () => { editForm.put(route('admin.courses.update'), { preserveScroll: false, preserveState: false }) }
</script>