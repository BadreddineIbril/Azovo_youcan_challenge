<script setup>
  import useCategories from './../../api/CategoryAPI.js'
  import Loader from './../Loader.vue'
  import { onMounted, ref, reactive, defineProps } from 'vue'

  const { storeCategory, errors } = useCategories()
  const loading = ref(false)
  const successMsg = ref("")

  // --- Props ---
  const { control, formControl } = defineProps(['control', 'formControl']);

  // ****** Form Data *******
  const payload = reactive({
    name : "",
    parent_category : "",
  })

  // ========= Store Category ==========
  const createCategory = async (data) => {
    try {
        loading.value = true;
        const success = await storeCategory(data);
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
    payload.parent_category = ""
  }

</script>

<template>
    <!-- Add Category (Form) -->
    <form :class="[control ? 'add-product add-product-show' : 'add-product']">
        <!-- Header -->
        <header>
            <h3>Add Category</h3>
            <button @click.prevent="formControl('category')"><span class="material-symbols-outlined">close</span></button>
        </header>
        <!-- Payload -->
        <div class="payload-product">
            <!-- Category Name -->
            <div class="field">
                <label>Name</label>
                <div class="inp">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <input type="text" placeholder="Title" v-model="payload.name" required />
                </div>
            </div>
            <!-- Category Parent Name -->
            <div class="field">
                <label>Parent Category</label>
                <div class="inp">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <input type="text" placeholder="Subtitle" v-model="payload.parent_category" required />
                </div>
            </div>
        </div>
        <!-- Actions -->
        <div class="form-actions">
            <h5 :class="{ 'error-field': errors != '' }" v-if="errors">{{ errors }}</h5>
            <h5 :class="{ 'success-field': successMsg != '' }" v-if="successMsg">{{ successMsg }}</h5>
            <h5 v-if="!successMsg || !errors"></h5>
            <div class="actions">
                <button @click.prevent="formControl('category')">Cancel</button>
                <button @click.prevent="createCategory(payload)">Add Category</button>
            </div>
        </div>
    </form>
    <!-- Form Bg -->
    <section :class="[control ? 'from-bg from-bg-show' : 'from-bg']"></section>
    <!-- Loader -->
    <Loader v-if="loading" />
</template>

