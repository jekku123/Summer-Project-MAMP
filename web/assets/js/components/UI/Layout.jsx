import React, { useEffect } from 'react';
import { useLocation } from 'react-router-dom';
import Header from '../Header/Header';
import Main from '../Main/Main';
import Footer from '../Footer/Footer';
import './Layout.css';

const Layout = () => {
    const { pathname } = useLocation();

    useEffect(() => {
        window.scrollTo(0, 0);
    }, [pathname]);

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
