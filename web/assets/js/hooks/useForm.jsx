/* eslint-disable react-hooks/exhaustive-deps */
import { useCallback, useState } from 'react';
import { v4 as uuid } from 'uuid';

const useForm = (init) => {
    const [formData, setFormData] = useState(init);

    // objArrayIdentifier = key for the array of objects
    const removeObjectFromArray = useCallback((e, objArrayIdentifier) => {
        const id = e.target.dataset.idx;
        setFormData((prevData) => ({
            ...prevData,
            [objArrayIdentifier]: prevData[objArrayIdentifier].filter(
                (obj) => id !== obj.id
            ),
        }));
    }, []);

    // objArrayIdentifier = key for the array of objects
    // fields = array with names of the fields inside the array of objects
    const insertObjectToArray = useCallback(
        (objArrayIdentifier, fields) => {
            const newField = fields.reduce(
                (acc, curr) => ({ ...acc, id: uuid(), [curr]: '' }),
                {}
            );
            const newData = {
                ...formData,
                [objArrayIdentifier]: [
                    ...formData[objArrayIdentifier],
                    newField,
                ],
            };

            setFormData(newData);
        },
        [formData]
    );

    // objArrayIdentifier = key for the array of objects
    // arrayObjKey = key of the value being accessed inside the array of objects
    const handleFormChanges = useCallback(
        (e, objArrayIdentifier, arrayObjKey) => {
            const { name, value, dataset } = e.target;
            const id = dataset.idx;

            if (name === arrayObjKey) {
                setFormData((prevData) => ({
                    ...prevData,
                    [objArrayIdentifier]: prevData[objArrayIdentifier].map(
                        (obj) => {
                            if (obj.id === id) {
                                return {
                                    ...obj,
                                    [name]: value,
                                };
                            }
                            return obj;
                        }
                    ),
                }));
            } else {
                setFormData((prevState) => ({
                    ...prevState,
                    [name]: value,
                }));
            }
        },
        []
    );

    const handleSubmit = (e, submit) => {
        e.preventDefault();
        submit(formData);
        setFormData(init);
    };

    return {
        formData,
        handleFormChanges,
        removeObjectFromArray,
        insertObjectToArray,
        handleSubmit,
    };
};

export default useForm;
