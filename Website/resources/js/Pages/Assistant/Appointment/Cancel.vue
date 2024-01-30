<template>
    <Modal size="lg" @close="closeCancel">
        <template #header>
            <div class="items-center px-4">
                <h1 class="text-xl font-semibold text-gray-700 ">
                    Cancel Appointment
                </h1>
            </div>
        </template>
        <template #body>
            <form submit.prevent="cancel">
                <div class="items-center justify-center w-full h-full text-center">
                    <div class="flex flex-col gap-4">
                        <Error class="relative w-20 h-20 left-44"></Error>
                        <div>
                            <p>Are you sure you want to cancel this appointment?</p>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-left" for="" required>Reason<span class="text-red-700">*</span></label>
                            <input v-model="cancel.reason" class="rounded-lg" type="text" />
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template #footer>
            <div class="relative w-full h-8">
                <div class="absolute right-0">
                    <button @click="closeCancel" type="button" as="button"
                        class="bg-gray-300 hover:bg-gray-500 hover:text-white focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3">
                        Cancel
                    </button>
                    <button method="delete" @click="markAsCancelled(appointment),
                        emit('closeCancel')" type="button" as="button"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mr-3 mb-3">
                        Yes, cancel
                    </button>
                </div>
            </div>
        </template>
    </Modal>
</template>

<script setup>
import Error from '@/Components/Error.vue';
import { useForm } from '@inertiajs/vue3';
import { Modal } from 'flowbite-vue';
import { defineEmits } from 'vue';

const emit = defineEmits(['closeCancel'])

const closeCancel = () => {
    emit('closeCancel')
}

const props = defineProps({
    appointment: Object,
})

const cancel = useForm({
    status: 'cancelled',
    reason: '',
    made_appointment: 0,
})

function markAsCancelled(appointment) {
    cancel.put(route('assistant.appointment.update', appointment.app_id))
}

</script>