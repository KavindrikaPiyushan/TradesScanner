document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.category-btn');

  

    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
           
            this.classList.toggle('active');

           
            const activeCategories = Array.from(categoryButtons)
                .filter(btn => btn.classList.contains('active'))
                .map(btn => btn.getAttribute('data-category'));
            
            console.log('Active Categories:', activeCategories);
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const languageSelect = document.getElementById('language-select');
    
    // Create custom dropdown with images
    function createCustomDropdown() {
        // Create a container for the custom dropdown
        const customDropdown = document.createElement('div');
        customDropdown.className = 'language-dropdown';
        
        // Create selected option display
        const selectedOption = document.createElement('div');
        selectedOption.className = 'selected-option';
        
        // Create options list
        const optionsList = document.createElement('ul');
        optionsList.className = 'options-list';
        
        // Populate options
        Array.from(languageSelect.options).forEach((option, index) => {
            const listItem = document.createElement('li');
            listItem.setAttribute('data-value', option.value);
            
            // Create image element
            const img = document.createElement('img');
            img.src = option.getAttribute('data-image');
            img.alt = option.value;
            img.className = 'language-flag';
            
            // Create text element
            const text = document.createElement('span');
            text.textContent = option.text;
            
            // Append image and text to list item
            listItem.appendChild(img);
            listItem.appendChild(text);
            
            // Add click event
            listItem.addEventListener('click', function() {
                languageSelect.selectedIndex = index;
                customDropdown.classList.remove('active');
                updateSelectedOption();
            });
            
            optionsList.appendChild(listItem);
        });
        
        // Initial selected option
        function updateSelectedOption() {
            const selectedOptionIndex = languageSelect.selectedIndex;
            const selectedOptionEl = languageSelect.options[selectedOptionIndex];
            
            selectedOption.innerHTML = '';
            
            const img = document.createElement('img');
            img.src = selectedOptionEl.getAttribute('data-image');
            img.alt = selectedOptionEl.value;
            img.className = 'language-flag';
            
            const text = document.createElement('span');
            text.textContent = selectedOptionEl.text;
            
            selectedOption.appendChild(img);
            selectedOption.appendChild(text);
        }
        
        // Toggle dropdown
        selectedOption.addEventListener('click', function() {
            customDropdown.classList.toggle('active');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!customDropdown.contains(e.target)) {
                customDropdown.classList.remove('active');
            }
        });
        
        // Add elements to custom dropdown
        customDropdown.appendChild(selectedOption);
        customDropdown.appendChild(optionsList);
        
        // Replace original select
        languageSelect.parentNode.insertBefore(customDropdown, languageSelect);
        languageSelect.style.display = 'none';
        
        // Initial setup
        updateSelectedOption();
    }
    
    createCustomDropdown();
});