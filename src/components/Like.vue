<template>
    <div class="w-auto inline-flex justify-start items-start">
        <a @click="like" class="cursor-pointer mt-1" :class="isLiked ? 'text-red-600' : 'text-gray-600'">
            <slide-y-down-transition :duration="700" >
                <i class="fas fa-heart fa-lg"></i>
            </slide-y-down-transition>
        </a>
    </div>
</template>

<script>
import { SlideYDownTransition } from 'vue2-transitions';
export default {
    components:{
        SlideYDownTransition
    },
    data(){
        return {
            isLiked: false,
        }
    },
    props:{
        user:{
            type: Number,
            required: true
        },
        post:{
            type: Number,
            required: true
        }
    },
    methods: {
        like(){
            this.isLiked = !this.isLiked;
        }
    },
    computed:{
        color(){
            if(this.isLiked){
                return 'bg-green-600 text-white';
            }else{
                return 'bg-red-600 text-white';
            }
        }
    },
}
</script>