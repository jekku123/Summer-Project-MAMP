import React from 'react';
import './Banner.css';
import LinkButton from '../LinkButton/LinkButton';

const Banner = () => {
    return (
        <div className='banner-container'>
            <div className='banner-content'>
                <h2>BCH Events</h2>
                <p>
                    Explore events at <a href='/admin'>Business</a> College
                    Helsinki
                </p>
                <LinkButton url='/events'>All Events</LinkButton>
            </div>
        </div>
    );
};

export default Banner;
