// function toggleEditMode() {
//   const inputs = document.querySelectorAll("input");
//   inputs.forEach((input) => {
//     input.readOnly = !input.readOnly;
//   });

//   const editButton = document.getElementById("editButton");
//   const updateButton = document.getElementById("updateButton");

//   if (editButton.style.display === "none") {
//     editButton.style.display = "block";
//     updateButton.style.display = "none";
//   } else {
//     editButton.style.display = "none";
//     updateButton.style.display = "block";
//   }
// }


function toggleEditMode() {
    const inputs = document.querySelectorAll('input');
    const selects = document.querySelectorAll('select');
  
    inputs.forEach(input => input.readOnly = !input.readOnly);
    selects.forEach(select => select.disabled = !select.disabled);
  
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
  
  // Ensure all fields are enabled before form submission
  document.getElementById("profileForm").addEventListener("submit", function () {
      document.querySelectorAll("input, select, textarea").forEach(field => {
          field.readOnly = false;
          field.disabled = false;
      });
  });
  