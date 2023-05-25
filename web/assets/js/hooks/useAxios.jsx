import { useEffect, useState } from 'react';
import axios from 'axios';

const useAxios = (url) => {
    const [data, setData] = useState([]);
    const [isLoading, setIsLoading] = useState(false);

    useEffect(() => {
        fetch(url);
    }, [url]);

    const fetch = async (url) => {
        setIsLoading(true);
        try {
            const res = await axios.get(url);
            if (res.data.length === 1) {
                setData(res.data[0]);
            } else {
                setData(res.data);
            }
            setIsLoading(false);
        } catch (err) {
            console.log('Error: ' + err);
        }
    };

    return [data, isLoading];
};

export default useAxios;
