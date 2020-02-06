<template>
    <div>
        <button
            @click="followUser"
            class="btn btn-primary ml-4"
            v-text="buttonText"
        >
        </button>
    </div>
</template>

<script>

    import {EventBus} from "../app";

    export default {

        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.');
        },

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/api/follow/' + this.userId).then(response => {
                    this.status = !this.status;
                    EventBus.$emit('clicked', this.status);
                    console.log(response.data);
                }).catch(error => {
                    if (error.response.status) {
                        window.location = "/login";
                    }
                });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }

    }
</script>
