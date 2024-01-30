<template>
    <MainLayout>
        <template v-slot:mainContent>

            <div class="flex flex-col">
                <div class="absolute rounded top-16 left-64">
                    <section v-if="notifications.length" class="text-gray-700">
                        <div v-for="notification in notifications" :key="notification.id"
                            class="flex items-center justify-between py-4 border-b border-gray-200">
                            <div
                                class="relative h-full w-full desktop:top-16 laptop:top-10 left-5 bg-[#ffffff] rounded-xl drop-shadow-lg">
                                <div class="relative flex flex-col gap-4 px-5 py-4">

                                    <span v-if="notification.type === 'App\\Notifications\\AppointmentBooked'">
                                        You have been booked for {{ notification.data.app_type }}
                                        on {{ formatDate(notification.data.app_date) }} {{
                                            formatTime(notification.data.app_time)
                                        }}.
                                        <br> Please come to the clinic 15 mins before your appointment.
                                    </span>
                                    <span v-if="notification.type === 'App\\Notifications\\AppointmentUpdatedStatus'">
                                        Your appointment for {{ notification.data.app_type }}
                                        on {{ formatDate(notification.data.app_date) }} {{
                                            formatTime(notification.data.app_time)
                                        }} is now {{ notification.data.status }}.
                                        <br> Please come to the clinic 15 mins before your appointment.
                                    </span>
                                    <span v-if="notification.type === 'App\\Notifications\\AppointmentUpdated'">
                                        Your appointment for {{ notification.data.app_type }} has been updated, it is now on {{ formatDate(notification.data.app_date) }} {{ formatTime(notification.data.app_time) }}.
                                        <br>Please come to the clinic 15 mins before your appointment.
                                    </span>
                                    <div>
                                        <Link :href="route('patient.appointments.show', notification.data.app_id)"
                                            v-if="!notification.read_at" class="text-xs font-medium uppercase">
                                        More Info
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Pages/Layouts/MainLayout.vue"
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    notifications: {
        type: Object,
        required: true,
    }
})

const formatDate = (date) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = new Date(date).toLocaleDateString(undefined, options);
    return formattedDate;
}

const formatTime = (time) => {
    const [hours, minutes] = time.split(':');
    const period = hours >= 12 ? 'PM' : 'AM';
    const formattedHours = hours % 12 || 12;
    const formattedTime = `${formattedHours}:${minutes} ${period}`;
    return formattedTime;
}
</script>
