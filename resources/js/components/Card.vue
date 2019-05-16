<template>

    <div class="col-sm-6 col-md-4  mb-4">

        <div class="card menuCard h-100">

            <img :src="image" class="card-img-top" alt="">

            <div class="card-body">

                <div class="description mb-4">

                    <h5 class="card-title">
                        <a href="#" class="text-decoration-none text-reset"><slot name="title"></slot></a>
                    </h5>

                    <p class="card-text">
                        <slot name="description"></slot>
                    </p>

                </div>

                <div class="row">

                    <div class="col" v-text="'Ks ' + price"></div>

                    <div class="col text-right">
                        <button type="button" class="btn btn-outline-success btn-sm" @click="addItem">+</button>
                            <span class="qty">{{ quantity }}</span>
                        <button type="button" class="btn btn-outline-success btn-sm" @click="minItem" :disabled="base">-</button>
                    </div>

                </div>

            </div>

        </div>

    </div>
    
</template>

<script>

    export default {
        
        props: [
            'image',
            'price'
        ],

        data() {
            return {
                base: true,
                quantity: 0
            }
        },

        methods: {
            addItem() {
                this.quantity += 1;
                this.base = false;
            },
            minItem() {
                this.quantity -= 1;
                if (this.quantity == 0) this.base = true;
                
            }
        }
        
    }

</script>

<style>

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .btn:focus {
        outline: none;
        box-shadow: none;
    }

    .qty {
        display: inline-block;
        padding: 0 5px 0 5px;
        box-sizing: border-box;
    }
    
</style>
