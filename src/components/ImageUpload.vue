<template>
    <div>
        <notifications group="generic" :classes="notify_color" position="bottom left"/>
        <div class="w-auto flex flex-wrap justify-center items-center px-16">
            <div class="w-1/4 p-3 relative" v-for="(data, i) in image_data" :key="i">
                <div v-if="default_selected==i" class="absolute top-0 left-0 pt-4 pl-4">
                    <div class="bg-primary-500 border border-solid border-white text-white shadow-md rounded-br-lg text-sm leading-tight py-1 px-2 font-semibold shadow-inner">Default</div>
                </div>
                <form :ref="form(i)" enctype='multipart/form-data' @submit.prevent="upload(i)" class="absolute top-0 right-0 pt-4 pr-4">
                    <label>
                        <input type="file" name="image_file[]" ref="image_file" accept="image/jpg, image/jpeg" @change="previewFiles(i,$event)" class="hidden" />
                        <span class="cursor-pointer bg-primary-500 border border-solid border-white text-white shadow-md rounded-bl-lg text-sm leading-tight py-1 px-2 font-semibold shadow-inner">
                            <i class="fas fa-upload"></i>
                        </span>
                    </label>
                </form>
                <div @click="click(i)" :id="i==selected?'sss':''" :ref="i" :tabindex="0" class="cursor-pointer focus:shadow-none border-transparent border-4 border-solid focus:border-white rounded flex flex-wrap justify-center items-center">
                    <img class="img-1 rounded object-cover h-64" :src="data.path" alt="sadasd">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { SlideXLeftTransition } from 'vue2-transitions';
import axios from 'axios';

export default {
    components: {
        SlideXLeftTransition,
    },
    data(){
        return{
            selected: 0,
            default_selected: 0,
            files: [],
            image_data: [],
            notify_color: 'error vue-notification'
        }
    },
    props:{
        imagearray:{
            type:Array,
            required: true
        },
        listing_id:{
            type:Number,
            required: true
        }
    },
    methods: {
        click(val){
            this.selected = val;

            var bodyFormData = new FormData();
            bodyFormData.append('selected', this.selected); 
            bodyFormData.append('listing_id', this.listing_id); 

            axios({
                method: 'post',
                url: './api/list_default.php',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data' }
            }).then((data)=>{
                this.notify_color = "success vue-notification";
                this.$notify({
                    group: 'generic',
                    title: 'Success!',
                    text: 'Default Image Changed',
                });
                location.reload(true);
            }).catch((err)=>{
                this.notify_color = "error vue-notification";
                this.$notify({
                    group: 'generic',
                    title: 'Opps!',
                    text: 'Error changing default image'
                });
            });
        },
        previewFiles(index, event){
            var form = this.form(index);
            
            this.files[index] = this.$refs.image_file[index].files;

            if ((this.files[index][0].size/1000) > 1000) {
                this.notify_color = "error vue-notification";
                this.$notify({
                    group: 'generic',
                    title: 'Opps!',
                    text: 'Image greater than 1 MB'
                });
                this.$refs[form][0].reset();
            } else {
                // console.log(this.$refs[form][0]);
                var file = this.files[index][0];
                var reader = new FileReader();
                reader.readAsDataURL(event.target.files[0]);
                var new_img_url = "";
                reader.onload = (e)=>{
                    new_img_url = URL.createObjectURL(event.target.files[0])
                    this.image_data[index].path = new_img_url;
                    this.upload(index, event.target.files[0]);
                }
            }
        },
        upload(index, url){
            var bodyFormData = new FormData();
            bodyFormData.append('index', index); 
            bodyFormData.append('listing_id', this.listing_id); 
            bodyFormData.append('url', url); 
            
            axios({
                method: 'post',
                url: './api/upload.php',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data' }
            })
            .then((data)=>{
                this.notify_color = "success vue-notification";
                this.$notify({
                    group: 'generic',
                    title: 'Success!',
                    text: 'Image uploaded to server'
                });
            })
            .catch((err)=>{
                this.notify_color = "error vue-notification";
                this.$notify({
                    group: 'generic',
                    title: 'Oops!',
                    text: 'Error uploaded to server'
                });
                console.log("Error Post: ",err);
            });
        },
        form(index){
            return 'form_' + index;
        }
    },
    mounted(){
        this.image_data = this.imagearray;
        setTimeout(()=>{
            var s = document.getElementById('sss');
            s.focus();
        },0);
        // this.$refs[1].autofocus=true;
    }
}
</script>
<style lang="scss">

</style>