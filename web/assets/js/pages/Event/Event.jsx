import React from 'react';
import { useNavigate } from 'react-router-dom';
import { FaBackward } from 'react-icons/fa';
// import pic from '../../assets/images/testpic.jpg';
import './Event.css';

const Event = () => {
    const navigate = useNavigate();
    return (
        <div className='event-info'>
            <img src={pic} alt='event-pic' />
            <div className='container1'>
                <h2>EVENT INFO</h2>
                <h3>Event name: Event1</h3>
                <p>Event type:</p>
                <p>Date:</p>
                <p>Time:</p>
                <p>Venue:</p>
                <p>Ticket price:</p>
                <p>Guest speakers:</p>
                <p>Parking info:</p>
                <p>Dress code:</p>
                <p>Food and beverage options:</p>
                <p>Resgistration deadline:</p>
                <button type='submit'>Register now</button>
            </div>
            <div className='container2'>
                <button id='back-btn' onClick={() => navigate(-1)}>
                    <FaBackward />
                </button>
            </div>
        </div>
    );
};

export default Event;
