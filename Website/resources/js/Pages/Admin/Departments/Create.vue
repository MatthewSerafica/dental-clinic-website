<template>
    <form @submit.prevent="create">
        <Modal size="xl" class="block space-y-4 md:flex md:space-y-0 md:space-x-4" @close="closeModal">
            <template #header>
                <div class="items-center">
                    <h1 class="text-xl font-semibold text-gray-700 ">
                        Add Department
                    </h1>
                </div>
            </template>

            <template #body>
                <div class="w-full mb-4 max-sm:m-0">
                    <label for="department" class="block font-semibold">Department Name
                        <label class=" text-[red]">*</label>
                    </label>
                    <input @keydown.space.prevent id="department" v-model="createForm.department" type="text"
                        class="w-full px-3 py-2 rounded-md drop-shadow-lg"
                        :class="{ 'border-red-600': createForm.errors.department }" placeholder="Enter department name..."
                        required>
                    <div v-if="createForm.errors.department" class="px-2 text-sm text-red-600">
                        {{ createForm.errors.department }}
                    </div>
                </div>
            </template>

            <template #footer>
                <div class="relative w-full h-8">
                    <button type="submit" as="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3 absolute right-0">
                        Add Department
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

const closeModal = () => {
    console.log('close')
    emit('closeModal')
}

const createForm = useForm({
    department: null,
})

const create = () => { createForm.post(route('admin.departments.store'), { preserveScroll: false, preserveState: false }) }
</script>