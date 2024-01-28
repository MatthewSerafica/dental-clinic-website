<template>
    <aside
      class="fixed w-64 h-full  -translate-x-full bg-indigo-500 md:shadow md:translate-x-0 max-md:translate-x-0 max-md:w-20"
      :class="{ 'hidden ': !toggled }"
      >
      <div class="flex items-center justify-center py-4 sidebar-header">
        <div class="flex flex-1">
          <a href="#" class="inline-flex flex-row items-center">
            <div class="flex flex-row items-center">
              <sludental class="w-20 h-20 max-md:w-13 max-md:h-13" />
              <h1 class="text-xl font-semibold text-white max-md:hidden">
                SLU Dental Clinic
              </h1>
            </div>
          </a>
        </div>
      </div>
  
      <div class="px-4 py-6 sidebar-content" v-if="user_type === 'dentist'">
        <DentistLinks></DentistLinks>
      </div>
      <div class="px-4 py-6 sidebar-content" v-if="user_type === 'assistant'">
        <AssistantLinks></AssistantLinks>
      </div>
      <div class="px-4 py-6 sidebar-content" v-if="user_type === 'admin'">
        <AdminLinks></AdminLinks>
      </div>
  
      <div class="px-4 py-6 sidebar-content" v-if="user_type === 'student' || user_type === 'employee'">
        <PatientLinks></PatientLinks>
      </div>
  
    </aside>
  </template>
  
  <script setup>
  import sludental from "@/Components/SluDentalLogo.vue";
  import DentistLinks from "@/Pages/Layouts/LayoutComponent/DentistLinks.vue";
  import PatientLinks from "@/Pages/Layouts/LayoutComponent/PatientLinks.vue";
  import { usePage } from '@inertiajs/vue3'
  import AssistantLinks from "@/Pages/Layouts/LayoutComponent/AssistantLinks.vue";
  import AdminLinks from "@/Pages/Layouts/LayoutComponent/AdminLinks.vue";
  import { ref, watch } from 'vue'

  const page = usePage()
  const user_type = page.props.user.user_type

  const props = defineProps({
  toggled: Boolean
})

  </script>
  