import React from "react";
import { Link } from "react-router-dom";

const List = ({ planterStyles, edit }) => {
    function renderPlanterStylesList(pStyle, i) {
        return (
            <tr key={pStyle.id}>
                <th scope="row">{i + 1}</th>
                <td>{pStyle.name}</td>
                <td><img src={pStyle.image_url} style={ {maxWidth:"100px"} } /></td>
                <td>
                    <i role="button" onClick={() => edit(pStyle)} className="fas text-success fa-edit"></i>
                </td>
            </tr>
        );
    }
    return (
        <div className="card shadow mb-4">
            <div className="card-header">
                <h5 className="m-0 font-weight-bold text-primary">
                    Planter Styles
                </h5>
            </div>

            <div className="card-body">
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {planterStyles.map(renderPlanterStylesList)}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
};

export default List;
