import React from 'react';
import './Conference.css';

function Conference() {
    return (
        <div className='conference'>

            <div className="header">
                <h1 className="title">About Conference</h1>
            </div>

            <div className="section1">
                <div className='section1-main'>
                    <h2 className="section-title">Conference Information</h2>
                    <div className="section-content">
                        <p><strong>Title:</strong> Title</p>
                        <p><strong>Description:</strong> Description</p>
                        <p><strong>Location:</strong> Location</p>
                        <p><strong>Start Date:</strong> startDateTime</p>
                        <p><strong>End Date:</strong> endDateTime</p>
                    </div>
                </div>
                <img className='event-image' src="https://images.unsplash.com/photo-1576085898274-069be5a26c58?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzl8fGNvbmZlcmVuY2V8ZW58MHwxfDB8fHww&auto=format&fit=crop&w=800&q=60" alt="conference" />

            </div>

            <div className="section">
                <h2 className="section-title">Companies</h2>
                <div className="section-content">
                    <div className="company">
                        <p className="company-name">Company name 1</p>
                        <p className="company-description">Company description 1</p>
                        <p className="company-website"><a href="https://www.nokia.com/">www.company1.com</a></p>
                    </div>
                </div>
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

            <div className="section">
                <h2 className="section-title">Exhibition</h2>
                <div className="section-content">
                    <div className="exhibition">
                        <p className="exhibition-title">Title</p>
                        <p className="exhibition-description">Description</p>
                        <p className="exhibition-location">Location</p>
                        <p className="exhibition-datetime">Start Time: startTime</p>
                        <p className="exhibition-datetime">End Time: endTime</p>
                    </div>
                    <div className="booth">
                        <p className="booth-title">Booth 1</p>
                        <p className="booth-description">Description</p>
                        <p className="booth-company"><a href="https://www.neste.com/">Company name</a></p>
                    </div>
                </div>
            </div>

            <div className="section">
                <h2 className="section-title">Events</h2>
                <div className="section-content">
                    <div className="event">
                        <p className="event-title">Break</p>
                        <p className="event-description">Coffee</p>
                        <p className="event-location">Location: BC Restaurant</p>
                        <p className="event-datetime">Start Time: startTime</p>
                        <p className="event-datetime">End Time: endTime</p>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Conference;
