<template>
  <canvas ref="video"></canvas>
</template>

<script>
export default {
  name: "scanner",
  data() {
    return {};
  },
  mounted() {
    this.video = this.$refs.video;
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
        this.video.src = window.URL.createObjectURL(stream);
        this.video.play();
      });
    }
  }
};
</script>

<style>
</style>