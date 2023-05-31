import React from 'react';
import useAxios from '../../hooks/useAxios';
import './EventList.css';

import Card from '../../components/Card/Card';

const EventList = () => {
    /* const [data, isLoading] = useAxios('url');

    return isLoading || data.at(-1) ? (
        <div className='loading'>
            <p>Loading..</p>
        </div>
    ) : (
        <div>EventList</div>
    ); */

    return (
        <div className='events'>
            <h3>All Events</h3>

            <div className='search-area'>
                <input placeholder='search by name' type='search' />
                <input type='date' />
                <div className='radio-options'>
                    <input type="radio" id="seminar" name="event-type" value="seminar"></input>
                    <label htmlFor="seminar">Seminar</label>
                    <input type="radio" id="conference" name="event-type" value="conference"></input>
                    <label htmlFor="conference">Conference</label>
                </div>

            </div>
            <div className='eventlist'>
                <Card />
                <Card />
                <Card />
                <Card />
                <Card />
                <Card />
                <Card />
                <Card />
                <Card />
            </div>
        </div>
    )
};

export default EventList;
