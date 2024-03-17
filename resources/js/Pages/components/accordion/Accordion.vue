<script setup>
	import { ref, reactive, defineProps } from "vue"

	const props = defineProps({
		itemKey: {
			type: [String, Number],
			default: "defaultKey",
		},
		active: {
			type: [String, Boolean, Number],
			default: "",
		},
		buttonClass: {
			type: String,
			default: "bg-bg-gray-500 rounded",
		},
		contentClass: {
			type: String,
			default: "overflow-hidden",
		},
    })

const selected = ref(null)

function callback(e) {
    console.log(e);
    // selected.value = e
}
	
</script>
<template>
	<div class="w-full" @some-event="callback">
		<!-- Content -->
		<Transition mode="out-in" name="slide-fade" :duration="550">
				<div class="text-sm p-2" :class="contentClass">
					<slot ></slot>
				</div>
		</Transition>
	</div>
</template>
