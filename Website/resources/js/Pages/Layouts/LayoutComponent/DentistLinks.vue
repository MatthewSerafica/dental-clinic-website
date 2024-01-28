<template>
  <ul class="flex flex-col w-full">
    <SideBarLinks :link="links[0].url" :text="links[0].text" :vueIcon="links[0].vueIcon"/>

    <li class="my-px">
      <span class="flex px-4 my-4 text-sm font-medium text-gray-100 uppercase max-md:hidden">Patients</span>
    </li>

    <SideBarLinks :link="links[1].url" :text="links[1].text" :vueIcon="links[1].vueIcon" />

    <SideBarLinks :link="links[2].url" :text="links[2].text" :vueIcon="links[2].vueIcon" />

    <li class="my-px">
      <span class="flex px-4 my-4 text-sm font-medium text-gray-100 uppercase max-md:hidden">Appointment</span>
    </li>

    <SideBarLinks :link="links[3].url" :text="links[3].text" :vueIcon="links[3].vueIcon" />

    <SideBarLinks :link="links[4].url" :text="links[4].text" :vueIcon="links[4].vueIcon" />

    <li class="my-px">
      <span class="flex px-4 my-4 text-sm font-medium text-gray-100 uppercase max-md:hidden">Settings</span>
    </li>

    <SideBarLinks :link="links[5].url" :text="links[5].text" :vueIcon="links[5].vueIcon" />

    <SideBarLinks :link="links[6].url" :text="links[6].text" :vueIcon="links[6].vueIcon" />


  </ul>
</template>

<script setup>
import SideBarLinks from "@/Pages/Layouts/LayoutComponent/SideBarLinks.vue";
import appointmenticon from "@/Components/AppointmentIcon.vue";
import reporticon from "@/Components/ReportIcon.vue";
import dashboard from "@/Components/DashboardIcon.vue";
import patientIcon from "@/Components/PatientIcon.vue";
import UsersIcon from "@/Components/UsersIcon.vue";

const links = [
  { url: "/", text: "Dashboard", vueIcon: dashboard },
  { url: "/student", text: "Students", vueIcon: patientIcon },
  { url: "/employee", text: "Employees", vueIcon: patientIcon },
  { url: "/appointment", text: "Appointments", vueIcon: appointmenticon },
  { url: "/report", text: "Reports", vueIcon: reporticon },
  { url: "/availability", text: "Availability", vueIcon: reporticon },
  { url: "/profile", text: "Profile", vueIcon: UsersIcon },
];


</script>

