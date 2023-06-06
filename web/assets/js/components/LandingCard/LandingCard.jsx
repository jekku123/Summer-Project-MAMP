import React from 'react';
import LinkButton from '../LinkButton/LinkButton';
import './LandingCard.css';

const LandingCard = ({ heading, info, url, urltext }) => {
    return (
        <div className='landing-card'>
            <h3>{heading}</h3>
            <p>{info}</p>
            <LinkButton url={url}>{urltext}</LinkButton>
        </div>
    );
};

export default LandingCard;
