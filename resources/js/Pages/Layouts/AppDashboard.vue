<script setup>
	import { usePage } from "@inertiajs/vue3";
import { menuConfigStore } from "./../store/menuConfigStore";
	import AppDashboardNavbar from "./AppDashboardNavbar.vue";
	import AppDashboardSidebar from "./AppDashboardSidebar.vue";
	// import BreadcrumbOld from "../components/breadcrumb/BreadcrumbOld.vue"

	const menuConfig = menuConfigStore;


</script>
<template>
	<div class="flex flex-col bg-[#161a1d] text-white h-screen">
		<div class="grow fixed w-full z-[1000]">
			<AppDashboardNavbar />
		</div>
		<div
			class=" flex transition-all duration-700 relative overflow-hidden w-full mt-12"
		>
			<!-- Sidebar Page Content -->
			<div
				id="mainsidebar"
			class="bg-[#262d33] z-[999] shrink-0 flex flex-col  h-screen  transition-all duration-700 shadow"
				:class="menuConfig.activeMenu == true ? 'w-14' : 'w-[260px]'"
			>
				<AppDashboardSidebar/>
			</div>
			<!-- Default components loder under the slot -->
			<main class=" bg-[#161a1d] h-full overflow-y-auto scrollbar-none">
				<section v-if="false == true" class="shadow">
					<div class="h-12 shadow px-6 py-2.5 font-semibold text-lg leading-0">
						{{ pagetitle }}
					</div>
				</section>
				<div class="h-full mx-auto px-3 sm:px-6 py-6 lg:px-8 space-y-5">
					<!-- <BreadcrumbOld /> -->
					<div>
						<slot>No content </slot>
					</div>
				</div>
			</main>
		</div>
	</div>
</template>

<style>
	::-webkit-scrollbar {
		display: none;
	}

	::-webkit-scrollbar-track {
		scrollbar-width :none;
	}



</style>
