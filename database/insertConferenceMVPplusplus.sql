INSERT INTO conference (title, description, location, image, start_at, end_at)
VALUES ('Conference 1', 'Conference 1 description', 'Location 1', 'image1.jpg', '2023-06-01 09:00:00', '2023-06-03 18:00:00');

INSERT INTO side_event (title, description, location, image, start_at, end_at, conference_id, seminar_id)
VALUES ('Side Event 1', 'Side Event 1 description', 'Location 2', 'image2.jpg', '2023-06-02 14:00:00', '2023-06-02 16:00:00', 1, NULL);

INSERT INTO session (title, description, location, start_at, end_at, conference_id, seminar_id)
VALUES ('Session 1', 'Session 1 description', 'Location 3', '2023-06-01 13:00:00', '2023-06-01 15:00:00', 1, NULL);

INSERT INTO workshop (title, description, location, start_at, end_at, conference_id)
VALUES ('Workshop 1', 'Workshop 1 description', 'Location 4', '2023-06-02 10:00:00', '2023-06-02 12:00:00', 1);

INSERT INTO exhibition (title, description, location, start_at, end_at, conference_id)
VALUES ('Exhibition 1', 'Exhibition 1 description', 'Location 5', '2023-06-01 09:00:00', '2023-06-03 18:00:00', 1);

INSERT INTO company (name, description, website)
VALUES ('Company 1', 'Company 1 description', 'www.company1.com');

INSERT INTO attendee (firstname, lastname, email, phone, is_attending)
VALUES ('John', 'Doe', 'john.doe@example.com', '123456789', NULL),
       ('Jane', 'Smith', 'jane.smith@example.com', '987654321', NULL),
       ('Alice', 'Johnson', 'alice.johnson@example.com', '555555555', NULL);

INSERT INTO speaker (firstname, lastname, bio, organization)
VALUES ('Speaker 1', 'Lastname', 'Speaker 1 bio', 'Speaker 1 Organization');

INSERT INTO booth (booth_number, title, description, company_id, exhibition_id)
VALUES ('A1', 'Booth 1', 'Booth 1 description', 1, 1);

INSERT INTO session_speaker (speaker_id, session_id)
VALUES (1, 1);

INSERT INTO workshop_speaker (workshop_id, speaker_id)
VALUES (1, 1);

INSERT INTO workshop_attendee (attendee_id, workshop_id)
VALUES (1, 1), (2, 1), (3, 1);


INSERT INTO conference (title, description, location, image, start_at, end_at)
VALUES ('Conference 2', 'Conference 2 description', 'Location 6', 'image3.jpg', '2023-07-01 10:00:00', '2023-07-03 17:00:00');

INSERT INTO side_event (title, description, location, image, start_at, end_at, conference_id, seminar_id)
VALUES ('Side Event 2', 'Side Event 2 description', 'Location 7', 'image4.jpg', '2023-07-02 15:00:00', '2023-07-02 17:00:00', 2, NULL);

INSERT INTO session (title, description, location, start_at, end_at, conference_id, seminar_id)
VALUES ('Session 2', 'Session 2 description', 'Location 8', '2023-07-01 14:00:00', '2023-07-01 16:00:00', 2, NULL);

INSERT INTO workshop (title, description, location, start_at, end_at, conference_id)
VALUES ('Workshop 2', 'Workshop 2 description', 'Location 9', '2023-07-02 11:00:00', '2023-07-02 13:00:00', 2);

INSERT INTO exhibition (title, description, location, start_at, end_at, conference_id)
VALUES ('Exhibition 2', 'Exhibition 2 description', 'Location 10', '2023-07-01 09:00:00', '2023-07-03 18:00:00', 2);

INSERT INTO company (name, description, website)
VALUES ('Company 2', 'Company 2 description', 'www.company2.com');

INSERT INTO attendee (firstname, lastname, email, phone, is_attending)
VALUES ('Mark', 'Johnson', 'mark.johnson@example.com', '111111111', NULL),
       ('Emily', 'Brown', 'emily.brown@example.com', '222222222', NULL),
       ('Michael', 'Wilson', 'michael.wilson@example.com', '333333333', NULL);

INSERT INTO speaker (firstname, lastname, bio, organization)
VALUES ('Speaker 2', 'Lastname', 'Speaker 2 bio', 'Speaker 2 Organization');

INSERT INTO booth (booth_number, title, description, company_id, exhibition_id)
VALUES ('B1', 'Booth 2', 'Booth 2 description', 2, 2);

INSERT INTO session_speaker (speaker_id, session_id)
VALUES (2, 2);

INSERT INTO workshop_speaker (workshop_id, speaker_id)
VALUES (2, 2);

INSERT INTO workshop_attendee (person_id, workshop_id)
VALUES (4, 2), (5, 2), (6, 2);