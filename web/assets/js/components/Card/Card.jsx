import React from 'react';
import { Link } from 'react-router-dom';
import LinkButton from '../LinkButton/LinkButton';
import './Card.css';

const Card = ({ id, image, title, description, startdate, enddate }) => {
    return (
        <div className='event-card'>
            <img src={image} alt={title} />
            <h3>{title}</h3>
            <p>
                Begins: <span className='date'>{startdate}</span>
            </p>
            <p>
                Ends: <span className='date'>{enddate}</span>
            </p>
            <LinkButton url={`/${id}`}>More info</LinkButton>
        </div>
    );
};

export default Card;
