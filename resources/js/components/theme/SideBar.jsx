import { Link } from 'react-router-dom';

const SideBar = () => {
    return (
        <ul
            className="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar"
        >
            <Link
                className="sidebar-brand d-flex align-items-center justify-content-center"
                to="/admin"
            >
                <div className="sidebar-brand-text mx-3">
                    Happy Valley Plants 
                </div>
            </Link>

            <hr className="sidebar-divider my-0" />

            <li className="nav-item active">
                <Link className="nav-link" to="/admin">
                    <i className="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </Link>
            </li>

            <hr className="sidebar-divider" />

            <div className="sidebar-heading">Admin</div>

    
            <li className="nav-item">
                <Link className="nav-link" to="/admin/categories">
                <i className="fas fa-list-ul"></i>
                    <span>Categories</span>
                </Link>
            </li>

            {/* Planter Styles */}
            <li className="nav-item">
                <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#managePlanters"
                    aria-expanded="true" aria-controls="managePlanters">
                    <i className="fas fa-seedling"></i>
                    <span>Planters</span>
                </a>
                <div id="managePlanters" className="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div className="bg-white py-2 collapse-inner rounded">
                        <h6 className="collapse-header">Manage Planters:</h6>
                        <Link className="collapse-item" to="/admin/planter-styles">
                            <span> Styles</span>
                        </Link>
                        <Link className="collapse-item" to="/admin/planters/colors">
                            <span>Colors</span>
                        </Link>
                        <Link className="collapse-item" to="/admin/planter-sizes">
                            <span> Sizes </span>
                        </Link>
                    </div>
                </div>
            </li>

        
            <li className="nav-item">
                <Link className="nav-link" to="/admin/products">
                <i className="fas fa-leaf"></i>
                    <span>Products</span>
                </Link>
            </li>

            <hr className="sidebar-divider d-none d-md-block" />

            {/* <div className="text-center d-none d-md-inline">
                <button
                    className="rounded-circle border-0"
                    id="sidebarToggle"
                ></button>
            </div> */}

        </ul>
    );
};


export default SideBar;