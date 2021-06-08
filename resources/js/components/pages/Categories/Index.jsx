import React, { useState, useEffect } from "react";
import './Category.scss';

import {
    getCategories,
    addNewCategory,
    updateCategory
} from "../../../api-services/categoryService";
import CategoryForm from "./CategoryForm";
import CategoryList from "./CategoryList";

const Index = () => {
    const [categories, setCategories] = useState([]);
    const [category, setCategory] = useState({
        id: 0,
        name: "",
        slug: "",
        parent_cat_id: 0,
    });
    const [error, setError] = useState(null);
    const [errors, setErrors] = useState({});
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function init() {
            try {
                const response = await getCategories();
                setCategories(response);
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
        setCategory({ ...category, [name]: value });
    }

    function edit(cat) {
        setCategory({...category, id: cat.id, name: cat.name, slug: cat.slug});
    }

    async function handleSubmit(event) {
        event.preventDefault();
        setLoading(true);
        try {
            // add new category
            if (category.id === 0) {
                await addNewCategory(category);
            } 
            // update category
            else {
                await updateCategory(category);
            }
            const response = await getCategories();
            setCategories(response);
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
                {/* Categories List  */}
                <CategoryList categories={categories} edit={edit}/>
            </div>
            <div className="col-sm-3">
                {/* Manage Categories START*/}
               <CategoryForm errors={errors} handleSubmit={handleSubmit} categories={categories} category={category} handleChange={handleChange}/>
            </div>
        </div>
    );
};

export default Index;
