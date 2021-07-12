import { Route, Switch, useLocation, Redirect } from "react-router-dom";
import Login from "../pages/Auth/Login";
import Categories from "./../pages/Categories/Index";
import PlanterStyles from "../pages/planterStyles/Index";
import PlanterColors from "./../pages/PlanterColors/Index";
import PlanterSizes from "./../pages/PlanterSizes/Index";


import Products from "./../pages/PlantProducts/Index";
import Customers from "./../pages/Customers/Index";



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
                                path="/admin/dashboard"
                                exact
                                render={() => <h1>Admin Dashboard</h1>}
                            />
                            <Route
                                path="/admin/customers"
                                component={Customers}
                            />
                             <Route
                                path="/admin/orders"
                                component={() => <h1>Orders</h1>}
                            />
                            <Route
                                path="/admin/categories"
                                component={Categories}
                            />
                            <Route
                                path="/admin/planter-styles"
                                component={PlanterStyles}
                            />
                            <Route
                                path="/admin/planter-sizes"
                                component={PlanterSizes}
                            />
                             <Route
                                path="/admin/planters/colors"
                                component={PlanterColors}
                            />
                            <Route
                                path="/admin/products"
                                component={Products}
                            />
                            <Route
                                path="/admin/login"
                                component={Login}
                            />
                             <Route
                                path="/admin"
                                render={ () => ( <Redirect to="/admin/dashboard" />) }
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
