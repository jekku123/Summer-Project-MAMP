import { BrowserRouter, Routes, Route } from 'react-router-dom';
import React from 'react';
import Home from './pages/Home/Home';
import Layout from './UI/Layout/Layout';
import Event from './pages/Event/Event';
import Helsinki from './pages/Helsinki/Helsinki';
import Faq from './pages/Faq/Faq';
import EventList from './pages/EventList/EventList';
import './App.css';

function App() {
    return (
        <div className='App'>
            <BrowserRouter>
                <Routes>
                    <Route path='/' element={<Layout />}>
                        <Route index element={<Home />} />
                        <Route path='helsinki-info' element={<Helsinki />} />
                        <Route path='event-list' element={<EventList />} />
                        <Route path='event' element={<Event />} />
                        <Route path='faq' element={<Faq />} />
                    </Route>
                </Routes>
            </BrowserRouter>
        </div>
    );
}

export default App;
