<script setup>
  import useProducts from './../../api/ProductAPI.js'
  import useCategories from './../../api/CategoryAPI.js'
  import Loader from './../Loader.vue'
  import { onMounted, ref, reactive  } from 'vue'

  const { storeProduct, errors, getProducts } = useProducts()
  const { categories, getCategories } = useCategories()
  const loading = ref(false)
  const successMsg = ref("")

  // ****** Get Data *******
  onMounted(() => getCategories() )

  // ****** Form Data *******
  const payload = reactive({
    name : "",
    price : "",
    description : "",
    image : "",
    category_id: ""
  })

  // ----- Handle Image -----
  const handleImage= (event) => {
    const selectedFile = event.target.files[0];
    if (selectedFile) {
      payload.image = selectedFile;
    }
  }

  // ========= Store Product ==========
  const createProduct = async (data) => {
    try {
        loading.value = true;
        const success = await storeProduct(data);
        loading.value = false;
        if(success){
            successMsg.value = success.msg
            clearFormFields();
        } else{
            successMsg.value = ""
        }

        } catch (error) {
            // Handle errors
            console.error(error);
            loading.value = false;
        }
    };

  // --- Clear Fields ---
  const clearFormFields = () => {
    payload.name = ""
    payload.price = ""
    payload.description = ""
    payload.image = ""
    payload.category_id = ""
  }

</script>

<template>
    <!-- Add Product (Form) -->
    <form :class="[control ? 'add-product add-product-show' : 'add-product']">
        <!-- Header -->
        <header>
            <h3>Add Product</h3>
            <button @click.prevent="formControl('product')"><span class="material-symbols-outlined">close</span></button>
        </header>
        <!-- Payload -->
        <div class="payload-product">
            <div class="fields">
                <!-- Product Name -->
                <div class="field">
                    <label>Name</label>
                    <div class="inp">
                        <span class="material-symbols-outlined">inventory_2</span>
                        <input type="text" placeholder="Title" v-model="payload.name" required />
                    </div>
                </div>
                <!-- Product Price -->
                <div class="field">
                    <label>Price</label>
                    <div class="inp">
                        <span class="material-symbols-outlined">barcode_reader</span>
                        <input type="number" placeholder="00.00" v-model="payload.price" required />
                    </div>
                </div>
            </div>
            <!-- Product Category -->
            <div class="field">
                <label>Category</label>
                <div class="inp">
                    <span class="material-symbols-outlined">tab_group</span>
                    <select v-model="payload.category_id" required >
                        <option value="">--- Select Category ----</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>
            </div>
            <!-- Product Description -->
            <div class="field">
                <label>Description</label>
                <div class="inp">
                    <span class="material-symbols-outlined">description</span>
                    <textarea placeholder="Describe  your product..." v-model="payload.description" required></textarea>
                </div>
            </div>
            <!-- Product Image -->
            <div class="field">
                <div class="inp-file">
                    <div class="file">
                        <span class="material-symbols-outlined">add_photo_alternate</span>
                        <p>{{ payload.image ? payload.image.name : "Upload your prodcut image" }}</p>
                    </div>
                    <input type="file" @change="handleImage" accept=".png, .jpg, .jpeg" required />
                </div>
            </div>
        </div>
        <!-- Actions -->
        <div class="form-actions">
            <h5 :class="{ 'error-field': errors != '' }" v-if="errors">{{ errors }}</h5>
            <h5 :class="{ 'success-field': successMsg != '' }" v-if="successMsg">{{ successMsg }}</h5>
            <h5 v-if="!successMsg || !errors"></h5>
            <div class="actions">
                <button @click.prevent="formControl('product')">Cancel</button>
                <button @click.prevent="createProduct(payload)">Add Product</button>
            </div>
        </div>
    </form>
    <!-- Form Bg -->
    <section :class="[control ? 'from-bg from-bg-show' : 'from-bg']"></section>
    <!-- Loader -->
    <Loader v-if="loading" />
</template>

<script>
export default {
  props: {
    control: Boolean, 
    formControl: Function, 
  }
};
</script>
