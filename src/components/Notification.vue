<template>
    <div class="w-full flex flex-wrap relative justify-start">
        <slide-y-down-transition :duration="700">
            <div v-if="show" @click="click" class="cursor-pointer top-0 rounded fixed py-2 px-4 ml-6 mt-20" :class="color">
                <p class="text-sm font-semibold">{{msg}} <i :class="icon+' ml-2 text-white'"></i></p>
            </div>
        </slide-y-down-transition>
    </div>
</template>

<script>
import { SlideYDownTransition } from 'vue2-transitions';

export default {
    components: {
        SlideYDownTransition
    },
    data(){
        return{
            show: false
        }
    },
    props:{
        msg:{
            type: String,
            required: true
        },
        icon:{
            type: String,
            required: false
        },
        timeout:{
            type: Number,
            required: true
        },
        color:{
            type: String,
            required: false,
            default: 'bg-primary-500 text-white'
        }
    },
    methods: {
        click(){
            if(this.show){
                this.show = false;
            }
        }
    },
    mounted(){
        this.show = true;
        setTimeout(()=>{
            this.show = false;
        },this.timeout);
    }
}
</script>