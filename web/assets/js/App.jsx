import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './pages/Home/Home';
import Layout from './components/UI/Layout';
import Helsinki from './pages/Helsinki/Helsinki';
import FaqInfo from './pages/Faq/FaqInfo';
import EventList from './pages/EventList/EventList';
import ScrollTopBtn from './components/ScrollTopBtn/ScrollTopBtn';
import SingleEvent from './pages/Event/SingleEvent';
import './App.css';
import SignUp from './pages/Register/SignUp';

function App() {
    return (
        <div className='App'>
            <BrowserRouter>
                <Routes>
                    <Route path='/' element={<Layout />}>
                        <Route index element={<Home />} />
                        <Route path='/helsinki' element={<Helsinki />} />
                        <Route path='/events' element={<EventList />} />
                        <Route path='/:id' element={<SingleEvent />} />
                        <Route path='/faq' element={<FaqInfo />} />
                        <Route path='/signup/:id' element={<SignUp />} />
                    </Route>
                </Routes>
                <ScrollTopBtn />
            </BrowserRouter>
        </div>
    );
}

export default App;
