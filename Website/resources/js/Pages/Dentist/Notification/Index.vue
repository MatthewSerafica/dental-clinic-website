<script setup>
import MainLayout from "@/Pages/Layouts/MainLayout.vue"
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    notifications: {
        type: Object,
        required: true,
    },
    student: {
        type: Object,
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

<template>
    <div class="flex flex-col h-screen">
        <div class="absolute rounded top-16 left-64">
            <section v-if="notifications.length" class="text-gray-700">
                <div v-for="notification in notifications" :key="notification.id"
                    class="flex items-center justify-between py-4 border-b border-gray-200">
                    <div
                        class="relative h-full w-full desktop:top-16 laptop:top-10 left-5 bg-[#ffffff] rounded-xl drop-shadow-lg">
                        <div class="relative flex flex-col gap-4 px-5 py-4">

                            <span v-if="notification.type === 'App\\Notifications\\AppointmentBooked'">
                                Your patient, {{ student.last_name }}, {{ student.first_name }}, has booked for a {{ notification.data.app_type }} with you
                                on {{ formatDate(notification.data.app_date) }} {{ formatTime(notification.data.app_time)
                                }}.<br> Their appointment is now {{ notification.data.status }}.
                            </span>
                            <span v-if="notification.type === 'App\\Notifications\\AppointmentUpdatedStatus'">
                                Your patient, {{ student.last_name }}, has {{ notification.data.status }} their {{ notification.data.app_type }} appointment with you
                                on {{ formatDate(notification.data.app_date) }} {{ formatTime(notification.data.app_time)
                                }}.
                            </span>
                            <div>
                                <Link :href="route('appointment.index', notification.data.app_id)"
                                    v-if="!notification.read_at" class="text-xs font-medium uppercase">
                                More Info
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <MainLayout></MainLayout>
    </div>
</template>