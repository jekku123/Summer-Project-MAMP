import Swal from 'sweetalert2';

export default (data, status) => {
    if (status === true) {
        Swal.fire({
            title: 'Success..',
            text: `..fully signed up to event ${data.title}!`,
            imageUrl: data.image,
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: data.title,
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: `Error!`,
            text: 'Just couldnt do it sorry :(',
        });
    }
};
