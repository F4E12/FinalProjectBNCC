document.addEventListener('DOMContentLoaded', function() {
    const errorPopup = document.getElementById('error-sec');
    errorPopup.style.opacity = '1';
    setTimeout(function() {
        errorPopup.style.opacity = '0';
        setTimeout(function() {
            errorPopup.style.display = 'none';
        }, 500);
    }, 3000);
});
