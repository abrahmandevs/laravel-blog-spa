
<script setup>
    import GuestLayout from "../Layouts/GuestLayout.vue";

    import {ref} from 'vue'
    import { Link, useForm, usePage } from "@inertiajs/vue3";

     const data = usePage();

    const form = useForm({
        name : 'Rahman',
        email:'example@gmail.com',
        password:'',
        password_confirmation:'',
        remember:'',
    })
    defineProps({ errors: Object })

    const status = ref([])

    function userLogin(){
        form.post('/login',{
            preserveScroll:true,
            onSuccess:()=>{
                status.value= data.props.flash.share_data
            }
        })
    }


</script>
<template>
<GuestLayout>
{{status}}
{{form.password}}
    <div class="container  mx-auto py-20 px-3 md:px-0">
        <form @submit.prevent="userLogin" class="bg-white w-4/12 mx-auto rounded-md p-8 space-y-2" >
            <p class="text-gray-400 font-semibold text-2xl text-center">Login</p>

            <div class="pt-3">
                <input type="email" class="tracking-widest border rounded-md w-full p-1 " v-model="form.email" id="email" placeholder="Email">
            </div>
                    <span v-if="errors.email">{{errors.email}}</span>
            <div class="pt-3">
                <input type="password" class="tracking-widest border rounded-md w-full p-1 " v-model="form.password" id="password" placeholder="Password">
            </div>
            <span v-if="errors.password">{{errors.password}}</span>
            <div class="pt-3 flex items-center gap-x-2">
                <input type="checkbox" class="" v-model="form.remember" id="remember">
                <label for="remember">Remember</label>
            </div>
            <div class="pt-3">
                <button class="text-white bg-gradient-to-r from-green-500 to-blue-500 w-full p-1 rounded-md">Login
                </button>
            </div>
            <Link href="forgot-password" method="get">Forget password</Link>
        </form>
    </div>
</GuestLayout>
</template>

<style>

</style>
