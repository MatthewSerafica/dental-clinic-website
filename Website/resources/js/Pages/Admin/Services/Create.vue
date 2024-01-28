<template>
    <form @submit.prevent="create">
        <Modal size="xl" class="block space-y-4 md:flex md:space-y-0 md:space-x-4" @close="closeModal">
            <template #header>
                <div class="items-center">
                    <h1 class="text-xl font-semibold text-gray-700 ">
                        Add Service
                    </h1>
                </div>
            </template>

            <template #body>
                <div class="w-full mb-4 max-sm:m-0">
                    <label for="service" class="block font-semibold">Service Name
                        <label class=" text-[red]">*</label>
                    </label>
                    <input id="service" v-model="createForm.service" type="text"
                        class="w-full px-3 py-2 rounded-md drop-shadow-lg"
                        :class="{ 'border-red-600': createForm.errors.service }" placeholder="Enter service name..."
                        required>
                    <div v-if="createForm.errors.service" class="px-2 text-sm text-red-600">
                        {{ createForm.errors.service }}
                    </div>
                </div>
                <div class="flex flex-row h-12 gap-4">
                    <div class="flex flex-row gap-6 mb-4 max-sm:m-0">
                        <div class="mb-4 max-sm:m-0">
                            <label for="regular" class="block font-semibold">Regular</label>
                            <input id="regular" v-model="createForm.regular" type="checkbox">
                        </div>
                        <div class="mb-4 max-sm:m-0">
                            <label for="annual" class="block font-semibold">Annual</label>
                            <input id="annual" v-model="createForm.annual" type="checkbox">
                        </div>
                        <div class="mb-4 max-sm:m-0">
                            <label for="employee" class="block font-semibold">Employee</label>
                            <input id="employee" v-model="createForm.employee" type="checkbox">
                        </div>
                    </div>
                </div>
            </template>

            <template #footer>
                <div class="relative w-full h-8">
                    <button type="submit" as="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3 absolute right-0">
                        Add Service
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
    service: null,
    annual: false,
    regular: false,
    employee: false,
})

const create = () => { createForm.post(route('admin.services.store'), { preserveScroll: false, preserveState: false }) }
</script>