<template>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <h1 class="">
                {{ user.name }}
                <img :src="'storage/user_img/' + user.image_path" />
            </h1>
        </div>
    </div>

    <div class="p-3 bg-white shadow rounded-lg">
        <input type="file" name="image" accept="image/*" @change="setImage" />

        <!-- Image previewer -->
        <img :src="imageSrc" width="100" />

        <!-- Cropper container -->
        <div
        v-if="this.imageSrc"
        class="my-3 d-flex align-items-center justify-content-center mx-auto"
        >
        <vue-cropper
            class="mr-2 w-50"
            ref="cropper"
            :guides="true"
            :src="imageSrc"
            :aspect-ratio="1/1"
        ></vue-cropper>

        <!-- Cropped image previewer -->
        <img class="ml-2 w-50 bg-light" :src="croppedImageSrc" />
        </div>
        <button v-if="this.imageSrc" @click="cropImage">Crop</button>
        <button v-if="this.croppedImageSrc" @click="uploadImage">Upload</button>
    </div>

</div>
</template>

<script>
import axios from 'axios'
import VueCropper from 'vue-cropperjs';
import 'cropperjs/dist/cropper.css';

export default {
    components: {
        VueCropper
    },
    data: function () {
        return {
            user: [],
            imageSrc: "",
            croppedImageSrc: "",
            option: {
                img: "",
                size: 1,
                outputType: "jpeg",
                autoCrop: true,
                autoCropWidth: 400,
                autoCropHeight: 400,
                centerBox: true,
                fixedBox: true
            },
        }
    },
    computed: {

    },
    methods: {
      setImage: function (e) { //https://chafikgharbi.com/image-crop-upload
        const file = e.target.files[0]
        if (!file.type.includes("image/")) {
          alert("Please select an image file")
          return
        }
        if (typeof FileReader === "function") {
          const reader = new FileReader()
          reader.onload = event => {
            this.imageSrc = event.target.result

            // Rebuild cropperjs with the updated source
            this.$refs.cropper.replace(event.target.result)
          }
          reader.readAsDataURL(file)
        } else {
          alert("Sorry, FileReader API not supported")
        }
      },
      cropImage() {
        // Get image data for post processing, e.g. upload or setting image src
        this.croppedImageSrc = this.$refs.cropper.getCroppedCanvas().toDataURL()
      },
      uploadImage() {
        let me = this
        this.$refs.cropper.getCroppedCanvas().toBlob(function (blob) {
          let formData = new FormData()

          // Add name for our image
          formData.append("name", "image-name-" + new Date().getTime())

          // Append image file
          formData.append("image", blob)

         axios
            .post(`api/upload_user_image/${me.$route.params.id}`,formData)
            .then(response => {
              console.log(response.data)
            })
            .catch(function (error) {
              console.log(error)
            })
        })
      },
    },
    async mounted() {
        console.log('UserEdit mounted.')
        await axios
            .get(`/api/users/${this.$route.params.id}`)
            .then(response => (this.user = response.data))
    }
}
</script>

<style lang="scss" scoped>
</style>