document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        const fullName = document.getElementById('fullName').value;
        if (fullName === '') {
            alert('Full Name is required');
            event.preventDefault();
            return;
        }

        const birthdate = document.getElementById('birthdate').value;
        if (birthdate === '') {
            alert('Birthdate is required');
            event.preventDefault();
            return;
        }

        const emailAddress = document.getElementById('emailAddress').value;
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (emailAddress === '' || !emailAddress.match(emailPattern)) {
            alert('Please enter a valid email address');
            event.preventDefault();
            return;
        }

        const contactNumber = document.getElementById('contactNumber').value;
        if (contactNumber === '' || contactNumber.length < 10) {
            alert('Please enter a valid contact number');
            event.preventDefault();
            return;
        }

        const psa = document.getElementById('psa').files.length;
        if (psa === 0) {
            alert('PSA Birth Certificate is required');
            event.preventDefault();
            return;
        }
    });
});
