import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './pages/Home/Home';
import Layout from './components/UI/Layout';
import Conference from './pages/Event/Conference';
import Helsinki from './pages/Helsinki/Helsinki';
import FaqInfo from './pages/Faq/FaqInfo';
import EventList from './pages/EventList/EventList';
import ScrollTopBtn from './components/ScrollTopBtn/ScrollTopBtn';
import './App.css';

function App() {
    return (
        <div className='App'>
            <BrowserRouter>
                <Routes>
                    <Route path='/' element={<Layout />}>
                        <Route index element={<Home />} />
                        <Route path='/helsinki' element={<Helsinki />} />
                        <Route path='/events' element={<EventList />} />
                        <Route path='/conference' element={<Conference />} />
                        <Route path='/faq' element={<FaqInfo />} />
                    </Route>
                </Routes>
                <ScrollTopBtn />
            </BrowserRouter>
        </div>
    );
}

export default App;
