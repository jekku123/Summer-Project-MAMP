import React from 'react';
import { Link } from 'react-router-dom';
import { FaArrowRight } from 'react-icons/fa';
import { FaExternalLinkAlt } from 'react-icons/fa';
import './LinkButton.css';

const LinkButton = ({ children, url }) => {
    const isExternalLink = url.startsWith('http');

    return (
        <p>
            {isExternalLink ? (
                <a
                    href={url}
                    className='info-link'
                    target='_blank'
                    rel='noreferrer'
                >
                    <span className='arrow-icon'>
                        <FaExternalLinkAlt />
                    </span>
                    {children}
                </a>
            ) : (
                <Link to={url} className='info-link'>
                    {' '}
                    <span className='arrow-icon'>
                        <FaArrowRight />
                    </span>
                    {children}
                </Link>
            )}
        </p>
    );
};

export default LinkButton;
