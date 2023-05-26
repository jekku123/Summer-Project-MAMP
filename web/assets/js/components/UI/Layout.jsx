import React from 'react';
import Header from '../Header/Header';
import Main from '../Main/Main';
import Footer from '../Footer/Footer';
import './Layout.css';

const Layout = () => {
    return (
        <div className='page-container'>
            <div className='page-content'>
                <Header />
                <Main />
            </div>
            <Footer />
        </div>
    );
};

export default Layout;
