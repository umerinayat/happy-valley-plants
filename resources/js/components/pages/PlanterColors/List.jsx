import React from "react";
import { Link } from "react-router-dom";

const List = ({ planterColors, edit }) => {
    function renderPlanterColorsList(pColor, i) {
        return (
            <tr key={pColor.id}>
                <th scope="row">{i + 1}</th>
                <td>{pColor.name}</td>
                <td>{pColor.color_value}</td>
                <td>
                    <i role="button" onClick={() => edit(pColor)} className="fas text-success fa-edit"></i>
                </td>
            </tr>
        );
    }
    return (
        <div className="card shadow mb-4">
            <div className="card-header">
                <h5 className="m-0 font-weight-bold text-primary">
                    Planter Colors
                </h5>
            </div>

            <div className="card-body">
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Color Hex Value</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {planterColors.map(renderPlanterColorsList)}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
};

export default List;
