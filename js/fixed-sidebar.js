


var fixedSideBar = document.querySelector('.fixed-sidebar.is-sticky');

if (fixedSideBar) {
    window.addEventListener('scroll', function () {
        var threshold = 540; // Adjust the threshold value as needed
    
        if (window.scrollY >= threshold) {
            fixedSideBar.style.display = 'block';
            fixedSideBar.style.position = 'fixed';
        } else {
            fixedSideBar.style.display = 'none';
        }
    });
}
