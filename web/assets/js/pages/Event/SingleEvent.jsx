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
        <div className='event'>
            <div className='loader'>
                <h2>Loading</h2>
            </div>
        </div>
    ) : (
        <div className='event'>
            <h1 className='title'>About {data.type}</h1>

            <div className='section1'>
                <div className='section1-main'>
                    <h2 className='section-title'>{data.type} Information</h2>
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

            {data.speakers && data.speakers.length > 0 ? (
                <div className='section'>
                    <h2 className='section-title'>Speakers</h2>
                    <div className='section-content-speakers'>
                        {data.speakers &&
                            data.speakers.map((speaker, i) => (
                                <div className='speaker' key={speaker.id}>
                                    <p>{speaker.name}</p>
                                </div>
                            ))}
                    </div>
                </div>
            ) : null}

            <div className='section'>
                <h2 className='section-title'>Sessions</h2>
                <div className='section-content'>
                    {data.sessions &&
                        data.sessions.map((session, i) => (
                            <div className='session' key={session.id}>
                                <p>
                                    <strong>Title:</strong> {session.title}
                                </p>
                                <p>
                                    <strong>Description:</strong>{' '}
                                    {session.description}
                                </p>
                                <p>
                                    <strong>Location:</strong>{' '}
                                    {session.location}
                                </p>
                                <p>
                                    <strong>Start Date:</strong>{' '}
                                    {session.start_at}
                                </p>
                                <p>
                                    <strong>End Date:</strong> {session.end_at}
                                </p>
                                <p>
                                    {' '}
                                    <strong>Speakers:</strong>
                                    {session.speakers.map((speaker, i) => (
                                        <li key={speaker.id}>{speaker.name}</li>
                                    ))}
                                </p>
                            </div>
                        ))}
                </div>
            </div>

            {data.exhibitions && data.exhibitions.length > 0 ? (
                <div className='section'>
                    <h2 className='section-title'>Exhibition</h2>
                    <div className='section-content'>
                        {data.exhibitions &&
                            data.exhibitions.map((exhibition, i) => (
                                <div className='exhibition' key={exhibition.id}>
                                    <div className='exhibition-info'>
                                        <p>
                                            <strong>Title: </strong>
                                            {exhibition.title}
                                        </p>
                                        <p>
                                            <strong>Description: </strong>
                                            {exhibition.description}
                                        </p>
                                        <p>
                                            <strong>Location: </strong>
                                            {exhibition.location}
                                        </p>
                                        <p>
                                            <strong>Start Date/Time: </strong>{' '}
                                            {exhibition.start_at}
                                        </p>
                                        <p>
                                            <strong>End Date/Time: </strong>
                                            {exhibition.end_at}
                                        </p>
                                    </div>
                                    <p>
                                        {' '}
                                        <strong>Booths:</strong>
                                    </p>
                                    {exhibition.booths.map((booth) => (
                                        <div
                                            className='exhibition-booth'
                                            key={booth.id}
                                        >
                                            <p>
                                                <strong>Booth number: </strong>{' '}
                                                {booth.booth_number}
                                            </p>
                                            <p>
                                                <strong>Title: </strong>{' '}
                                                {booth.title}
                                            </p>
                                            <p>
                                                <strong>Description: </strong>{' '}
                                                {booth.description}
                                            </p>

                                            <p className='booth-company'>
                                                {' '}
                                                <strong>Company: </strong>
                                                <a href='https://www.neste.com/'>
                                                    {booth.company.name}
                                                </a>
                                            </p>
                                            <p>
                                                {' '}
                                                <strong>About company: </strong>
                                                {booth.company.description}
                                            </p>
                                        </div>
                                    ))}
                                </div>
                            ))}
                    </div>
                </div>
            ) : null}

            {data.workshops && data.workshops.length > 0 ? (
                <div className='section'>
                    <h2 className='section-title'>Workshops</h2>
                    <div className='section-content'>
                        {data.workshops &&
                            data.workshops.map((workshop, i) => (
                                <div className='workshop' key={workshop.id}>
                                    <p>
                                        <strong>Title:</strong>
                                        {workshop.title}
                                    </p>
                                    <p>
                                        <strong>Description:</strong>
                                        {workshop.description}
                                    </p>
                                    <p>
                                        <strong>Location:</strong>
                                        {workshop.location}
                                    </p>
                                    <p>
                                        <strong>Start Date/Time:</strong>{' '}
                                        {workshop.start_at}
                                    </p>
                                    <p>
                                        <strong>End Date/Time:</strong>{' '}
                                        {workshop.end_at}
                                    </p>
                                    <p>
                                        {' '}
                                        <strong>Speakers:</strong>
                                        {workshop.speakers.map((speaker) => (
                                            <li key={speaker.id}>
                                                {speaker.name}
                                            </li>
                                        ))}
                                    </p>
                                </div>
                            ))}
                    </div>
                </div>
            ) : null}

            {data.sideEvents && data.sideEvents.length > 0 ? (
                <div className='section'>
                    <h2 className='section-title'>Side Events</h2>
                    {data.sideEvents &&
                        data.sideEvents.map((sideEvent, i) => (
                            <div className='section-content' key={sideEvent.id}>
                                <div className='side-event'>
                                    <p><strong>Title:</strong>{sideEvent.title}</p>
                                    <p><strong>Description:</strong> {sideEvent.description}</p>
                                    <p><strong>Location:</strong> {sideEvent.location}</p>
                                    <p><strong>Start Date/Time:</strong> {sideEvent.start_at}</p>
                                    <p><strong>End Date/Time:</strong> {sideEvent.end_at}</p>
                                </div>
                            </div>
                        ))}
                </div>
            ) : null}
        </div>
    );
}

export default SingleEvent;
