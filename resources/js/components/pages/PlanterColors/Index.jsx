import React, { useState, useEffect } from "react";
import './PlanterColors.scss';

import {
    getPlanterColors,
    addNewPlanterColor,
    updatePlanterColor
} from "../../../api-services/planterColorService";
import PlanterColorForm from "./Form";
import PlanterColorList from "./List";

const Index = () => {
    const [planterColors, setPlanterColors] = useState([]);
    const [planterColor, setPlanterColor] = useState({
        id: 0,
        name: "",
        color_value: ""
    });
    const [error, setError] = useState(null);
    const [errors, setErrors] = useState({});
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function init() {
            try {
                const response = await getPlanterColors();
                setPlanterColors(response);
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
        setPlanterColor({ ...planterColor, [name]: value });
    }

    function edit(pc) {
        setPlanterColor({ ...planterColor, id: pc.id, name: pc.name, color_value: pc.color_value });
    }

    async function handleSubmit(event) {
        event.preventDefault();
        setLoading(true);
        try {
            // add new planterColor
            if (planterColor.id === 0) {
                await addNewPlanterColor(planterColor);
            } 
            // update planterColor
            else {
                await updatePlanterColor(planterColor);
            }
            const response = await getPlanterColors();
            setPlanterColors(response);
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
                {/* planterColors List  */}
                <PlanterColorList planterColors={planterColors} edit={edit}/>
            </div>
            <div className="col-sm-3">
                {/* Manage planterColors START*/}
               <PlanterColorForm errors={errors} handleSubmit={handleSubmit} planterColors={planterColors} planterColor={planterColor} handleChange={handleChange}/>
            </div>
        </div>
    );
};

export default Index;
