<template>
	<div class="EventRegistration__wrapper">
		<button class="btn" v-bind:class="buttonMode" v-on:click="handleRegistration">{{buttonText}}</button>
	</div>
</template>

<script>
	import {registrationUrl} from './../env.js'

	export default {
		props: ['text', 'mode', 'eventId'],

	    created () {
	      this.buttonText = this.text
	      this.buttonMode = this.mode
	    },
	    data () {
	      return {
	        buttonText: '',
	        buttonMode: ''
	      }
	    },
		methods: {
			handleRegistration () {
	        let postData = {
	          eventId: this.eventId
	        }
	        axios.post(registrationUrl, postData)
		        .then(response => {
		        	console.log('response', response)
		            if (response.status == 200) {
		              this.buttonText = 'Register'
		              this.buttonMode = 'btn-primary'
		            }
		            if (response.status == 201) {
		              this.buttonText = 'Unregister'
		              this.buttonMode = 'btn-success'
		            }
		        })
	      	}
	    }
	}
</script>
