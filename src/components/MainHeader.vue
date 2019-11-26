<template>
    <div class="w-auto md:w-1/2 justify-end flex flex-wrap flex-row font-semibold text-lg uppercase">
        <a href="./index.php" class="px-3 py-1 mr-1 lg:mr-3 text-blue-600 hover:text-gray-500">
            Home
        </a>
        <a href="./listing-city-select.php" class="hidden md:flex px-3 py-1 mr-1 lg:mr-3 text-blue-600 hover:text-gray-500"> 
            Listings
        </a>
        <div class="flex flex-wrap flex-col" @blur="show=false" @mouseleave="show=false">
            <div @mouseenter="show=true" @click="show=!show"
            class="w-full cursor-pointer flex flex-wrap my-auto items-center justify-center mr-1 lg:mr-3 text-blue-600 hover:text-gray-500">
                <svg v-if="userloggedin" viewBox="0 0 24 24" class="mt-1 w-6 h-6 fill-current text-primary">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C5.79 0 4 1.79 4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm2.1 4a2.1 2.1 0 10-4.2 0 2.1 2.1 0 004.2 0zm4 9c0-.64-3.13-2.1-6.1-2.1-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V13zM0 13c0-2.66 5.33-4 8-4s8 1.34 8 4v3H0v-3z"/>
                </svg>
                <svg v-else viewBox="0 0 18 10" class="w-6 h-6 fill-current text-primary">
                    <path fill-rule="evenodd" d="M4 2V0h14v2H4zM2 6h14V4H2v2zm-2 4h14V8H0v2z" clip-rule="evenodd"/>
                </svg>
            </div>
            <slide-y-down-transition :duration="500">
            <div v-if="show" @mouseenter="show=true" @mouseleave="show=false" class="relative">
                <div tabindex="0" :class="show ? 'flex' : 'hidden'" class="z-50 absolute flex-wrap bg-white p-2 rounded-lg shadow-lg" style="width:13rem; margin-left:-11rem;">
                    <span class="w-full flex flex-wrap" v-if="userloggedin">
                        <a href="#" class="cursor-default mb-4 flex w-full px-3 py-1 text-base font-semibold normal-case text-primary-500 border-b border-gray-300" v-html="userTypeFull"></a>
                        <a href="./listing-city-select.php" class="flex md:hidden w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600 flex-wrap justify-between items-center"> 
                            <span>Listings</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 18 18"><path fill-rule="evenodd" d="M8 10H0V0h8v10zm0 8H0v-6h8v6zm2 0h8V8h-8v10zm0-12V0h8v6h-8z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="./logout.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600 flex flex-wrap justify-between items-center">
                            <span>Logout</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 18 18"><path fill-rule="evenodd" d="M2 0h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2H2a2 2 0 01-2-2v-4h2v4h14V2H2v4H0V2a2 2 0 012-2zm6.5 14l-1.41-1.41L9.67 10H0V8h9.67L7.09 5.41 8.5 4l5 5-5 5z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="./change-password.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600  flex flex-wrap justify-between items-center">
                            <span>Change Password</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 16 21"><path fill-rule="evenodd" d="M14 7h-1V5c0-2.76001-2.24-5-5-5-2.76001 0-5 2.23999-5 5v2H2C.900024 7 0 7.89999 0 9v10c0 1.1.900024 2 2 2h12c1.1 0 2-.9 2-2V9c0-1.10001-.9-2-2-2zm-6 9c-1.09998 0-2-.9-2-2s.90002-2 2-2 2 .9 2 2-.90002 2-2 2zM5 5v2h6V5c0-1.66-1.33997-3-3-3S5 3.34 5 5z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="./update.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600  flex flex-wrap justify-between items-center">
                            <span>Update Info</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M17.5 10c0 .34-.03.66-.0699.98l2.1099 1.65c.19.15.24.42.12.64l-2 3.46c-.12.22-.38.31-.61.22l-2.49-1c-.52.39-1.08.73-1.69.98l-.3799 2.65C12.46 19.82 12.25 20 12 20H8c-.25 0-.45996-.18-.48999-.42L7.13 16.93c-.60998-.25-1.16998-.58-1.69-.98l-2.48999 1c-.21997.08-.48999 0-.60998-.22L.340027 13.27c-.119995-.22-.070008-.49.119995-.64l2.109988-1.65C2.53003 10.66 2.5 10.33 2.5 10c0-.33002.03003-.65997.07001-.97998L.460022 7.37c-.190003-.15003-.25-.41999-.119995-.64002L2.34003 3.27002c.11999-.22003.38-.31.60998-.22003l2.48999 1c.52002-.39002 1.08002-.72998 1.69-.97998L7.51001.419983C7.54004.179993 7.75 0 8 0h4c.25 0 .46.179993.4901.419983L12.87 3.07001c.61.25 1.17.58001 1.69.97998l2.49-1c.22-.08002.49 0 .61.22003l2 3.45996c.12.22003.07.48999-.12.64002l-2.1099 1.65002c.0399.32001.0699.63995.0699.97998zm-11 0c0 1.93 1.57001 3.5 3.5 3.5 1.93 0 3.5-1.57 3.5-3.5 0-1.92999-1.57-3.5-3.5-3.5-1.92999 0-3.5 1.57001-3.5 3.5z" clip-rule="evenodd"/></svg>
                        </a>
                        <a v-if="usertype == 'a' || usertype == 's' || usertype == 'c'" :href="dashboardRoute" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600  flex flex-wrap justify-between items-center">
                            <span>Dashboard</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 20 15"><path fill-rule="evenodd" d="M5 15h10V0H5v15zm-5-2h4V2H0v11zm16 0V2h4v11h-4z" clip-rule="evenodd"/></svg>
                        </a>
                        <a v-if="usertype == 'a' || usertype == 's'" href="./listing-create.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600  flex flex-wrap justify-between items-center">
                            <span>Listing Create</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 14 14"><path d="M14 8H8v6H6V8H0V6h6V0h2v6h6v2z"/></svg>
                        </a>
                    </span>
                    <span class="w-full flex flex-wrap" v-else>
                        <a href="./listing-city-select.php" class="flex md:hidden w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600 flex-wrap justify-between items-center"> 
                            <span>Listings</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 18 18"><path fill-rule="evenodd" d="M8 10H0V0h8v10zm0 8H0v-6h8v6zm2 0h8V8h-8v10zm0-12V0h8v6h-8z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="./login.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600  flex flex-wrap justify-between items-center"> 
                            <span>Login</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 19 20"><path fill-rule="evenodd" d="M15.8101 2.47c-.0801 0-.16-.02-.2301-.06C13.6601 1.42 12 1 10.01 1c-1.97994 0-3.85995.47-5.57003 1.41-.23999.12999-.53992.04-.67993-.19999C3.63004 1.97 3.72 1.66 3.95999 1.53 5.81998.520004 7.86002 0 10.01 0c2.13 0 3.99.470001 6.0301 1.52.25.12999.3399.43.2099.67-.0899.18-.26.28-.4399.28zM1.50003 7.72c-.09998 0-.20007-.03-.29004-.09-.229979-.16-.280028-.47-.11999-.70001.98999-1.39999 2.25-2.5 3.75-3.26999C7.98001 2.03999 12 2.03 15.1501 3.64999c1.5.77001 2.76 1.86 3.75 3.25.1599.22001.1099.54001-.12.70002-.2301.15998-.5401.10998-.7001-.12001-.9-1.26-2.0399-2.25-3.39-2.94001-2.87-1.47-6.53995-1.47-9.39993.01001-1.36011.7-2.5 1.7-3.40003 2.95999-.08007.14-.22998.21001-.39001.21001zm5.90002 11.92c.08997.1.21998.15.34998.15s.26001-.05.37-.15c.18994-.2.18994-.51 0-.71-.77002-.78-1.21009-1.27-1.84998-2.42C5.65994 15.43 5.34 14.1 5.34 12.66c0-2.42 2.08996-4.39 4.66-4.39 2.57 0 4.6599 1.97 4.6599 4.39 0 .28.2201.5.5.5.2801 0 .5-.22.5-.5 0-2.97-2.5399-5.39-5.6599-5.39-3.11997 0-5.66 2.42-5.66 5.39 0 1.61.35998 3.11 1.05004 4.34.66993 1.21 1.1399 1.77 2.01001 2.64zm7.51995-1.7c-1.19 0-2.24-.3-3.1-.89-1.49-1.01-2.38003-2.65-2.38003-4.39 0-.28.21997-.5.5-.5s.50003.22.50003.5c0 1.41.7199 2.74 1.9399 3.56.7101.48 1.5401.71 2.5401.71.2399 0 .64-.03 1.04-.1.27-.05.53.13.5799.41.0501.27-.13.53-.41.58-.5699.11-1.0699.12-1.2099.12zm-2.1399 2.04c.04.01.0899.02.13.02.2099 0 .42-.15.4699-.38.0701-.26-.0799-.54-.3499-.61-1.4101-.39-2.3201-.91-3.27006-1.85-1.20996-1.2-1.87-2.8-1.87-4.51 0-1.07.93006-1.94 2.07996-1.94 1.15 0 2.0801.87 2.0801 1.94 0 1.62 1.38 2.94 3.0799 2.94 1.7001 0 3.08-1.32 3.08-2.94 0-4.32-3.7-7.82999-8.25001-7.82999-3.22998 0-6.17993 1.80999-7.50989 4.6C2.00003 10.37 1.77005 11.46 1.77005 12.66c0 1.35.23999 2.65.72998 3.96.08997.25.38001.39.64001.29.26001-.09.39002-.38.29004-.64-.59997-1.6-.67004-2.83-.67004-3.61 0-1.04.19995-1.99.58997-2.8 1.17004-2.45 3.77002-4.03 6.60998-4.03C13.96 5.83 17.21 8.89001 17.21 12.66c0 1.07-.9299 1.94-2.08 1.94-1.15 0-2.0799-.87-2.0799-1.94 0-1.62-1.38-2.94-3.0801-2.94-1.69995 0-3.07996 1.32-3.07996 2.94 0 1.98.77002 3.83 2.17005 5.22 1.09001 1.07 2.13001 1.66 3.72001 2.1z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="./register.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600  flex flex-wrap justify-between items-center"> 
                            <span>Register</span>
                            <svg class="w-4 h-4 inline-block fill-current text-gray-600" viewBox="0 0 22 16"><path fill-rule="evenodd" d="M14 8c2.21 0 4-1.78998 4-4s-1.79-4-4-4-4 1.78998-4 4 1.79 4 4 4zM5 6V3H3v3H0v2h3v3h2V8h3V6H5zm1 8c0-2.66 5.3301-4 8-4s8 1.34 8 4v2H6v-2z" clip-rule="evenodd"/></svg>
                        </a>
                    </span>
                </div>
            </div>
            </slide-y-down-transition>
        </div>
    </div>
</template>
<script>
import { SlideYDownTransition } from 'vue2-transitions';

export default {
    components: {
        SlideYDownTransition
    },
    data:()=>{
        return {
            show: false
        }
    },
    props: {
        userloggedin:{
            type: Boolean,
            default: false,
        },
        usertype:{
            type: String,
        }
    },
    computed:{
        userTypeFull(){
            var x = this.usertype;
            if(x=='s'){
                return "Admin";
            } else if(x=='a'){
                return "Agent";
            } else if(x=='c'){
                return "Client";
            } else if(x=='d'){
                return "Disabled";
            } else if(x=='i'){
                return "Incomplete";
            }
        },
        dashboardRoute(){
            var x = this.usertype;
            if(x=='s'){
                return "./admin.php";
            } else if(x=='a'){
                return "./dashboard.php";
            } else if(x=='c'){
                return "./client.php";
            }
        }
    },
    mounted(){
        // var path = window.location.pathname.split("/").pop();
        // if (path == '') {
        //     path = 'index.php';
        // }
    }
}
</script>