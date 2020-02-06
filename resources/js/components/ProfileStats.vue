<template>
    <div class="d-flex">
        <div class="pr-sm-5">
            <span class="font-weight-bold" v-text="posts"></span>
            <span>posts</span>
        </div>
        <div class="pr-sm-5">
            <span class="font-weight-bold" v-text="followers"></span>
            <span> followers</span>
        </div>
        <div class="pr-sm-5">
            <span class="font-weight-bold" v-text="following"></span>
            <span>following</span>
        </div>
    </div>
</template>

<script>

    import {EventBus} from "../app";

    export default {
        props: ['followersCount', 'followingCount', 'postsCount'],

        mounted() {
            console.log("followersCount: " + this.followersCount);
        },

        data: function () {
            return {
                count: this.followersCount,
            }
        },

        created() {
            EventBus.$on('clicked', status => {
                this.change(status);
            });
        },

        methods: {
            change(status) {
                if (status)
                    this.count++;
                else
                    this.count--;
            }
        },

        computed: {
            followers() {
                return this.count;
            },

            following() {
                return this.followingCount;
            },

            posts() {
                return this.postsCount;
            }
        }
    }
</script>
