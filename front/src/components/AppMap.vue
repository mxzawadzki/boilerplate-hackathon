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
import { LMap, LTileLayer, LMarker, LPopup, LIcon } from "vue2-leaflet";
import { getPointsForBounds } from "@/utils/api.js";

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
      // fake origin:
      origin: "52.183554,21.000471",
      userAccept: false,
      user: {
        geometry: {}
      },
      url: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
      icon: L.icon({
        iconUrl: require("@/assets/img/bottle.png"),
        iconSize: [50, 50],
        iconAnchor: [0, 0]
      }),
      staticAnchor: [0, 0],
      customText: "Bottle Drop",
      iconSize: 50,
      zoom: 16,
      center: [52.2297, 21.0122],
      // baseUrl: 'https://www.google.pl/maps/place/',
      baseUrl: "https://www.google.com/maps/dir/?api=1&origin=",
      markers: [
        {
          type: "Feature",
          properties: {
            name: "RKS Skra",
            amenity: "Przed wejściem na stadion",
            popupContent: "Najlepsze ceny na Mokotowie"
          },
          geometry: {
            type: "Point",
            coordinates: [52.215901, 20.994437]
          }
        },
        {
          type: "Feature",
          properties: {
            name: "Ambasada Japonii",
            amenity: "20 metrów od przystanku",
            popupContent: "Plastik jest fe"
          },
          geometry: {
            type: "Point",
            coordinates: [52.21667, 21.040324]
          }
        },
        {
          type: "Feature",
          properties: {
            name: "Ambasada Japonii",
            amenity: "20 metrów od przystanku",
            popupContent: "Plastik jest fe"
          },
          geometry: {
            type: "Point",
            coordinates: [52.233076, 21.095317]
          }
        },
        {
          type: "Feature",
          properties: {
            name: "Gocławski Balaton",
            amenity: "Przy paczkomacie",
            popupContent: "Plastik jest fe"
          },
          geometry: {
            type: "Point",
            coordinates: [52.228019, 21.089367]
          }
        }
      ]
    };
  },
  methods: {
    successPosition(position) {
      const { latitude } = position.coords;
      const { longitude } = position.coords;
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
      }
    },
    getUserPosition() {},
    setCoords(coords) {
      return coords.join();
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
      getPointsForBounds(bounds).then(markers => {
        this.markers = markers;
      });
      this.bounds = bounds;
    }
  },
  mounted() {
    this.getUserPermission();
  }
};
</script>

<<<<<<< HEAD
=======
<<<<<<< HEAD
<style>
</style>
=======
>>>>>>> origin/f/auth
<style lang="scss">
.leaflet-marker-icon {
  position: relative;
}
.marker {
  &__text {
    font-size: 1rem;
  }

  &__headline {
    font-size: 1rem;
  }
}
</style>
<<<<<<< HEAD
=======
>>>>>>> c1a849f208791206618cd7ad1cdfdc3f10fbed95
>>>>>>> origin/f/auth
