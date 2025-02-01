// scripts.js
// function toggleEditMode() {
//     const inputs = document.querySelectorAll('input');
//     inputs.forEach(input => {
//         input.readOnly = !input.readOnly; 
        
//     });

//     const editButton = document.getElementById('editButton');
//     const updateButton = document.getElementById('updateButton');

//     if (editButton.style.display === 'none') {
//         editButton.style.display = 'block';
//         updateButton.style.display = 'none';
//     } else {
//         editButton.style.display = 'none';
//         updateButton.style.display = 'block';
//     }
// }


function toggleEditMode() {
    const inputs = document.querySelectorAll('input');
    const selects = document.querySelectorAll('select'); // Get all select elements

    inputs.forEach(input => {
        input.readOnly = !input.readOnly;  
    });

    selects.forEach(select => {
        select.disabled = !select.disabled; // Toggle the disabled property
    });

    const editButton = document.getElementById('editButton');
    const updateButton = document.getElementById('updateButton');

    if (editButton.style.display === 'none') {
        editButton.style.display = 'block';
        updateButton.style.display = 'none';
    } else {
        editButton.style.display = 'none';
        updateButton.style.display = 'block';
    }
}
