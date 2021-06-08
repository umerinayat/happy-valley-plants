import React, { useState, useEffect } from "react";
import './plantProducts.scss';

import {
    getPlantProducts,
    addNewPlantProduct,
    updatePlantProduct
} from "../../../api-services/plantProductService";
import PlantProductForm from "./Form";
import PlantProductsList from "./List";

const Index = () => {
    const [plantProducts, setPlantProducts] = useState([]);
    const [plantProduct, setPlantProduct] = useState({
        id: 0,
        category_id: 0,
        title: "",
        slug: "",
        selling_price: "",
        discount_price: "",
        sku: "",
        stock: 1,
        planter_style_ids: []
    });
    const [error, setError] = useState(null);
    const [errors, setErrors] = useState({});
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function init() {
            try {
                const response = await getPlantProducts();
                setPlantProducts(response);
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
        if (name == 'planter_style_ids') {
            setPlantProduct({ ...plantProduct, [name]: [...plantProduct.planter_style_ids, value] });
        } else {
            setPlantProduct({ ...plantProduct, [name]: value });
        }
    }

    function edit(pp) {
        setPlantProduct({ ...plantProduct, id: pp.id, title: pp.title, slug: pp.slug, selling_price: pp.selling_price,
            category_id: pp.category_id,
            sku: pp.sku,
            discount_price: pp.discount_price,
            stock: pp.stock,
            is_available: pp.is_available,
            planter_style_ids: pp.planter_style_ids
        });
    }

    async function handleSubmit(event) {
        event.preventDefault();
        setLoading(true);
        try {
            // add new plantProduct
            if (plantProduct.id === 0) {
                await addNewPlantProduct(plantProduct);
            } 
            // update plantProduct
            else {
                await updatePlantProduct(plantProduct);
            }
            const response = await getPlantProducts();
            setPlantProducts(response);
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
                {/* plantProducts List  */}
                <PlantProductsList plantProducts={plantProducts} edit={edit}/>
            </div>
            <div className="col-sm-3">
                {/* Manage plantProducts START*/}
               <PlantProductForm errors={errors} handleSubmit={handleSubmit} plantProducts={plantProducts} plantProduct={plantProduct} handleChange={handleChange}/>
            </div>
        </div>
    );
};

export default Index;
