import React from "react";
import { Link } from "react-router-dom";

const List = ({ plantProducts, edit }) => {
    function renderPlantProductsList(pProduct, i) {
        return (
            <tr key={pProduct.id}>
                <th scope="row">{i + 1}</th>
                <td>{pProduct.title}</td>
                <td>{pProduct.slug}</td>
                 <td>{pProduct.selling_price}</td>
                 <td>{pProduct.discount_price ? pProduct.discount_price : pProduct.selling_price}</td>
                 <td>{pProduct.stock}</td>
                 <td>{pProduct.sku}</td>
                <td>{pProduct.is_available ? 'YES' : 'NO'}</td>
                <td>
                    <i role="button" onClick={() => edit(pProduct)} className="fas text-success fa-edit"></i>
                </td>
            </tr>
        );
    }
    return (
        <div className="card shadow mb-4">
            <div className="card-header">
                <h5 className="m-0 font-weight-bold text-primary">
                    Plant Products
                </h5>
            </div>

            <div className="card-body">
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Discount Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Is Available</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {plantProducts.map(renderPlantProductsList)}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
};

export default List;
