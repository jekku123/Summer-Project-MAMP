import React, { useState } from 'react';
import { NavLink } from 'react-router-dom';
import { FaBars, FaTimes } from 'react-icons/fa';
import './NavBar.css';

const NavBar = () => {
    const [isMobile, setIsMobile] = useState(false);

    return (
        <div className='nav'>
            <div
                className={isMobile ? 'nav-mobile' : 'nav'}
                onClick={() => setIsMobile(false)}
            >
                <NavLink to='/'>Home</NavLink>
                <NavLink to='/event-list'>Events</NavLink>
                <NavLink to='/helsinki-info'>Helsinki Info</NavLink>
                <NavLink to='/faq'>FAQ</NavLink>
                <NavLink to='https://en.bc.fi/'>Business College</NavLink>
            </div>
            <button
                className='mobile-icons'
                onClick={() => setIsMobile(!isMobile)}
            >
                {isMobile ? (
                    <FaTimes className='cross' />
                ) : (
                    <FaBars className='hamburger' />
                )}
            </button>
        </div>
    );
};

export default NavBar;
