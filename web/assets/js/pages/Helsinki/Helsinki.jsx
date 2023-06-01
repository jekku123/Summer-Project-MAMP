import React from "react";
import { Link } from "react-router-dom";
import "./Helsinki.css";

const Helsinki = () => {
    const NOT_SO_SECRET_MAP_API_KEY = "AIzaSyAN2Zeuaj28IMYNMg7o2kcixZq8CqVKtjM";

    return (
        <div className="helsinki-info">
            <div className="header">
                <h1 className="title">Helsinki Info</h1>
            </div>

            <div className="section info-section">
                <div className="info-text">
                    <h2>Welcome to Helsinki and Pasila</h2>
                    <p>
                        Helsinki is Finland's capital city, where urban charm
                        meets natural beauty. In the Pasila district, Business
                        College Helsinki finds its home alongside Haaga-Helia
                        University of Applied Sciences and Helsinki Expo and
                        Convention Centre Messukeskus.
                    </p>
                </div>
                <iframe
                    width={500}
                    height={400}
                    style={{ border: 0 }}
                    loading="lazy"
                    allowFullScreen
                    referrerPolicy="no-referrer-when-downgrade"
                    src={`https://www.google.com/maps/embed/v1/place?key=${NOT_SO_SECRET_MAP_API_KEY}
    &q=Helsinki+Business+College`}
                ></iframe>
            </div>
            <div className="section info-section">
                <div className="info-text">
                    <h2>Public Transportation</h2>
                    <p>
                        Business College Helsinki is located close to Pasila
                        train station and can be easily reached also by bus and
                        tram.
                    </p>
                    <p>
                        Check{" "}
                        <Link
                            to="https://www.hsl.fi/en"
                            target="_blank"
                            rel="noreferrer"
                        >
                            hsl.fi
                        </Link>{" "}
                        for public transport options along with their schedules,
                        routes, and fares. The website also features a journey
                        planner tool (Reittiopas) that helps users find the best
                        routes and plan their trips efficiently.
                    </p>
                    <p>
                        <Link
                            to="https://reittiopas.hsl.fi/etusivu/-/Rautatiel%C3%A4isenkatu%205%2C%20Helsinki%3A%3A60.201434%2C24.93556?locale=en"
                            target="_blank"
                            rel="noreferrer"
                            className="info-link"
                        >
                            HSL Route Search | Business College Helsinki
                        </Link>
                    </p>
                </div>
                <img
                    className="tram-img"
                    src="https://images.unsplash.com/photo-1647247034410-79306bddcfbb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                    alt="trams in Helsinki"
                />
            </div>
            <div className="section info-section">
                <div className="info-text">
                    <h2>Explore Helsinki</h2>
                    <p>
                        <Link
                            to="https://www.visitfinland.com/en/places-to-go/helsinki-region/"
                            target="_blank"
                            rel="noreferrer"
                        >
                            Visit Finland - Helsinki region
                        </Link>
                    </p>
                    <p>
                        <Link
                            to="https://www.myhelsinki.fi/your-local-guide-to-helsinki"
                            target="_blank"
                            rel="noreferrer"
                        >
                            MyHelsinki.fi
                        </Link>
                    </p>
                    <p>
                        <Link
                            to="https://www.myhelsinki.fi/en/see-and-do/events"
                            target="_blank"
                            rel="noreferrer"
                        >
                            MyHelsinki.fi - Events
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    );
};

export default Helsinki;
