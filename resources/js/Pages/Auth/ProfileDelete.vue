<script setup>
import GuestLayout from "../Layouts/GuestLayout.vue";

    import {Link} from "@inertiajs/vue3"
</script>

<template>
	<GuestLayout>
		<div class="col-span-5 xl:col-span-3">
			<div
				class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
			>
				<div class="p-7">
                    <Link class="border-bottom border-2 border-success text-secondary fw-medium"
                        :href="route('account.delete')"
                        method="post"
                        as="button"
                        >Delete</Link>
				</div>
			</div>
		</div>
	</GuestLayout>
</template>
