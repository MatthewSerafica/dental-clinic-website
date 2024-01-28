
<template>
    <div class="relative">
        <div class="relative flex items-center w-85 left-6">
            <h1 class="text-2xl font-bold text-gray-700 border-b-2 border-gray-200 max-sm:text-xl">ORAL HEALTH CONDITION</h1>
        </div>

        <div class="flex items-center">
            <form @submit.prevent="save">
                <div class="relative top-2 left-7">
                    <div class="flex">
                        <h1> Presence of Debris: </h1>
                        <div class="flex relative left-[108px]">
                            <div class="flex items-center gap-2 mr-4 ">
                                <input v-model="ohcForm.debris_tooth_stain" type="radio" value='none'
                                    :checked="ohcForm.debris_tooth_stain == 'none'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">0
                                    (None)</label>
                                <input v-model="ohcForm.debris_tooth_stain" type="radio" value='trace'
                                    :checked="ohcForm.debris_tooth_stain == 'trace'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">1
                                    (Trace)</label>
                                <input v-model="ohcForm.debris_tooth_stain" type="radio" value="slight"
                                    :checked="ohcForm.debris_tooth_stain == 'slight'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">2
                                    (Slight)</label>
                                <input v-model="ohcForm.debris_tooth_stain" type="radio" value="moderate"
                                    :checked="ohcForm.debris_tooth_stain == 'moderate'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">3
                                    (Moderate)</label>
                                <input v-model="ohcForm.debris_tooth_stain" type="radio" value="heavy"
                                    :checked="ohcForm.debris_tooth_stain == 'heavy'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4
                                    (Heavy)</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex ">
                        <h1> Presence of Calcular Deposits: </h1>
                        <div class="flex relative left-[2rem]">
                            <div class="flex items-center gap-2 mr-4 ">
                                <input v-model="ohcForm.calcular_deposits" type="radio" value='none'
                                    :checked="ohcForm.calcular_deposits == 'none'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">0
                                    (None)</label>
                                <input v-model="ohcForm.calcular_deposits" type="radio" value='trace'
                                    :checked="ohcForm.calcular_deposits == 'trace'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">1
                                    (Trace)</label>
                                <input v-model="ohcForm.calcular_deposits" type="radio" value="slight"
                                    :checked="ohcForm.calcular_deposits == 'slight'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">2
                                    (Slight)</label>
                                <input v-model="ohcForm.calcular_deposits" type="radio" value="moderate"
                                    :checked="ohcForm.calcular_deposits == 'moderate'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">3
                                    (Moderate)</label>
                                <input v-model="ohcForm.calcular_deposits" type="radio" value="heavy"
                                    :checked="ohcForm.calcular_deposits == 'heavy'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4
                                    (Heavy)</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex ">
                        <h1> Presence of Gingivitis: </h1>
                        <div class="flex relative left-[89px] ">
                            <div class="flex items-center gap-2 mr-4">
                                <input v-model="ohcForm.gingivitis" type="radio" value='none'
                                    :checked="ohcForm.gingivitis == 'none'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">0
                                    (None)</label>
                                <input v-model="ohcForm.gingivitis" type="radio" value='trace'
                                    :checked="ohcForm.gingivitis == 'trace'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">1
                                    (Trace)</label>
                                <input v-model="ohcForm.gingivitis" type="radio" value="slight"
                                    :checked="ohcForm.gingivitis == 'slight'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">2
                                    (Slight)</label>
                                <input v-model="ohcForm.gingivitis" type="radio" value="moderate"
                                    :checked="ohcForm.gingivitis == 'moderate'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">3
                                    (Moderate)</label>
                                <input v-model="ohcForm.gingivitis" type="radio" value="heavy"
                                    :checked="ohcForm.gingivitis == 'heavy'"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-blue-600">
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4
                                    (Heavy)</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex ">
                        <h1> Presence of Periodontal Pocket/s: </h1>
                        <div class="flex relative left-[0.5rem] ">
                            <div class="flex items-center gap-2 mr-4">
                                <input v-model="ohcForm.periodontal_pocket" type="radio" value='0'
                                    :checked="ohcForm.periodontal_pocket == 0"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600" />
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                                <input v-model="ohcForm.periodontal_pocket" type="radio" value='1'
                                    :checked="ohcForm.periodontal_pocket == 1"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600"
                                    checked />
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex ">
                        <h1> Under Orthodontic Treatment: </h1>
                        <div class="flex relative left-[1.9rem] ">
                            <div class="flex items-center gap-2 mr-4">
                                <input v-model="ohcForm.orthodontic_treatment" type="radio" value='0'
                                    :checked="ohcForm.orthodontic_treatment == 0"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600" />
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                                <input v-model="ohcForm.orthodontic_treatment" type="radio" value='1'
                                    :checked="ohcForm.orthodontic_treatment == 1"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-blue-600" />
                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" as="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    exam: {
        type: Object,
        default: () => ({}),
    },
})


const ohcForm = useForm({
    debris_tooth_stain: props.exam.debris_tooth_stain,
    calcular_deposits: props.exam.calcular_deposits,
    gingivitis: props.exam.gingivitis,
    periodontal_pocket: props.exam.periodontal_pocket,
    orthodontic_treatment: props.exam.orthodontic_treatment,
})

const save = () => {
    ohcForm.put(route('admin.ohc.update', props.exam.exam_id), { preserveScroll: false, preserveState: false })
}

</script>
 