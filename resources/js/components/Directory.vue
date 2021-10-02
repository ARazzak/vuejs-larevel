<template>
        <div>
            <h2>{{myName}}</h2>
            <div class="row justify-content-center">

                
               <div class="col-md-8"> 
                  <form @submit.prevent="addProduct" enctype="multipart/form-data" >   
                    <div class="form-group">
                       <span for="brand">Product Name</span>
                        <input 
                            type="text"                      
                            placeholder="Product Name"
                            class="form-control"
                            v-model="product.name"
                            > 
                    </div> 

                    <div class="form-group">
                       <span for="brand">Product Quantity</span>
                        <input 
                            type="text"
                            placeholder="Quantity"
                            class="form-control"
                             v-model="product.quantity"
                            > 
                    </div> 

                      <div class="form-group">
                    <span for="brand">Product Price</span>
                        <input 
                            type="number"
                            placeholder="Product Price"
                            class="form-control"
                            v-model="product.price"
                            
                            > 
                    </div> 

                    <div class="form-group">
                        <span for="brand">Category Name</span>
                            <select class="form-control" v-model="product.category">
                                <option value="">Select Option</option>
                                <option value="class A">Class A</option>
                                <option value="class B">Class B</option>
                                <option value="class C">Class C</option>
                                <option value="class D">Class D</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <span for="brand">Brand Name</span>
                            <select class="form-control" v-model="product.brand">
                                <option value="">Select Option</option>
                                <option value="class A">Class A</option>
                                <option value="class B">Class B</option>
                                <option value="class C">Class C</option>
                                <option value="class D">Class D</option>
                            </select>
                    </div>

                     <div class="form-group">
                       <span for="brand">Product Image</span>
                            <input type="file" class="form-control" v-on:change="onFileChange" >
                     </div>   

                  


                     <input type="submit" value="save">
                  </form>
               </div>
            </div>   
        </div>
</template>

<script>


export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                 product: [],
                 myName: "Product Information"

            };
        },
        methods: {
            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
   
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
    
                let formData = new FormData();
                formData.append('file', this.file);
   
                axios.post('/formSubmit', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            }
        }
    }

    
</script>

<style scoped>
</style>
