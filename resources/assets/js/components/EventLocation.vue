<script>

        export default {
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

            setPlace (place) {
                this.location = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                }
            },

            markerDrag (position) {
                this.location = {
                    lat: position.lat(),
                    lng: position.lng()
                }
            }
        }
    }
</script>

<template>
    <div id="EventLocation_Wrapper">
        <label for="location">Location</label>
        <div id="location">
            <gmap-autocomplete @place_changed="setPlace" class="form-control"></gmap-autocomplete>

            <div class="padding-bottom-10"></div>

            <gmap-map
                    :center="location"
                    :zoom="6"
                    style="width: 100%; height: 300px;">

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

