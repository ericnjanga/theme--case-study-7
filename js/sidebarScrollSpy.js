/**
 * ABOUT THIS SCRIPT
 * ---------------------------
 * Activate nav items when target element appears inside the viewport
 * (This script was created because bootstrap scrolspy wan't working)
 */





/**
 * 
 * @param {*} element 
 * @param {*} windowH 
 * @param {*} thresholdPercentage From 0.0 to 1.0
 * @returns 
 */
function isAboveTheThreshold(elementDimension, windowH, thresholdPercentage) {
    const distanceFromBottom = windowH - elementDimension.bottom;

    // Calculate the 30% threshold from the bottom
    const threshold = windowH * thresholdPercentage;

    return distanceFromBottom >= threshold;
}


// Function to check if an element is in the viewport, and is above the threshold
function isInViewport(elem) {
    const rect = elem.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (windowHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) &&
        isAboveTheThreshold(rect, windowHeight, 0.3)
    );
}


/**
 * Toggles the .active class on anchor (<a>) elements when the element with the 
 * id referenced by the anchor’s href is scrolled into view.
 * @param {*} DomEltList 
 */
function handleScroll(DomEltList) {
    DomEltList.forEach(item => {
        const targetId = item.getAttribute('href').substring(1); // Get the ID without '#'
        const targetElement = document.getElementById(targetId);

        if (targetElement && isInViewport(targetElement)) {
            // Remove .active class from all items
            DomEltList.forEach(link => link.classList.remove('active'));
            // Add .active class to the corresponding item
            item.classList.add('active');
        }
    });
}


document.addEventListener("DOMContentLoaded", function () {
    // Get all anchor elements inside the list-example
    const listItems = document.querySelectorAll('#nav-expertise a');

    // ...
    handleScroll(listItems);

    // Attach scroll event listener to the window
    window.addEventListener('scroll', function () {
        handleScroll(listItems);
    });
});

