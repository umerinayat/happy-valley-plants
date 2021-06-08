import { Route, Switch, useLocation } from "react-router-dom";
import OffscreenPanel from "../common/OffscreenPanel/OffscreenPanel";
import Login from "../pages/Auth/Login";
import Categories from "./../pages/Categories/Index";
import PlanterStyles from "../pages/planterStyles/Index";
import PlanterColors from "./../pages/PlanterColors/Index";
import PlanterSizes from "./../pages/PlanterSizes/Index";


import Products from "./../pages/PlantProducts/Index";


import Footer from "./Footer";
import SideBar from "./SideBar";
import TopBar from "./TopBar";


const Layout = () => {
    const { pathname } = useLocation();
    console.log(location);
    return (
        <div id="wrapper" style={{position: 'relative'}}>
            { pathname !== '/admin/login' ? (<SideBar />) : ''}
            <div id="content-wrapper" className="d-flex flex-column">
                <div id="content">
                    { pathname !== '/admin/login' ? (<TopBar />) : ''}
                    <div className="container-fluid">
                        <Switch>
                            <Route
                                path="/admin"
                                exact
                                render={() => <h1>Admin Dashboard</h1>}
                            />
                            <Route
                                path="/admin/categories"
                                exact
                                component={Categories}
                            />
                            <Route
                                path="/admin/planter-styles"
                                exact
                                component={PlanterStyles}
                            />
                            <Route
                                path="/admin/planter-sizes"
                                exact
                                component={PlanterSizes}
                            />
                             <Route
                                path="/admin/planters/colors"
                                exact
                                component={PlanterColors}
                            />
                            <Route
                                path="/admin/products"
                                exact
                                component={Products}
                            />
                            <Route
                                path="/admin/login"
                                exact
                                component={Login}
                            />
                            <Route
                                path="*"
                                render={() => <h1>Page Not Found!</h1>}
                            />
                        </Switch>
                    </div>
                </div>
                <Footer />
            </div>
        </div>
    );
};

export default Layout;
