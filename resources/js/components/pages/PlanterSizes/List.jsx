import React from "react";
import { Link } from "react-router-dom";

const List = ({ planterSizes, edit }) => {
    function renderPlanterSizesList(pSize, i) {
        return (
            <tr key={pSize.id}>
                <th scope="row">{i + 1}</th>
                <td>{pSize.name}</td>
                <td>
                    <i role="button" onClick={() => edit(pSize)} className="fas text-success fa-edit"></i>
                </td>
            </tr>
        );
    }
    return (
        <div className="card shadow mb-4">
            <div className="card-header">
                <h5 className="m-0 font-weight-bold text-primary">
                    Planter Sizes
                </h5>
            </div>

            <div className="card-body">
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {planterSizes.map(renderPlanterSizesList)}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
};

export default List;
