import React, { useState } from 'react';
import './Faq.css';
import { FaPlus, FaMinus } from 'react-icons/fa';

const Faq = ({ info }) => {
    const [expandedIndex, setExpandedIndex] = useState(null);

    const handleToggle = (index) => {
        if (expandedIndex === index) {
            setExpandedIndex(null);
        } else {
            setExpandedIndex(index);
        }
    };

    const handleHover = (index) => {
        const button = document.getElementById(`button_${index}`);
        button.classList.add('hovered');
    };

    const handleLeave = (index) => {
        const button = document.getElementById(`button_${index}`);
        button.classList.remove('hovered');
    };

    return (
        <>
            {info.map((item, index) => (
                <div className='faq' key={index}>
                    <div className='faq-qa'>
                        <div className='question'>
                            <button
                                id={`button_${index}`}
                                className={`btn_expand ${
                                    expandedIndex === index ? 'expanded' : ''
                                }`}
                                onClick={() => handleToggle(index)}
                                onMouseEnter={() => handleHover(index)}
                                onMouseLeave={() => handleLeave(index)}
                            >
                                {expandedIndex === index ? (
                                    <FaMinus />
                                ) : (
                                    <FaPlus />
                                )}
                            </button>
                            <h3
                                className='question_title'
                                onClick={() => handleToggle(index)}
                                onMouseEnter={() => handleHover(index)}
                                onMouseLeave={() => handleLeave(index)}
                            >
                                {item.question}
                            </h3>
                        </div>
                        {expandedIndex === index && (
                            <p className='answer'>{item.answer}</p>
                        )}
                    </div>
                </div>
            ))}
        </>
    );
};

export default Faq;
