import React, { useState } from 'react';
import { NavLink } from 'react-router-dom';
import './NavBar.css';

const NavBar = () => {
    const [isBurger, setIsBurger] = useState(false);

    const toggleBurger = () => {
        setIsBurger((prev) => !prev);
    };

    return (
        <>
            <nav className={isBurger ? 'active' : ''}>
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
                        <a
                            href='https://en.bc.fi/'
                            target='_blank'
                            rel='noreferrer'
                        >
                            Business College
                        </a>
                    </li>
                </ul>
            </nav>
            <div
                className={`burger ${isBurger ? 'active' : ''}`}
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
