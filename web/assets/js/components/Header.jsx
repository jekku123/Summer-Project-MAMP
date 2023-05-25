import React, { useState } from "react";
import './Header.css';
import { NavLink } from 'react-router-dom';
import { FaBars, FaTimes } from 'react-icons/fa';

const Header = () => {

    const [isMobile, setIsMobile] = useState(false);


    return <header className="header">


        <div className="logo"><NavLink to='/'><h2>BCH EVENTS</h2></NavLink>
        </div>

        <div className={isMobile ? "nav-mobile" : "nav"} onClick={() => setIsMobile(false)}>

            <NavLink to="/">Events</NavLink>
            <NavLink to="/helsinkiinfo">Helsinki Info</NavLink>
            <NavLink to="/faq">FAQ</NavLink>
            <NavLink to="https://en.bc.fi/">Home</NavLink>

        </div>
        <button className="mobile-icons" onClick={() => setIsMobile(!isMobile)}>{isMobile ? <FaTimes className="cross" /> : <FaBars className="hamburger" />}</button>
    </header>
};

export default Header;