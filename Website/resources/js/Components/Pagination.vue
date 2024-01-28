<template>
  <div class="flex gap-1">
    <template v-for="(link, index) in links">
      <Link v-if="link.url !== undefined && link.url !== null" :key="index"
        class="flex items-center justify-center h-8 px-3 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-800 hover:text-blue-100"
        :href="link.url" :class="{ 'bg-blue-800 text-gray-300': link.active }" v-html="getLabel(link)">
      </Link>
    </template>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps(['links']);

const getLabel = (link) => {
  if (link.label.includes('Next')) {
    return '>';
  } else if (link.label.includes('Previous')) {
    return '<';
  } else {
    return link.label;
  }
};

</script>
