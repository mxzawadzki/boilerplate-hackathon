<template>
    <button @click="ok">OK</button>
</template>


<script>

export default {
  name: "social-google",
  methods: {
      ok() {
          window.close();
      }
  },
  data() {
    return {};
  },
  mounted() {

    //   window.close()
  }
};

</script>