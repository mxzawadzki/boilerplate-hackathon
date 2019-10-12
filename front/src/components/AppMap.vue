<template>
  <l-map
    style="height: 100vh; width: 100vw"
    :zoom="zoom"
    :center="center"
    @update:zoom="zoomUpdated"
    @update:center="centerUpdated"
    @update:bounds="boundsUpdated"
  >
    <l-tile-layer :url="url"></l-tile-layer><<<<<<< HEAD
    <l-marker v-if="userAccept" :lat-lng="user.geometry.coordinates">
      <l-icon>
        <div class="d">User</div>
      </l-icon>
    </l-marker>
      <l-marker v-for="marker in markers" :key="marker.id" :lat-lng="marker.geometry.coordinates" @click="showPopup">
        <l-popup>
          <p class="marker__text">{{marker.properties.popupContent}}</p>
          <a class="marker__link" :href="baseUrl + setCoords(marker.geometry.coordinates)">Link</a>
        </l-popup>
        <l-icon
          :icon-anchor="staticAnchor"
          class="marker__icon"
          class-name="someExtraClass">
          <div class="headline">{{ customText }}</div>
          <img src="@/assets/img/bottle.png" />
        </l-icon>
      </l-marker>
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
      center: [52.2297, 21.0122],
      // baseUrl: 'https://www.google.pl/maps/place/',
      baseUrl: 'https://www.google.com/maps/dir/?api=1&origin=',
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
      }
    },
    getUserPosition() {},
    setCoords(coords) {
      return coords.join()
    },
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

<<<<<<< HEAD
<style>
</style>
=======
<style lang="scss">
.marker {
  &__text {
    font-size: 1rem;
  }
}
</style>
>>>>>>> c1a849f208791206618cd7ad1cdfdc3f10fbed95
