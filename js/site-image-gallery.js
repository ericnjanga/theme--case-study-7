




var lightbox = new PhotoSwipeLightbox({
    gallery: '.js-photo-gallery',
    children: 'a',
    // dynamic import is not supported in UMD version
    pswpModule: PhotoSwipe 
  });
  lightbox.init();