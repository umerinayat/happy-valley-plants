import React from "react";
import "./OffscreenPanel.scss";

const OffscreenPanel = (props) => {
    const close = () => {
        let panel = document.getElementById("offscreenPanel");
        panel.classList.remove("offscreen-panel-open");
        panel.classList.add("offscreen-panel-close");
    };

    const open = () => {
        let panel = document.getElementById("offscreenPanel");
        panel.classList.remove("offscreen-panel-close");
        panel.classList.add("offscreen-panel-open");
    };

    return (
        <>
            <div
                id="offscreenPanel"
                className="offscreen-panel offscreen-panel-open p-2"
            >
                <div className="row">
                    <div className="col-sm-12">
                        <button
                            onClick={close}
                            className="btn btn-outline-primary btn-sm"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>

            <div>{props.children}</div>
        </>
    );
};

export default OffscreenPanel;
