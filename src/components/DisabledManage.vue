<template>
    <div class="w-full">
        <div class="w-full flex flex-wrap mb-6 justify-between">
            <div class="flex flex-wrap">
                <input v-model="searchText" @keyup.esc="clearAll()" @keyup.enter="getAllDisabledUsers()" autofocus type="text" placeholder="(Esc- Clear Screen | Enter- Search)" style="width:20rem;" class="focus:outline-none focus:shadow-outline py-2 px-4 shadow rounded-lg bg-white focus:bg-gray-100"/>
                <button @click="getAllDisabledUsers()" class="focus:outline-none focus:shadow-outline ml-3 bg-primary-600 hover:bg-blue-500 text-white shadow py-2 px-3 flex flex-wrap justify-center items-center w-auto rounded cursor-pointer font-bold text-center"><i class="fas fa-search fa-lg"></i></button>
            </div>
            <div>
                <button @click="toogle_sort(); sort_users();" class="focus:outline-none focus:shadow-outline ml-3 bg-white hover:text-gray-500 text-gray-700 shadow py-2 px-3 flex flex-wrap justify-center items-center w-auto rounded cursor-pointer font-bold text-center">
                    <svg class="w-6 h-6 inline-block mr-2 z-0" :class="sortByDate ? 'skew-0' : 'skew-180'" viewBox="0 0 172 172"><g fill="none" stroke-miterlimit="10" font-family="none" font-size="none" font-weight="none" style="mix-blend-mode:normal" text-anchor="none"><path d="M0 172V0h172v172z"/><path class="fill-current" d="M6.235 24.08c-3.803.175-6.732 3.4-6.558 7.202.175 3.803 3.4 6.733 7.203 6.558H86a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934A6.84 6.84 0 0086 24.08H6.88a5.164 5.164 0 00-.645 0zm130.612 3.333a6.878 6.878 0 00-6.127 6.987v84.925l-15.373-15.373a6.9 6.9 0 00-4.944-2.15 6.87 6.87 0 00-6.424 4.274 6.902 6.902 0 001.586 7.551l32.035 32.035 32.035-32.035a6.867 6.867 0 001.854-6.705 6.899 6.899 0 00-4.945-4.891 6.89 6.89 0 00-6.691 1.921l-15.373 15.373V34.4a6.878 6.878 0 00-2.016-4.972 6.878 6.878 0 00-4.971-2.016 5.164 5.164 0 00-.645 0zM6.236 51.6c-3.803.175-6.732 3.4-6.557 7.202.174 3.803 3.4 6.733 7.202 6.558h55.04a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934A6.84 6.84 0 0061.92 51.6H6.88a5.164 5.164 0 00-.645 0zm0 27.52c-3.803.175-6.732 3.4-6.558 7.202.175 3.803 3.4 6.733 7.203 6.558h41.28a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934 6.84 6.84 0 00-6.033-3.413H6.88a5.164 5.164 0 00-.645 0zm0 27.52c-3.803.175-6.732 3.4-6.558 7.202.175 3.803 3.4 6.733 7.203 6.558H34.4a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934 6.84 6.84 0 00-6.033-3.413H6.88a5.164 5.164 0 00-.645 0zm0 27.52c-3.803.175-6.732 3.4-6.558 7.202.175 3.803 3.4 6.733 7.203 6.558h13.76a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934 6.84 6.84 0 00-6.033-3.413H6.88a5.164 5.164 0 00-.645 0z"/></g></svg>
                    Sort By Date
                </button>
            </div>
        </div>
        <table class="w-full shadow-lg rounded-lg">
            <thead class="rounded-t-lg text-lg font-semibold text-gray-600 w-full">
                <tr class="flex flex-wrap text-left items-center w-full rounded-t-lg bg-white">
                    <th class="w-1/12 px-2 py-3 rounded-tl-lg">User ID</th>
                    <th class="w-2/12 px-2 py-3">Email</th>
                    <th class="w-2/12 px-2 py-3">Name (FL)</th>
                    <th class="w-1/12 px-2 py-3">Postal Code</th>
                    <th class="w-2/12 px-2 py-3">Phone</th>
                    <th class="w-1/12 px-2 py-3">Enrol Date</th>
                    <th class="w-1/12 px-2 py-3">Last Access</th>
                    <th class="w-2/12 px-2 py-3 rounded-tr-lg text-center">Actions</th>
                </tr>
            </thead>
            <tbody v-if="showusers" class="bg-gray-100 text-base text-black flex flex-wrap justify-center items-start w-full overflow-y-scroll custom-scroll" style="height: 70vh;">
                <tr v-for="(data,i) in users" :key="i" class="border-b border-t border-solid border-gray-400 flex flex-wrap justify-center items-center w-full">
                    <td class="w-1/12 px-2 py-3 font-normal">{{data.user_id}}</td>
                    <td class="w-2/12 px-2 py-3 font-normal">
                        <a class="font-semibold text-primary-500 hover:text-primary-300" :href="`mailto:${data.email_address}`" v-html="data.email_address"></a>
                    </td>
                    <td class="w-2/12 px-2 py-3 font-normal">{{data.first_name}} {{data.last_name}}</td>
                    <td class="w-1/12 px-2 py-3 font-normal">{{data.postal_code}}</td>
                    <td class="w-2/12 px-2 py-3 font-normal">
                        <a class="font-semibold text-primary-500 hover:text-primary-300" :href="`tel:+1${data.primary_phone_number}`" v-html="`+1 ${data.primary_phone_number}`"></a>
                    </td>
                    <td class="w-1/12 px-2 py-3 font-normal">{{data.enrol_date}}</td>
                    <td class="w-1/12 px-2 py-3 font-normal">{{data.last_access}}</td>
                    <td class="w-2/12 px-2 py-3 font-normal flex flex-wrap justify-center items-center">
                        <button @click="delete_user(data.user_id)" class="focus:outline-none m-1 bg-transparent hover:text-black text-gray-600 p-2 flex flex-wrap justify-center items-center w-auto cursor-pointer font-bold text-center"><i class="far fa-trash-alt"></i></button>
                        <button @click="change_status(data.user_id, 'approve_client')" class="focus:outline-none m-1 bg-gray-600 hover:bg-black text-white p-1 flex flex-wrap justify-center items-center w-auto cursor-pointer font-semibold text-center leading-tight rounded"><i class="far fa-check-circle mr-1"></i> Client</button>
                        <button @click="change_status(data.user_id, 'approve_agent')" class="focus:outline-none m-1 bg-gray-600 hover:bg-black text-white p-1 flex flex-wrap justify-center items-center w-auto cursor-pointer font-semibold text-center leading-tight rounded"><i class="far fa-check-circle mr-1"></i>Agent</button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr class="border-b border-t border-solid border-gray-300">
                    <td class="py-3 font-normal text-center" colspan="7">No Data Found</td>
                </tr>
            </tbody>
        </table>
        <notifications group="disabled_man" :classes="notify_color" position="bottom left"/>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return{
            sortByDate: false,
            searchText: '',
            users: [],
            notify_color:''
        }
    },
    methods: {
        displayStatus(val){
            if(val=='o'){
                return '<p class="w-auto text-white text-xs shadow font-semibold rounded bg-green-500 py-1 px-2 leading-tight flex justify-center items-center">Open</p>';
            } else if(val=='c'){
                return '<p class="w-auto text-white text-xs shadow font-semibold rounded bg-red-500 py-1 px-2 leading-tight flex justify-center items-center">Closed</p>';
            } else if(val=='s'){
                return '<p class="w-auto text-black text-xs shadow font-semibold rounded bg-yellow-500 py-1 px-2 leading-tight flex justify-center items-center">Sold</p>';
            } else if(val=='h'){
                return '<p class="w-auto text-white text-xs shadow font-semibold rounded bg-gray-500 py-1 px-2 leading-tight flex justify-center items-center">Hidden</p>';
            }
        },
        getAllDisabledUsers(){
            axios.get('./api/get-disabled.php',{
                params: {
                    search: this.searchText
                }
            }).then((res)=>{
                this.users = res.data;
                this.sort_users();
            }).catch((err)=>{
                console.log("Error fetching users : ",err);
            });
        },
        sort_users(){
            this.users.sort((a,b)=>{
                if(this.sortByDate){
                    return Number(new Date(a.enrol_date)) - Number(new Date(b.enrol_date));
                } else {
                    return Number(new Date(b.enrol_date)) - Number(new Date(a.enrol_date));
                }
            });
        },
        toogle_sort(){
            this.sortByDate = !this.sortByDate;
        },
        delete_user(id){
            var bodyFormData = new FormData();
            bodyFormData.append('user_id', id); 
            bodyFormData.append('case', 'delete_user');

            axios({
                method: 'post',
                url: './api/disabled-manager.php',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data' }
            }).then((data)=>{
                this.notify_color = "success vue-notification";
                var tt = "Success Deleting User:"+id;
                this.$notify({
                    group: 'disabled_man',
                    title: 'Success!',
                    text: tt
                });

                this.users = this.users.filter((value, index, arr)=>{
                    return value.user_id != id;
                });
            });
        },
        change_status(id, type){
            var bodyFormData = new FormData();
            bodyFormData.append('user_id', id); 
            bodyFormData.append('case', type);

            axios({
                method: 'post',
                url: './api/disabled-manager.php',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data' }
            }).then((data)=>{
                this.notify_color = "success vue-notification";
                var tt = data.data.message;
                this.$notify({
                    group: 'disabled_man',
                    title: 'Success!',
                    text: tt
                });

                this.users = this.users.filter((value, index, arr)=>{
                    return value.user_id != id;
                });
            });
        },
        clearAll(){
            this.searchText = "";
            this.getAllDisabledUsers();
        }
    },
    mounted(){
        this.getAllDisabledUsers();
    },
    computed:{
        showusers(){
            if(this.users.length > 0){
                return true;
            } else {
                return false;
            }
        }
    }
}
</script>
<style lang="scss" scoped>
    .skew-180 {
        transform: rotate(180deg);
    }
    .skew-0 {
        transform: rotate(0deg);
    }


    .custom-scroll::-webkit-scrollbar-track
    {
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    .custom-scroll::-webkit-scrollbar
    {
        width: 10px;
	    background-color: #F5F5F5;
    }

    .custom-scroll::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        background-color: rgb(167, 167, 167);
    }
</style>