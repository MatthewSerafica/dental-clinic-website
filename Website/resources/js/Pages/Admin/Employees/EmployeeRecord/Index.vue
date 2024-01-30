<script setup>
import moment from "moment"
import "moment-timezone"


const formatDate = (date) => {
    return date ? moment(date).format('DD-MM-YYYY') : ''
}

const props = defineProps({
    employee: {
        type: Object,
        default: () => ({}),
    },

})
</script>

<template>
    <!--Employee Details-->
    <div class="relative">
        <div class="relative ml-6 mr-6">
            <div class="flex flex-col justify-between">
                <div class="flex flex-row gap-36 max-sm:flex-col max-sm:gap-0">
                    <div>
                        <!-- <h2 class="text-base font-semibold text-gray-500">Name</h2> -->
                        <h1 class="text-4xl font-bold text-gray-800 max-sm:text-2xl w-[400px] uppercase ">
                            {{ employee.last_name }}, 
                        </h1>
                        <h1 class="text-4xl font-bold text-gray-800 max-sm:text-2xl w-[400px] ">
                            {{ employee.first_name }}, {{ employee.middle_name }}
                        </h1>
                        <div class="max-sm:flex max-sm:flex-row max-sm:justify-between">
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;ID:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.id_number }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;DEPARTMENT:&nbsp;
                                </p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.department }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;EMP. TYPE:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ employee.employee_type }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between gap-36 max-sm:gap-0 left-[-50px] relative">
                        <div class="justify-between max-sm:flex max-sm:flex-col">
                            <div class="flex flex-row items-center relative w-[300px]">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;DATE OF
                                    BIRTH:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ formatDate(employee.birth_date) }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;AGE:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.age }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;SEX:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ employee.sex }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;CIVIL STATUS:&nbsp;
                                </p>
                                <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ employee.civil_status }}</h2>
                            </div>
                        </div>
                        <div class="max-sm:flex max-sm:flex-col">
                            <div class="flex flex-row items-center w-[500px]">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;ADDRESS:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.address }}</h2>
                            </div>
                            <div class="max-sm:flex max-sm:flex-col max-sm:justify-between">
                                <div class="flex flex-row items-center">
                                    <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                    <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;CONTACT
                                        NUMBER:&nbsp;</p>
                                    <h2 class="text-lg font-semibold text-gray-800">{{ employee.contact_number }}</h2>
                                </div>
                                <div class="flex flex-row items-center">
                                    <p class="text-base font-medium text-left text-gray-600 md:hidden">:&nbsp;</p>
                                    <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;E-MAIL
                                        ADDRESS:&nbsp;</p>
                                    <h2 class="text-lg font-semibold text-gray-800">{{ employee.user.email }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>