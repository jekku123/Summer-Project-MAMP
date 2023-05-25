import React from 'react';
import video from './herovideo.mp4';
import './Herobanner.css';

function HeroBanner() {
    return (
        <div className="hero-banner">
            <video id='video' src={video} autoPlay loop muted />
            <h1>BCH EVENTS</h1>
            <p>Discover, Connect, Succeed !</p>

        </div>
    );
}

export default HeroBanner;
