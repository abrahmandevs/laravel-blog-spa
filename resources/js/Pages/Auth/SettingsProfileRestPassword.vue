
<script setup>
	import GuestLayout from "../Layouts/GuestLayout.vue";

	import { ref } from "vue";
	import { Link, useForm, usePage } from "@inertiajs/vue3";

	const data = usePage();

	const form = useForm({
		email: data.props.request.email,
		password: "1212121212",
		password_confirmation: "1212121212",
		token: data.props.token,
	});

	const status = ref([]);

	function resetPssword() {
		form.post("/reset-password", {
			preserveScroll: true,
            onSuccess: () => {
                form.reset('password'),
				console.log("password updage successfull");
			},
		});
	}

	const props = defineProps({
		request: Object,
		errors: Object,
	});
</script>
<template>
	<GuestLayout>
		{{ data }}
		{{ form.password }}
		<div class="container mx-auto py-20 px-3 md:px-0">
			<form
				@submit.prevent="resetPssword"
				class="bg-white w-4/12 mx-auto rounded-md p-8 space-y-2"
			>
				<p class="text-gray-400 font-semibold text-2xl text-center">
					Rest Password
				</p>
				<div class="pt-3">
					<input
						type="email"
						class="tracking-widest border rounded-md w-full p-1"
						v-model="form.email"
						id="email"
						placeholder="Email"
					/>
				</div>
				<span v-if="errors.email">{{ errors.email }}</span>
				<div class="pt-3">
					<input
						type="password"
						class="tracking-widest border rounded-md w-full p-1"
						v-model="form.password"
						id="password"
						placeholder="Password"
					/>
				</div>
				<span v-if="errors.password">{{ errors.password }}</span>
				<div class="pt-3">
					<input
						type="password"
						class="tracking-widest border rounded-md w-full p-1"
						v-model="form.password_confirmation"
						id="password_confirmation"
						placeholder="Confirm Password"
					/>
				</div>
				<span v-if="errors.password_confirmation">{{ errors.password_confirmation }}</span>
				<input type="hidden" name="token " v-model="form.token" value />
				<div class="pt-3">
					<button :disabled="form.processing"
						class="text-white bg-gradient-to-r from-green-500 to-blue-500 w-full p-1 rounded-md"
					>
						Rest password
					</button>

				</div>
			</form>
		</div>
	</GuestLayout>
</template>
