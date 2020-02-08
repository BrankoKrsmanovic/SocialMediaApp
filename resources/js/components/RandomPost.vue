<template>
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row pt-3 pb-3">
                <h1>Get Random Post</h1>
            </div>

            <div class="row form-group ">
                <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>

                <input id="caption" type="text"
                       class="form-control" name="caption"
                       autofocus required autocomplete="off"
                       v-model="caption"
                >
            </div>

            <div class="row">
                <button @click="getRandomImage" class="btn btn-warning">Get Random Image</button>
            </div>
            <div class="row pt-4">
                <img :src="url" v-show="show" style="width: 500px; height: 500px">
            </div>
            <div class="row">
                <button @click="saveRandomPost" class="btn btn-primary mt-4" v-show="show && caption.length > 0">Add New
                    Post
                </button>
            </div>
            <spinner v-show="spinner"/>
        </div>
    </div>
</template>

<script>

    export default {

        mounted() {
            console.log('Component mounted.');
        },

        data: function () {
            return {
                url: '',
                show: false,
                caption: '',
                spinner: false,
            }
        },

        methods: {
            getRandomImage() {
                this.spinner = true;
                axios.get(`https://picsum.photos/id/${Math.floor(Math.random() * 1000)}/info`)
                    .then(response => {
                        this.url = response.data.download_url + ".jpg";
                        this.show = true;
                        this.spinner = false;
                        console.log(response.data.download_url);
                    })
                    .catch(error => {
                        this.getRandomImage();
                        console.log(error);
                    });
            },

            saveRandomPost() {
                this.spinner = true;
                axios.post('/post/random', {
                    caption: this.caption,
                    url: this.url,
                })
                    .then(res => {
                        console.log(res);
                        window.location.replace(res.data.profile);
                    })
                    .catch(err => console.log(err));
            }
        },
    }
</script>

