(function($) {
  $.fn.countdown = function(options,callback){

    var settings= {'date':null};
    if (options) {
      $.extend(settings, options);

    }

    this_selector = $(this);

    function count_execution(){

      eventDate =Date.parse(settings['date'])/1000;
      currentDate = Math.floor($.now() /1000);


      if (eventDate <= currentDate) {

        callback.call(this);

        clearInterval(interval);
      }

      seconds = eventDate - currentDate;
      days = Math.floor(seconds/(60*60*24));
      seconds -= days*60*60*24;
      hours=Math.floor(seconds/(60*60));
      seconds -= hours * 60 *60;

      minutes= Math.floor(seconds/60);
      seconds-= minutes*60;



      //days = (String(days).length !== 2) ? '0'+ days :days;
      hours = (String(hours).length !== 2) ? '0'+ hours :hours;
      minutes = (String(minutes).length !== 2) ? '0'+ minutes :minutes;
      seconds = (String(seconds).length !== 2) ? '0'+ seconds :seconds;

      if (!isNaN(eventDate)) {


      this_selector.find('.days').text(days);
      this_selector.find('.hours').text(hours);
      this_selector.find('.minutes').text(minutes);
      this_selector.find('.seconds').text(seconds);    }
      }

    count_execution();
    interval =setInterval(count_execution,1000);

  }
})(jQuery);
