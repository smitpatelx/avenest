<template>
    <div>
        <div class="w-auto inline-flex justify-start items-start select-none">
            <a @click="like" class="cursor-pointer focus:outline-none select-none mt-1 transition-1" :class="isLiked ? 'text-red-600' : 'text-gray-600'">
                <i class="fas fa-heart fa-lg select-none"></i>
            </a>
        </div>
        <notifications :group="post" :classes="notify_color" position="bottom left"/>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    components:{
        
    },
    data(){
        return {
            isLiked: null,
            notify_color: ''
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
        },
        liked:{
            type: String,
            required: true
        }
    },
    methods: {
        like(){
            this.isLiked = !this.isLiked;
            
            var bodyFormData = new FormData();
            bodyFormData.append('post_id', this.post); 
            bodyFormData.append('user_id', this.user); 
            bodyFormData.append('liked', this.isLiked); 

            axios({
                method: 'post',
                url: './api/like.php',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data' }
            }).then((data)=>{
                if(this.isLiked){
                    this.notify_color = "success vue-notification";
                    var tt = "Success Liking PostId:"+this.post;
                    this.$notify({
                        group: this.post,
                        title: 'Success!',
                        text: tt
                    });
                } else {
                    this.notify_color = "success vue-notification";
                    var tt = "Success Disliking PostId:"+this.post;
                    this.$notify({
                        group: this.post,
                        title: 'Success!',
                        text: tt
                    });
                }
                
            }).catch((err)=>{
                if(this.isLiked){
                    this.notify_color = "error vue-notification";
                    this.$notify({
                        group: this.post,
                        title: 'Success!',
                        text: "Error Liking PostId:"+err
                    });
                } else {
                    this.notify_color = "error vue-notification";
                    this.$notify({
                        group: this.post,
                        title: 'Success!',
                        text: "Error Disliking PostId:"+err
                    });
                }
            });

        }
    },
    mounted(){
        this.isLiked= (this.liked==='true');
        var isTrueSet = (this.liked==='true');
        console.log(isTrueSet);
    }
}
</script>

<style lang='scss'>
.transition-1{
    transition:all 1s;
}
</style>