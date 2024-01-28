<template>
    <div class="flex flex-col items-center">
      <div class="flex items-center ml-[-50px]">
        <SLULogo class="w-12 h-12 mr-3"></SLULogo>
        <div>
          <h2 class="text-lg font-medium text-gray-500 title-font">Saint Louis University</h2>
          <h2 class="px-8 text-lg font-medium text-gray-500 title-font">Dental Clinic</h2>
        </div>
      </div>
      <div class="relative top-[10px] flex flex-col gap-10 items-center">
        <div class="mb-[-7em]">
          <h2 class="text-lg font-medium text-black title-font">DENTAL CERTIFICATE</h2>
        </div>
      </div>
      <br>
      <br>
      <div class="text-left"> <!-- Align the following content to the left -->
        <h2 class="text-lg font-medium text-black title-font">Date: <label class="underline">{{ formattedDate }}</label></h2>
        <br>
        <p>This is to certify that <label class="font-medium underline">{{ employee.first_name }} {{ employee.middle_name }} {{ employee.last_name }} </label> had undergone dental examination as a requirement for the purpose stated below:</p>
        <br>
        <div class="grid grid-cols-2 sm:grid-cols-2 w-full">
          <div>
            <input type="checkbox" id="employment" name="employment" value="Employment">
            <label for="employment"> Employment</label><br>
  
            <input type="checkbox" id="consultation" name="consultation" value="Consultation">
            <label for="consultation"> Consultation</label><br>
  
            <input type="checkbox" id="enrolment" name="enrolment" value="Enrolment">
            <label for="enrolment"> Enrolment</label><br>
          </div>
          <div>
            <input type="checkbox" id="excuseSlip" name="excuseSlip" value="Excuse Slip">
            <label for="excuseSlip"> Excuse Slip</label><br>
  
            <input type="checkbox" id="annualCheckup" name="annualCheckup" value="Annual Check-up">
            <label for="annualCheckup"> Annual Check-up</label><br>
  
            <input type="checkbox" id="others" name="others" value="Others">
            <label for="others"> Others: </label>
            <input type="text" id="othersText" name="othersText" placeholder="">
          </div>
        </div>
  
        <div class="text-left ml-5 mt-[2em]">
          <h2 class="text-lg font-medium text-black title-font">REMARKS AND RECOMMENDATIONS:</h2> 
        </div>
  
        <div class="text-left ml-5 mt-6">
          <input
      type="textarea"
      class="mt-1 p- block w-full rounded-md border border-transparent focus:outline-none focus:ring-0"
      placeholder="Enter text here"
    >
        </div>
        <br>
        <div class="float-left ml-5 mt-[2em] relative">
    
          <div class="border-b-[black] border-b border-solid w-[11em]"></div>
          <h1 class="text-[large] font-medium">University Dentist</h1>
        </div>
        <br>
      </div>
    </div>
  </template>


<script setup>
import SLULogo from '@/Components/SLULogo.vue';
const props = defineProps({
    employee: Object,
})
const currentDate = new Date()


const formattedDate = currentDate.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'

});
</script> 