<script setup>

const props = defineProps({
    student: {
        type: Object,
        default: () => ({}),
    },
})

</script>
 
<template>
    <!--Student Details-->
    <div class="relative">
        <div class="relative ml-6 mr-6">
            <div class="flex flex-col justify-between">
                <div class="flex flex-row gap-36 max-sm:flex-col max-sm:gap-0">
                    <div>
                        <!-- <h2 class="text-base font-semibold text-gray-500">Name</h2> -->
                        <h1 class="text-4xl font-bold text-gray-800 max-sm:text-2xl">
                            <label class="uppercase">{{ student.last_name }}</label>, {{ student.first_name }} {{ student.middle_name }}
                        </h1>
                        <div class="max-sm:flex max-sm:flex-row max-sm:justify-between">
                            <div class="flex flex-row items-center">
                                <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;ID:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ student.id_number }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;SCHOOL:&nbsp;
                                </p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ student.school }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;COURSE and
                                    YEAR:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ student.course }}-{{ student.year }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between gap-36 max-sm:gap-0">
                        <div class="max-sm:flex max-sm:flex-col justify-between">
                            <div class="flex flex-row items-center">
                                <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;DATE OF
                                    BIRTH:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ student.birth_date }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;AGE:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ student.age }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;SEX:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ student.sex }}</h2>
                            </div>
                            <div class="flex flex-row items-center">
                                <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;CIVIL STATUS:&nbsp;
                                </p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ student.civil_status }}</h2>
                            </div>
                        </div>
                        <div class="max-sm:flex max-sm:flex-col">
                            <div class="flex flex-row items-center">
                                <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;ADDRESS:&nbsp;</p>
                                <h2 class="text-lg font-semibold text-gray-800">{{ student.address }}</h2>
                            </div>
                            <div class="max-sm:flex max-sm:flex-col max-sm:justify-between">
                                <div class="flex flex-row items-center">
                                    <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                    <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;CONTACT
                                        NUMBER:&nbsp;</p>
                                    <h2 class="text-lg font-semibold text-gray-800">{{ student.contact_number }}</h2>
                                </div>
                                <div class="flex flex-row items-center">
                                    <p class="text-left font-medium text-base text-gray-600 md:hidden">:&nbsp;</p>
                                    <p class="text-left font-medium text-base text-gray-600 max-sm:hidden">&nbsp;E-MAIL
                                        ADDRESS:&nbsp;</p>
                                    <h2 class="text-lg font-semibold text-gray-800">{{ student.id_number }}@slu.edu.ph</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

