.pillbox-btn {
    @apply inline-block bg-[#007bff] text-white text-base font-[bold] no-underline transition-[background-color] duration-[0.3s] ease-[ease-in-out] px-5 py-2.5 rounded-[50px] hover:bg-[#0069d9] before:content-["Add_New_Report"] before:mr-2.5;
  }

  <template>



    <!--Report bg-->
    <div class="absolute w-[1550px] h-full left-80 top-20 bg-[#f1f2f2]">
        <div>
            <h1
                class="flex flex-col items-start gap-2 absolute w-[109px] h-[21px] p-0 left-7 top-5 font-medium">
                REPORTS
            </h1>
            <h6 class="absolute text-xs text-gray-400 top-10 left-7">
                Home > Reports
            </h6>

        </div>
       
        <div
            class="flex flex-col items-start absolute w-full h-full p-0 left-5 top-[100px]">
        
            <div class="absolute w-[1500px] h-full left-2 top-[-20px] bg-[#ffffff] rounded">
                <br>
                <div class="">
                    <form class="flex items-center">   
                    
                        <label for="simple-search" class="sr-only">Search</label>
                        
                        
                        <!--Monthly Reports-->
                        <div class="lg:w-[700px] md:w-1/2 bg-gray-400 bg-opacity-50 rounded-lg p-8 flex flex-col w-full mt-10 md:mt-0"> 
                            <h2 class="text-white text-lg font-medium title-font mb-5">Daily Report</h2>
                            <Link :href="`/report/daily`"
                            class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                                📄Generate Report
                            </Link>
                        </div>
                        <div class="lg:w-[700px] md:w-1/2 bg-gray-400 bg-opacity-50 rounded-lg p-8 flex flex-col w-full mt-10 md:mt-0"> 
                            <h2 class="text-white text-lg font-medium title-font mb-5">Monthly Report</h2>
                            <Link :href="`/report/monthly`"
                            class="text-white bg-green-500 border-0 py-2 px-5 focus:outline-none hover:bg-green-600 rounded text-lg">
                                📄Generate Report
                            </Link>
                        </div>

                    </form>
                </div>
                <br>

                <section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap">
    <div class="flex flex-wrap -m-4">
      <div class="p-4 lg:w-1/2 md:w-full">
        <div class="flex border-2 rounded-lg border-gray-800 p-8 sm:flex-row flex-col">
          <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-gray-800 text-red-400 flex-shrink-0">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-white text-lg title-font font-medium mb-3">Shooting Stars</h2>
            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
            <a class="mt-3 text-red-400 inline-flex items-center">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="p-4 lg:w-1/2 md:w-full">
        <div class="flex border-2 rounded-lg border-gray-800 p-8 sm:flex-row flex-col">
          <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-gray-800 text-red-400 flex-shrink-0">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-white text-lg title-font font-medium mb-3">The Catalyzer</h2>
            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
            <a class="mt-3 text-red-400 inline-flex items-center">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


                <!--generate report button-->
                <br>
                <div class="flex items-center">
                    <Link :href="`/report/generate`"
                        class=" relative left-[300px] bg-green-500 hover:bg-green-700 rounded px-5 py-3 flex items-center gap-1 text-white font-medium ">
                        📄Generate Report
                    </Link>
                </div>

            </div>
        </div>
    </div>
    



    
</template>




<script setup>

import { Link } from "@inertiajs/vue3";
defineProps({
    patients: Array,
});
</script>

