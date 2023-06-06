import React from 'react';
import { Link } from 'react-router-dom';
import './Card.css';

const Card = ({ id, image, title, description, startdate, enddate }) => {
    return (
        <div className='event-card'>
            <img src={image} alt={title} />
            <h3>{title}</h3>
            <h5>Start Time: {startdate} - End Time: {enddate}</h5>
            <Link to={`/${id}`}>
                <p id='more-info'>more info</p>
            </Link>
        </div>
    );
};

export default Card;
