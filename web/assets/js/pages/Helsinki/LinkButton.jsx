const LinkButton = ({ children, url }) => {
    return (
        <p>
            <Link
                to={url}
                target='_blank'
                rel='noreferrer'
                className='info-link'
            >
                {' '}
                <span className='arrow-icon'>
                    <FaArrowRight />
                </span>
                {children}
            </Link>
        </p>
    );
};

export default LinkButton;
