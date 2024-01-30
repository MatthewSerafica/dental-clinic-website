<template>
  <aside
    class="fixed w-64 h-full transition-transform duration-150 ease-in transform -translate-x-full bg-indigo-500 md:shadow md:translate-x-0">
    <div class="flex items-center justify-center py-4 sidebar-header laptop:py-0">
      <div class="flex flex-1">
        <a href="#" class="inline-flex flex-row items-center">
          <div class="flex flex-row items-center">
            <sludental class="w-20 h-20" />
            <h1 class="desktop:text-xl laptop:text-lg font-semibold text-white">
              SLU Dental Clinic
            </h1>
          </div>
        </a>
      </div>
    </div>

    <div class="desktop:text-lg laptop:text-sm  laptop:px-4 laptop:py-1 desktop:px-4 desktop:py-6 sidebar-content" v-if="user_type === 'dentist'">
      <DentistLinks></DentistLinks>
    </div>
    <div class="desktop:text-lg laptop:text-sm  laptop:px-4 laptop:py-1 desktop:px-4 desktop:py-6 sidebar-content" v-if="user_type === 'assistant'">
      <AssistantLinks></AssistantLinks>
    </div>
    <div class="desktop:text-lg laptop:text-sm laptop:px-4 laptop:py-1 laptop:scale-[0.95] desktop:px-4 desktop:py-6 sidebar-content" v-if="user_type === 'admin'">
      <AdminLinks></AdminLinks>
    </div>

    <div class="desktop:text-lg laptop:text-sm  laptop:px-4 laptop:py-1 desktop:px-4 desktop:py-6 sidebar-content" v-if="user_type === 'student' || user_type === 'employee'">
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

const page = usePage()
const user_type = page.props.user.user_type

</script>
