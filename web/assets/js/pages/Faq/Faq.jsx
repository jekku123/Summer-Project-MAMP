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
                    <div className='faq-btns'>
                        <button onClick={() => handleToggle(index)}>
                            {expandedIndex === index ? '-' : '+'}
                        </button>
                    </div>
                    <div className='faq-qa'>
                        <h3>{item.question}</h3>
                        {expandedIndex === index && <p className='answer'>{item.answer}</p>}
                    </div>
                </div>
            ))}
        </div>
    );
};

export default Faq;
