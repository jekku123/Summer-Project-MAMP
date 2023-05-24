import React from 'react';
import ReactDOM from 'react-dom/client';

function Main() {
    return <h1>Hi</h1>;
}

export default Main;

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(
    <React.StrictMode>
        <Main />,
    </React.StrictMode>
);
