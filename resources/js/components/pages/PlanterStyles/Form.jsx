import React, { useState } from "react";

import ImageUploader from "react-images-upload";

const Form = ({ planterStyles, handleChange, errors, handleSubmit, planterStyle, onDropPlanterImage, ...props }) => {

    return (
        <div className="card shadow-lg">
            <div className="card-header">
                <h5 className="m-0 text-primary font-weight-bold">
                    {planterStyle.id == 0 ? 'Add Planter Style' : 'Update Planter Style'}
                </h5>
            </div>
            <form className="card-body" onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="name">Planter Style Name *</label>
                    <input
                        className="form-control"
                        type="text"
                        name="name"
                        value={planterStyle.name}
                        onChange={handleChange}
                    />
                    { errors.hasOwnProperty('name') ? errors.name.map(e => (<span className="text-danger"> {e} </span>)) : ''}
                </div>
                <div className="form-group">
                <ImageUploader
                    {...props}
                    name='planter_image'
                    withIcon={true}
                    onChange={onDropPlanterImage}
                    label='Max file size: 5mb, accepted: jpg|png'
                    imgExtension={[".jpg", ".png"]}
                    maxFileSize={5242880}
                    buttonText='Choose Planter Image'
                    withPreview={true}
                    singleImage={true}
                />
                </div>
                <div className="text-right">
                    <button
                        className="btn btn-outline-primary btn-sm"
                        type="submit"
                    >
                        {planterStyle.id == 0 ?  'Add Planter Style' : 'Update Planter Style'}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default Form;
