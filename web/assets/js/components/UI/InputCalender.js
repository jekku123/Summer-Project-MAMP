import DatePicker from 'react-datepicker';
import './InputCalender.css';
import 'react-datepicker/dist/react-datepicker.css';
import React from 'react';

function InputCalender() {
    return (
        <div className='inputcalender'>
            <DatePicker
                placeholderText='search by date'
                dateFormat='dd/MM/yyyy'
                className='datepicker'
            />
        </div>
    );
}

export default InputCalender;
