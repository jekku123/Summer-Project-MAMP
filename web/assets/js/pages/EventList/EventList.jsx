import React from 'react';
import { useState } from 'react';
import useAxios from '../../hooks/useAxios';
import Card from '../../components/Card/Card';
import './EventList.css';

const EventList = () => {
    const [searchInput, setSearchInput] = useState('');
    const [events, isLoading] = useAxios('http://localhost:8007/api/events');

    const [radioFilter, setRadioFilter] = useState('all');

    const searchInputHandler = (e) => {
        setSearchInput(e.target.value.toLowerCase().trim());
    };
    const searchFilter = events.filter((event) => {
        const lowercaseTitle = event.title.toLowerCase();
        const lowercaseSearchInput = searchInput.toLowerCase().trim();
        return lowercaseTitle.includes(lowercaseSearchInput);
    });

    const dateFormatter = (resDate) => {
        const dateString = resDate;
        const date = new Date(dateString);

        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
        };
        const formattedDate = date.toLocaleString('en-GB', options);
        const updatedDate = formattedDate.replace(' at ', ', ');

        const day = date.getDate();
        let dayWithSuffix;
        if (day % 10 === 1 && day !== 11) {
            dayWithSuffix = day + 'st';
        } else if (day % 10 === 2 && day !== 12) {
            dayWithSuffix = day + 'nd';
        } else if (day % 10 === 3 && day !== 13) {
            dayWithSuffix = day + 'rd';
        } else {
            dayWithSuffix = day + 'th';
        }

        const formattedDateWithSuffix = updatedDate.replace(
            String(day),
            dayWithSuffix
        );
        return formattedDateWithSuffix;
    };

    if (isLoading) {
        return <p>Loading...</p>;
    }
    return (
        <div className='events'>
            <h2 className='title'>All Events</h2>

            <div className='search-area'>
                <div className='radio-options'>
                    <input
                        type='radio'
                        id='all'
                        name='event-type'
                        value='all'
                        onChange={(e) => setRadioFilter(e.target.value)}
                    ></input>
                    <label htmlFor='all'>All</label>
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
                <input
                    placeholder='Search by name'
                    type='search'
                    onChange={searchInputHandler}
                />
            </div>
            <div className='eventlist'>
                {searchFilter
                    .filter((event) =>
                        radioFilter !== 'all'
                            ? event.type === radioFilter
                            : event
                    )
                    .map((event) => (
                        <Card
                            key={event.id}
                            image={event.image}
                            id={event.id}
                            title={event.title}
                            startdate={dateFormatter(event.start_at)}
                            enddate={dateFormatter(event.end_at)}
                        />
                    ))}
            </div>
        </div>
    );
};

export default EventList;
