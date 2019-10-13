<template>
  <div class="Scanner__wrapper">
    <!-- <p class="error">{{ error }}</p> -->

    <!-- <p class="decode-result">
      Last result:
      <b>{{ result }}</b>
    </p> -->

    <qrcode-stream
      @decode="onDecode"
      @init="onInit"
      class="Scanner__VideoPreview"
    />
  </div>
</template>

<script>
import { QrcodeStream } from "vue-qrcode-reader";
import { verifyString } from "@/utils/api.js";

export default {
  components: { QrcodeStream },

  data() {
    return {
      result: "",
      error: ""
    };
  },

  methods: {
    onDecode(result) {
      verifyString(result).then(data => {
        console.log(data);
      });
      this.$emit("closeScannerModal");
    },

    async onInit(promise) {
      try {
        await promise;
      } catch (error) {
        if (error.name === "NotAllowedError") {
          this.error = "ERROR: you need to grant camera access permisson";
        } else if (error.name === "NotFoundError") {
          this.error = "ERROR: no camera on this device";
        } else if (error.name === "NotSupportedError") {
          this.error = "ERROR: secure context required (HTTPS, localhost)";
        } else if (error.name === "NotReadableError") {
          this.error = "ERROR: is the camera already in use?";
        } else if (error.name === "OverconstrainedError") {
          this.error = "ERROR: installed cameras are not suitable";
        } else if (error.name === "StreamApiNotSupportedError") {
          this.error = "ERROR: Stream API is not supported in this browser";
        }
      }
    }
  }
};
</script>

<style scoped>
.error {
  font-weight: bold;
  color: red;
}
.Scanner__wrapper {
  /* position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 100;
  background-color: black;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center; */
}
</style>
