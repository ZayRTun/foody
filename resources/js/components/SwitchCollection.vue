<template>
    <div class="container optionInfo">
        <div class="row">
            <div class="col">
                <form class="form-inline">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Collection:</label>
                    <select v-model="selected" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" @change="collectionChanged()">
                        <option v-for="col in collections" v-bind:value="col.id" v-text="col.title" :key="col.id">{{col.title}}</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        props: ['collections', 'current'],

        data() {
            return {
                selected: this.current.id,
            }
        },

        methods: {
            collectionChanged() {
                Event.$emit('collectionChanged', this.selected)
            }
        },

        mounted() {
        }
    }
</script>

<style>

</style>
