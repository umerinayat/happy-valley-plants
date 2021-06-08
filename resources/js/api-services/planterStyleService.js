import axios from 'axios';
 
const baseUrl = process.env.MIX_REACT_APP_API_BASE_URL;
axios.defaults.withCredentials = true;

// GET 
const getPlanterStyles = async () => {
    try {
        const response = await axios.get(
            `${baseUrl}/planter-styles`
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// POST 
const addNewPlanterStyle = async (planterStyle) => {

    const formData = new FormData();

    formData.append('id', planterStyle.id);
    formData.append('name', planterStyle.name);
	formData.append('planter_image', planterStyle.planter_image[0]);
   
    try {
        const response = await axios.post(
            `${baseUrl}/planter-styles`,
            formData
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// PUT 
const updatePlanterStyle = async (planterStyle) => {
    try {
        const response = await axios.put(
            `${baseUrl}/planter-styles/${planterStyle.id}`,
            planterStyle
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

export { getPlanterStyles, addNewPlanterStyle, updatePlanterStyle };