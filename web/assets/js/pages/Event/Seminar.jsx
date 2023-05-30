import React from 'react';
import './Seminar.css';

function Seminar() {
    return (
        <div className='seminar'>

            <div className="header">
                <h1 className="title">About Seminar</h1>
            </div>

            <div className="section1">
                <div className='section1-main'>
                    <h2 className="section-title">Seminar Information</h2>
                    <div className="section-content">
                        <p><strong>Title:</strong> Title</p>
                        <p><strong>Description:</strong> Description</p>
                        <p><strong>Location:</strong> Location</p>
                        <p><strong>Start Date:</strong> startDateTime</p>
                        <p><strong>End Date:</strong> endDateTime</p>
                    </div>
                </div>
                <img className='event-image' src="https://images.pexels.com/photos/3321796/pexels-photo-3321796.jpeg?auto=compress&cs=tinysrgb&w=800" alt="seminar" />

            </div>


            <div className="section">
                <h2 className="section-title">Speakers</h2>
                <div className="section-content">
                    <div className="speaker">
                        <p className="speaker-name">Name</p>
                        <p className="speaker-bio">Bio</p>
                        <p className="speaker-organization">Organization</p>
                    </div>
                </div>
            </div>

            <div className="section">
                <h2 className="section-title">Sessions</h2>
                <div className="section-content">
                    <div className="session">
                        <p className="session-title">Title</p>
                        <p className="session-description">Description</p>
                        <p className="session-location">Location</p>
                        <p className="session-datetime">Start Date/Time: startDateTime</p>
                        <p className="session-datetime">End Date/Time: endDateTime</p>
                        <p className="session-speaker">Speaker: speaker</p>
                    </div>
                </div>
            </div>


        </div>
    );
}

export default Seminar;
