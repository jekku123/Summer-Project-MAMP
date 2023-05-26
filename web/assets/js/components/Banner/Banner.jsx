import React from 'react';
// import video from '../../assets/videos/herovideo.mp4';
import './Banner.css';
import { Link } from 'react-router-dom';

const Banner = () => {
    return (
        <div className='banner-container'>
            {/* <video autoPlay muted loop src={video}></video> */}
            <img
                src='https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80'
                alt='Hi'
            />
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
