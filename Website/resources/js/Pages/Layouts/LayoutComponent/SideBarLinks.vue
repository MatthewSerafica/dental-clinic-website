<template>
    <li class="my-px">
        <a :href="link"
            class="group flex flex-row items-center h-10 px-3 rounded-lg text-gray-100 hover:bg-gray-100 hover:text-black"
            :class="{ 'bg-gray-100': isActive }">
            <span class="flex items-center justify-center text-lg text-gray-100">
                <component :is="vueIcon" class="w-6 h-6  group-hover:stroke-black"
                    :class="[isActive ? 'stroke-black' : 'stroke-gray-100']" />
            </span>
            <span class="ml-3 max-md:hidden" :class="{ 'text-black': isActive }">{{ text }}</span>
        </a>
    </li>
</template>

<script setup>
import { defineProps, computed } from 'vue';
const { link, text, vueIcon } = defineProps(['link', 'text', 'vueIcon']);
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const user_type = page.props.user.user_type

const isActive = computed(() => {
    if (user_type === "dentist") {
        if (link.split("/")[1].length > 1) {
            return window.location.pathname.split("/")[1].includes(link.split("/")[1]);
        }
    }else if (user_type === "admin") {
        console.log(window.location.pathname)
        if (link.split("admin")[1].length > 1) {
            return window.location.pathname.split("/admin")[1].includes(link.split("/admin")[1]);
        }
    }
    return window.location.pathname === link;
});
</script>