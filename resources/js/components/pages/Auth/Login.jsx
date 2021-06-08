import React from 'react';
import './login.scss';

const Login = () => {
    return (
        <div className="container">
        <div className="row justify-content-center mt-4">
            <div className="col-xl-10 col-lg-12 col-md-9">
                <div className="card o-hidden border-0 shadow-lg my-5">
                    <div className="card-body p-0">
                        <div className="row">
                            <div className="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div className="col-lg-6">
                                <div className="p-5">
                                    <div className="text-center">
                                        <h1 className="h4 text-gray-900 mb-4">Happy Valley Plants</h1>
                                        <h4>Admin Panel</h4>
                                    </div>
                                    <form className="user mt-3" method="post" action="/login">
                                        <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]').content} />
                                        <div className="form-group">
                                            <input type="email" className="form-control form-control-user"
                                                name="email"
                                                placeholder="Enter Email Address..." />
                                        </div>
                                        <div className="form-group">
                                            <input type="password" className="form-control form-control-user"
                                                name="password" placeholder="Password" />
                                        </div>
                               
                                        <button type="submit" className="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr/>
                                    <div className="text-center">
                                        <a className="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    );
}

export default Login;
