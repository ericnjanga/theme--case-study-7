




var lightbox = new PhotoSwipeLightbox({
    gallery: '.test-gallery',
    children: 'a',
    // dynamic import is not supported in UMD version
    pswpModule: PhotoSwipe 
  });
  lightbox.init();