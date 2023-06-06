import React, { useEffect } from 'react';
import { useParams } from 'react-router-dom';
import './SingleEvent.css';
import useAxios from '../../hooks/useAxios';

function SingleEvent() {
    const { id } = useParams();

    const [data, isLoading] = useAxios(
        `http://localhost:8007/api/events/${id}`
    );

    return isLoading ? (
        <div className='loader'>
            <h2>Loading..</h2>
        </div>
    ) : (
        <div className='conference'>
            <div className='header'>
                <h1 className='title'>About the Event</h1>
            </div>

            <div className='section1'>
                <div className='section1-main'>
                    <h2 className='section-title'>Event Information</h2>
                    <div className='section-content'>
                        <p>
                            <strong>Title:</strong> {data.title}
                        </p>
                        <p>
                            <strong>Description:</strong> {data.description}
                        </p>
                        <p>
                            <strong>Location:</strong> {data.location}
                        </p>
                        <p>
                            <strong>Start Date:</strong> {data.start_at}
                        </p>
                        <p>
                            <strong>End Date:</strong> {data.end_at}
                        </p>
                    </div>
                </div>
                <img
                    className='event-image'
                    src={data.image}
                    alt={data.title}
                />
            </div>

            <div className='section'>
                <h2 className='section-title'>Speakers</h2>
                <div className='section-content'>
                    {data.speakers &&
                        data.speakers.map((speaker, i) => (
                            <div className='speaker' key={i}>
                                <p className='speaker-name'>
                                    {speaker.firstname}
                                    {speaker.lastname}
                                </p>
                            </div>
                        ))}
                </div>
            </div>

            <div className='section'>
                <h2 className='section-title'>Sessions</h2>
                <div className='section-content'>
                    {data.sessions &&
                        data.sessions.map((session, i) => (
                            <div className='session' key={i}>
                                <p className='session-title'>
                                    title: {session.title}
                                </p>
                                <p className='session-description'>
                                    description: {session.description}
                                </p>
                                <p className='session-location'>
                                    location: {session.location}
                                </p>
                                <p className='session-datetime'>
                                    Start Date/Time: {session.start_at}
                                </p>
                                <p className='session-datetime'>
                                    End Date/Time: {session.end_at}
                                </p>
                                {session.speakers.map((speaker, i) => (
                                    <p className='session-speaker' key={i}>
                                        speaker: {speaker.firstname}
                                        {speaker.lastname}
                                    </p>
                                ))}
                            </div>
                        ))}
                </div>
            </div>

            <div className='section'>
                <h2 className='section-title'>Exhibition</h2>
                <div className='section-content'>
                    {data.exhibitions &&
                        data.exhibitions.map((exhibition, i) => (
                            <div key={i}>
                                <div className='exhibition'>
                                    <p className='exhibition-title'>
                                        title: {exhibition.title}
                                    </p>
                                    <p className='exhibition-description'>
                                        description: {exhibition.description}
                                    </p>
                                    <p className='exhibition-location'>
                                        location:{exhibition.location}
                                    </p>
                                    <p className='exhibition-datetime'>
                                        Start Time: {exhibition.start_at}
                                    </p>
                                    <p className='exhibition-datetime'>
                                        End Time: {exhibition.end_at}
                                    </p>
                                </div>

                                {exhibition.booths.map((booth, i) => (
                                    <div className='booth' key={i}>
                                        <p className='booth-title'>
                                            booth number: {booth.booth_number}
                                        </p>
                                        <p className='booth-title'>
                                            title: {booth.title}
                                        </p>
                                        <p className='booth-description'>
                                            description: {booth.description}
                                        </p>

                                        <p className='booth-company'>
                                            <a href='https://www.neste.com/'>
                                                company: {booth.company.name}
                                            </a>
                                        </p>
                                        <p>{booth.company.description}</p>
                                    </div>
                                ))}
                            </div>
                        ))}
                </div>
            </div>

            <div className='section'>
                <h2 className='section-title'>Workshops</h2>
                <div className='section-content'>
                    {data.workshops &&
                        data.workshops.map((workshop, i) => (
                            <div className='session' key={i}>
                                <p className='session-title'>
                                    title: {workshop.title}
                                </p>
                                <p className='session-description'>
                                    description: {workshop.description}
                                </p>
                                <p className='session-location'>
                                    location: {workshop.location}
                                </p>
                                <p className='session-datetime'>
                                    Start Date/Time: {workshop.start_at}
                                </p>
                                <p className='session-datetime'>
                                    End Date/Time: {workshop.end_at}
                                </p>
                                {workshop.speakers.map((speaker, i) => (
                                    <p className='session-speaker' key={i}>
                                        speaker: {speaker.firstname}
                                        {speaker.lastname}
                                    </p>
                                ))}
                            </div>
                        ))}
                </div>
            </div>

            <div className='section'>
                <h2 className='section-title'>Side Events</h2>
                {data.sideEvents &&
                    data.sideEvents.map((sideEvent, i) => (
                        <div className='section-content' key={i}>
                            <div className='event'>
                                <p className='event-title'>
                                    title: {sideEvent.title}
                                </p>
                                <p className='event-description'>
                                    description: {sideEvent.description}
                                </p>
                                <p className='event-location'>
                                    Location: {sideEvent.location}
                                </p>
                                <p className='event-datetime'>
                                    Start Time: {sideEvent.start_at}
                                </p>
                                <p className='event-datetime'>
                                    End Time: {sideEvent.end_at}
                                </p>
                            </div>
                        </div>
                    ))}
            </div>
        </div>
    );
}

export default SingleEvent;
