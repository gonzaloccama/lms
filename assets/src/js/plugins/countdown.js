(function($) {

  $.fn.tkCountdown = function () {
    this.countdown({
      date: moment().add((this.data('value') || 3), (this.data('unit') || 'hour')).format("MMMM D, YYYY HH:mm:ss"),
      render: function (date) {

        let $days, $hours, $min, $sec;
      
        if (date.days > 0) {
          $days = '<div class="card mr-1 mb-0">'+
            '<div class="p-1 px-2">'+
              '<span class="h4 m-0 text-primary">' + date.days + '</span>'+
              '<span class="text-muted">days</span>'+
            '</div>'+
          '</div>'+
          '<div class="mr-1">:</div>';
        }
        else {
          $days = '';
        }
        
        if (date.hours > 0) {
          $hours = '<div class="card mr-1 mb-0">'+
          '<div class="p-1 px-2">'+
            '<span class="h4 m-0 text-primary">' + this.leadingZeros(date.hours) + '</span>'+
            '<span class="text-muted">hrs</span>'+
          '</div>'+
        '</div>'+
        '<div class="mr-1">:</div>';
        }
        else {
          $hours = '';
        }

        if (date.min > 0) {
          $min = '<div class="card mr-1 mb-0">'+
          '<div class="p-1 px-2">'+
            '<span class="h4 m-0 text-primary">' + this.leadingZeros(date.min) + '</span>'+
            '<span class="text-muted">min</span>'+
          '</div>'+
        '</div>'+
        '<div class="mr-1">:</div>';
        }
        else {
          $min = '';
        }
        if (date.sec > 0) {
          $sec = '<div class="card mr-1 mb-0">'+
          '<div class="p-1 px-2">'+
            '<span class="h4 m-0 text-primary">' + this.leadingZeros(date.sec) + '</span>'+
            '<span class="text-muted">sec</span>'+
          '</div>'+
        '</div>';
        }
        else {
          $sec = '';
        }

        this.el.innerHTML = '<div class="d-flex align-items-center">' + $days + $hours + $min + $sec + '</div>';
      }
    });
  };

  $('.countdown').tkCountdown();

}(jQuery));