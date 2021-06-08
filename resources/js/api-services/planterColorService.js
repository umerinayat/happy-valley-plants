import axios from 'axios';
 
const baseUrl = process.env.MIX_REACT_APP_API_BASE_URL;
axios.defaults.withCredentials = true;

// GET 
const getPlanterColors = async () => {
    try {
        const response = await axios.get(
            `${baseUrl}/planter-colors`
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// POST 
const addNewPlanterColor = async (planterColor) => {
    try {
        const response = await axios.post(
            `${baseUrl}/planter-colors`,
            planterColor
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// PUT 
const updatePlanterColor = async (planterColor) => {
    try {
        const response = await axios.put(
            `${baseUrl}/planter-colors/${planterColor.id}`,
            planterColor
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

export { getPlanterColors, addNewPlanterColor, updatePlanterColor };