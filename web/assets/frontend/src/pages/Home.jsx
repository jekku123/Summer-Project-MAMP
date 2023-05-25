import React from 'react';
import HeroBanner from '../components/UI/Herobanner';
import Card from '../components/UI/Card'
import './Home.css';
import InputCalender from '../components/UI/InputCalender';

const Home = () => {
    return (
        <div className='home'>

            <HeroBanner />
            <h2>Upcoming Events</h2>

            <div className='search-area'>
                <div>
                    <input id='search-name' placeholder='search by name' type="search" />
                </div>

                <div>
                    <InputCalender />
                </div>

            </div>

            <div className='events'>
                <Card />
                <Card />
                <Card />
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
    );
};

export default Home;