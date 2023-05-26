import React from 'react';
import { Link } from 'react-router-dom';
import NavBar from '../NavBar/NavBar';
import './Header.css';

const Header = () => {
    return (
        <header>
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
