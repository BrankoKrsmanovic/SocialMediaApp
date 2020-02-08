<template>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img :src="image" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
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
                    <hr>
                    <p>
                        <a :href="'/profile/'+ userId" style="text-decoration: none">
                            <span class="font-weight-bold text-dark" v-text="username + ' '"></span>
                        </a>
                        <span v-text="caption"></span>
                    </p>

                    <h2 v-show="canlike">
                        <span class="fa fa-heart heart" v-bind:class="{like:status}" @click="likePost"></span>
                        <span v-text="likesText" style="font-size: 15pt"></span>
                        <span class="fa fa-trash trash" @click="deletePost" v-show="candelete"></span>
                    </h2>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['profileImage', 'userId', 'username', 'image', 'caption', 'liked', 'postId', 'candelete'],

        data: function () {
            return {
                status: this.liked,
                noOfLikes: 0,
                canlike: true,
            }
        },

        created() {
            axios.get('/api/like/' + this.postId)
                .then(res => {
                    this.noOfLikes = res.data.no_of_likes;
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
            },

            deletePost() {
                axios.delete('/api/post/' + this.postId)
                    .then(res => {
                        this.canlike = false;
                        console.log(res.data);
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

    .trash {
        color: #2e2e2e;
        font-size: 20pt;
        margin-left: 7px;
    }

    .like {
        color: red;
    }
</style>
