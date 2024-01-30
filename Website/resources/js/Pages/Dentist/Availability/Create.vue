<script setup>
import { useForm, usePage, } from '@inertiajs/vue3'
import { Modal } from 'flowbite-vue'
import 'moment-timezone'

const emit = defineEmits()
const page = usePage()

const props = defineProps({
    dentist: Object,
})

const form = useForm({
    dentist_id: props.dentist.dentist_id,
    day: null,
    start_time: null,
    end_time: null,
    time_slot: null,
})

const closeModal = () => {
    emit('closeModal')
}

const create = () => form.post(route('availability.store'), { preserveScroll: false, preserveState: false })
</script>
<template>
    <form @submit.prevent="create">
        <Modal size="3xl" @close="closeModal">
            <template #header>
                <div class="flex items-center text-lg">
                    Add Available Days
                </div>
            </template>

            <template #body>
                <div class="flex items-center gap-4 p-4">      
                    <div class="form-group ">
                        <label for="day">Day</label>
                        <select v-model="form.day" id="day">
                            <option value="">Select a day...</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                    </div>
                    <div>
                        <label for="startTime">Start Time</label>
                        <input type="time" placeholder="start" v-model="form.start_time" />
                    </div>
                    <div>
                        <label for="startTime">End Time</label>
                        <input type="time" placeholder="start" v-model="form.end_time" />
                    </div>
                    <div class="form-group ">
                        <label for="day">Time Slot (in minutes)</label>
                        <select v-model="form.time_slot" id="day">
                            <option value="">Select a time slot...</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
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