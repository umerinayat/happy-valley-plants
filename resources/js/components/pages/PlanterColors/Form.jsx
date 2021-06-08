import React from "react";

const Form = ({ planterColors, handleChange, errors, handleSubmit, planterColor }) => {
    debugger
    return (
        <div className="card shadow-lg">
            <div className="card-header">
                <h5 className="m-0 text-primary font-weight-bold">
                    {planterColor.id == 0 ? 'Add Planter Color' : 'Update Planter Color'}
                </h5>
            </div>
            <form className="card-body" onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="name">Planter Color Name *</label>
                    <input
                        className="form-control"
                        type="text"
                        name="name"
                        value={planterColor.name}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('name') ? errors.name.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="form-group">
                    <label htmlFor="color_value">Color Hex Value *</label>
                    <input
                        className="form-control"
                        type="text"
                        name="color_value"
                        value={planterColor.color_value}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('color_value') ? errors.color_value.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="text-right">
                    <button
                        className="btn btn-outline-primary btn-sm"
                        type="submit"
                    >
                        {planterColor.id == 0 ?  'Add Planter Color' : 'Update Planter Color'}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default Form;
