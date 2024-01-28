<template>
    <Modal size="lg" @close="closeDelete">
        <template #header>
            <div class="items-center px-4">
                <h1 class="text-xl font-semibold text-gray-700 ">
                    Delete School
                </h1>
            </div>
        </template>
        <template #body>
            <div class="items-center justify-center w-full h-full text-center">
                <div class="flex flex-col gap-4">
                    <Error class="relative w-20 h-20 left-44"></Error>
                    <div>
                        <p>Are you sure you want to delete</p>
                        <p>the {{ school.school }} school?</p>
                    </div>
                </div>
            </div>
        </template>
        <template #footer>
            <div class="relative w-full h-8">
                <div class="absolute right-0">
                    <button @click="closeDelete" type="button" as="button"
                        class="bg-gray-300 hover:bg-gray-500 hover:text-white focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3">
                        Cancel
                    </button>
                    <Link method="delete" :href="route('admin.schools.delete', { id: school.id })" type="button" as="button" @click="closeDelete"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-3 mb-3">
                    Yes, delete
                    </Link>
                </div>
            </div>
        </template>
    </Modal>
</template>

<script setup>
import Error from '@/Components/Error.vue'
import { Modal } from 'flowbite-vue';
import { defineEmits } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3'

const emit = defineEmits(['closeModal'])

const closeDelete = () => {
    emit('closeDelete')
}

const props = defineProps({
    school: Object,
})
</script>