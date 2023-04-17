const articlesElement = document.getElementById('articles');
const selectedArticlesElement = document.getElementById('selected_articles');

articlesElement.addEventListener('click', function() {
    let selectedOptions = '';
    for (let i = 0; i < articlesElement.selectedOptions.length; i++) {
    selectedOptions += articlesElement.selectedOptions[i].textContent + ', ';
    }
    selectedArticlesElement.textContent = selectedOptions.slice(0, -2);
});