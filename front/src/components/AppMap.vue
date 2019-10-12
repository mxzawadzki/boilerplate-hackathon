<template>
  <l-map
      style="height: 100vh; width: 100vw"
      :zoom="zoom"
      :center="center"
      @update:zoom="zoomUpdated"
      @update:center="centerUpdated"
      @update:bounds="boundsUpdated"
    >
      <l-tile-layer :url="url"></l-tile-layer>
      <!-- <l-marker v-for="marker in markers" :key="marker.id"></l-marker> -->
      <l-marker :lat-lng="markerLatLng" ></l-marker>
      <l-marker :lat-lng="[47.413220, -1.189482]">
        <l-icon
          :icon-anchor="staticAnchor"
          class-name="someExtraClass">
          <div class="headline">{{ customText }}</div>
          <img src="static/images/layers.png">
        </l-icon>
      </l-marker>
      <l-geo-json
        :geojson="geojson"
      >
      </l-geo-json>
    </l-map>
</template>

<script>
import {LMap, LTileLayer, LMarker } from 'vue2-leaflet'
export default {
  name: 'AppMap',
  components: {
    LMap,
    LTileLayer,
    LMarker
  },
  data () {
    return {
      url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
      zoom: 3,
      center: [52.2297, 21.0122],
      markerLatLng: [52.2297, 21.0122],
      geojson: {     "type": "Feature",     "properties": {         "name": "Coors Field",         "amenity": "Baseball Stadium",         "popupContent": "This is where the Rockies play!"     },     "geometry": {         "type": "Point",         "coordinates": [-104.99404, 39.75621]     } },
      markers: [
        {
          id: '',
          markerLating: '',

        }
      ]
    }
  },
  methods: {
    zoomUpdated (zoom) {
      this.zoom = zoom;
    },
    centerUpdated (center) {
      this.center = center;
    },
    boundsUpdated (bounds) {
      this.bounds = bounds;
    }
  }
}
</script>

<style>

</style>