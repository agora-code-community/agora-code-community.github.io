// ========================== //
// 2017 Countdown JS
// ========================== //

const countdown = new Date("January 26, 2018");

function getRemainingTime(endtime) {
  const milliseconds = Date.parse(endtime) - Date.parse(new Date());
  const seconds = Math.floor((milliseconds / 1000) % 60);
  const minutes = Math.floor((milliseconds / 1000 / 60) % 60);
  const hours = Math.floor((milliseconds / (1000 * 60 * 60)) % 24);
  const days = Math.floor(milliseconds / (1000 * 60 * 60 * 24));

  return {
    total: milliseconds,
    seconds: seconds,
    minutes: minutes,
    hours: hours,
    days: days
  };
}

function initClock(id, endtime) {
  const counter = document.getElementById(id);
  const daysItem = counter.querySelector(".days");
  const hoursItem = counter.querySelector(".hours");
  const minutesItem = counter.querySelector(".minutes");
  const secondsItem = counter.querySelector(".seconds");

  function updateClock() {
    const time = getRemainingTime(endtime);

    daysItem.innerHTML = time.days;
    hoursItem.innerHTML = ("0" + time.hours).slice(-2);
    minutesItem.innerHTML = ("0" + time.minutes).slice(-2);
    secondsItem.innerHTML = ("0" + time.seconds).slice(-2);

    if (time.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  const timeinterval = setInterval(updateClock, 1000);
}

initClock("clockdiv", countdown);

// ========================== //
// 2013 Countdown JS
// ========================== //

// function counter() {
//   var today = new Date(); //variable contains current date and time

//   var days = calcDays(today); //calculate the time left until set date below
//   document.countDown.daysLeft.value = Math.floor(days); // displays days rounded to the next lowest integer

//   var hours = (days - Math.floor(days)) * 24; //calculate the hours left in the current day
//   document.countDown.hrLeft.value = Math.floor(hours); // display hours rounded to the next lowest integer

//   var minutes = (hours - Math.floor(hours)) * 60; // calculate the minutes left in the current hour
//   document.countDown.minLeft.value = Math.floor(minutes); // display minutes rounded to the next lowest integer

//   var seconds = (minutes - Math.floor(minutes)) * 60; //calculate the seconds left in the current minute
//   document.countDown.secLeft.value = Math.floor(seconds); // display seconds rounded to the next lowest integer
// }

// function calcDays(currentDate) {
//   //create a date object for date of graduation
//   //calculate the difference between currentDate and set date
//   setDate = new Date("May 6, 2013");
//   currentTime = currentDate.getFullYear() + 1;
//   setDate.setFullYear(currentTime);

//   days = (setDate - currentDate) / (1000 * 60 * 60 * 24);
//   return days;
// }

// setInterval('counter()', 1000)
