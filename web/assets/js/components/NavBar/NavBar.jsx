import React from 'react';
import { NavLink } from 'react-router-dom';
import './NavBar.css';

const NavBar = () => {
    return (
        <nav>
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
                  <a href="https://en.bc.fi/" target="blank">Business College</a>
                </li>
            </ul>
        </nav>
    );
};

export default NavBar;
