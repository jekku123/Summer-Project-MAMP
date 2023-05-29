CREATE TABLE event (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  location VARCHAR(255),
  image VARCHAR(255),
  start_at DATETIME,
  end_at DATETIME,
);

CREATE TABLE conference (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT UNIQUE,
  FOREIGN KEY (event_id) REFERENCES event(id)
);

CREATE TABLE seminar (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT UNIQUE,
  FOREIGN KEY (event_id) REFERENCES event(id)
);

CREATE TABLE side_event (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT,
  conference_id INT,
  seminar_id INT,
  FOREIGN KEY (event_id) REFERENCES event(id),
  FOREIGN KEY (conference_id) REFERENCES conference(id),
  FOREIGN KEY (seminar_id) REFERENCES seminar(id)
);

CREATE TABLE session (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT,
  conference_id INT,
  seminar_id INT,
  FOREIGN KEY (event_id) REFERENCES event(id),
  FOREIGN KEY (conference_id) REFERENCES conference(id),
  FOREIGN KEY (seminar_id) REFERENCES seminar(id)
);

CREATE TABLE workshop (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT,
  conference_id INT,
  FOREIGN KEY (event_id) REFERENCES event(id),
  FOREIGN KEY (conference_id) REFERENCES conference(id)
);

CREATE TABLE exhibition (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT,
  conference_id INT,
  FOREIGN KEY (event_id) REFERENCES event(id),
  FOREIGN KEY (conference_id) REFERENCES conference(id)
);

CREATE TABLE company (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  website VARCHAR(255)
);

CREATE TABLE attendee (
  id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(255),
  lastname VARCHAR(255),
  email VARCHAR(255),
  phone VARCHAR(255),
  is_attending BOOLEAN,
  conference_id INT,
  seminar_id INT,
  FOREIGN KEY (conference_id) REFERENCES conference(id),
  FOREIGN KEY (seminar_id) REFERENCES seminar(id)
);

CREATE TABLE speaker (
  id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(255),
  lastname VARCHAR(255),
  bio TEXT,
  organization VARCHAR(255),
  conference_id INT,
  seminar_id INT,
  FOREIGN KEY (conference_id) REFERENCES conference(id),
  FOREIGN KEY (seminar_id) REFERENCES seminar(id)
);

CREATE TABLE booth (
  booth_number VARCHAR(20),
  title VARCHAR(255),
  description TEXT,
  company_id INT,
  exhibition_id INT,
  PRIMARY KEY (company_id, exhibition_id),
  FOREIGN KEY (company_id) REFERENCES company(id),
  FOREIGN KEY (exhibition_id) REFERENCES exhibition(id)
);

CREATE TABLE session_speaker (
  speaker_id INT,
  session_id INT,
  PRIMARY KEY (speaker_id, session_id),
  FOREIGN KEY (speaker_id) REFERENCES speaker(id),
  FOREIGN KEY (session_id) REFERENCES session(id)
);

CREATE TABLE workshop_speaker (
  workshop_id INT,
  speaker_id INT,
  PRIMARY KEY (workshop_id, speaker_id),
  FOREIGN KEY (workshop_id) REFERENCES workshop(id),
  FOREIGN KEY (speaker_id) REFERENCES speaker(id)
);

CREATE TABLE workshop_attendee (
  attendee_id INT,
  workshop_id INT,
  PRIMARY KEY (attendee_id, workshop_id),
  FOREIGN KEY (attendee_id) REFERENCES attendee(id),
  FOREIGN KEY (workshop_id) REFERENCES workshop(id)
);