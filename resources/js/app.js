import React from 'react';
import { createRoot } from 'react-dom/client';
import Dashboard from './components/Dashboard';
import '../css/app.css';

const app = document.getElementById('app');

if (app) {
	createRoot(app).render(React.createElement(
		React.StrictMode,
		null,
		React.createElement(Dashboard),
	));
}
