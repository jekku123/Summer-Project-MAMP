import React from 'react';
import useAxios from '../../hooks/useAxios';
import './EventList.css';

const EventList = () => {
    const [data, isLoading] = useAxios('url');

    return isLoading || data.at(-1) ? (
        <div className='loading'>
            <p>Loading..</p>
        </div>
    ) : (
        <div>EventList</div>
    );
};

export default EventList;
