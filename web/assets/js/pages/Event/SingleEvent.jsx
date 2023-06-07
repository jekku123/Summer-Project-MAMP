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
        <div className='event'>

            <h1 className='title'>About the Event</h1>

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
                        <div className='speaker' key={speaker.firstname}>
                            <p>{speaker.firstname}{speaker.lastname}</p>
                        </div>
                    )}
                </div>

            </div>

            <div className='section'>
                <h2 className='section-title'>Sessions</h2>
                <div className='section-content'>
                    {eventDescription.sessions && eventDescription.sessions.map((session, i) =>
                        <div className='session' key={session.title}>
                            <p><strong>Title:</strong> {session.title}</p>
                            <p><strong>Description:</strong> {session.description}</p>
                            <p><strong>Location:</strong> {session.location}</p>
                            <p>
                                <strong>Start Date:</strong> {session.start_at}
                            </p>
                            <p>
                                <strong>End Date:</strong>   {session.end_at}
                            </p>
                            <p> <strong>Speakers:</strong>
                                {session.speakers.map((speaker, i) =>

                                    <li key={speaker.lastname}>{speaker.firstname}{speaker.lastname}</li>

                                )}
                            </p>
                        </div>
                    )}
                </div>

            </div>



            <div className='section'>
                <h2 className='section-title'>Exhibition</h2>
                <div className='section-content'>
                    {eventDescription.exhibitions && eventDescription.exhibitions.map((exhibition, i) =>
                        <div className='exhibition' key={exhibition.title}>
                            <div className='exhibition-info'>
                                <p><strong>Title: </strong>{exhibition.title}</p>
                                <p><strong>Description: </strong>{exhibition.description}</p>
                                <p><strong>Location: </strong>{exhibition.location}</p>
                                <p>
                                    <strong>Start Date/Time: </strong> {exhibition.start_at}
                                </p>
                                <p><strong>End Date/Time: </strong>{exhibition.end_at}</p>
                            </div>
                            <p> <strong>Booths:</strong></p>
                            {exhibition.booths.map((booth) =>
                                <div className='exhibition-booth' key={booth.booth_number}>
                                    <p><strong>Booth number: </strong> {booth.booth_number}</p>
                                    <p><strong>Title: </strong> {booth.title}</p>
                                    <p><strong>Description: </strong> {booth.description}</p>


                                    <p className='booth-company'> <strong>Company: </strong>
                                        <a href='https://www.neste.com/'>{booth.company.name}</a>
                                    </p>
                                    <p> <strong>About company: </strong>{booth.company.description}</p>
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
                        <div className='workshop' key={workshop.title}>
                            <p><strong>Title:</strong>{workshop.title}</p>
                            <p><strong>Description:</strong>{workshop.description}</p>
                            <p><strong>Location:</strong>{workshop.location}</p>
                            <p>
                                <strong>Start Date/Time:</strong> {workshop.start_at}
                            </p>
                            <p>
                                <strong>End Date/Time:</strong>   {workshop.end_at}
                            </p>
                            <p> <strong>Speakers:</strong>
                                {workshop.speakers.map((speaker) =>
                                    <li key={speaker.firstname}>{speaker.firstname}{speaker.lastname}</li>
                                )}
                            </p>
                        </div>
                    )}
                </div>

            </div>


            <div className='section'>
                <h2 className='section-title'>Side Events</h2>
                {eventDescription.sideEvents && eventDescription.sideEvents.map((sideEvent, i) =>
                    <div className='section-content'>
                        <div className='side-event' key={sideEvent.title}>
                            <p>title: {sideEvent.title}</p>
                            <p>description: {sideEvent.description}</p>
                            <p>
                                Location: {sideEvent.location}
                            </p>
                            <p>Start Time: {sideEvent.start_at}</p>
                            <p>End Time: {sideEvent.end_at}</p>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
}

export default SingleEvent;
