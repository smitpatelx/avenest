<template>
    <div class="w-full flex flex-wrap justify-center content-center mt-6">
        <div class="w-auto flex">
            <button :class="showOffensive?'bg-white text-primary-500':'bg-primary-500 text-white'" class="px-3 py-2 font-semibold shadow-xl border-r border-gray-400 rounded-l focus:outline-none focus:shadow-outline" @click="showOffensive=false">Pending Users</button>
            <button :class="showOffensive?'bg-primary-500 text-white':'bg-white text-primary-500'" class="px-3 py-2 font-semibold shadow-xl border-l border-gray-400 rounded-r focus:outline-none focus:shadow-outline ml-1" @click="showOffensive=true">Potentially Offensive</button>
        </div>
        
        <div class="w-full flex flex-wrap justify-center content-center">
            <p class="text-lg text-primary-500 w-full py-2 font-headline font-semibold text-center underline"
                v-html="showOffensive?'Potentially Offensive':'Pending Users'">
                
            </p>
            <fade-transition :duration="500">
                <offensive-manage v-if="showOffensive"></offensive-manage>
                <pending-manage v-else></pending-manage>
            </fade-transition>
        </div>
    </div>
</template>
<script>
import { FadeTransition } from 'vue2-transitions'
import OffensiveManage from './OffensiveManage';
import PendingManage from './PendingManage';
export default {
    components:{
        OffensiveManage,
        PendingManage,
        FadeTransition
    },
    data(){
        return{
            showOffensive: false
        }
    }
}
</script>