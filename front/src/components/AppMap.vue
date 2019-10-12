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
    <l-marker
      v-for="marker in markers"
      :key="marker.id"
      :lat-lng="marker.geometry.coordinates"
      @click="showPopup"
    >
      <l-popup>{{marker.properties.popupContent}}</l-popup>
      <l-icon :icon-anchor="staticAnchor" class-name="someExtraClass">
        <div class="headline">{{ customText }}</div>
        <img src="@/assets/img/bottle.png" />
      </l-icon>
    </l-marker>
  </l-map>
</template>

<script>
import { getPointsForBounds } from "@/utils/api.js";
import { LMap, LTileLayer, LMarker, LPopup, LIcon } from "vue2-leaflet";
export default {
  name: "AppMap",
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LIcon
  },
  data() {
    return {
      url: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
      icon: L.icon({
        iconUrl: require("@/assets/img/bottle.png"),
        iconSize: [32, 37],
        iconAnchor: [16, 37]
      }),
      staticAnchor: [16, 37],
      customText: "Bottle Drop",
      iconSize: 64,
      zoom: 16,
      center: [52.211900643211195, 20.99944747210445],
      markers: [
        {
          type: "Feature",
          properties: {
            name: "Coors Field",
            amenity: "Baseball Stadium",
            popupContent: "This is where the Rockies play!"
          },
          geometry: {
            type: "Point",
            coordinates: [52.2297, 21.0122]
          }
        },
        {
          type: "Feature",
          properties: {
            name: "Coors Field",
            amenity: "Baseball Stadium",
            popupContent: "This is where the Rockies play!"
          },
          geometry: {
            type: "Point",
            coordinates: [51.2297, 20.0122]
          }
        }
      ]
    };
  },
  methods: {
    showPopup(e) {
      console.log(e);
    },
    zoomUpdated(zoom) {
      this.zoom = zoom;
    },
    centerUpdated(center) {
      this.center = center;
    },
    boundsUpdated(bounds) {
      getPointsForBounds(bounds);
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
  }
};
</script>

<style>
</style>