import React from 'react';
import './TextField.css';

const TextField = ({ children, name, value, onChange }) => {
    return (
        <div className='textfield'>
            <label htmlFor={name}>{children}</label>
            <input name={name} id={name} value={value} onChange={onChange} />
        </div>
    );
};

export default TextField;
