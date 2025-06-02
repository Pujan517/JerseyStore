// Hide header on scroll, show when scrolling up
(function() {
  var lastScroll = 0;
  var body = document.body;
  var header = document.querySelector('.navbar.fixed-top');
  if (!header) return;

  window.addEventListener('scroll', function() {
    var currentScroll = window.pageYOffset;
    if (currentScroll > lastScroll && currentScroll > 60) {
      // Scrolling down
      body.classList.add('hide-header');
    } else {
      // Scrolling up
      body.classList.remove('hide-header');
    }
    lastScroll = currentScroll;
  });
})();
