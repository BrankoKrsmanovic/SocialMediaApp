<template>
    <div>
        <div class="input-group" ref="search">
            <input type="text" v-model="search" class="form-control">
            <div class="input-group-prepend">
                <button
                    @click.prevent="findUsers()"
                    class="btn btn-primary">
                    <i class="fa fa-search"></i></button>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div
                v-show="showsearch"
                v-closable="{
                    exclude: ['search'],
                    handler: 'onClose'
                }">
                <div class="row d-flex justify-content-center pt-3 pb-3 holder">
                    <div v-for="profile in profiles" v-bind:key="profile.id">
                        <div class="card mb-2 mt-2 p-2 ml-auto" style="min-width: 17rem; display: block; width: 100%">
                            <a :href="'/profile/' + profile.user_id"
                               style="text-decoration: none"
                            >
                                <img
                                    :src="'/storage/'+ profile.image"
                                    class="rounded-circle"
                                    style="max-width: 50px">
                                <span class="text-dark ml-2">{{profile.user.username}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from "vue";

    let handleOutsideClick;

    Vue.directive('closable', {
        bind(el, binding, vnode) {
            handleOutsideClick = (e) => {
                e.stopPropagation();
                const {handler, exclude} = binding.value;
                let clickedOnExcludedEl = false;

                exclude.forEach(refName => {
                    if (!clickedOnExcludedEl) {
                        const excludedEl = vnode.context.$refs[refName];
                        clickedOnExcludedEl = excludedEl.contains(e.target);
                    }
                });

                if (!el.contains(e.target) && !clickedOnExcludedEl) {
                    vnode.context[handler]();
                }
            };
            document.addEventListener('click', handleOutsideClick);
            document.addEventListener('touchstart', handleOutsideClick);
        },
        unbind() {
            document.removeEventListener('click', handleOutsideClick);
            document.removeEventListener('touchstart', handleOutsideClick);
        }
    });

    export default {
        data: function () {
            return {
                search: '',
                showsearch: false,
                profiles: []
            }
        },
        methods: {
            findUsers() {
                axios.get('/api/profile/' + this.search)
                    .then(response => {
                        this.profiles = response.data;
                        if (this.profiles.length > 0)
                            this.showsearch = true;
                        this.search = '';
                        console.log(response.data);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            onClose() {
                this.showsearch = false;
            }
        }
    }
</script>

<style scoped>
    .holder {
        width: 20rem;
        background-color: #ffffff;
        z-index: 100;
        position: fixed;
        top: 6vh;
        left: calc((100% - 14.3rem) / 2);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
    }
</style>
