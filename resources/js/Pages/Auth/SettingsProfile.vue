<script setup>
import { useForm } from "@inertiajs/vue3";
import GuestLayout from "./../Layouts/GuestLayout.vue";
import ProfileDelete from "./ProfileDelete.vue";

const form = useForm({
    password: "",
});

function passwordConfirm() {
    form.post("confirm-password", {
        preserveScroll: true,
        onSuccess: () => {
            console.log("confirm");
        },
    });
}

const props = defineProps({
    auth:{
        type:Object,
        default:null
    }
})
</script>

<template>
    {{ form.password }}
    {{ props }}
    <GuestLayout>
        <div class="col-span-5 xl:col-span-3">
            <div
                class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
            >
                <div
                    class="border-b border-stroke px-7 py-4 dark:border-strokedark"
                ></div>

                <div class="p-7">
                    <form @submit.prevent="passwordConfirm">
                        <input
                            type="password"
                            name="password"
                            v-model="form.password"
                            id="password"
                        />
                        <button :click="passwordConfirm" type="submit">
                            Contenue
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
