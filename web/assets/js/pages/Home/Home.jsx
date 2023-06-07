import React from 'react';
import Banner from '../../components/Banner/Banner';
import LandingCard from '../../components/LandingCard/LandingCard';
import './Home.css';

const Home = () => {
    return (
        <div className='home'>
            <Banner />
            <div className='home-content'>
                <div className='homepage-cards'>
                    <LandingCard
                        heading='Helsinki Info'
                        info='View more information about Helsinki'
                        url='/helsinki'
                        urltext='Helsinki'
                    />
                    <LandingCard
                        heading='Frequently Asked Questions'
                        info='In the FAQ page you can find answers to different questions'
                        url='/faq'
                        urltext='FAQ'
                    />
                    <LandingCard
                        heading='Business College Helsinki'
                        info='Discover more about our school on the official website'
                        url='https://en.bc.fi/'
                        urltext='BCH homepage'
                    />
                </div>
            </div>
        </div>
    );
};

export default Home;
