import React, { useState } from 'react';
import { useParams } from 'react-router';
import axios from 'axios';
import './SignUp.css';

const SignUp = () => {
    const [formData, setFormData] = useState({
        firstname: '',
        lastname: '',
        email: '',
        phone: '',
    });
    const params = useParams();

    const handleChanges = (e) => {
        const { name, value } = e.target;
        setFormData((prevState) => ({
            ...prevState,
            [name]: value,
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        const data = { ...formData, event_id: params.id };
        axios.post(`http://localhost:8007/api/attendee`, data);
    };

    return (
        <div className='signup'>
            <h2>Sign up for the event</h2>
            <form onSubmit={handleSubmit}>
                <div className='textfield'>
                    <label htmlFor='firstname'>Firstname</label>
                    <input
                        name='firstname'
                        id='firstname'
                        onChange={handleChanges}
                    />
                </div>

                <div className='textfield'>
                    <label htmlFor='lastname'>Lastname</label>
                    <input
                        name='lastname'
                        id='lastname'
                        onChange={handleChanges}
                    />
                </div>
                <div className='textfield'>
                    <label htmlFor='email'>Email</label>
                    <input name='email' id='email' onChange={handleChanges} />
                </div>
                <div className='textfield'>
                    <label htmlFor='phone'>Phone</label>
                    <input name='phone' id='phone' onChange={handleChanges} />
                </div>
                <button type='submit'>Sign up</button>
            </form>
        </div>
    );
};

export default SignUp;
