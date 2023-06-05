import React, { useState } from 'react';
import { NavLink } from 'react-router-dom';
import './NavBar.css';

const MobileNavBar = ({ isOpen, onClose }) => (
    <nav className={`mobile-nav ${isOpen ? 'active' : ''}`}>
        <ul>
            <li>
                <NavLink to='/' onClick={onClose}>
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink to='/events' onClick={onClose}>
                    Events
                </NavLink>
            </li>
            <li>
                <NavLink to='/helsinki' onClick={onClose}>
                    Helsinki Info
                </NavLink>
            </li>
            <li>
                <NavLink to='/faq' onClick={onClose}>
                    FAQ
                </NavLink>
            </li>
            <li>
                <a href='https://en.bc.fi/' target='_blank' rel='noreferrer'>
                    Business College
                </a>
            </li>
        </ul>
    </nav>
);

const DesktopNavBar = () => (
    <nav className='desktop-nav'>
        <ul>
            <li>
                <NavLink to='/'>Home</NavLink>
            </li>
            <li>
                <NavLink to='/events'>Events</NavLink>
            </li>
            <li>
                <NavLink to='/helsinki'>Helsinki Info</NavLink>
            </li>
            <li>
                <NavLink to='/faq'>FAQ</NavLink>
            </li>
            <li>
                <a href='https://en.bc.fi/' target='_blank' rel='noreferrer'>
                    Business College
                </a>
            </li>
        </ul>
    </nav>
);

const NavBar = () => {
    const [isBurgerOpen, setIsBurgerOpen] = useState(false);

    const toggleBurger = () => {
        setIsBurgerOpen((prev) => !prev);
    };

    const closeBurger = () => {
        setIsBurgerOpen(false);
    };

    return (
        <>
            <MobileNavBar isOpen={isBurgerOpen} onClose={closeBurger} />
            <DesktopNavBar />
            <div
                className={`burger ${isBurgerOpen ? 'active' : ''}`}
                onClick={toggleBurger}
            >
                <span className='bar'></span>
                <span className='bar'></span>
                <span className='bar'></span>
            </div>
        </>
    );
};

export default NavBar;
