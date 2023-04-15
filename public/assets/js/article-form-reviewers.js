const suggestedReviewerElement = document.getElementById('suggested_reviewer');
const unwantedReviewerElement = document.getElementById('unwanted_reviewer');
const selectedReviewersElement = document.getElementById('selected_reviewers');
const selectedUnwantedReviewersElement = document.getElementById('selected_unwanted_reviewers');

suggestedReviewerElement.addEventListener('click', function() {
    let selectedOptions = '';
    for (let i = 0; i < suggestedReviewerElement.selectedOptions.length; i++) {
    selectedOptions += suggestedReviewerElement.selectedOptions[i].textContent + ', ';
    }
    selectedReviewersElement.textContent = selectedOptions.slice(0, -2);
});

unwantedReviewerElement.addEventListener('click', function() {
    let selectedOptions = '';
    for (let i = 0; i < unwantedReviewerElement.selectedOptions.length; i++) {
    selectedOptions += unwantedReviewerElement.selectedOptions[i].textContent + ', ';
    }
    selectedUnwantedReviewersElement.textContent = selectedOptions.slice(0, -2);
});