import React from 'react';
import Banner from '../../components/Banner/Banner';
import Card from '../../components/Card/Card';
import './Home.css';

const Home = () => {
    return (
        <div className='home'>
            <Banner />
            <div className='home-content'>
                <h2>Upcoming Events</h2>

                <div className='search-area'>
                    <input placeholder='search by name' type='search' />
                    <input type='date' />
                </div>

                <div className='homepage-cards'>
                    <Card />
                    <Card />
                    <Card />
                </div>
            </div>
        </div>
    );
};

export default Home;
