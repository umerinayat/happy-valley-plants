import axios from 'axios';
 
const baseUrl = process.env.MIX_REACT_APP_API_BASE_URL;
axios.defaults.withCredentials = true;


// GET Categories
const getCategories = async () => {
    try {
        const response = await axios.get(
            `${baseUrl}/categories`
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// POST Categories
const addNewCategory = async (category) => {
    try {
        const response = await axios.post(
            `${baseUrl}/categories`,
            category
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// PUT Categories
const updateCategory = async (category) => {
    try {
        const response = await axios.put(
            `${baseUrl}/categories/${category.id}`,
            category
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

export { getCategories, addNewCategory, updateCategory };