import React from "react";

const CategoryList = ({ customers, edit }) => {
    function renderCustomersList(cust, i) {
        return (
            <tr key={cust.id}>
                <th scope="row">{i + 1}</th>
                <td>{cust.first_name + ' ' + cust.last_name}</td>
                <td>{cust.email}</td>
                <td>0</td>
                <td>
                    <i role="button" onClick={() => edit(cust)} className="fas text-success fa-eye"></i>
                </td>
            </tr>
        );
    }
    return (
        <div className="card shadow mb-4">
            <div className="card-header">
                <h5 className="m-0 font-weight-bold text-primary">
                    Customers
                </h5>
            </div>

            <div className="card-body">
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Total Orders</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {/* customers List */}
                            {customers.map(renderCustomersList)}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
};

export default CategoryList;
