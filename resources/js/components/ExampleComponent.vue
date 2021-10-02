<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" :key="product.id" v-for="product in products">
                    <div class="card-header">
                       {{product.name}}
                    
                   
                    
                    </div>

                    <div class="card-body">
                         Quantity:  {{product.quantity}}
                         Price:  {{product.sale_price}}   

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>

    export default {
        data:function () {
            return{
               products: {},
            }
        },
        methods:{
            loadProducts(){
                let url = 'api/products';
                axios.get(url)
                    .then(response =>{
                        //  console.log("here",response.data.data);
                        this.products = response.data;
                    })
            },
            
            
        },
        mounted(){
           this.loadProducts();
        },
    }
</script>
