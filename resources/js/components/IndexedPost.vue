<template>
    <div class="col-6 offset-3 mb-4 mt-2" style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);">
        <div class="d-flex align-items-center pt-2 pb-2">
            <div class="pr-3">
                <img :src="profileImage" class="w-100 rounded-circle"
                     style="max-width: 50px">
            </div>
            <div>
                <a :href="'/profile/'+ userId" style="text-decoration: none">
                    <span class="font-weight-bold text-dark" v-text="username"></span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="">
                <img :src="image" class="w-100">
            </div>
        </div>

        <div class="row pt-3 pl-3 pr-3">
            <div>
                <h2>
                    <span class="fa fa-heart heart" v-bind:class="{like:status}" @click="likePost"></span>
                    <span v-text="likesText" style="font-size: 15pt"></span>
                </h2>
                <p>
                    <a :href="'/profile/'+ userId" style="text-decoration: none">
                        <span class="font-weight-bold text-dark" v-text="username + ' '"> </span>
                    </a>
                    <span v-text="caption"></span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['profileImage', 'userId', 'username', 'image', 'caption', 'liked', 'postId'],

        data: function () {
            return {
                status: this.liked,
                noOfLikes: 0,
            }
        },

        created() {
            axios.get('/api/like/' + this.postId)
                .then(res => {
                    this.noOfLikes = res.data;
                    console.log(res.data);
                })
                .catch(err => console.log(err));
        },

        methods: {
            likePost() {
                axios.post('/api/like/' + this.postId)
                    .then(res => {
                        this.status = !this.status;
                        if (this.status) {
                            this.noOfLikes++;
                        } else {
                            this.noOfLikes--;
                        }
                        console.log(res);
                    })
                    .catch(err => console.log(err));
            }
        },

        computed: {
            likesText() {
                let text = " like";
                if (this.noOfLikes !== 1)
                    text = " likes";
                return this.noOfLikes + text;
            }
        }
    }
</script>

<style scoped>

    .heart {
        color: #2e2e2e;
        font-size: 20pt;
        margin-right: 7px;
    }

    .like {
        color: red;
    }
</style>
