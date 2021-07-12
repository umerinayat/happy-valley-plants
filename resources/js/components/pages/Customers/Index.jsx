import React, { useState, useEffect } from "react";
import './Customers.scss';

import {
    getCustomers,
} from "../../../api-services/customerService";
import CustomerList from "./CustomerList";

const Index = () => {
    const [customers, setCustomers] = useState([]);
    const [error, setError] = useState(null);
    const [errors, setErrors] = useState({});
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function init() {
            try {
                const response = await getCustomers();
                setCustomers(response);
            } catch (e) {
                setError(e);
            } finally {
                setLoading(false);
            }
        }
        init();
    }, []);

   
    function edit(cust) {
        // TODO HADLE CUSTOMER
    }

    if (error) throw error;
    // if (loading) return (<div className="spinner-border text-primary" role="status"></div>);

    return (
        <div className="row">
            <div className="col-sm-12 loader-col">
                { loading ? (<div className="spinner-border loader text-primary" role="status"></div>) : '' }
                {/* customers List  */}
                <CustomerList customers={customers} edit={edit}/>
            </div>
        </div>
    );
};

export default Index;
