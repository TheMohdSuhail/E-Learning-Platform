  // Get the button and modal elements
  var signInButton = document.getElementById('signInButton');
  var modal = document.getElementById('myModal');
  var closeModal = document.getElementById('closeModal');

  // Show the modal when the button is clicked
  signInButton.onclick = function() {
    modal.style.display = 'block';
  };

  // Close the modal when the close button is clicked
  closeModal.onclick = function() {
    modal.style.display = 'none';
  };

  // Close the modal when clicking outside the modal content
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  };