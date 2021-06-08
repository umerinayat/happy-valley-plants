import React from "react";

const CategoryForm = ({ categories, handleChange, errors, handleSubmit, category }) => {

    function renderCatsOptions(cat) {
        return (
            <option key={cat.id} value={cat.id}>
                {cat.name}
            </option>
        );
    }

    return (
        <div className="card shadow-lg">
            <div className="card-header">
                <h5 className="m-0 text-primary font-weight-bold">
                    {category.id == 0 ? 'Add Category' : 'Update Category'}
                </h5>
            </div>
            <form className="card-body" onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="name">CategoryName *</label>
                    <input
                        className="form-control"
                        type="text"
                        name="name"
                        value={category.name}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('name') ? errors.name.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>

                <div className="form-group">
                    <label htmlFor="slug">Slug *</label>
                    <input
                        className="form-control"
                        type="text"
                        name="slug"
                        value={category.slug}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('slug') ? errors.slug.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="form-group">
                    <select
                        className="form-control"
                        name="parent_cat_id"
                        value={category.parent_cat_id}
                        onChange={handleChange}
                    >
                        <option value="0" disabled selected>Choose Parent Category</option>
                        <option value="0">None (Root Category)</option>
                        {categories.map(renderCatsOptions)}
                    </select>
                </div>
                <div className="text-right">
                    <button
                        className="btn btn-outline-primary btn-sm"
                        type="submit"
                    >
                       {category.id == 0 ?  'Add Category' : 'Update Category'}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default CategoryForm;
