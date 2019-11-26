<template>
    <div class="w-full">
        <div class="w-full flex flex-wrap mb-6 justify-between">
            <div class="flex flex-wrap">
                <input v-model="searchText" @keyup.esc="clearAll()" @keyup.enter="getAllListings()" autofocus type="text" placeholder="(Esc- Clear Screen | Enter- Search)" style="width:20rem;" class="focus:outline-none focus:shadow-outline py-2 px-4 shadow rounded-lg bg-white focus:bg-gray-100"/>
                <button @click="getAllListings()" class="focus:outline-none focus:shadow-outline ml-3 bg-primary-600 hover:bg-blue-500 text-white shadow py-2 px-3 flex flex-wrap justify-center items-center w-auto rounded cursor-pointer font-bold text-center"><i class="fas fa-search fa-lg"></i></button>
            </div>
            <div>
                <button @click="toogle_sort(); sort_listings();" class="focus:outline-none focus:shadow-outline ml-3 bg-white hover:text-gray-500 text-gray-700 shadow py-2 px-3 flex flex-wrap justify-center items-center w-auto rounded cursor-pointer font-bold text-center">
                    <svg class="w-6 h-6 inline-block mr-2 z-0" :class="sortByDate ? 'skew-0' : 'skew-180'" viewBox="0 0 172 172"><g fill="none" stroke-miterlimit="10" font-family="none" font-size="none" font-weight="none" style="mix-blend-mode:normal" text-anchor="none"><path d="M0 172V0h172v172z"/><path class="fill-current" d="M6.235 24.08c-3.803.175-6.732 3.4-6.558 7.202.175 3.803 3.4 6.733 7.203 6.558H86a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934A6.84 6.84 0 0086 24.08H6.88a5.164 5.164 0 00-.645 0zm130.612 3.333a6.878 6.878 0 00-6.127 6.987v84.925l-15.373-15.373a6.9 6.9 0 00-4.944-2.15 6.87 6.87 0 00-6.424 4.274 6.902 6.902 0 001.586 7.551l32.035 32.035 32.035-32.035a6.867 6.867 0 001.854-6.705 6.899 6.899 0 00-4.945-4.891 6.89 6.89 0 00-6.691 1.921l-15.373 15.373V34.4a6.878 6.878 0 00-2.016-4.972 6.878 6.878 0 00-4.971-2.016 5.164 5.164 0 00-.645 0zM6.236 51.6c-3.803.175-6.732 3.4-6.557 7.202.174 3.803 3.4 6.733 7.202 6.558h55.04a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934A6.84 6.84 0 0061.92 51.6H6.88a5.164 5.164 0 00-.645 0zm0 27.52c-3.803.175-6.732 3.4-6.558 7.202.175 3.803 3.4 6.733 7.203 6.558h41.28a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934 6.84 6.84 0 00-6.033-3.413H6.88a5.164 5.164 0 00-.645 0zm0 27.52c-3.803.175-6.732 3.4-6.558 7.202.175 3.803 3.4 6.733 7.203 6.558H34.4a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934 6.84 6.84 0 00-6.033-3.413H6.88a5.164 5.164 0 00-.645 0zm0 27.52c-3.803.175-6.732 3.4-6.558 7.202.175 3.803 3.4 6.733 7.203 6.558h13.76a6.84 6.84 0 006.033-3.413 6.817 6.817 0 000-6.934 6.84 6.84 0 00-6.033-3.413H6.88a5.164 5.164 0 00-.645 0z"/></g></svg>
                    Sort By Date
                </button>
            </div>
        </div>
        <table class="w-full shadow-lg rounded-lg table-fixed">
            <thead class="rounded-t-lg bg-white text-lg font-semibold text-gray-600">
                <tr class="text-left">
                    <th class="w-1/12 p-2 rounded-tl-lg">#ID</th>
                    <th class="w-3/12 p-2">Headline</th>
                    <th class="w-1/12 p-2">Price</th>
                    <th class="w-3/12 p-2">Address</th>
                    <th class="w-1/12 p-2">Status</th>
                    <th class="w-1/12 p-2">Date</th>
                    <th class="w-2/12 text-right pl-4 pr-3 py-2 rounded-tr-lg">Actions</th>
                </tr>
            </thead>
            <tbody v-if="showListings" class="bg-gray-100 text-base text-black">
                <tr v-for="(data,i) in listings" :key="i" class="border-b border-t border-solid border-gray-300">
                    <td class="px-2 py-3 font-normal">{{data.listing_id}}</td>
                    <td class="px-2 py-3 font-normal">{{data.headline}}</td>
                    <td class="px-2 py-3 font-normal">$ {{data.price}}</td>
                    <td class="px-2 py-3 font-normal">{{data.address}}</td>
                    <td class="px-2 py-3 font-normal flex flex-wrap justify-start items-center" v-html="displayStatus(data.status)"></td>
                    <td class="px-2 py-3 font-normal">{{data.created_on}}</td>
                    <td class="px-2 py-3 font-normal flex justify-end items-center">
                        <a :href="`./listing-display.php?listing_id=${data.listing_id}`" class="focus:outline-none m-1 bg-transparent hover:text-black text-gray-600 p-2 flex flex-wrap justify-center items-center w-auto cursor-pointer font-bold text-center"><i class="fab fa-readme"></i></a>
                        <a :href="`./listing-update.php?listing_id=${data.listing_id}`" class="focus:outline-none m-1 bg-transparent hover:text-black text-gray-600 p-2 flex flex-wrap justify-center items-center w-auto cursor-pointer font-bold text-center"><i class="far fa-edit"></i></a>
                        <button @click="delete_listing(data.listing_id)" class="focus:outline-none m-1 bg-transparent hover:text-black text-gray-600 p-2 flex flex-wrap justify-center items-center w-auto cursor-pointer font-bold text-center"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr class="border-b border-t border-solid border-gray-300">
                    <td class="py-3 font-normal text-center" colspan="7">No Data Found</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return{
            sortByDate: false,
            searchText: '',
            listings: []
        }
    },
    props:{

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
        getAllListings(){
            axios.get('./api/get-listings.php',{
                params: {
                    search: this.searchText
                }
            }).then((res)=>{
                this.listings = res.data;
                this.sort_listings();
            }).catch((err)=>{
                console.log("Error fetching listings : ",err);
            });
        },
        sort_listings(){
            this.listings.sort((a,b)=>{
                if(this.sortByDate){
                    return Number(new Date(a.created_on)) - Number(new Date(b.created_on));
                } else {
                    return Number(new Date(b.created_on)) - Number(new Date(a.created_on));
                }
            });
        },
        toogle_sort(){
            this.sortByDate = !this.sortByDate;
        },
        delete_listing(id){
            console.log(id);
        },
        clearAll(){
            this.searchText = "";
            this.getAllListings();
        }
    },
    mounted(){
        this.getAllListings();
    },
    computed:{
        showListings(){
            if(this.listings.length > 0){
                return true;
            } else {
                return false;
            }
        }
    }
}
</script>
<style lang="scss">
    .skew-180 {
        transform: rotate(180deg);
    }
    .skew-0 {
        transform: rotate(0deg);
    }
</style>