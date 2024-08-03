function openProfileModal() {
    var profileModal = document.getElementById('profileModal');
    profileModal.style.display = 'flex';
}

function logout() {
    // Trigger the form submission to execute the logout script
    document.getElementById('logoutForm').submit();
}