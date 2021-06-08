import React, { useState, useEffect } from "react";
import './PlanterSizes.scss';

import {
    getPlanterSizes,
    addNewPlanterSize,
    updatePlanterSize
} from "../../../api-services/planterSizeService";
import PlanterSizeForm from "./Form";
import PlanterSizesList from "./List";

const Index = () => {
    const [planterSizes, setPlanterSizes] = useState([]);
    const [planterSize, setPlanterSize] = useState({
        id: 0,
        name: ""
    });
    const [error, setError] = useState(null);
    const [errors, setErrors] = useState({});
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function init() {
            try {
                const response = await getPlanterSizes();
                setPlanterSizes(response);
            } catch (e) {
                setError(e);
            } finally {
                setLoading(false);
            }
        }
        init();
    }, []);

    function handleChange(event) {
        const { name, value } = event.target;
        setPlanterSize({ ...planterSize, [name]: value });
    }

    function edit(ps) {
        setPlanterSize({ ...planterSize, id: ps.id, name: ps.name });
    }

    async function handleSubmit(event) {
        event.preventDefault();
        setLoading(true);
        try {
            // add new planterSize
            if (planterSize.id === 0) {
                await addNewPlanterSize(planterSize);
            } 
            // update planterSize
            else {
                await updatePlanterSize(planterSize);
            }
            const response = await getPlanterSizes();
            setPlanterSizes(response);
        } catch (e) {
            if (e.response.status == 422) {
                const errors = e.response.data.errors;
                console.log(errors);
                setErrors(errors);
            } else 
            {
                setError(e);
            }
        } finally {
            setLoading(false);
        }
    }

    if (error) throw error;
    // if (loading) return (<div className="spinner-border text-primary" role="status"></div>);

    return (
        <div className="row">
            <div className="col-sm-9 loader-col">
                { loading ? (<div className="spinner-border loader text-primary" role="status"></div>) : '' }
                {/* planterSizes List  */}
                <PlanterSizesList planterSizes={planterSizes} edit={edit}/>
            </div>
            <div className="col-sm-3">
                {/* Manage planterSizes START*/}
               <PlanterSizeForm errors={errors} handleSubmit={handleSubmit} planterSizes={planterSizes} planterSize={planterSize} handleChange={handleChange}/>
            </div>
        </div>
    );
};

export default Index;
