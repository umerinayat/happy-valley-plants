import React from "react";
import { Link } from "react-router-dom";

const CategoryList = ({ categories, edit }) => {
    function renderCatsList(cat, i) {
        return (
            <tr key={cat.id}>
                <th scope="row">{i + 1}</th>
                <td>{cat.name}</td>
                <td>{cat.slug}</td>
                <td>{ cat.parentCategory != null ?  cat.parentCategory.name : 'None' } </td>
                <td>
                    <i role="button" onClick={() => edit(cat)} className="fas text-success fa-edit"></i>
                </td>
            </tr>
        );
    }
    return (
        <div className="card shadow mb-4">
            <div className="card-header">
                <h5 className="m-0 font-weight-bold text-primary">
                    Categories
                </h5>
            </div>

            <div className="card-body">
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Parent Category</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {/* Categories List */}
                            {categories.map(renderCatsList)}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
};

export default CategoryList;
