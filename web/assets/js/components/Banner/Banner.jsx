import React from 'react';
import './Banner.css';
import { Link } from 'react-router-dom';

const Banner = () => {
    return (
        <div className='banner-container'>
            <div className='banner-content'>
                <h2>BCH Events</h2>
                <p>Explore events at Business College Helsinki</p>
                <Link to='/events'>
                    <button>All Events</button>
                </Link>
            </div>
        </div>
    );
};

export default Banner;
