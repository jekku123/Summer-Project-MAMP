import React, { useState } from 'react';
import { Link, useLocation } from 'react-router-dom';
import NavBar from '../../components/NavBar/NavBar';
import './Header.css';

const Header = () => {
    const [isScrolled, setIsScrolled] = useState(false);
    const location = useLocation();

    window.addEventListener('scroll', () => {
        if (window.scrollY > 0) {
            setIsScrolled(true);
        } else {
            setIsScrolled(false);
        }
    });

    return (
        <header
            className={
                location.pathname === '/'
                    ? isScrolled
                        ? 'visible'
                        : ''
                    : 'visible'
            }
        >
            <div className='logo'>
                <Link to='/'>
                    <h1>BCH EVENTS</h1>
                </Link>
            </div>
            <NavBar />
        </header>
    );
};

export default Header;
