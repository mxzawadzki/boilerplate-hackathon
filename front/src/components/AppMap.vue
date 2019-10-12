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
<<<<<<< HEAD
    <l-marker v-if="userAccept" :lat-lng="user.geometry.coordinates">
      <l-icon>
        <div class="d">User</div>
      </l-icon>
    </l-marker>
=======
>>>>>>> HEAD@{4}
    <l-marker
      v-for="marker in markers"
      :key="marker.id"
      :lat-lng="marker.geometry.coordinates"
      @click="showPopup"
    >
<<<<<<< HEAD
      <l-popup>{{marker.properties.popupContent}}</l-popup>
      <l-icon :icon-anchor="staticAnchor" class-name="someExtraClass">
        <div class="headline">{{ customText }}</div>
        <img src="@/assets/img/bottle.png" />
      </l-icon>
=======
      <l-tile-layer :url="url"></l-tile-layer>
      <l-marker v-if="userAccept" :lat-lng="user.geometry.coordinates">
        <l-icon>
          <div class="d">User</div>
        </l-icon>
      </l-marker>
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
>>>>>>> HEAD@{4}
    </l-marker>
  </l-map>
</template>

<script>
<<<<<<< HEAD
=======
import { getPointsForBounds } from "@/utils/api.js";
>>>>>>> HEAD@{4}
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
      userAccept: false,
      user: {
        geometry: {}
      },
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
<<<<<<< HEAD
      center: [52.2297, 21.0122],
=======
      center: [52.211900643211195, 20.99944747210445],
>>>>>>> HEAD@{4}
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
    successPosition(position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;
      this.getUserPermission = true;
<<<<<<< HEAD

      // status.textContent = '';
      this.user.geometry.coordinates = [latitude, longitude];
      this.center = [latitude, longitude];
    },
    errorPosition() {
      //  status.textContent = 'Unable to retrieve your location'
      // TODO center on warsaw
    },
    getUserPermission() {
      if ("geolocation" in navigator) {
        /* geolocation is available */
        navigator.geolocation.getCurrentPosition(
          this.successPosition,
          this.errorPosition
        );
        console.log("success");
      } else {
        /* geolocation IS NOT available */
        return;
=======
      // status.textContent = '';
      // this.user.geometry.coordinates = [latitude, longitude]
      this.center = [latitude, longitude];
    },
    getUserPermission() {
      console.log("inside getUse");
      if ("geolocation" in navigator) {
        /* geolocation is available */
        navigator.geolocation.getCurrentPosition(this.successPosition);
>>>>>>> HEAD@{4}
      }
    },
    getUserPosition() {},
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
<<<<<<< HEAD
=======
      getPointsForBounds(bounds);
>>>>>>> HEAD@{4}
      this.bounds = bounds;
    }
  },
  mounted() {
    this.getUserPermission();
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
