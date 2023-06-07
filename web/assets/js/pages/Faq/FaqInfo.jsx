import React from 'react'
import Faq from './Faq';
import './Faq.css';

function FaqInfo() {
    const faqData = [
        {
            question: 'How can I register for a seminar or conference?',
            answer: 'To register for a seminar or conference, please visit our website and navigate to the event page. There, you will find a registration form to fill out with your details. Once registered, you will receive a confirmation email with further instructions.',
        },
        {
            question: 'Is there a registration fee for attending the events?',
            answer: 'Yes, most of our seminars and conferences have a registration fee. The fee amount varies depending on the event and includes access to the sessions, materials, and refreshments. You can find detailed information about the registration fees on the event page.',
        },
        {
            question: 'Are there any discounts available for students?',
            answer: 'Business College Helsinki offers discounts for students attending our seminars and conferences. To avail the student discount, you will be required to provide a valid student ID or proof of enrollment during the registration process. The discount amount will be specified on the event page.',
        },
        {
            question: 'Can I cancel or transfer my registration?',
            answer: 'If you need to cancel your registration or transfer it to another person, please contact our event team as soon as possible. Cancellation and transfer policies may vary for each event, and we will assist you accordingly. Please note that certain events may have specific deadlines and restrictions for cancellations and transfers.',
        },
        {
            question: 'Will I receive a certificate of attendance?',
            answer: 'Yes, participants who attend our seminars and conferences will receive a certificate of attendance. The certificate will be provided either during the event or sent to you electronically after the event concludes. The certificate serves as proof of your participation and can be included in your professional development records.',
        },
        {
            question: 'Can I get a refund if I am unable to attend the event?',
            answer: 'Refund policies for our seminars and conferences may vary. Generally, if you notify us of your cancellation within a certain period before the event, you may be eligible for a refund. However, please check the specific refund policy mentioned on the event page or contact our event team for further assistance.',
        },
        {
            question: 'Will there be parking facilities available at the event venue?',
            answer: 'Yes, we provide parking facilities for attendees at our event venues. However, the availability of parking spaces may vary depending on the location and demand. We recommend arriving early to secure a parking spot. If you prefer to use public transportation, we will provide information on nearby public transport options on the event page.',
        },
        {
            question: 'Can I present a paper or speak at one of your conferences?',
            answer: 'Yes, we welcome paper presentations and speaker proposals for our conferences. If you have relevant expertise and would like to contribute to one of our events, please visit the event page and look for the "Call for Papers" or "Call for Speakers" section. There, you will find instructions on how to submit your proposal.',
        },
    ];

    return (
        <div className='faq-background'>
                <h1>FAQ</h1>
            <div className='faqinfo'>

                <p>Here are some answers to frequently asked questions about seminars and conferences organized by Business College Helsinki.</p>
                <hr />

                <Faq info={faqData} />
            </div>
        </div>
    )
}

export default FaqInfo;

