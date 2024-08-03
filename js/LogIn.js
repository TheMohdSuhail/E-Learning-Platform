        // Get the login button and modal elements
        var loginButton = document.getElementById('loginButton');
        var loginModal = document.getElementById('loginModal');
        var closeLoginModal = document.getElementById('closeLoginModal');

        // Show the login modal when the button is clicked
        loginButton.onclick = function () {
            loginModal.style.display = 'block';
        };

        // Close the login modal when the close button is clicked
        closeLoginModal.onclick = function () {
            loginModal.style.display = 'none';
        };

        // Close the login modal when clicking outside the modal content
        window.onclick = function (event) {
            if (event.target == loginModal) {
                loginModal.style.display = 'none';
            }
        };