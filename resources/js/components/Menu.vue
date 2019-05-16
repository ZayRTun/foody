<template>

    <div class="container">

        <div class="row">

            <card v-for="col in menus" :key="col.id" :image="col.image" :price="col.price">

                <template slot="title">{{col.title}}</template>
                <template slot="description">{{col.description}}</template>

            </card>

        </div>

    </div>

</template>

<script>

    export default {
        props: ['currentMenus'],

        data() {
            return {
                menus: {}
            }
        },

        created() {
            this.menus = this.currentMenus,

            Event.$on('collectionChanged', id => {
                axios.get('/api/collection/' + id)
                .then(response => {
                    this.menus = response.data
                })
            })
        }
    }

</script>

<style>

</style>
