<template>
    <form @submit.prevent="update">
        <Modal size="xl" class="block space-y-4 md:flex md:space-y-0 md:space-x-4" @close="closeEdit">
            <template #header>
                <div class="items-center px-4">
                    <h1 class="text-xl font-semibold text-gray-700 ">
                        Edit Department
                    </h1>
                </div>
            </template>

            <template #body>
                <div class="w-full mb-4 max-sm:m-0">
                    <label for="department" class="block font-semibold">Department Name
                        <label class=" text-[red]">*</label>
                    </label>
                    <input id="department" v-model="editForm.department" type="text"
                        class="w-full px-3 py-2 rounded-md drop-shadow-lg"
                        :class="{ 'border-red-600': editForm.errors.department }" placeholder="Enter department name..."
                        required>
                    <div v-if="editForm.errors.department" class="px-2 text-sm text-red-600">
                        {{ editForm.errors.department }}
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
    props.department = null
    emit('closeEdit')
}

const props = defineProps({
    department: {
        type: Object,
        default: () => ({}),
    },
})

const editForm = useForm({
    department: props.department.departments ? props.department.departments : '',
    id: props.department.id
})


const update = () => { editForm.put(route('admin.departments.update'), { preserveScroll: false, preserveState: false }) }
</script>