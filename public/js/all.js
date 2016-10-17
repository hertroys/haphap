var app = {};

app.home = {
  init: function () {
    new Swiper('.swiper-container', {
      preventClicks: false
    });
    $('.tags > input[type="checkbox"]').change(function () {
      $('form.tags').submit();
    });
  }
};

//# sourceMappingURL=all.js.map
