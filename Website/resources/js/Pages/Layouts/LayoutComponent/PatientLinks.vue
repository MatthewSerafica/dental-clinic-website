<template>
    <ul class="flex flex-col w-full">
        <SideBarLinks 
        :link="links[0].url" 
        :text="links[0].text" 
        :vueIcon="links[0].vueIcon" 
        />

        <li class="my-px">
            <span class="flex px-4 my-4 text-sm font-medium text-gray-100 uppercase max-md:hidden">Appointment</span>
        </li>

        <SideBarLinks 
        :link="links[1].url" 
        :text="links[1].text" 
        :vueIcon="links[1].vueIcon" 
        />

        <li class="my-px">
            <span class="flex px-4 my-4 text-sm font-medium text-gray-100 uppercase max-md:hidden">User</span>
        </li>

        <SideBarLinks 
        :link="links[2].url" 
        :text="links[2].text" 
        :vueIcon="links[2].vueIcon" />

        <SideBarLinks 
        :link="links[3].url" 
        :text="links[3].text" 
        :vueIcon="links[3].vueIcon" 
        />
        
      </ul>
</template>

<script setup>
import SideBarLinks from "@/Pages/Layouts/LayoutComponent/SideBarLinks.vue";
import appointmenticon from "@/Components/AppointmentIcon.vue";
import usersicon from "@/Components/UsersIcon.vue";
import reporticon from "@/Components/ReportIcon.vue";
import dashboard from "@/Components/DashboardIcon.vue";
import patientIcon from "@/Components/PatientIcon.vue";

const links = [
  { url: "/patient", text: "Home", vueIcon: dashboard },
  { url: "/patient/appointments", text: "Appointments", vueIcon: appointmenticon },
  { url: "/patient/profile", text: "Record", vueIcon: reporticon },
  { url: "/patient/user", text: "Account", vueIcon: usersicon },
];
</script>

