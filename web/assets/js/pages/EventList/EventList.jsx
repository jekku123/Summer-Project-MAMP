import React from 'react';
import { useEffect, useState } from 'react';
import useAxios from '../../hooks/useAxios';
import './EventList.css';

import Card from '../../components/Card/Card';

const EventList = () => {
    const [searchInput, setSearchInput] = useState('');
    const [events, isLoading] = useAxios('http://localhost:8007/api/events');

    const [radioFilter, setRadioFilter] = useState(undefined);

    const searchInputHandler = (e) => {
        setSearchInput(e.target.value.toLowerCase().trim());
    };
    const searchFilter = events.filter((event) => {
        const lowercaseTitle = event.title.toLowerCase();
        const lowercaseSearchInput = searchInput.toLowerCase().trim();
        return lowercaseTitle.includes(lowercaseSearchInput);
    });

    if (isLoading) {
        return <p>Loading...</p>;
    }
    return (
        <div className='events'>
            <h2>All Events</h2>

            <div className='search-area'>
                <input
                    placeholder='search by name'
                    type='search'
                    onChange={searchInputHandler}
                />

                <div className='radio-options'>
                    <input
                        type='radio'
                        id='seminar'
                        name='event-type'
                        value='seminar'
                        onChange={(e) => setRadioFilter(e.target.value)}
                    ></input>
                    <label htmlFor='seminar'>Seminar</label>
                    <input
                        type='radio'
                        id='conference'
                        name='event-type'
                        value='conference'
                        onChange={(e) => setRadioFilter(e.target.value)}
                    ></input>
                    <label htmlFor='conference'>Conference</label>
                </div>
            </div>
            <div className='eventlist'>
                {searchFilter
                    .filter((event) =>
                        radioFilter ? event.type === radioFilter : event
                    )
                    .map((event) => (
                        <Card
                            key={event.id}
                            image={event.image}
                            id={event.id}
                            title={event.title}
                            startdate={event.start_at}
                            enddate={event.end_at}
                        />
                    ))}
            </div>
        </div>
    );
};

export default EventList;
