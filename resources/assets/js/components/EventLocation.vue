<template>
	<div id="EventLocation__Wrapper">
		<label for="location">Location</label>
        <div id="location">
            <gmap-autocomplete @place_changed="setPlace"></gmap-autocomplete>
            <gmap-map :center="location" :zoom="7" style="width: 100%; height: 300px;">
                <gmap-marker
                  :position="location"
                  :clickable="true"
                  :draggable="true"
                  @click="center=location"
                  @place_changed="setPlace"
                  @position_changed="markerDrag($event)"
                ></gmap-marker>
            </gmap-map>
	       </div>
        <input type="hidden" name="lat" v-model="location.lat">
        <input type="hidden" name="lng" v-model="location.lng">
    </div>
</template>

<script>
export default {
    props: ['lat', 'lng'],
    created () {
        if (this.lat != null && this.lng != null) {
            this.location.lat = parseFloat(this.lat)
            this.location.lng = parseFloat(this.lng)
        }
    },
    data () {
        return {
            location: {
                lat: 19.065236,
                lng: 72.995742
            },
            markers: [{
                position: {lat: 10.0, lng: 10.0}
            }]
        }
    },
    methods: {
        setPlace(place) {
            this.location = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            }
        },
        markerDrag(position) {
            this.location = {
                lat: position.lat(),
                lng: position.lng()
            }
        }
    }
}
</script>
