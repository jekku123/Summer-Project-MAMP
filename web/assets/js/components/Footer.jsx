import React from 'react';
import { FaFacebook, FaTwitter, FaInstagram } from 'react-icons/fa';
import { Link } from 'react-router-dom';
import './Footer.css';

function Footer() {
    return (
        <footer className="footer">
            <p>&copy; Copyright © 2018-2023 Business College Helsinki. All Rights Reserved..</p>
            <div className='icons'>
                <Link to="https://www.facebook.com/bchelsinki"><FaFacebook className='icon' /></Link>
                <Link to='https://twitter.com/bchelsinki'><FaTwitter className='icon' /></Link>
                <Link to='https://www.instagram.com/bchelsinki//'><FaInstagram className='icon' /></Link>
            </div>
        </footer>
    );
}

export default Footer;