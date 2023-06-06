import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import axios from "axios";
import './SingleEvent.css';

function SingleEvent() {
    const { id } = useParams();
    const [eventDescription, setEventDescription] = useState([]);

    useEffect(() => {
        axios.get('http://localhost:8007/api/events').then((data) => {
            const totalEvents = data.data;
            const findEvent = totalEvents.find((event) => +event.id === +id);
            setEventDescription(findEvent);
        });
    }, [id]);

    if (!eventDescription) {
        return <div>Loading...</div>;
    }



    return (
        <div className='conference'>
            <div className='header'>
                <h1 className='title'>About the Event</h1>
            </div>

            <div className='section1'>
                <div className='section1-main'>
                    <h2 className='section-title'>Event Information</h2>
                    <div className='section-content'>
                        <p>
                            <strong>Title:</strong> {eventDescription.title}
                        </p>
                        <p>
                            <strong>Description:</strong> {eventDescription.description}
                        </p>
                        <p>
                            <strong>Location:</strong> {eventDescription.location}
                        </p>
                        <p>
                            <strong>Start Date:</strong> {eventDescription.start_at}
                        </p>
                        <p>
                            <strong>End Date:</strong> {eventDescription.end_at}
                        </p>
                    </div>
                </div>
                <img
                    className='event-image'
                    src={eventDescription.image}
                    alt={eventDescription.title}
                />
            </div>

            <div className='section'>
                <h2 className='section-title'>Speakers</h2>
                <div className='section-content'>
                    {eventDescription.speakers && eventDescription.speakers.map((speaker, i) =>
                        <div className='speaker' key={i}>
                            <p className='speaker-name'>{speaker.firstname}{speaker.lastname}</p>
                        </div>
                    )}
                </div>

            </div>

            <div className='section'>
                <h2 className='section-title'>Sessions</h2>
                <div className='section-content'>
                    {eventDescription.sessions && eventDescription.sessions.map((session, i) =>
                        <div className='session' key={i}>
                            <p className='session-title'>title: {session.title}</p>
                            <p className='session-description'>description: {session.description}</p>
                            <p className='session-location'>location: {session.location}</p>
                            <p className='session-datetime'>
                                Start Date/Time: {session.start_at}
                            </p>
                            <p className='session-datetime'>
                                End Date/Time:   {session.end_at}
                            </p>
                            {session.speakers.map((speaker, i) =>
                                <p className='session-speaker'>speaker: {speaker.firstname}{speaker.lastname}</p>
                            )}
                        </div>
                    )}
                </div>

            </div>



            <div className='section'>
                <h2 className='section-title'>Exhibition</h2>
                <div className='section-content'>
                    {eventDescription.exhibitions && eventDescription.exhibitions.map((exhibition, i) =>
                        <div>
                            <div className='exhibition'>
                                <p className='exhibition-title'>title: {exhibition.title}</p>
                                <p className='exhibition-description'>description: {exhibition.description}</p>
                                <p className='exhibition-location'>location:{exhibition.location}</p>
                                <p className='exhibition-datetime'>
                                    Start Time: {exhibition.start_at}
                                </p>
                                <p className='exhibition-datetime'>End Time: {exhibition.end_at}</p>
                            </div>

                            {exhibition.booths.map((booth) =>
                                <div className='booth'>
                                    <p className='booth-title'>booth number: {booth.booth_number}</p>
                                    <p className='booth-title'>title: {booth.title}</p>
                                    <p className='booth-description'>description: {booth.description}</p>


                                    <p className='booth-company'>
                                        <a href='https://www.neste.com/'>company: {booth.company.name}</a>
                                    </p>
                                    <p>{booth.company.description}</p>
                                </div>
                            )}

                        </div>
                    )}
                </div>

            </div>


            <div className='section'>
                <h2 className='section-title'>Workshops</h2>
                <div className='section-content'>
                    {eventDescription.workshops && eventDescription.workshops.map((workshop, i) =>
                        <div className='session' key={i}>
                            <p className='session-title'>title: {workshop.title}</p>
                            <p className='session-description'>description: {workshop.description}</p>
                            <p className='session-location'>location: {workshop.location}</p>
                            <p className='session-datetime'>
                                Start Date/Time: {workshop.start_at}
                            </p>
                            <p className='session-datetime'>
                                End Date/Time:   {workshop.end_at}
                            </p>
                            {workshop.speakers.map((speaker) =>
                                <p className='session-speaker'>speaker: {speaker.firstname}{speaker.lastname}</p>
                            )}
                        </div>
                    )}
                </div>

            </div>


            <div className='section'>
                <h2 className='section-title'>Side Events</h2>
                {eventDescription.sideEvents && eventDescription.sideEvents.map((sideEvent, i) =>
                    <div className='section-content'>
                        <div className='event' key={i}>
                            <p className='event-title'>title: {sideEvent.title}</p>
                            <p className='event-description'>description: {sideEvent.description}</p>
                            <p className='event-location'>
                                Location: {sideEvent.location}
                            </p>
                            <p className='event-datetime'>Start Time: {sideEvent.start_at}</p>
                            <p className='event-datetime'>End Time: {sideEvent.end_at}</p>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
}

export default SingleEvent;
