<template>
<div class="w-100"><!-- https://iwasawa-officialweb.com/2019/07/21/vue-transition/ -->
    <div id="app">
      <div class="slider-outer">
        <div class="slider-inner" :key="idx" v-for="(slide, idx) in slides" @click="slideTransition">
            <img class="slide-img" v-if="current_slide == idx" v-bind:src="'storage/' + slides[idx].img" :key="slides[idx].img">
        </div>
      </div>
    </div>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            current_slide: 0,
            slides: [
                {img: 'slideshow1.png'},
                {img: 'slideshow2.png'},
                {img: 'slideshow3.png'}
            ],
        }
    },
    mounted() {
        console.log('Slideshow mounted.')
    　　setInterval(() => {
            this.slideTransition()
        }, 10000)
    },
    methods: {
        slideTransition() {
            this.current_slide = this.current_slide < this.slides.length -1 ? this.current_slide +1 : 0
        },
    },

}
</script>

<style lang="scss" scoped>
.slider-outer{
    position: relative;
    width: 100%;
    height: 450px;
    overflow: hidden;
    margin: 0 auto 20px;

    box-shadow: 1px 1px 5px rgba(20,20,20,0.2);
    border-radius: 8px 8px 15px 15px;
    background : linear-gradient(to right,
                                red    13.3%,
                                orange 15.3%,
                                orange 27.6%,
                                yellow 29.6%,
                                yellow 41.9%,
                                lime  43.9%,
                                lime  56.2%,
                                aqua   58.2%,
                                aqua   70.5%,
                                blue   72.5%,
                                blue   84.8%,
                                fuchsia 86.8%);
}
.slider-inner{
    position: absolute;
    width: 100%; 
    height: 450px;

    margin:3 0;
}
.slide-img {
    width: 100%;
    height: 450px;
    object-fit: cover;
}
</style>