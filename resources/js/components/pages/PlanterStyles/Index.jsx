import React, { useState, useEffect } from "react";
import './PlanterStyles.scss';

import {
    getPlanterStyles,
    addNewPlanterStyle,
    updatePlanterStyle
} from "../../../api-services/planterStyleService";
import PlanterStyleForm from "./Form";
import PlanterStylesList from "./List";

const Index = () => {
    const [planterStyles, setPlanterStyles] = useState([]);
    const [planterStyle, setPlanterStyle] = useState({
        id: 0,
        name: "",
        planter_image: []
    });


    const onDropPlanterImage = image => {
        setPlanterStyle({ ...planterStyle, 'planter_image': image });
    };

    const [error, setError] = useState(null);
    const [errors, setErrors] = useState({});
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function init() {
            try {
                const response = await getPlanterStyles();
                setPlanterStyles(response);
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
        setPlanterStyle({ ...planterStyle, [name]: value });
    }

    function edit(ps) {
        setPlanterStyle({ ...planterStyle, id: ps.id, name: ps.name });
    }

    async function handleSubmit(event) {
        event.preventDefault();
        setLoading(true);
        try {
            // add new planterStyle
            if (planterStyle.id === 0) {
                await addNewPlanterStyle(planterStyle);
            } 
            // update planterStyle
            else {
                await updatePlanterStyle(planterStyle);
            }
            const response = await getPlanterStyles();
            setPlanterStyles(response);
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
                {/* planterStyles List  */}
                <PlanterStylesList planterStyles={planterStyles} edit={edit}/>
            </div>
            <div className="col-sm-3">
                {/* Manage planterStyles START*/}
               <PlanterStyleForm errors={errors} handleSubmit={handleSubmit} onDropPlanterImage={onDropPlanterImage} planterStyles={planterStyles} planterStyle={planterStyle} handleChange={handleChange}/>
            </div>
        </div>
    );
};

export default Index;
