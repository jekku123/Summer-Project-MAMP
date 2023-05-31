import React from 'react';
import { Link } from 'react-router-dom';
import pic from '../../assets/images/testpic.jpg';
import './Card.css';

const Card = () => {
    return (
        <div className='event-card'>
            <img src={pic} alt='event1' />
            <h3>Event 1</h3>
            <h5>Event type: Conference/Seminar</h5>
            <h5>Date: 01.06.2023</h5>
            <Link to='/conference'>
                <p id='more-info'>more info</p>
            </Link>
        </div>
    );
};

export default Card;
