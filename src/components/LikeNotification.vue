<template>
    <div class="w-auto flex flex-wrap justify-start items-center">
        <slide-x-left-transition :duration="700">
            <div v-if="show" @click="click" class="z-20 absolute top-0 right-0 cursor-pointer rounded py-1 px-2 mr-1 inline-flex items-center" :class="color">
                <p class="text-sm font-normal">{{msg}}</p>
                <i v-if="icon" :class="icon ? icon : ''"  class="ml-2 text-white"></i>
            </div>
        </slide-x-left-transition>
    </div>
</template>

<script>
import { SlideXLeftTransition } from 'vue2-transitions';

export default {
    components: {
        SlideXLeftTransition
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
            required: false
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
            } else{
                this.show = true;
            }
        }
    },
    mounted(){
        this.show = true;
        if(typeof this.timeout != 'undefined') {
            setTimeout(()=>{
                this.show = false;
            }, this.timeout);
        }
    }
}
</script>