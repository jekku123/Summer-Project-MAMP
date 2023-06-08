import React from 'react';
import { useNavigate, useParams } from 'react-router';
import axios from 'axios';
import useAxios from '../../hooks/useAxios';
import useForm from './useForm';
import TextField from './components/TextField';
import alertBox from './utils/alertBox';
import './SignUp.css';

const formTemplate = {
    firstname: '',
    lastname: '',
    email: '',
    phone: '',
};

const SignUp = () => {
    const params = useParams();
    const navigate = useNavigate();
    const [event] = useAxios(`http://localhost:8007/api/events/${params.id}`);
    const { formData, handleFormChanges, handleSubmit } = useForm(formTemplate);

    const submit = async () => {
        const postData = { ...formData, event_id: params.id };
        try {
            await axios.post(`http://localhost:8007/api/attendee`, postData);
            alertBox(event, true);
            navigate('/');
        } catch (error) {
            alertBox(null, false);
        }
    };

    return (
        <div className='signup'>
            <h2>Sign up for {event.title}</h2>
            <form onSubmit={(e) => handleSubmit(e, submit)}>
                {Object.keys(formData).map((fieldname, i) => (
                    <TextField
                        key={i}
                        name={fieldname}
                        value={formData[fieldname]}
                        onChange={handleFormChanges}
                    >
                        {fieldname}
                    </TextField>
                ))}
                <button type='submit'>Sign up</button>
            </form>
        </div>
    );
};

export default SignUp;
