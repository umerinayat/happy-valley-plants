import axios from 'axios';
 
const baseUrl = process.env.MIX_REACT_APP_API_BASE_URL;
axios.defaults.withCredentials = true;

// GET Customers Orders
const getOrders = async () => {
    try {
        const response = await axios.get(
            `${baseUrl}/customers/orders`
        );
        return response.data.data;
    } catch (e) {
        throw e;
    }
};

export { getOrders };