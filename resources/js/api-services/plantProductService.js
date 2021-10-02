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

    // id: 0,
    // category_id: 0,
    // title: "",
    // slug: "",
    // selling_price: "",
    // discount_price: "",
    // sku: "",
    // stock: 1,
    // planter_style_ids: [],
    // plant_images: [],

    const formData = new FormData();
    
    for(let p in plantProduct) {
        if(p == "plant_images") {
            let imagesCount = 1;
            plantProduct[p].forEach(element => {
                formData.append(`plant_images[]`, element);
                imagesCount++;
            });
        } else {
            formData.append(p, plantProduct[p]);
        }
    }

    try {
        const response = await axios.post(
            `${baseUrl}/plant-products`,
            formData
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