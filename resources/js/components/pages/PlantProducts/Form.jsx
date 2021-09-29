import React, {useEffect, useState} from "react";
import MultiSelect from "react-multi-select-component";

import {
    getCategories
} from "../../../api-services/categoryService";

import {
    getPlanterStyles
} from "../../../api-services/planterStyleService";

const Form = ({ plantProducts, handleChange, errors, handleSubmit, plantProduct }) => {
    
    const [categories, setCategories] = useState([]);
    const [planterStyles, setPlanterStyles] = useState([]);
  

    const [selected, setSelected] = useState([]);

    useEffect(() => {
       
        async function init() {
            try {
                const response = await getCategories();
                setCategories(response);

                const styles = await getPlanterStyles();
                setPlanterStyles(styles)
            } catch (e) {
            } finally {
            }
        }
        init();

    }, []);

    function renderCatsOptions(cat) {
        return (
            <option key={cat.id} value={cat.id}>
                {cat.name}
            </option>
        );
    }

    function renderPStylesOptions(ps) {
        return (
            <option key={ps.id} value={ps.id}>
                {ps.name}
            </option>
        );
    }

    function render(arg) {
        console.log(arg)
        debugger
    }

    const customItemRenderer = ({
        checked,
        option,
        onClick,
        disabled,
      }) => {
        return (
            <div className={`item-renderer ${disabled && "disabled"}`}>
              <input
                type="checkbox"
                onChange={onClick}
                checked={checked}
                tabIndex={-1}
                disabled={disabled}
              />
                <div className="container-fluid">
                    <div className="row">
                        <div className="col-sm-7 text-center">
                            <p className="pt-3">{option.label}</p>
                        </div>
                        { option.value != "" ? (<div className="col-sm-5 text-right">
                            <img src= {option.image_url ?? "/public/admin-assets/img/1-planter-icon_grant.png" }   width="100%" />
                        </div>) : ''  }
                        
                    </div>
                </div>
            </div>
          );
      }

    return (
        <div className="card shadow-lg">
            <div className="card-header">
                <h5 className="m-0 text-primary font-weight-bold">
                    {plantProduct.id == 0 ? 'Add Plant Product' : 'Update Plant Product'}
                </h5>
            </div>
            <form className="card-body" onSubmit={handleSubmit}>
      
                <div className="form-group">
                    <select
                        className="form-control"
                        name="category_id"
                        value={plantProduct.category_id}
                        onChange={handleChange}
                    >
                        <option value="0" disabled>Choose Category</option>
                        {categories.map(renderCatsOptions)}
                    </select>
                    { errors.hasOwnProperty('category_id') ? errors.category_id.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                {/* <div className="form-group">
                    <label htmlFor="planter_style_ids">Choose Planter Styles</label>
                    <MultiSelect
                    options={planterStyles.map(ps => {
                        return {
                            label: ps.name,
                            value: ps.id,
                            image_url: ps.image_url
                        }
                    })}
                    ItemRenderer={customItemRenderer}
                    value={selected}
                    onChange={setSelected}
                    labelledBy="Select"
                />
                    { errors.hasOwnProperty('planter_style_ids') ? errors.planter_style_ids.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div> */}
                <div className="form-group">
                    <label htmlFor="title">Product Title *</label>
                    <input
                        className="form-control form-control-sm"
                        type="text"
                        name="title"
                        value={plantProduct.title}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('title') ? errors.title.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="form-group">
                    <label htmlFor="slug">Slug *</label>
                    <input
                        className="form-control form-control-sm"
                        type="text"
                        name="slug"
                        value={plantProduct.slug}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('slug') ? errors.slug.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="form-group">
                    <label htmlFor="description">Description *</label>
                    <input
                        className="form-control form-control-sm"
                        type="text"
                        name="description"
                        value={plantProduct.description}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('description') ? errors.description.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="form-group">
                    <label htmlFor="selling_price">Selling Price *</label>
                    <input
                        className="form-control form-control-sm"
                        type="text"
                        name="selling_price"
                        value={plantProduct.selling_price}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('selling_price') ? errors.selling_price.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                {/* <div className="form-group">
                    <label htmlFor="discount_price">Discount Price *</label>
                    <input
                        className="form-control form-control-sm"
                        type="text"
                        name="discount_price"
                        value={plantProduct.discount_price ? plantProduct.discount_price : plantProduct.selling_price  }
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('discount_price') ? errors.discount_price.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div> */}
                <div className="form-group">
                    <label htmlFor="sku">SKU *</label>
                    <input
                        className="form-control form-control-sm"
                        type="text"
                        name="sku"
                        value={plantProduct.sku}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('sku') ? errors.sku.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="form-group">
                    <label htmlFor="stock">Stock</label>
                    <input
                        className="form-control form-control-sm"
                        type="text"
                        name="stock"
                        value={plantProduct.stock}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('stock') ? errors.stock.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="text-right">
                    <button
                        className="btn btn-outline-primary btn-sm"
                        type="submit"
                    >
                        {plantProduct.id == 0 ?  'Add Plant Product' : 'Update Plant Product'}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default Form;
