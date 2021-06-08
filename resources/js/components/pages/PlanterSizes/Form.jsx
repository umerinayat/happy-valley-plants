import React from "react";

const Form = ({ planterSizes, handleChange, errors, handleSubmit, planterSize }) => {
    debugger
    return (
        <div className="card shadow-lg">
            <div className="card-header">
                <h5 className="m-0 text-primary font-weight-bold">
                    {planterSize.id == 0 ? 'Add Planter Size' : 'Update Planter Size'}
                </h5>
            </div>
            <form className="card-body" onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="name">Planter Size Name *</label>
                    <input
                        className="form-control"
                        type="text"
                        name="name"
                        value={planterSize.name}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('name') ? errors.name.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="text-right">
                    <button
                        className="btn btn-outline-primary btn-sm"
                        type="submit"
                    >
                        {planterSize.id == 0 ?  'Add Planter Size' : 'Update Planter Size'}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default Form;
