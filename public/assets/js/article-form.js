const nextButton = document.getElementById('next-button');
const step1 = document.getElementById('step-1');
const step2 = document.getElementById('step-2');
const submitButton = document.querySelector('button[type="submit"]');
const backButton = document.getElementById('back-button');

// Get all required inputs in step-1
const requiredInputs = document.querySelectorAll('#step-1 input[required], #step-1 select[required], #step-1 textarea[required]');

nextButton.addEventListener('click', function() {
    let isStep1Valid = true;
    
    requiredInputs.forEach(function(input) {
        if (!input.value.trim()) {
            isStep1Valid = false;
            input.classList.add('is-invalid');
        } else {
            input.classList.remove('is-invalid');
        }
    });


    if (isStep1Valid) {
        step1.style.display = 'none';
        step2.style.display = 'block';
        nextButton.style.display = 'none';
        backButton.style.display = 'block';
        submitButton.style.display = 'block';
    } else {
        alert('All fields are required. Please fill in all fields in order to move to the next step.');
    }
});

backButton.addEventListener('click', function() {
    step1.style.display = 'block';
    step2.style.display = 'none';
    nextButton.style.display = 'block';
    backButton.style.display = 'none';
    submitButton.style.display = 'none';

});