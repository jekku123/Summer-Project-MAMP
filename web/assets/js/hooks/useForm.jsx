import { useCallback, useState } from 'react';

const useForm = (init) => {
    const [formData, setFormData] = useState(init);

    const handleFormChanges = useCallback((e) => {
        const { name, value } = e.target;
        setFormData((prevState) => ({
            ...prevState,
            [name]: value,
        }));
    }, []);

    const handleSubmit = (e, submit) => {
        e.preventDefault();
        submit(formData);
        setFormData(init);
    };

    return {
        formData,
        handleFormChanges,
        handleSubmit,
    };
};

export default useForm;
