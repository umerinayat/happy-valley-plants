import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router} from 'react-router-dom';
import ErrorBoundary from './ErrorBoundary';

import App from './components/App';


ReactDOM.render(
    <ErrorBoundary>
        <Router>
            <App />
        </Router>
    </ErrorBoundary>
    , document.getElementById('admin-app'));
