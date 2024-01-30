<template>
    <ul class="flex flex-col w-full">
        <SideBarLinks :link="links[0].url" :text="links[0].text" :vueIcon="links[0].vueIcon" />

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
            <span class="flex px-4 my-4 text-sm font-medium text-gray-100 uppercase max-md:hidden">Admin</span>
        </li>

        <SideBarLinks :link="links[5].url" :text="links[5].text" :vueIcon="links[5].vueIcon" />

        <SideBarLinks :link="links[6].url" :text="links[6].text" :vueIcon="links[6].vueIcon" />

        <SideBarLinks :link="links[7].url" :text="links[7].text" :vueIcon="links[7].vueIcon" />

        <SideBarLinks :link="links[8].url" :text="links[8].text" :vueIcon="links[8].vueIcon" />

        <SideBarLinks :link="links[9].url" :text="links[9].text" :vueIcon="links[9].vueIcon" />
        
        <SideBarLinks :link="links[10].url" :text="links[10].text" :vueIcon="links[10].vueIcon" />

    </ul>
</template>

<script setup>
import SideBarLinks from "@/Pages/Layouts/LayoutComponent/SideBarLinks.vue";
import archiveicon from "@/Components/ArchiveIcon.vue"
import appointmenticon from "@/Components/AppointmentIcon.vue";
import usersicon from "@/Components/UsersIcon.vue";
import reporticon from "@/Components/ReportIcon.vue";
import dashboard from "@/Components/DashboardIcon.vue";
import patientIcon from "@/Components/PatientIcon.vue";
import CourseIcon from "@/Components/CourseIcon.vue";
import ServiceIcon from "@/Components/ServiceIcon.vue";
import SchoolIcon from "@/Components/SchoolIcon.vue";
import DepartmentIcon from "@/Components/DepartmentIcon.vue";

const links = [
    { url: "/admin", text: "Dashboard", vueIcon: dashboard },
    { url: "/admin/student", text: "Students", vueIcon: patientIcon },
    { url: "/admin/employee", text: "Employees", vueIcon: patientIcon },
    { url: "/admin/appointment", text: "Appointments", vueIcon: appointmenticon },
    { url: "/admin/report", text: "Reports", vueIcon: reporticon },
    { url: "/admin/users", text: "Users", vueIcon: usersicon },
    { url: "/admin/archives", text: "Archives", vueIcon: archiveicon },
    { url: "/admin/departments", text: "Departments", vueIcon: DepartmentIcon },
    { url: "/admin/schools", text: "Schools", vueIcon: SchoolIcon },
    { url: "/admin/courses", text: "Courses", vueIcon: CourseIcon },
    { url: "/admin/services", text: "Services", vueIcon: ServiceIcon },

];
</script>

