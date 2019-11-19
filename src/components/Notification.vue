<template>
    <div class="w-full flex flex-wrap relative justify-start">
        <slide-y-up-transition :duration="700" :delay="300">
            <div v-if="show" @click="click" class="cursor-pointer top-0 rounded fixed py-2 px-4 ml-6 mt-20" :class="color">
                <p class="text-sm font-semibold">{{msg}} <i :class="icon+' ml-2 text-white'"></i></p>
            </div>
        </slide-y-up-transition>
    </div>
</template>

<script>
import { SlideYUpTransition } from 'vue2-transitions';

export default {
    components: {
        SlideYUpTransition
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
        },
        change:{
            required: false,
            default: 'false'
        }
    },
    methods: {
        click(){
            if(this.show){
                this.show = false;
            }
        },
        refresh(){
            console.log("refresh");
            this.show = true;
            setTimeout(()=>{
                this.show = false;
            },this.timeout);
        }
    },
    created() {
        this.show = true;
        setTimeout(()=>{
            this.show = false;
        },this.timeout);
    },
    watch:{
        change(){
            this.refresh();
        }
    }
}
</script>