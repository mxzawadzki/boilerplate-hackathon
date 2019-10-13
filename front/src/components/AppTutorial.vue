<template>
<div class="slider">
  <v-app id="inspire">
    <v-carousel>
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="slide.color"
      >
        <v-sheet
          :color="slide.color"
          height="100%"
          tile
        >
          <v-row
            class="fill-height"
            align="center"
            justify="center"
          >
            <div class="display-3">
              <img class="slider__img" :src="slide.img">
              <p class="slider__number">{{ i + 1 }}</p>
              <p class="slider__text">{{slide.text}}</p>
              <button v-if="i === 3" @click="closeTutorial">Do dzieła!</button>
            </div>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
  </v-app>
</div>
</template>

<script>
export default {
data () {
  return {
    slides: [
      {
        // img: require('@/assets/img/slide1.jpg'),
        color: 'primary',
        text: 'Zaloguj się lub wyświetl mapę'
      },
      {
        // img: require('@/assets/img/slide1.jpg'),
        color: 'secondary',
        text: 'Znajdź najbliższy butelkomat'
      },
      {
        // img: require('@/assets/img/slide1.jpg'),
        color: 'yellow darken-2',
        text: 'Zeskanuj kod QR i wrzuć butelkę'
      },
      {
        // img: require('@/assets/img/slide1.jpg'),
        color: 'red',
        text: 'Za każdą butelkę zdobywaj super nagrody'
      }
    ],
  }
},
methods: {
  closeTutorial() {
    this.$emit('closeTutorial')
  }
}
}
</script>

<style>

</style>