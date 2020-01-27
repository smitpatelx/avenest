<template>
    <div>
        <div class="w-auto inline-flex justify-start items-start select-none">
            <a @click="like" class="tooltip cursor-pointer focus:outline-none select-none mt-1 transition-1" :class="isLiked ? 'text-red-600' : 'text-gray-600'">
                <svg class="w-6 h-6 inline-block fill-current" viewBox="0 0 20 20"><path d="M10 18.35l-1.45-1.32C3.4 12.36 0 9.28 0 5.5 0 2.42 2.42 0 5.5 0 7.24 0 8.91.81 10 2.09 11.09.81 12.76 0 14.5 0 17.58 0 20 2.42 20 5.5c0 3.78-3.4 6.86-8.55 11.54L10 18.35z"/></svg>
                <span class="tooltiptext font-semibold antialiased">Like</span>
            </a>
            <a @click="add_offensive" class="tooltip ml-4 cursor-pointer focus:outline-none select-none mt-1 transition-1" :class="isOffensive ? 'text-red-600' : 'text-gray-600'">
                <svg class="w-6 h-6 inline-block fill-current" viewBox="0 0 22 22"><path fill-rule="evenodd" d="M22 19L11 0 0 19h22zm-12-3v-2h2v2h-2zm0-4h2V8h-2v4z" clip-rule="evenodd"/></svg>
                <span class="tooltiptext font-semibold antialiased">Report</span>
            </a>
        </div>
        <notifications :group="post+'string'" :classes="notify_color" position="bottom left"/>
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
            notify_color: '',
            isOffensive: null
        }
    },
    props:{
        post:{
            type: Number,
            required: true
        },
        liked:{
            type: String,
            required: true
        },
        offensive:{
            type: String,
            required: true
        },
        status:{
            type: String,
            required: true
        }
    },
    methods: {
        like(){
            this.isLiked = !this.isLiked;
            
            var bodyFormData = new FormData();
            bodyFormData.append('post_id', this.post); 
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
                        group: this.post+'string',
                        title: 'Success!',
                        text: tt
                    });
                } else {
                    this.notify_color = "success vue-notification";
                    var tt = "Success Disliking PostId:"+this.post;
                    this.$notify({
                        group: this.post+'string',
                        title: 'Success!',
                        text: tt
                    });
                }
                
            }).catch((err)=>{
                if(this.isLiked){
                    this.notify_color = "error vue-notification";
                    this.$notify({
                        group: this.post+'string',
                        title: 'Success!',
                        text: "Error Liking PostId:"+err
                    });
                } else {
                    this.notify_color = "error vue-notification";
                    this.$notify({
                        group: this.post+'string',
                        title: 'Success!',
                        text: "Error Disliking PostId:"+err
                    });
                }
            });
        },
        add_offensive(){
            this.isOffensive = !this.isOffensive;
            
            var bodyFormData = new FormData();
            bodyFormData.append('post_id', this.post); 
            bodyFormData.append('isOffensive', this.isOffensive); 
            bodyFormData.append('status', this.status); 

            axios({
                method: 'post',
                url: './api/offensive.php',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data' }
            }).then((data)=>{
                if(this.isOffensive){
                    this.notify_color = "success vue-notification";
                    var tt = "Success Reporting PostId:"+this.post;
                    this.$notify({
                        group: this.post+'string',
                        title: 'Success!',
                        text: tt
                    });
                } else {
                    this.notify_color = "success vue-notification";
                    var tt = "Deleted Report PostId:"+this.post;
                    this.$notify({
                        group: this.post+'string',
                        title: 'Success!',
                        text: tt
                    });
                }
                
            }).catch((err)=>{
                if(this.isOffensive){
                    this.notify_color = "error vue-notification";
                    this.$notify({
                        group: this.post+'string',
                        title: 'Success!',
                        text: "Error Liking PostId:"+err
                    });
                } else {
                    this.notify_color = "error vue-notification";
                    this.$notify({
                        group: this.post+'string',
                        title: 'Success!',
                        text: "Error Disliking PostId:"+err
                    });
                }
            });
        }
    },
    mounted(){
        this.isLiked= (this.liked==='true');

        this.isOffensive= (this.offensive==='true');
    }
}
</script>

<style lang='scss'>
.transition-1{
    transition:all 1s;
}
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 100px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 3px 0;
  position: absolute;
  z-index: 1;
  top: 150%;
  left: 50%;
  margin-left: -50px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  bottom: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent black transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>