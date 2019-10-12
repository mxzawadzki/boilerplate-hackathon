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
      <!-- <l-marker :lat-lng="markerLatLng" ></l-marker> -->
      <!-- <l-marker :lat-lng="[47.413220, -1.189482]">
        <l-icon
          :icon-anchor="staticAnchor"
          class-name="someExtraClass">
          <div class="headline">{{ customText }}</div>
          <img src="static/images/layers.png">
        </l-icon>
      </l-marker> -->
      <l-geo-json v-for="marker in markers" :key="marker.id" @click="showPopup"
        :geojson="marker"
        :options="options"
        :options-style="styleFunction"
      >
      </l-geo-json>
    </l-map>
</template>

<script>
import {LMap, LTileLayer, LMarker, LGeoJson } from 'vue2-leaflet'
export default {
  name: 'AppMap',
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LGeoJson
  },
  data () {
    return {
      url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
      zoom: 3,
      center: [52.2297, 21.0122],
      // markerLatLng: [52.2297, 21.0122],
      geojson: null,
      markers: [
        {
          "type": "Feature",
          "properties": {
            "name": "Coors Field",
            "amenity": "Baseball Stadium",
            "popupContent": "This is where the Rockies play!"
          },
          "geometry": {
            "type": "Point",
            "coordinates": [21.0122, 52.2297]
          }
        }
      ]
    }
  },
  methods: {
    showPopup(e) {

    },
    zoomUpdated (zoom) {
      this.zoom = zoom;
    },
    centerUpdated (center) {
      this.center = center;
    },
    boundsUpdated (bounds) {
      this.bounds = bounds;
    }
  },
  computed: {
    options() {
      return {
        onEachFeature: this.onEachFeatureFunction
      };
    },
    styleFunction() {
      const fillColor = this.fillColor; // important! need touch fillColor in computed for re-calculate when change fillColor
      return () => {
        return {
          weight: 2,
          color: "#ECEFF1",
          opacity: 1,
          fillColor: fillColor,
          fillOpacity: 1
        };
      };
    },
    onEachFeatureFunction() {
      if (!this.enableTooltip) {
        return () => {};
      }
      return (feature, layer) => {
        layer.bindTooltip(
          "<div>code:" +
            feature.properties.code +
            "</div><div>nom: " +
            feature.properties.nom +
            "</div>",
          { permanent: false, sticky: true }
        );
      };
    }
  },
}
</script>

<style>

</style>