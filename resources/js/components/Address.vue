<template>

    <div class="col-2" >
        <div class="address-container" @click="clicked = ! clicked">
            <a >

                <i class="fas fa-map-marker-alt"></i> {{curTownship + ', ' + curAddress}}

            </a>
        </div>

        <!-- Modal -->
        <transition name="fade">
            <div v-if="clicked" class="modal fade show" style="padding-right: 15px; display: block;" id="addressModalCenter" tabindex="-1" role="dialog" aria-labelledby="addressModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="  text-center" id="addressModalCenterTitle"><i class="fas fa-map-marker-alt"></i> Change address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pick an area</label>
                                <select v-model="curTownship" class="form-control" id="exampleFormControlSelect1">
                                    <option v-for="tsp in townships" v-text="tsp" :key="tsp"></option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Change your location</label>
                                <input type="address" class="form-control" id="exampleFormControlInput1" v-model="curAddress">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clicked = ! clicked">Close</button>
                        <button type="button" class="btn btn-primary" @click="saveAddress()">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>

</template>

<script>
export default {

    props: ['currentAddress', 'tspList'],

    data() {
        return {
            user_id: '',
            address: {},
            townships: [],
            curAddress: '',
            curTownship: '',
            clicked: false
        }
    },

    created() {
        this.user_id = this.currentAddress.user_id;
        this.address = this.currentAddress;
        this.townships = this.tspList;
        this.curAddress = this.currentAddress.address;
        this.curTownship = this.currentAddress.township;
        console.log(this.tspList)
    },

    methods: {
        toggleModal() {
            if (this.clicked == false) {

                this.clicked = true

            } else {
                this.clicked = false
            }
        },

        saveAddress() {
            axios.put('/api/collection' , {
                user_id: this.user_id,
                township: this.curTownship,
                address: this.curAddress
            })
            .then(response => {
                console.log(response)
            })
        }
    }
}
</script>

<style>
    .modalBtn {
        padding: 10px 0;
    }

    .modal {
        color: red;
    }

    .address-container {
        height: 100%;
        padding: 15px 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-weight: bolder;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
