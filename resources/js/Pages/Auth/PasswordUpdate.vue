<script setup>
import GuestLayout from '../Layouts/GuestLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';

defineProps({errors:Object})


const form = useForm({
    current_password: '',
    password: '',
    password_confirmation:''
})

function passwordUpdate() {
    form.put('/user/password', {
        preserveScroll: true,
        onSuccess: () => {
            console.log('update')
        }
    })
}

const auth = usePage()
</script>
<template>
	<GuestLayout>
        <div class="container  mx-auto py-20 px-3 md:px-0">
            <form @submit.prevent="passwordUpdate" class="bg-white w-4/12 mx-auto rounded-md p-8 space-y-2" >
                <div class="pt-3">
                    <input type="password" class="tracking-widest border rounded-md w-full p-1 " v-model="form.current_password" id="current_password" placeholder="Current Password">
                </div>
                <span v-if="errors.current_password">{{errors.current_password}}</span>
                <div class="pt-3">
                    <input type="password" class="tracking-widest border rounded-md w-full p-1 " v-model="form.password" id="password" placeholder="Password">
                </div>
                <span v-if="errors.password">{{errors.password}}</span>
                <div class="pt-3">
                    <input type="password" class="tracking-widest border rounded-md w-full p-1 " v-model="form.password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                </div>
                <div class="pt-3">
                    <button class="text-white bg-gradient-to-r from-green-500 to-blue-500 w-full p-1 rounded-md">Change Password</button>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
