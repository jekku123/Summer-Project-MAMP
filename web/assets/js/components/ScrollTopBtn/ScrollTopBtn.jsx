import React, { useState } from 'react';
import './ScrollTopBtn.css';

const ScrollTopBtn = () => {
    const [visible, setVisible] = useState(false);

    const toggleVisible = () => {
        const scrolled = document.documentElement.scrollTop;
        if (scrolled > 300) {
            setVisible(true);
        } else if (scrolled <= 300) {
            setVisible(false);
        }
    };

    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    };

    window.addEventListener('scroll', toggleVisible);

    return (
        <div
            className='scrolltop'
            onClick={scrollToTop}
            style={{ display: visible ? 'flex' : 'none' }}
        >
            <p>Go top!</p>
        </div>
    );
};

export default ScrollTopBtn;
