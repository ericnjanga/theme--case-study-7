/**
 * Google Analytics Events
 * ------------------------
 */



function trackButtonClick(DomElementType, eventDeltail) {
    gtag('event', 'click', {
        'event_category': DomElementType + ' clicked',
        'event_label': eventDeltail,
        'value': 1
    });
}
