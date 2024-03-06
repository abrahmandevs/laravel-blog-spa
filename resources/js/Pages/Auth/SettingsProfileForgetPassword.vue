<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    email:''
})

function requestForget() {
    form.post('forgot-password',{
        preserveScroll:true,
        onSuccess:()=>{
            console.log('successfull');
        }
    })
}


defineProps({ errors: Object });

</script>
<template>
	<div>
        <form @submit.prevent="requestForget" class="bg-white w-4/12 mx-auto rounded-md p-8 space-y-2" >
            <p class="text-gray-400 font-semibold text-2xl text-center">Forget Password</p>
            <div class="pt-3">
                <input type="email" class="tracking-widest border rounded-md w-full p-1 " v-model="form.email" id="email" placeholder="Email">
            </div>
            <span v-if="errors.email">{{errors.email}}</span>
            <div class="pt-3">
                <button class="text-white bg-gradient-to-r from-green-500 to-blue-500 w-full p-1 rounded-md">Send Request
                </button>
            </div>
        </form>
    </div>
</template>
