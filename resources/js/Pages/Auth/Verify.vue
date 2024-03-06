<script setup>
    import { Link } from "@inertiajs/vue3";

import GuestLayout from "../Layouts/GuestLayout.vue";

function verifyNotification() {

}
</script>
<template>
	<GuestLayout>
		<div class="container mx-auto py-20 px-3 md:px-0">
            <Link :href="route('verification.send')" method="post">Resend email</Link>
			<!-- <form
				@submit.prevent="verifyNotification"
				class="bg-white w-4/12 mx-auto rounded-md p-8 space-y-2"
			>

				<div class="pt-3">
					<button
						:disabled="form.processing"
						class="text-white bg-gradient-to-r from-green-500 to-blue-500 w-full p-1 rounded-md"
					>
						Resend Email
					</button>
				</div>
			</form> -->
		</div>
	</GuestLayout>
</template>
