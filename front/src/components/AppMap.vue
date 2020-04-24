<template>
  <l-map
    style="height: 100vh; width: 100vw"
    :zoom="zoom"
    :center="computedCenter"
    @update:zoom="zoomUpdated"
    @update:center="centerUpdated"
    @update:bounds="boundsUpdated"
  >
    <l-tile-layer :url="url"></l-tile-layer>
    <l-marker v-if="userAccept" :lat-lng="user.geometry.coordinates">
      <l-icon>
        <v-icon class="marker__icon">mdi-account</v-icon>
      </l-icon>
    </l-marker>
    <l-marker
      v-for="marker in markers"
      :key="marker.id"
      :lat-lng="marker.geometry.coordinates"
      @click="showPopup"
    >
      <l-popup>
        <p class="marker__text">{{ marker.properties.popupContent }}</p>
        <ul class="marker__list">
          <li>{{ marker.properties.week_at }}</li>
          <li>{{ marker.properties.weekend_at }}</li>
        </ul>
        <a
          class="marker__link"
          target="_blank"
          :href="
            baseUrl +
              '&origin=' +
              setCoords(user.geometry.coordinates) +
              '&destination=' +
              setCoords(marker.geometry.coordinates)
          "
          v-if="user.geometry.coordinates"
          >Znajdź drogę <v-icon color="#fbc02d">mdi-google-maps</v-icon></a
        >
        <a
          class="marker__link"
          target="_blank"
          :href="
            baseUrl + '&destination=' + setCoords(marker.geometry.coordinates)
          "
          v-else
          >Znajdź drogę <v-icon color="#fbc02d">mdi-google-maps</v-icon></a
        >
      </l-popup>
    </l-marker>
  </l-map>
</template>

<script>
import { LMap, LTileLayer, LMarker, LPopup, LIcon } from "vue2-leaflet";
import { getPointsForBounds } from "@/utils/api.js";

export default {
  props: ["center"],
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
      zoom: 13,
      // baseUrl: 'https://www.google.pl/maps/place/',
      baseUrl: "https://www.google.com/maps/dir/?api=1",
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
  computed: {
    computedCenter: {
      get() {
        return this.center;
      },
      set(v) {
        this.$emit("update:center", v);
      }
    }
  },
  methods: {
    successPosition(position) {
      // console.log("invoke successPosition");
      const { latitude } = position.coords;
      const { longitude } = position.coords;
      // console.log(position, "position", this.userAccept);
      this.userAccept = true;
      this.getUserPermission = true;

      // status.textContent = '';
      this.user.geometry.coordinates = [latitude, longitude];
      this.computedCenter = [latitude, longitude];
      this.$emit("onUserPosition", [latitude, longitude]);
    },
    errorPosition() {
      //  status.textContent = 'Unable to retrieve your location'
      // TODO center on warsaw
      //origin: '52.183554,21.000471',
      console.log("fail pos");
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
      console.log(this.userAccept);
      return coords.join();
    },
    showPopup(e) {
      console.log(e);
    },
    zoomUpdated(zoom) {
      this.zoom = zoom;
    },
    centerUpdated(center) {
      this.computedCenter = center;
    },
    boundsUpdated(bounds) {
      getPointsForBounds(bounds).then(markers => {
        this.markers = markers;
        console.log(markers, "markers");
      });
      this.bounds = bounds;
    }
  },
  mounted() {
    this.getUserPermission();
  }
};
</script>

<style lang="scss">
.leaflet-marker-icon {
  position: relative;
}

.leaflet-popup-content-wrapper {
  border-radius: 4px !important;
  overflow: hidden;
}
.leaflet-popup-content {
  margin: 20px 30px !important;
  line-height: 1.5 !important;
  position: relative;
  z-index: 1;
}

.leaflet-popup-close-button {
  z-index: 1001;
  color: #333 !important;
  padding: 11px 24px 0 0 !important;
}

.leaflet-popup-content p::before {
  content: "WZB";
  position: absolute;
  top: -57px;
  left: -58px;
  font-family: "Monoton";
  font-size: 5rem;
  opacity: 0.028;
  z-index: -1;
}

.marker {
  &__icon {
    position: relative;
    top: -4px;
    left: -4px;
    background: white;
    border-radius: 900px;
    padding: 8px;
  }
  &__text {
    font-size: 1.2rem;
    font-weight: 600;
    margin: 0 0 1rem 0;
    position: relative;
    z-index: 1;
  }

  &__link {
    font-size: 1rem;
    text-decoration: none;
    color: #333 !important;
    display: block;
    text-align: right;
    text-transform: uppercase;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    position: relative;
    z-index: 2;
  }

  &__headline {
    font-size: 1rem;
  }

  &__list {
    list-style: none;
    text-align: right;
    padding: 0 !important;
    margin-bottom: 1rem;
  }
}
</style>
