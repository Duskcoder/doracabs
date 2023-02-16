function getdate(e) {
  var t = new Date(e || Date.now()),
    a = "" + t.getDate();
  return a;
}
function getMonth(e) {
  var t = new Date(e || Date.now()),
    r = "" + (t.getMonth() + 1);

  return r;
}

function GetYears(e) {
  var t = new Date(e || Date.now()),
    i = t.getFullYear();
  return i;
}
function formattedDate(e) {
  var t = new Date(e || Date.now()),
    r = "" + (t.getMonth() + 1),
    a = "" + t.getDate(),
    i = t.getFullYear();
  return (
    r.length < 2 && (r = "0" + r),
    a.length < 2 && (a = "0" + a),
    [a, r, i].join("-")
  );
}

function formattedTime(e) {
  var t = Number(e.match(/^(\d+)/)[1]),
    r = Number(e.match(/:(\d+)/)[1]),
    a = e.match(/\s(.*)$/)[1];
  "PM" == a && t < 12 && (t += 12), "AM" == a && 12 == t && (t -= 12);
  var i = t.toString(),
    m = r.toString();
  return t < 10 && (i = "0" + i), r < 10 && (m = "0" + m), i + ":" + m;
}

function formatAMPM(date) {
  var hours = date.getHours() + 2;
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? "PM" : "AM";
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? "0" + minutes : minutes;
  var l = hours.length;
  if ((l = 1)) {
    hours = 0 + "" + hours;
  }
  var strTime = hours + ":" + minutes + " " + ampm;
  return strTime;
}
$(window).on("load", function () {
  var e = new Date(),
    t = e.getHours() + 2 + ":" + e.getMinutes();
  // alert(t);
  jQuery("#datetimepickernew").datetimepicker({
    minTime: t,
    maxTime: "23:45",
    format: "h:i A",
    step: 15,
  }),
    jQuery("#datetimepickernew1").datetimepicker({
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    }),
    jQuery("#datetimepickernew2").datetimepicker({
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    }),
    jQuery("#datetimepickernew3").datetimepicker({
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    }),
    jQuery("#datetimepickernew4").datetimepicker({
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    });
}),
  $("#datepicker").on("change", function () {
    var e = new Date();
    //  alert(e.toISOString().substring(11, 20));
    //  alert(e.toISOString().substring(0, 10));
    if (
      formattedDate(e.toISOString().substring(0, 10)) == $("#datepicker").val()
    ) {
      var t = e.getHours() + 2 + ":" + e.getMinutes();
      // if(t > )
      $("#datetimepickernew").val(formatAMPM(new Date()));
    } else {
      t = "00:00";
      $("#datetimepickernew").val("00:00 AM");
    }
    jQuery("#datetimepickernew").datetimepicker({
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    });
  }),
  $("#datepicker3").on("change", function () {
    var e = new Date();
    if (
      formattedDate(e.toISOString().substring(0, 10)) == $("#datepicker3").val()
    ) {
      $("#datetimepickernew1").val(formatAMPM(new Date()));
      var t = e.getHours() + 2 + ":" + e.getMinutes();
    } else {
      $("#datetimepickernew1").val("00:00 AM");
      t = "00:00";
    }
    jQuery("#datetimepickernew1").datetimepicker({
      datepicker: !1,
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    });
    var string = $("#datepicker3").val();
    var dd = string.split("-");
    var datdd = dd[0];
    var mm = dd[1];
    var yyy = dd[2];
    // alert(string);
    jQuery("#datepicker4").datetimepicker({
      i18n: {
        en: {
          months: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "Jun",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ],
          dayOfWeek: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
        },
      },
      timepicker: !1,
      value: $("#datepicker3").val(),
      format: "d-m-Y",
      closeOnDateSelect: !0,
      minDate: new Date(yyy, mm - 1, datdd),
      weeks: !1,
    });
  }),
  $("#datepicker5").on("change", function () {
    var e = new Date();
    if (
      formattedDate(e.toISOString().substring(0, 10)) == $("#datepicker5").val()
    ) {
      var t = e.getHours() + 2 + ":" + e.getMinutes();
      $("#datetimepickernew2").val(formatAMPM(new Date()));
    } else {
      t = "00:00";
      $("#datetimepickernew2").val("00:00 AM");
    }
    jQuery("#datetimepickernew2").datetimepicker({
      datepicker: !1,
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    });
  }),
  $("#datepicker1").on("change", function () {
    var e = new Date();
    if (
      formattedDate(e.toISOString().substring(0, 10)) == $("#datepicker1").val()
    ) {
      $("#datetimepickernew3").val(formatAMPM(new Date()));
      var t = e.getHours() + 2 + ":" + e.getMinutes();
    } else {
      $("#datetimepickernew3").val("00:00 AM");
      t = "00:00";
    }
    jQuery("#datetimepickernew3").datetimepicker({
      datepicker: !1,
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    });
  }),
  $("#datepicker2").on("change", function () {
    var e = new Date();
    if (
      formattedDate(e.toISOString().substring(0, 10)) == $("#datepicker2").val()
    ) {
      $("#datetimepickernew4").val(formatAMPM(new Date()));
      var t = e.getHours() + 2 + ":" + e.getMinutes();
    } else {
      $("#datetimepickernew4").val("00:00 AM");
      t = "00:00";
    }
    jQuery("#datetimepickernew4").datetimepicker({
      datepicker: !1,
      minTime: t,
      maxTime: "23:45",
      format: "h:i A",
      step: 15,
    });
  }),
  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".timeON").datetimepicker({
      formatTime: "h:i A",
      datepicker: !1,
      format: "h:i A",
      step: 15,
      onClose: function (e) {
        var a = $("#datepicker").val(),
          i = formattedTime($("#datetimepickernew").val());
        return a == t && r > i
          ? ($("#DatTimeError").show(),
            $("#errorMsgs").modal("show"),
            $("#errorhtml").html(
              "PickupTime should be greater 2 hours from currentTime!"
            ),
            !1)
          : ($("#errorMsgs").modal("hide"), !0);
      },
      validateOnBlur: !1,
    });
  }),
  // $(function() {
  //     var e = new Date,
  //         t = formattedDate(e.toISOString().substring(0, 10)),
  //         r = e.getHours() + 2 + ":" + e.getMinutes();
  //     $(".datetimepickerON").datetimepicker({
  //         formatDate: "d-m-Y",
  //         timepicker: !1,
  //         format: "d-m-Y",
  //         onClose: function(e) {
  //             var a = $("#datepicker").val(),

  //                 i = formattedTime($("#datetimepickernew").val());
  //             return a == t && r > i ? ($("#DatTimeError").show(), $("#errorMsgs").modal("show"), $("#errorhtml").html("PickupTime should be greater 2 hours from currentTime!"), !1) : ($("#errorMsgs").modal("hide"), !0)
  //         }
  //     })
  // }),

  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".timeOU").datetimepicker({
      formatTime: "h:i A",
      datepicker: !1,
      format: "h:i A",
      step: 15,
      onClose: function (e) {
        var a = $("#datepicker3").val(),
          i = formattedTime($("#datetimepickernew1").val());
        return a == t && r > i
          ? ($("#DatTimeError").show(),
            $("#errorMsgs").modal("show"),
            $("#errorhtml").html(
              "PickupTime should be greater 2 hours from currentTime!"
            ),
            !1)
          : ($("#errorMsgs").modal("hide"), !0);
      },
      validateOnBlur: !1,
    });
  }),
  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".dateOU").datetimepicker({
      formatDate: "d-m-Y",
      timepicker: !1,
      format: "d-m-Y",
      onClose: function (e) {
        var a = $("#datepicker3").val(),
          i = formattedTime($("#datetimepickernew1").val());
        return a == t && r > i
          ? ($("#DatTimeError").show(),
            $("#errorMsgs").modal("show"),
            $("#errorhtml").html(
              "PickupTime should be greater 2 hours from currentTime!"
            ),
            !1)
          : ($("#errorMsgs").modal("hide"), !0);
      },
    });
  }),
  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".timeMC").datetimepicker({
      formatTime: "h:i A",
      datepicker: !1,
      format: "h:i A",
      step: 15,
      onClose: function (e) {
        var a = $("#datepicker5").val(),
          i = formattedTime($("#datetimepickernew2").val());
        if (a == t)
          return r > i
            ? ($("#DatTimeError").show(),
              $("#errorMsgs").modal("show"),
              $("#errorhtml").html(
                "PickupTime should be greater 2 hours from currentTime!"
              ),
              !1)
            : ($("#errorMsgs").modal("hide"), !0);
      },
      validateOnBlur: !1,
    });
  }),
  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".dateMC").datetimepicker({
      formatDate: "d-m-Y",
      timepicker: !1,
      format: "d-m-Y",
      onClose: function (e) {
        var a = $("#datepicker5").val(),
          i = formattedTime($("#datetimepickernew2").val());
        return a == t && r > i
          ? ($("#DatTimeError").show(),
            $("#errorMsgs").modal("show"),
            $("#errorhtml").html(
              "PickupTime should be greater 2 hours from currentTime!"
            ),
            !1)
          : ($("#errorMsgs").modal("hide"), !0);
      },
    });
  }),
  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".timeLL").datetimepicker({
      formatTime: "h:i A",
      datepicker: !1,
      format: "h:i A",
      step: 15,
      onClose: function (e) {
        var a = $("#datepicker1").val(),
          i = formattedTime($("#datetimepickernew3").val());
        if (a == t)
          return r > i
            ? ($("#DatTimeError").show(),
              $("#errorMsgs").modal("show"),
              $("#errorhtml").html(
                "PickupTime should be greater 2 hours from currentTime!"
              ),
              !1)
            : ($("#errorMsgs").modal("hide"), !0);
      },
      validateOnBlur: !1,
    });
  }),
  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".dateLL").datetimepicker({
      formatDate: "d-m-Y",
      timepicker: !1,
      format: "d-m-Y",
      onClose: function (e) {
        var a = $("#datepicker1").val(),
          i = formattedTime($("#datetimepickernew3").val());
        return a == t && r > i
          ? ($("#DatTimeError").show(),
            $("#errorMsgs").modal("show"),
            $("#errorhtml").html(
              "PickupTime should be greater 2 hours from currentTime!"
            ),
            !1)
          : ($("#errorMsgs").modal("hide"), !0);
      },
    });
  }),
  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".timeTF").datetimepicker({
      formatTime: "h:i A",
      datepicker: !1,
      format: "h:i A",
      step: 15,
      onClose: function (e) {
        var a = $("#datepicker2").val(),
          i = formattedTime($("#datetimepickernew4").val());
        if (a == t)
          return r > i
            ? ($("#DatTimeError").show(),
              $("#errorMsgs").modal("show"),
              $("#errorhtml").html(
                "PickupTime should be greater 2 hours from currentTime!"
              ),
              !1)
            : ($("#errorMsgs").modal("hide"), !0);
      },
      validateOnBlur: !1,
    });
  }),
  $(function () {
    var e = new Date(),
      t = formattedDate(e.toISOString().substring(0, 10)),
      r = e.getHours() + 2 + ":" + e.getMinutes();
    $(".dateTF").datetimepicker({
      formatDate: "d-m-Y",
      timepicker: !1,
      format: "d-m-Y",
      onClose: function (e) {
        var a = $("#datepicker2").val(),
          i = formattedTime($("#datetimepickernew4").val());
        return a == t && r > i
          ? ($("#DatTimeError").show(),
            $("#errorMsgs").modal("show"),
            $("#errorhtml").html(
              "PickupTime should be greater 2 hours from currentTime!"
            ),
            !1)
          : ($("#errorMsgs").modal("hide"), !0);
      },
    });
  }),
  jQuery("#datepicker").datetimepicker({
    i18n: {
      en: {
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "Jun",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        dayOfWeek: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
      },
    },
    timepicker: !1,
    // value: "today",
    format: "d-m-Y",
    closeOnDateSelect: !0,
    minDate: 0,
    weeks: !1,
  }),
  jQuery("#datepicker1").datetimepicker({
    i18n: {
      en: {
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "Jun",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        dayOfWeek: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
      },
    },
    timepicker: !1,
    //value: "today",
    format: "d-m-Y",
    closeOnDateSelect: !0,
    minDate: 0,
    weeks: !1,
  }),
  jQuery("#datepicker2").datetimepicker({
    i18n: {
      en: {
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "Jun",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        dayOfWeek: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
      },
    },
    timepicker: !1,
    // value: "today",
    format: "d-m-Y",
    closeOnDateSelect: !0,
    minDate: 0,
    weeks: !1,
  }),
  jQuery("#datepicker3").datetimepicker({
    i18n: {
      en: {
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "Jun",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        dayOfWeek: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
      },
    },
    timepicker: !1,
    //value: "today",
    format: "d-m-Y",
    closeOnDateSelect: !0,
    minDate: 0,
    weeks: !1,
  }),
  jQuery("#datepicker4").datetimepicker({
    i18n: {
      en: {
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "Jun",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        dayOfWeek: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
      },
    },
    timepicker: !1,
    // value: "today",
    format: "d-m-Y",
    closeOnDateSelect: !0,
    minDate: 0,
    weeks: !1,
  }),
  jQuery("#datepicker5").datetimepicker({
    i18n: {
      en: {
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "Jun",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        dayOfWeek: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
      },
    },
    timepicker: !1,
    value: "today",
    format: "d-m-Y",
    closeOnDateSelect: !0,
    minDate: 0,
    weeks: !1,
  }),
  jQuery("#datepicker6").datetimepicker({
    i18n: {
      en: {
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "Jun",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        dayOfWeek: ["Sun", "Mon", "Tues", "Wed", "Thus", "Fri", "Sat"],
      },
    },
    timepicker: !1,
    value: "today",
    format: "d-m-Y",
    closeOnDateSelect: !0,
    minDate: 0,
    weeks: !1,
  });
