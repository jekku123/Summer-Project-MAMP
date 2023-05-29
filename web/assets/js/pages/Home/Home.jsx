import React from 'react';
import Banner from '../../components/Banner/Banner';
import Card from '../../components/Card/Card';
import './Home.css';

const Home = () => {
    return (
        <div className='home'>
            <Banner />
            <h3>Upcoming Events</h3>

            <div className='search-area'>
                <input placeholder='search by name' type='search' />
                <input type='date' />
            </div>

            <div className='homepage-cards'>
                <Card />
                <Card />
                <Card />
                <Card />
                <Card />
                <Card />
            </div>
        </div>
    );
};

export default Home;
