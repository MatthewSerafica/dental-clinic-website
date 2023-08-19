<template>
    <div class="absolute w-full h-full top-0 bg-[#f1f2f2]">
        <!--Header-->
        <header class="absolute top-0 w-full h-20 bg-white">
            <!--Search bar-->
            <div
                class="box-border absolute flex flex-row items-center w-[528px] p-2 border-slate-400 gap-36 h-9 left-96 top-6"
            >
                <input
                    class="block bg-white w-full h-8 placeholder:text-xs border pb-3 border-slate-300 rounded-md shadow-sm focus:outline-none focus:border-[#EFF6FF] focus:ring-sky-500 focus:ring-1 sm:text-sm"
                    placeholder="Search ID number or patient name"
                    type="text"
                />
                <img src="" alt="" />
            </div>
            <!--Account-->
            <div
                class="flex flex-row justify-center items-center gap-2.5 absolute w-28 h-9 p-1 right-16 top-5"
            >
                <div
                    class="flex flex-col items-start self-stretch justify-center flex-none order-none w-16 p-0 h-9 grow-0"
                >
                    <p
                        class="w-16 h-6 not-italic font-medium text-sm leading-6 tracking-0.5 text-[#212121] flex-none order-none grow-0 mx-0"
                    >
                        John Doe
                    </p>
                    <p
                        class="w-11 h-5 not-italic font-light text-xs leading-4 text-[#212121] flex-none order-1 grow-0"
                    >
                        Dentist
                    </p>
                </div>
                <img src="" alt="" />
            </div>
        </header>
        <!--Content---->
        <div
            class="absolute flex flex-col items-start p-0 w-60 h-14 left-96 top-28"
        >
            <p
                class="w-60 h-8 font-semibold text-xl leading-8 text-[#212121] flex-none order-none grow-0"
            >
                Welcome, Dr. John Doe
            </p>
            <p
                class="w-36 h-7 font-normal text-lg leading-7 text-[#212121] flex-none order-1 grow-0"
            >
                Have a nice day!
            </p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    message: String,
});
</script>
