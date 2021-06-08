import axios from 'axios';
 
const baseUrl = process.env.MIX_REACT_APP_API_BASE_URL;
axios.defaults.withCredentials = true;

// GET 
const getPlanterSizes = async () => {
    try {
        const response = await axios.get(
            `${baseUrl}/planter-sizes`
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// POST 
const addNewPlanterSize = async (planterSize) => {
    try {
        const response = await axios.post(
            `${baseUrl}/planter-sizes`,
            planterSize
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

// PUT 
const updatePlanterSize = async (planterSize) => {
    try {
        const response = await axios.put(
            `${baseUrl}/planter-sizes/${planterSize.id}`,
            planterSize
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

export { getPlanterSizes, addNewPlanterSize, updatePlanterSize };