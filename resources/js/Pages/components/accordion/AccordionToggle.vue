<script setup>
	import { ref, reactive, defineProps } from "vue"
	import { accordionStore } from "../../store/accordionStore"
	const accordion = accordionStore

	const props = defineProps({
		itemKey: {
			type: [String, Boolean, Number],
			default: "",
		},
		active: {
			type: [String, Boolean, Number],
			default: "",
		},
		buttonClass: {
			type: String,
			default: "",
		},
		contentClass: {
			type: String,
			default: "overflow-hidden",
		},
	})
	const keys = ref(JSON.stringify(props["itemKey"]).replace(" ", "").replace('"', "").replace('"', ""))
	const activePanel = ref(JSON.stringify(props["active"]).replace('"', "").replace('"', ""))

	const isShow = ref(null)
	const isActive = ref(null)

	isActive.value ? (isShow.value = keys) : ""

function toggle() {
        console.log(4);
        this.emit ('selectdPanel')
}

</script>
<template>
	<div class="transition " @click="$emit('someEvent')">
		<!-- header -->
		<div @click="$emit('someEvent')" class="cursor-pointer transition flex space-x-5 px-5 items-center h-16 hover:bg-indigo-500" :class="isActive ? 'bg-red-400 font-bold bg-opacity-20' : 'bg-opacity-10'">
			<slot name="header">
				
			</slot>
		</div>
		<!-- Content -->
		<div class="">
			<div>
				<slot name="body"> </slot>
			</div>
		</div>
	</div>
</template>
