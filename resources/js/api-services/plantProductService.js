import axios from 'axios';
 
const baseUrl = process.env.MIX_REACT_APP_API_BASE_URL;
axios.defaults.withCredentials = true;

// GET 
const getPlantProducts = async () => {
    try {
        const response = await axios.get(
            `${baseUrl}/plant-products`
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// POST 
const addNewPlantProduct = async (plantProduct) => {
    try {
        const response = await axios.post(
            `${baseUrl}/plant-products`,
            plantProduct
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// PUT 
const updatePlantProduct = async (plantProduct) => {
    try {
        const response = await axios.put(
            `${baseUrl}/plant-products/${plantProduct.id}`,
            plantProduct
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

export { getPlantProducts, addNewPlantProduct, updatePlantProduct };