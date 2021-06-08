import { useState, useEffect } from "react";
import axios from 'axios';
 
const baseUrl = process.env.MIX_REACT_APP_API_BASE_URL;


export default function useAxios(url) {
    const [data, setData] = useState(null);
    const [error, setError] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function init() {
            try {
                const response = await axios.get(baseUrl + url);
                setData(response.data.data);
            } catch (e) {
                setError(e);
            } finally {
                setLoading(false);
            }
        }
        init();
    }, [url]);

    return { data, error, loading };
}
