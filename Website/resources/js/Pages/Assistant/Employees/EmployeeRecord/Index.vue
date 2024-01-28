<template>
    <!--Employee Details-->
    <div class="relative">
        <div class="relative ml-6 mr-6">
            <div class="flex flex-col justify-between">
                <div class="flex flex-row gap-36 max-sm:flex-col max-sm:gap-0">
                    <div>
                        <!-- <h2 class="text-base font-semibold text-gray-500">Name</h2> -->
                        <h1 class="text-4xl font-bold text-gray-800 max-sm:text-2xl relative w-[350px]">
                            <label class="uppercase">{{ employee.last_name }}</label>, {{ employee.first_name }}, {{ employee.middle_name }}
                        </h1>
                        <div class="max-sm:flex max-sm:flex-row max-sm:justify-between">
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">ID:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.id_number }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">
                                    DEPARTMENT:&nbsp;
                                </p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.department }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between gap-36 max-sm:gap-0 relative ">
                        <div class="max-sm:flex max-sm:flex-col justify-between w-[500px]">
                            <div class="flex flex-row items-center relative left-1">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden"> </p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">EMP.
                                    TYPE:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ employee.employee_type }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;DATE OF
                                    BIRTH:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.birth_date }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;AGE:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.age }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;SEX:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800 capitalize">{{ employee.sex }}</h2>
                            </div>
                        </div>
                        <div class="max-sm:flex max-sm:flex-col left-[-250px] relative">
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden capitalize">&nbsp;CIVIL
                                    STATUS:&nbsp;
                                </p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.civil_status }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
                                <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;ADDRESS:&nbsp;
                                </p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ employee.address }}</h2>
                            </div>
                            <div class="w-[600px]">
                                <div class="flex flex-row items-center">
                                    <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
                                    <p class="text-base font-medium text-left text-gray-600 max-sm:hidden">&nbsp;CONTACT
                                        NUMBER:&nbsp;</p>
                                    <h2 class="text-lg font-semibold text-gray-800">{{ employee.contact_number }}</h2>
                                </div>
                                <div class="flex flex-row items-center">
                                    <p class="text-base font-medium text-left text-gray-600 md:hidden"></p>
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

<script setup>
const props = defineProps({
    employee: {
        type: Object,
        default: () => ({}),
    },
})
</script>
