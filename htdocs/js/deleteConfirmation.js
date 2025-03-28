        // // Get modal and buttons
        // const modal = document.getElementById('modal');
        // const showModalBtn = document.getElementById('iconTrash');
        // const cancelBtn = document.getElementById('cancelBtn');
        // const deleteBtn = document.getElementById('deleteBtn');

        // // Show modal function
        // function showModal() {
        //     modal.style.display = 'block';
        // }

        // // Hide modal function
        // function hideModal() {
        //     modal.style.display = 'none';
        // }

        // // Attach click event listeners
        // showModalBtn.addEventListener('click', showModal);
        // cancelBtn.addEventListener('click', hideModal);
        // deleteBtn.addEventListener('click', hideModal);


// This is looping on all the .fa-trash 
const trashIcons = document.querySelectorAll('.fa-trash');
const modals = document.querySelectorAll('.modal-container');

// Attach click event listeners to all trash icons
trashIcons.forEach((icon, index) => {
    icon.addEventListener('click', () => {
        modals[index].style.display = 'block'; // Show corresponding modal
    });
});

// Attach event listeners to cancel buttons and delete buttons for each modal
modals.forEach((modal) => {
    const cancelBtn = modal.querySelector('.cancel-button');
    const deleteBtn = modal.querySelector('.delete-button');
    
    cancelBtn.addEventListener('click', () => {
        modal.style.display = 'none'; // Hide modal on cancel
    });

    deleteBtn.addEventListener('click', () => {
        modal.style.display = 'none'; // Hide modal on delete
    });
});