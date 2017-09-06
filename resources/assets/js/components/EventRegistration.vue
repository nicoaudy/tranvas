<template>
	<div class="EventRegistration__wrapper">
		<button class="btn" v-bind:class="mode">{{ text }}</button>
	</div>
</template>

<script>
	export default {
		props: ['text', 'mode', 'eventId']
	}
</script>