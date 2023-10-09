import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { API_URL } from "../config";

// API URL
axios.defaults.baseURL = API_URL + "api/"


export default function useProducts() {
    const products = ref([])
    const product = ref([])
    const errors = ref("")
    const router = useRouter()

    // ********* Get All Products *********
    const getProducts = async () => {
        const response = await axios.get("products");
        products.value = response.data.data
        return response.data.data
    };
    
    // ********* Get All Products By Category *********
    const getProductsByCategory = async (id) => {
        const response = await axios.get("products/category/" + id);
        products.value = response.data.data
    };

    // ********* Get Product By id *********
    const getProduct = async (id) => {
        try {
            const response = await axios.get("products/" + id);
            product.value = response.data.data
        } catch (error) {
            router.push("/")
        }
    };

    // ********* Store Product *********
    const storeProduct = async (data) => {
        try {
            const response = await axios.post("products", data, {headers: {'Content-Type': 'multipart/form-data'}});
            await getProducts();
            // return response.data
            window.location.reload()
        } catch (error) {
            errors.value = error.response.data.message
        }
    };

    // ********* Update Product *********
    const updateProduct = async (id) => {
        try {
            const response = await axios.put("products/" + id, product.value, {headers: {'Content-Type': 'multipart/form-data'}});
            return response.data.msg
        } catch (error) {
            if(error.response.status == 422){
                errors.value = error.response.data.errors
            }
        }
    };

    // ********* Delete Product *********
    const deleteProduct = async (id) => {
        if(!window.confirm('Are you sure you want to delete this product?')){
            return;
        }
        await axios.delete("products/" + id);

        // ---- Refetch Data ----
        await getProducts();
        window.location.reload()
    };

  return {
    product, products, getProducts, getProductsByCategory, getProduct, storeProduct, updateProduct, deleteProduct, errors
  }
}
