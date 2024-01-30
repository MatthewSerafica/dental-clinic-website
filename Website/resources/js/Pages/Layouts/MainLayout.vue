<script setup>
import SideBar from '@/Pages/Layouts/LayoutComponent/SideBar.vue'
import Header from '@/Pages/Layouts/LayoutComponent/Header.vue'
import SideBarMobile from '@/Pages/Layouts/LayoutComponent/SideBarMobileView.vue'
import { watch, ref } from 'vue';


let toggled= ref(false)

const isToggled = (value) => {
  toggled.value = value
}

</script>

<template>
<div class="flex flex-col h-screen">
    <div class="flex flex-grow bg-gray-200">
      <SideBar class="fixed z-10"></SideBar>
      <div class="flex flex-col flex-grow transition-all duration-150 ease-in md:ml-0">
        <Header class="fixed" @isClicked="isToggled"></Header>
        <SideBarMobile class="fixed z-10" :toggled="toggled"></SideBarMobile>
        <main class="flex flex-col flex-grow p-4 md:ml-64 main-content max-sm:ml-0">
          <!-- Add Content -->
          <slot name="mainContent">
          </slot>
        </main>
      </div>
    </div>
  </div>
</template>
