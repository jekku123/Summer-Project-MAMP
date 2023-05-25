import React from 'react';
import { Link } from 'react-router-dom';
import './Card.css';
import pic from './testpic.jpg'

const EventCard = () => {
    return (
        <div className="event-card">
            <img src={pic} alt="event1" />
            <h3>Event 1</h3>
            <h6>Date: 01.06.2023</h6>
            <Link to='/event'><p id='more-info'>more info</p></Link>



        </div>
    );
};

export default EventCard;
