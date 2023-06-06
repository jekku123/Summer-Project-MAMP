import React, { useState } from 'react';
import './Faq.css';

const Faq = ({ info }) => {
    const [expandedIndex, setExpandedIndex] = useState(null);

    const handleToggle = (index) => {
        if (expandedIndex === index) {
            setExpandedIndex(null);
        } else {
            setExpandedIndex(index);
        }
    };

    return (
        <div>
            {info.map((item, index) => (
                <div className='faq' key={index}>
                    <div className='faq-qa'>
                      <div className='question'>
                        <button className='btn_expand' onClick={() => handleToggle(index)}>{expandedIndex === index ? '-' : '+'}</button>
                        <h3 onClick={() => handleToggle(index)}>{item.question}</h3>
                      </div>
                        {expandedIndex === index && (
                        <p className='answer'>{item.answer}</p>
                        )}
                    </div>
                </div>
            ))}
        </div>
    );
};

export default Faq;
