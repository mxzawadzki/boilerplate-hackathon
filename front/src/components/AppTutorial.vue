<template>
<div class="slider">
    <v-carousel
    height="500"
    :show-arrows="false"
    >
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="slide.color"
        height="300"
      >
        <v-sheet
          :color="slide.color"
          height="100%"
          tile
        >
          <v-row
            class="fill-height"
            align="start"
            justify="end"
          >
            <div class="display-3">
              <img class="slider__img" :src="slide.img">
              <p class="slider__title" v-if="i == 0">Witaj w aplikacji</p>
              <p class="slider__app-title" v-if="i == 0">WZB</p>
              <p class="slider__number" v-if="i > 0">{{ i }}</p>
              <v-btn class="slider__button" color="yellow darken-2" v-if="i === 4" @click="closeTutorial">Do dzieła!</v-btn>
              <p class="slider__text" :class="{'slider__subtitle': i == 0}">{{slide.text}}</p>
            </div>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
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
        text: 'Ocal świat przed plastikiem'
      },
      {
        // img: require('@/assets/img/slide1.jpg'),
        color: 'red',
        text: 'Zaloguj się lub wyświetl mapę'
      },
      {
        // img: require('@/assets/img/slide1.jpg'),
        color: 'yellow darken-2',
        text: 'Znajdź najbliższy butelkomat'
      },
      {
        // img: require('@/assets/img/slide1.jpg'),
        color: 'light-green',
        text: 'Zeskanuj kod QR i wrzuć butelkę'
      },
      {
        // img: require('@/assets/img/slide1.jpg'),
        color: 'primary',
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

<style lang="scss">
.slider {
  width: 100vw;
  position: absolute;
  z-index: 1001;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

  &__number {
    font-size: 25rem;
    font-weight: 800;
    opacity: .2;
    position: absolute;
    top: 10rem;
    left: 1rem;
  }

  &__title {
    font-size: 2rem;
    margin: 0 5rem 2rem 5rem;
    font-weight: 500;
    letter-spacing: 1.5px;
    position: absolute;
    top: 2rem;
    left: -3rem;
    text-align: left;
  }

  &__app-title {
    font-family: 'Monoton';
    font-size: 5.5rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  &__subtitle {
    font-size: 1.2rem !important;
    margin: 0 5rem 1.6rem 5rem !important;
    line-height: 1.5;
    bottom: -19.2rem !important;
  }

  &__text {
    font-size: 2rem;
    margin: 0 5rem 2rem 5rem;
    font-weight: 500;
    letter-spacing: 1.5px;
    position: relative;
    bottom: -2rem;
    left: 3rem;
    text-align: right;
  }

  &__button {
    position: absolute !important;
    bottom: 5rem !important;
    // right: 1.5rem !important;
    height: 4rem !important;
    width: 11rem !important;
    font-size: 1.5rem !important;
    font-weight: 500 !important;
    transform: translateX(-50%);
  }
}

@media screen and (min-width: 375px) {
  .slider {
      &__app-title {
      font-size: 6.6rem;
    }
  }
}

@media screen and (min-width: 768px) {
  .slider {
    min-width: 680px;
    width: auto;

    &__button {
    height: 4rem !important;
    width: 15rem !important;
    font-size: 2rem !important;
    font-weight: 500 !important;
    }
  }

}
</style>