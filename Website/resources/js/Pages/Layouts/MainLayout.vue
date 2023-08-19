<template>
    <slot>Default</slot>
    <div
        class="absolute top-0 left-0 flex flex-col items-start h-full py-4 bg-white w-80"
    >
        <div
            class="flex flex-col items-start flex-none order-none w-full h-2 p-0 gap-11 grow-0"
        >
            <!--Website Title-->
            <div
                class="flex flex-col justify-center w-full gap-5 px-0 h-28 align-center"
            >
                <div
                    class="flex w-full h-full gap-3 p-2 flex-direction-row align-items-center"
                >
                    <img src="" alt="" />
                    <h1
                        class="text-xl font-inter font-semibold text-[#324054] flex flex-col justify-center align-center px-4 py-2 w-96 h-6"
                    >
                        SLU Dental Clinic
                    </h1>
                </div>
            </div>
            <!--Navside Options-->
            <div
                class="flex flex-col items-start w-80 h-80 flex-none order-1 self-stretch grow-0 p-0;"
            >
                <!--Dashboard Link-->
                <div
                    class="flex flex-col justify-center items-start w-80 h-14 flex-none order-none self-stretch grow-0 px-2 py-0 hover:bg-[#EFF6FF] focus:bg-[#EFF6FF]"
                >
                    <div
                        class="box-border flex flex-row items-center self-stretch justify-center flex-none order-none gap-4 p-3 rounded w-80 h-11 grow-0"
                    >
                        <img src="" alt="" />
                        <Link
                            class="w-60 h-5 not-italic font-medium text-base leading-5 hover:text-[#2D68FE] focus:text-[#2D68FE] flex-none order-1 grow font-sans"
                            href="/"
                            >Dashboard</Link
                        >
                    </div>
                </div>
                <!--Patient Records Link-->
                <div
                    class="flex flex-col justify-center items-start w-80 h-14 flex-none order-1 self-stretch grow-0 px-2 py-0 focus:bg-[#EFF6FF] hover:bg-[#EFF6FF]"
                >
                    <div
                        class="box-border flex flex-row items-center self-stretch justify-center flex-none order-none gap-4 p-3 rounded w-80 h-11 grow-0"
                    >
                        <img src="" alt="" />
                        <Link
                            class="w-52 h-5 not-italic font-medium text-base leading-5 text-[#324054] flex-none order-1 grow hover:text-[#2D68FE] focus:text-[#2D68FE]"
                            href="/patient"
                            >Patient Records</Link
                        >
                    </div>
                </div>
                <!--Appointments Link-->
                <div
                    class="flex flex-col justify-center items-start w-80 h-14 flex-none order-1 self-stretch grow-0 px-2 py-0 focus:bg-[#EFF6FF] hover:bg-[#EFF6FF]"
                >
                    <div
                        class="box-border flex flex-row items-center self-stretch justify-center flex-none order-none gap-4 p-3 rounded w-80 h-11 grow-0"
                    >
                        <img src="" alt="" />
                        <Link
                            class="w-52 h-5 not-italic font-medium text-base leading-5 text-[#324054] flex-none order-1 grow hover:text-[#2D68FE] focus:text-[#2D68FE]"
                            href=""
                            >Appointments</Link
                        >
                    </div>
                </div>
                <!--Reports Link-->
                <div
                    class="flex flex-col justify-center items-start w-80 h-14 flex-none order-1 self-stretch grow-0 px-2 py-0 focus:bg-[#EFF6FF] hover:bg-[#EFF6FF]"
                >
                    <div
                        class="box-border flex flex-row items-center self-stretch justify-center flex-none order-none gap-4 p-3 rounded w-80 h-11 grow-0"
                    >
                        <img src="" alt="" />
                        <Link
                            class="w-52 h-5 not-italic font-medium text-base leading-5 text-[#324054] flex-none order-1 grow hover:text-[#2D68FE] focus:text-[#2D68FE]"
                            href=""
                            >Reports</Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
