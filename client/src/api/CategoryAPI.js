import { ref } from "vue";
import axios from "axios";

// API URL
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"


export default function useCategories() {
    const categories = ref([])
    const category = ref([])
    const errors = ref("")

    // ********* Get All Categories *********
    const getCategories = async () => {
        const response = await axios.get("categories");
        categories.value = response.data.data
    };

    // ********* Get Category By id *********
    const getCategory = async (id) => {
        const response = await axios.get("categories/" + id);
        category.value = response.data.data
    };

    // ********* Store Category *********
    const storeCategory = async (data) => {
        try {
            const response = await axios.post("categories", data);
            return response.data
        } catch (error) {
            errors.value = error.response.data.message
        }
    };

    // ********* Update Category *********
    const updateCategory = async (id) => {
        try {
            const response = await axios.put("categories/" + id, category.value);
            return response.data.msg
        } catch (error) {
            if(error.response.status == 422){
                errors.value = error.response.data.errors
            }
        }
    };

    // ********* Delete Category *********
    const deleteCategory = async (id) => {
        await axios.delete("categories/" + id);
        // ---- Refetch Data ----
        await getCategories();
    };

  return {
    category, categories, getCategories, getCategory, storeCategory, updateCategory, deleteCategory, errors
  }
}
