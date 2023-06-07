import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router';
import axios from 'axios';
import './SignUp.css';
import useAxios from '../../hooks/useAxios';

const SignUp = () => {
    const [formData, setFormData] = useState({
        firstname: '',
        lastname: '',
        email: '',
        phone: '',
    });

    const params = useParams();
    const [data] = useAxios(`http://localhost:8007/api/events/${params.id}`);

    const handleChanges = (e) => {
        const { name, value } = e.target;
        setFormData((prevState) => ({
            ...prevState,
            [name]: value,
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        const postData = { ...formData, event_id: params.id };
        axios
            .post(`http://localhost:8007/api/attendee`, postData)
            .then(() => {
                alert(`Thank you for signing up to ${data.title}`);
                setFormData({
                    firstname: '',
                    lastname: '',
                    email: '',
                    phone: '',
                });
            })
            .catch((err) => alert('Error, just couldnt :('));
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
                        value={formData.firstname}
                    />
                </div>

                <div className='textfield'>
                    <label htmlFor='lastname'>Lastname</label>
                    <input
                        name='lastname'
                        id='lastname'
                        onChange={handleChanges}
                        value={formData.lastname}
                    />
                </div>
                <div className='textfield'>
                    <label htmlFor='email'>Email</label>
                    <input
                        name='email'
                        id='email'
                        onChange={handleChanges}
                        value={formData.email}
                    />
                </div>
                <div className='textfield'>
                    <label htmlFor='phone'>Phone</label>
                    <input
                        name='phone'
                        id='phone'
                        onChange={handleChanges}
                        value={formData.phone}
                    />
                </div>
                <div>
                    <button type='submit'>Sign up</button>
                </div>
            </form>
        </div>
    );
};

export default SignUp;
