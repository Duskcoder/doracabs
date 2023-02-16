var DateFormatter;
!(function () {
  "use strict";
  var e, t, n, o, a;
  (e = function (e, t) {
    return (
      "string" == typeof e &&
      "string" == typeof t &&
      e.toLowerCase() === t.toLowerCase()
    );
  }),
    (t = function (e, n, o) {
      var a = o || "0",
        r = e.toString();
      return r.length < n ? t(a + r, n) : r;
    }),
    (n = function (e) {
      var t, o;
      for (e = e || {}, t = 1; t < arguments.length; t++)
        if ((o = arguments[t]))
          for (var a in o)
            o.hasOwnProperty(a) &&
              ("object" == typeof o[a] ? n(e[a], o[a]) : (e[a] = o[a]));
      return e;
    }),
    (o = function (e, t) {
      for (var n = 0; n < t.length; n++)
        if (t[n].toLowerCase() === e.toLowerCase()) return n;
      return -1;
    }),
    (a = {
      dateSettings: {
        days: [
          "Sunday",
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ],
        daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        monthsShort: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        meridiem: ["AM", "PM"],
        ordinal: function (e) {
          var t = e % 10,
            n = { 1: "st", 2: "nd", 3: "rd" };
          return 1 !== Math.floor((e % 100) / 10) && n[t] ? n[t] : "th";
        },
      },
      separators: /[ \-+\/\.T:@]/g,
      validParts: /[dDjlNSwzWFmMntLoYyaABgGhHisueTIOPZcrU]/g,
      intParts: /[djwNzmnyYhHgGis]/g,
      tzParts:
        /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
      tzClip: /[^-+\dA-Z]/g,
    }),
    ((DateFormatter = function (e) {
      var t = this,
        o = n(a, e);
      (t.dateSettings = o.dateSettings),
        (t.separators = o.separators),
        (t.validParts = o.validParts),
        (t.intParts = o.intParts),
        (t.tzParts = o.tzParts),
        (t.tzClip = o.tzClip);
    }).prototype = {
      constructor: DateFormatter,
      getMonth: function (e) {
        var t;
        return (
          0 === (t = o(e, this.dateSettings.monthsShort) + 1) &&
            (t = o(e, this.dateSettings.months) + 1),
          t
        );
      },
      parseDate: function (t, n) {
        var o,
          a,
          r,
          i,
          s,
          l,
          d,
          u,
          c,
          f,
          h = this,
          m = !1,
          g = !1,
          p = h.dateSettings,
          D = {
            date: null,
            year: null,
            month: null,
            day: null,
            hour: 0,
            min: 0,
            sec: 0,
          };
        if (!t) return null;
        if (t instanceof Date) return t;
        if ("U" === n) return (r = parseInt(t)) ? new Date(1e3 * r) : t;
        switch (typeof t) {
          case "number":
            return new Date(t);
          case "string":
            break;
          default:
            return null;
        }
        if (!(o = n.match(h.validParts)) || 0 === o.length)
          throw new Error("Invalid date format definition.");
        for (
          a = t.replace(h.separators, "\0").split("\0"), r = 0;
          r < a.length;
          r++
        )
          switch (((i = a[r]), (s = parseInt(i)), o[r])) {
            case "y":
            case "Y":
              if (!s) return null;
              (c = i.length),
                (D.year = 2 === c ? parseInt((70 > s ? "20" : "19") + i) : s),
                (m = !0);
              break;
            case "m":
            case "n":
            case "M":
            case "F":
              if (isNaN(s)) {
                if (!((l = h.getMonth(i)) > 0)) return null;
                D.month = l;
              } else {
                if (!(s >= 1 && 12 >= s)) return null;
                D.month = s;
              }
              m = !0;
              break;
            case "d":
            case "j":
              if (!(s >= 1 && 31 >= s)) return null;
              (D.day = s), (m = !0);
              break;
            case "g":
            case "h":
              if (
                ((f =
                  a[
                    (d =
                      o.indexOf("a") > -1
                        ? o.indexOf("a")
                        : o.indexOf("A") > -1
                        ? o.indexOf("A")
                        : -1)
                  ]),
                d > -1)
              )
                (u = e(f, p.meridiem[0]) ? 0 : e(f, p.meridiem[1]) ? 12 : -1),
                  s >= 1 && 12 >= s && u > -1
                    ? (D.hour = s + u - 1)
                    : s >= 0 && 23 >= s && (D.hour = s);
              else {
                if (!(s >= 0 && 23 >= s)) return null;
                D.hour = s;
              }
              g = !0;
              break;
            case "G":
            case "H":
              if (!(s >= 0 && 23 >= s)) return null;
              (D.hour = s), (g = !0);
              break;
            case "i":
              if (!(s >= 0 && 59 >= s)) return null;
              (D.min = s), (g = !0);
              break;
            case "s":
              if (!(s >= 0 && 59 >= s)) return null;
              (D.sec = s), (g = !0);
          }
        if (!0 === m && D.year && D.month && D.day)
          D.date = new Date(
            D.year,
            D.month - 1,
            D.day,
            D.hour,
            D.min,
            D.sec,
            0
          );
        else {
          if (!0 !== g) return null;
          D.date = new Date(0, 0, 0, D.hour, D.min, D.sec, 0);
        }
        return D.date;
      },
      guessDate: function (e, t) {
        if ("string" != typeof e) return e;
        var n,
          o,
          a,
          r,
          i,
          s,
          l = e.replace(this.separators, "\0").split("\0"),
          d = t.match(this.validParts),
          u = new Date(),
          c = 0;
        if (!/^[djmn]/g.test(d[0])) return e;
        for (a = 0; a < l.length; a++) {
          if (((c = 2), (i = l[a]), (s = parseInt(i.substr(0, 2))), isNaN(s)))
            return null;
          switch (a) {
            case 0:
              "m" === d[0] || "n" === d[0] ? u.setMonth(s - 1) : u.setDate(s);
              break;
            case 1:
              "m" === d[0] || "n" === d[0] ? u.setDate(s) : u.setMonth(s - 1);
              break;
            case 2:
              if (
                ((o = u.getFullYear()),
                (c = 4 > (n = i.length) ? n : 4),
                !(o = parseInt(
                  4 > n ? o.toString().substr(0, 4 - n) + i : i.substr(0, 4)
                )))
              )
                return null;
              u.setFullYear(o);
              break;
            case 3:
              u.setHours(s);
              break;
            case 4:
              u.setMinutes(s);
              break;
            case 5:
              u.setSeconds(s);
          }
          (r = i.substr(c)).length > 0 && l.splice(a + 1, 0, r);
        }
        return u;
      },
      parseFormat: function (e, n) {
        var o,
          a = this,
          r = a.dateSettings,
          i = /\\?(.?)/gi,
          s = function (e, t) {
            return o[e] ? o[e]() : t;
          };
        return (
          (o = {
            d: function () {
              return t(o.j(), 2);
            },
            D: function () {
              return r.daysShort[o.w()];
            },
            j: function () {
              return n.getDate();
            },
            l: function () {
              return r.days[o.w()];
            },
            N: function () {
              return o.w() || 7;
            },
            w: function () {
              return n.getDay();
            },
            z: function () {
              var e = new Date(o.Y(), o.n() - 1, o.j()),
                t = new Date(o.Y(), 0, 1);
              return Math.round((e - t) / 864e5);
            },
            W: function () {
              var e = new Date(o.Y(), o.n() - 1, o.j() - o.N() + 3),
                n = new Date(e.getFullYear(), 0, 4);
              return t(1 + Math.round((e - n) / 864e5 / 7), 2);
            },
            F: function () {
              return r.months[n.getMonth()];
            },
            m: function () {
              return t(o.n(), 2);
            },
            M: function () {
              return r.monthsShort[n.getMonth()];
            },
            n: function () {
              return n.getMonth() + 1;
            },
            t: function () {
              return new Date(o.Y(), o.n(), 0).getDate();
            },
            L: function () {
              var e = o.Y();
              return (e % 4 == 0 && e % 100 != 0) || e % 400 == 0 ? 1 : 0;
            },
            o: function () {
              var e = o.n(),
                t = o.W();
              return (
                o.Y() + (12 === e && 9 > t ? 1 : 1 === e && t > 9 ? -1 : 0)
              );
            },
            Y: function () {
              return n.getFullYear();
            },
            y: function () {
              return o.Y().toString().slice(-2);
            },
            a: function () {
              return o.A().toLowerCase();
            },
            A: function () {
              var e = o.G() < 12 ? 0 : 1;
              return r.meridiem[e];
            },
            B: function () {
              var e = 3600 * n.getUTCHours(),
                o = 60 * n.getUTCMinutes(),
                a = n.getUTCSeconds();
              return t(Math.floor((e + o + a + 3600) / 86.4) % 1e3, 3);
            },
            g: function () {
              return o.G() % 12 || 12;
            },
            G: function () {
              return n.getHours();
            },
            h: function () {
              return t(o.g(), 2);
            },
            H: function () {
              return t(o.G(), 2);
            },
            i: function () {
              return t(n.getMinutes(), 2);
            },
            s: function () {
              return t(n.getSeconds(), 2);
            },
            u: function () {
              return t(1e3 * n.getMilliseconds(), 6);
            },
            e: function () {
              return (
                /\((.*)\)/.exec(String(n))[1] || "Coordinated Universal Time"
              );
            },
            I: function () {
              return new Date(o.Y(), 0) - Date.UTC(o.Y(), 0) !=
                new Date(o.Y(), 6) - Date.UTC(o.Y(), 6)
                ? 1
                : 0;
            },
            O: function () {
              var e = n.getTimezoneOffset(),
                o = Math.abs(e);
              return (
                (e > 0 ? "-" : "+") + t(100 * Math.floor(o / 60) + (o % 60), 4)
              );
            },
            P: function () {
              var e = o.O();
              return e.substr(0, 3) + ":" + e.substr(3, 2);
            },
            T: function () {
              return (
                (String(n).match(a.tzParts) || [""])
                  .pop()
                  .replace(a.tzClip, "") || "UTC"
              );
            },
            Z: function () {
              return 60 * -n.getTimezoneOffset();
            },
            c: function () {
              return "Y-m-d\\TH:i:sP".replace(i, s);
            },
            r: function () {
              return "D, d M Y H:i:s O".replace(i, s);
            },
            U: function () {
              return n.getTime() / 1e3 || 0;
            },
          }),
          s(e, e)
        );
      },
      formatDate: function (e, t) {
        var n,
          o,
          a,
          r,
          i,
          s = this,
          l = "";
        if ("string" == typeof e && !(e = s.parseDate(e, t))) return null;
        if (e instanceof Date) {
          for (a = t.length, n = 0; a > n; n++)
            "S" !== (i = t.charAt(n)) &&
              "\\" !== i &&
              (n > 0 && "\\" === t.charAt(n - 1)
                ? (l += i)
                : ((r = s.parseFormat(i, e)),
                  n !== a - 1 &&
                    s.intParts.test(i) &&
                    "S" === t.charAt(n + 1) &&
                    ((o = parseInt(r) || 0), (r += s.dateSettings.ordinal(o))),
                  (l += r)));
          return l;
        }
        return "";
      },
    });
})();
var datetimepickerFactory = function (e) {
  "use strict";
  var t = {
      i18n: {
        en: {
          months: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ],
          dayOfWeekShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
          dayOfWeek: [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
          ],
        },
      },
      ownerDocument: document,
      contentWindow: window,
      value: "",
      rtl: !1,
      format: "Y/m/d H:i",
      formatTime: "H:i",
      formatDate: "Y/m/d",
      startDate: !1,
      step: 60,
      monthChangeSpinner: !0,
      closeOnDateSelect: !1,
      closeOnTimeSelect: !0,
      closeOnWithoutClick: !0,
      closeOnInputClick: !0,
      openOnFocus: !0,
      timepicker: !0,
      datepicker: !0,
      weeks: !1,
      defaultTime: !1,
      defaultDate: !1,
      minDate: !1,
      maxDate: !1,
      minTime: !1,
      maxTime: !1,
      minDateTime: !1,
      maxDateTime: !1,
      allowTimes: [],
      opened: !1,
      initTime: !0,
      inline: !1,
      theme: "",
      touchMovedThreshold: 5,
      onSelectDate: function () {},
      onSelectTime: function () {},
      onChangeMonth: function () {},
      onGetWeekOfYear: function () {},
      onChangeYear: function () {},
      onChangeDateTime: function () {},
      onShow: function () {},
      onClose: function () {},
      onGenerate: function () {},
      withoutCopyright: !0,
      inverseButton: !1,
      hours12: !1,
      next: "xdsoft_next",
      prev: "xdsoft_prev",
      dayOfWeekStart: 0,
      parentID: "body",
      timeHeightInTimePicker: 25,
      timepickerScrollbar: !0,
      todayButton: !0,
      prevButton: !0,
      nextButton: !0,
      defaultSelect: !0,
      scrollMonth: !0,
      scrollTime: !0,
      scrollInput: !0,
      lazyInit: !1,
      mask: !1,
      validateOnBlur: !0,
      allowBlank: !0,
      yearStart: 1950,
      yearEnd: 2050,
      monthStart: 0,
      monthEnd: 11,
      style: "",
      id: "",
      fixed: !1,
      roundTime: "round",
      className: "",
      weekends: [],
      highlightedDates: [],
      highlightedPeriods: [],
      allowDates: [],
      allowDateRe: null,
      disabledDates: [],
      disabledWeekDays: [],
      yearOffset: 0,
      beforeShowDay: null,
      enterLikeTab: !0,
      showApplyButton: !1,
      insideParent: !1,
    },
    n = null,
    o = null,
    a = "en",
    r = { meridiem: ["AM", "PM"] },
    i = function () {
      var i = t.i18n[a],
        s = {
          days: i.dayOfWeek,
          daysShort: i.dayOfWeekShort,
          months: i.months,
          monthsShort: e.map(i.months, function (e) {
            return e.substring(0, 3);
          }),
        };
      "function" == typeof DateFormatter &&
        (n = o = new DateFormatter({ dateSettings: e.extend({}, r, s) }));
    },
    s = {
      moment: {
        default_options: {
          format: "YYYY/MM/DD HH:mm",
          formatDate: "YYYY/MM/DD",
          formatTime: "HH:mm",
        },
        formatter: {
          parseDate: function (e, t) {
            if (d(t)) return o.parseDate(e, t);
            var n = moment(e, t);
            return !!n.isValid() && n.toDate();
          },
          formatDate: function (e, t) {
            return d(t) ? o.formatDate(e, t) : moment(e).format(t);
          },
          formatMask: function (e) {
            return e
              .replace(/Y{4}/g, "9999")
              .replace(/Y{2}/g, "99")
              .replace(/M{2}/g, "19")
              .replace(/D{2}/g, "39")
              .replace(/H{2}/g, "29")
              .replace(/m{2}/g, "59")
              .replace(/s{2}/g, "59");
          },
        },
      },
    };
  e.datetimepicker = {
    setLocale: function (e) {
      var n = t.i18n[e] ? e : "en";
      a !== n && ((a = n), i());
    },
    setDateFormatter: function (o) {
      if ("string" == typeof o && s.hasOwnProperty(o)) {
        var a = s[o];
        e.extend(t, a.default_options), (n = a.formatter);
      } else n = o;
    },
  };
  var l = {
      RFC_2822: "D, d M Y H:i:s O",
      ATOM: "Y-m-dTH:i:sP",
      ISO_8601: "Y-m-dTH:i:sO",
      RFC_822: "D, d M y H:i:s O",
      RFC_850: "l, d-M-y H:i:s T",
      RFC_1036: "D, d M y H:i:s O",
      RFC_1123: "D, d M Y H:i:s O",
      RSS: "D, d M Y H:i:s O",
      W3C: "Y-m-dTH:i:sP",
    },
    d = function (e) {
      return -1 !== Object.values(l).indexOf(e);
    };
  function u(e, t, n) {
    (this.date = e), (this.desc = t), (this.style = n);
  }
  e.extend(e.datetimepicker, l),
    i(),
    window.getComputedStyle ||
      (window.getComputedStyle = function (e) {
        return (
          (this.el = e),
          (this.getPropertyValue = function (t) {
            var n = /(-([a-z]))/g;
            return (
              "float" === t && (t = "styleFloat"),
              n.test(t) &&
                (t = t.replace(n, function (e, t, n) {
                  return n.toUpperCase();
                })),
              e.currentStyle[t] || null
            );
          }),
          this
        );
      }),
    Array.prototype.indexOf ||
      (Array.prototype.indexOf = function (e, t) {
        var n, o;
        for (n = t || 0, o = this.length; n < o; n += 1)
          if (this[n] === e) return n;
        return -1;
      }),
    (Date.prototype.countDaysInMonth = function () {
      return new Date(this.getFullYear(), this.getMonth() + 1, 0).getDate();
    }),
    (e.fn.xdsoftScroller = function (t, n) {
      return this.each(function () {
        var o,
          a,
          r,
          i,
          s,
          l = e(this),
          d = function (e) {
            var t,
              n = { x: 0, y: 0 };
            return (
              "touchstart" === e.type ||
              "touchmove" === e.type ||
              "touchend" === e.type ||
              "touchcancel" === e.type
                ? ((t =
                    e.originalEvent.touches[0] ||
                    e.originalEvent.changedTouches[0]),
                  (n.x = t.clientX),
                  (n.y = t.clientY))
                : ("mousedown" !== e.type &&
                    "mouseup" !== e.type &&
                    "mousemove" !== e.type &&
                    "mouseover" !== e.type &&
                    "mouseout" !== e.type &&
                    "mouseenter" !== e.type &&
                    "mouseleave" !== e.type) ||
                  ((n.x = e.clientX), (n.y = e.clientY)),
              n
            );
          },
          u = 0,
          c = 100,
          f = !1,
          h = 0,
          m = 0,
          g = 0,
          p = !1,
          D = 0,
          x = function () {};
        "hide" !== n
          ? (e(this).hasClass("xdsoft_scroller_box") ||
              ((o = l.children().eq(0)),
              (u = Math.abs(parseInt(o.css("marginTop"), 10))),
              (a = l[0].clientHeight),
              (r = o[0].offsetHeight),
              (i = e('<div class="xdsoft_scrollbar"></div>')),
              (s = e('<div class="xdsoft_scroller"></div>')),
              i.append(s),
              l.addClass("xdsoft_scroller_box").append(i),
              (x = function (e) {
                var t = d(e).y - h + D;
                t < 0 && (t = 0),
                  t + s[0].offsetHeight > g && (t = g - s[0].offsetHeight),
                  l.trigger("scroll_element.xdsoft_scroller", [c ? t / c : 0]);
              }),
              s
                .on(
                  "touchstart.xdsoft_scroller mousedown.xdsoft_scroller",
                  function (o) {
                    a || l.trigger("resize_scroll.xdsoft_scroller", [n]),
                      (h = d(o).y),
                      (D = parseInt(s.css("marginTop"), 10)),
                      (g = i[0].offsetHeight),
                      "mousedown" === o.type || "touchstart" === o.type
                        ? (t.ownerDocument &&
                            e(t.ownerDocument.body).addClass("xdsoft_noselect"),
                          e([t.ownerDocument.body, t.contentWindow]).on(
                            "touchend mouseup.xdsoft_scroller",
                            function n() {
                              e([t.ownerDocument.body, t.contentWindow])
                                .off("touchend mouseup.xdsoft_scroller", n)
                                .off("mousemove.xdsoft_scroller", x)
                                .removeClass("xdsoft_noselect");
                            }
                          ),
                          e(t.ownerDocument.body).on(
                            "mousemove.xdsoft_scroller",
                            x
                          ))
                        : ((p = !0), o.stopPropagation(), o.preventDefault());
                  }
                )
                .on("touchmove", function (e) {
                  p && (e.preventDefault(), x(e));
                })
                .on("touchend touchcancel", function () {
                  (p = !1), (D = 0);
                }),
              l
                .on("scroll_element.xdsoft_scroller", function (e, t) {
                  a || l.trigger("resize_scroll.xdsoft_scroller", [t, !0]),
                    (t = t > 1 ? 1 : t < 0 || isNaN(t) ? 0 : t),
                    (u = parseFloat(
                      Math.abs((o[0].offsetHeight - a) * t).toFixed(4)
                    )),
                    s.css("marginTop", c * t),
                    o.css("marginTop", -u);
                })
                .on("resize_scroll.xdsoft_scroller", function (e, t, n) {
                  var d, f;
                  (a = l[0].clientHeight),
                    (r = o[0].offsetHeight),
                    (f = (d = a / r) * i[0].offsetHeight),
                    d > 1
                      ? s.hide()
                      : (s.show(),
                        s.css("height", parseInt(f > 10 ? f : 10, 10)),
                        (c = i[0].offsetHeight - s[0].offsetHeight),
                        !0 !== n &&
                          l.trigger("scroll_element.xdsoft_scroller", [
                            t || u / (r - a),
                          ]));
                }),
              l.on("mousewheel", function (e) {
                var t = (function (e) {
                    var t = 0;
                    return (
                      "detail" in e && (t = e.detail),
                      "wheelDelta" in e && (t = -e.wheelDelta / 120),
                      "wheelDeltaY" in e && (t = -e.wheelDeltaY / 120),
                      "axis" in e && e.axis === e.HORIZONTAL_AXIS && (t = 0),
                      (t *= 10),
                      "deltaY" in e && (t = e.deltaY),
                      t &&
                        e.deltaMode &&
                        (1 === e.deltaMode ? (t *= 40) : (t *= 800)),
                      t
                    );
                  })(e.originalEvent),
                  n = Math.max(0, u - t);
                return (
                  l.trigger("scroll_element.xdsoft_scroller", [n / (r - a)]),
                  e.stopPropagation(),
                  !1
                );
              }),
              l.on("touchstart", function (e) {
                (f = d(e)), (m = u);
              }),
              l.on("touchmove", function (e) {
                if (f) {
                  e.preventDefault();
                  var t = d(e);
                  l.trigger("scroll_element.xdsoft_scroller", [
                    (m - (t.y - f.y)) / (r - a),
                  ]);
                }
              }),
              l.on("touchend touchcancel", function () {
                (f = !1), (m = 0);
              })),
            l.trigger("resize_scroll.xdsoft_scroller", [n]))
          : l.find(".xdsoft_scrollbar").hide();
      });
    }),
    (e.fn.datetimepicker = function (o, r) {
      var i,
        s,
        l = this,
        d = 48,
        c = 57,
        f = 96,
        h = 105,
        m = 17,
        g = 46,
        p = 13,
        D = 27,
        x = 8,
        v = 37,
        y = 38,
        T = 39,
        w = 40,
        b = 9,
        _ = 116,
        M = 65,
        k = 67,
        S = 86,
        Y = 90,
        C = 89,
        O = !1,
        F =
          e.isPlainObject(o) || !o
            ? e.extend(!0, {}, t, o)
            : e.extend(!0, {}, t),
        H = 0;
      return (
        (i = function (t) {
          var r,
            i,
            s,
            l,
            H,
            P,
            W = e('<div class="xdsoft_datetimepicker xdsoft_noselect"></div>'),
            I = e(
              '<div class="xdsoft_copyright"><a target="_blank" href="http://xdsoft.net/jqplugins/datetimepicker/">xdsoft.net</a></div>'
            ),
            A = e('<div class="xdsoft_datepicker active"></div>'),
            j = e(
              '<div class="xdsoft_monthpicker"><button type="button" class="xdsoft_prev"></button><button type="button" class="xdsoft_today_button"></button><div class="xdsoft_label xdsoft_month"><span></span><i></i></div><div class="xdsoft_label xdsoft_year"><span></span><i></i></div><button type="button" class="xdsoft_next"></button></div>'
            ),
            z = e('<div class="xdsoft_calendar"></div>'),
            R = e(
              '<div class="xdsoft_timepicker active"><button type="button" class="xdsoft_prev"></button><div class="xdsoft_time_box"></div><button type="button" class="xdsoft_next"></button></div>'
            ),
            E = R.find(".xdsoft_time_box").eq(0),
            N = e('<div class="xdsoft_time_variant"></div>'),
            L = e(
              '<button type="button" class="xdsoft_save_selected blue-gradient-button">Save Selected</button>'
            ),
            B = e(
              '<div class="xdsoft_select xdsoft_monthselect"><div></div></div>'
            ),
            q = e(
              '<div class="xdsoft_select xdsoft_yearselect"><div></div></div>'
            ),
            G = !1,
            V = 0;
          F.id && W.attr("id", F.id),
            F.style && W.attr("style", F.style),
            F.weeks && W.addClass("xdsoft_showweeks"),
            F.rtl && W.addClass("xdsoft_rtl"),
            W.addClass("xdsoft_" + F.theme),
            W.addClass(F.className),
            j.find(".xdsoft_month span").after(B),
            j.find(".xdsoft_year span").after(q),
            j
              .find(".xdsoft_month,.xdsoft_year")
              .on("touchstart mousedown.xdsoft", function (t) {
                var n,
                  o,
                  a = e(this).find(".xdsoft_select").eq(0),
                  r = 0,
                  i = 0,
                  s = a.is(":visible");
                for (
                  j.find(".xdsoft_select").hide(),
                    H.currentTime &&
                      (r =
                        H.currentTime[
                          e(this).hasClass("xdsoft_month")
                            ? "getMonth"
                            : "getFullYear"
                        ]()),
                    a[s ? "hide" : "show"](),
                    n = a.find("div.xdsoft_option"),
                    o = 0;
                  o < n.length && n.eq(o).data("value") !== r;
                  o += 1
                )
                  i += n[0].offsetHeight;
                return (
                  a.xdsoftScroller(
                    F,
                    i / (a.children()[0].offsetHeight - a[0].clientHeight)
                  ),
                  t.stopPropagation(),
                  !1
                );
              });
          var X = function (e) {
            var t = e.originalEvent,
              n = t.touches ? t.touches[0] : t;
            this.touchStartPosition = this.touchStartPosition || n;
            var o = Math.abs(this.touchStartPosition.clientX - n.clientX),
              a = Math.abs(this.touchStartPosition.clientY - n.clientY);
            Math.sqrt(o * o + a * a) > F.touchMovedThreshold &&
              (this.touchMoved = !0);
          };
          function U() {
            var e,
              n = !1;
            return (
              F.startDate
                ? (n = H.strToDate(F.startDate))
                : (n = F.value || (t && t.val && t.val() ? t.val() : ""))
                ? ((n = H.strToDateTime(n)),
                  F.yearOffset &&
                    (n = new Date(
                      n.getFullYear() - F.yearOffset,
                      n.getMonth(),
                      n.getDate(),
                      n.getHours(),
                      n.getMinutes(),
                      n.getSeconds(),
                      n.getMilliseconds()
                    )))
                : F.defaultDate &&
                  ((n = H.strToDateTime(F.defaultDate)),
                  F.defaultTime &&
                    ((e = H.strtotime(F.defaultTime)),
                    n.setHours(e.getHours()),
                    n.setMinutes(e.getMinutes()))),
              n && H.isValidDate(n) ? W.data("changed", !0) : (n = ""),
              n || 0
            );
          }
          function J(o) {
            var a = function (e, t) {
                var n = e
                  .replace(/([\[\]\/\{\}\(\)\-\.\+]{1})/g, "\\$1")
                  .replace(/_/g, "{digit+}")
                  .replace(/([0-9]{1})/g, "{digit$1}")
                  .replace(/\{digit([0-9]{1})\}/g, "[0-$1_]{1}")
                  .replace(/\{digit[\+]\}/g, "[0-9_]{1}");
                return new RegExp(n).test(t);
              },
              r = function (e, t) {
                if (
                  !(e =
                    "string" == typeof e || e instanceof String
                      ? o.ownerDocument.getElementById(e)
                      : e)
                )
                  return !1;
                if (e.createTextRange) {
                  var n = e.createTextRange();
                  return (
                    n.collapse(!0),
                    n.moveEnd("character", t),
                    n.moveStart("character", t),
                    n.select(),
                    !0
                  );
                }
                return !!e.setSelectionRange && (e.setSelectionRange(t, t), !0);
              };
            o.mask && t.off("keydown.xdsoft"),
              !0 === o.mask &&
                (n.formatMask
                  ? (o.mask = n.formatMask(o.format))
                  : (o.mask = o.format
                      .replace(/Y/g, "9999")
                      .replace(/F/g, "9999")
                      .replace(/m/g, "19")
                      .replace(/d/g, "39")
                      .replace(/H/g, "29")
                      .replace(/i/g, "59")
                      .replace(/s/g, "59"))),
              "string" === e.type(o.mask) &&
                (a(o.mask, t.val()) ||
                  (t.val(o.mask.replace(/[0-9]/g, "_")), r(t[0], 0)),
                t.on("paste.xdsoft", function (n) {
                  var i = (
                      n.clipboardData ||
                      n.originalEvent.clipboardData ||
                      window.clipboardData
                    ).getData("text"),
                    s = this.value,
                    l = this.selectionStart,
                    d = s.substr(0, l),
                    u = s.substr(l + i.length);
                  return (
                    (s = d + i + u),
                    (l += i.length),
                    a(o.mask, s)
                      ? ((this.value = s), r(this, l))
                      : "" === e.trim(s)
                      ? (this.value = o.mask.replace(/[0-9]/g, "_"))
                      : t.trigger("error_input.xdsoft"),
                    n.preventDefault(),
                    !1
                  );
                }),
                t.on("keydown.xdsoft", function (n) {
                  var i,
                    s = this.value,
                    l = n.which,
                    u = this.selectionStart,
                    F = this.selectionEnd,
                    H = u !== F;
                  if (
                    (l >= d && l <= c) ||
                    (l >= f && l <= h) ||
                    l === x ||
                    l === g
                  ) {
                    for (
                      i =
                        l === x || l === g
                          ? "_"
                          : String.fromCharCode(f <= l && l <= h ? l - d : l),
                        l === x && u && !H && (u -= 1);
                      ;

                    ) {
                      var P = o.mask.substr(u, 1),
                        W = u < o.mask.length,
                        I = u > 0;
                      if (!(/[^0-9_]/.test(P) && W && I)) break;
                      u += l !== x || H ? 1 : -1;
                    }
                    if ((n.metaKey && ((u = 0), (H = !0)), H)) {
                      var A = F - u,
                        j = o.mask.replace(/[0-9]/g, "_"),
                        z = j.substr(u, A).substr(1),
                        R = s.substr(0, u),
                        E = i + z,
                        N = s.substr(u + A);
                      s = R + E + N;
                    } else {
                      var L = s.substr(0, u),
                        B = i,
                        q = s.substr(u + 1);
                      s = L + B + q;
                    }
                    if ("" === e.trim(s)) s = j;
                    else if (u === o.mask.length) return n.preventDefault(), !1;
                    for (
                      u += l === x ? 0 : 1;
                      /[^0-9_]/.test(o.mask.substr(u, 1)) &&
                      u < o.mask.length &&
                      u > 0;

                    )
                      u += l === x ? 0 : 1;
                    a(o.mask, s)
                      ? ((this.value = s), r(this, u))
                      : "" === e.trim(s)
                      ? (this.value = o.mask.replace(/[0-9]/g, "_"))
                      : t.trigger("error_input.xdsoft");
                  } else if ((-1 !== [M, k, S, Y, C].indexOf(l) && O) || -1 !== [D, y, w, v, T, _, m, b, p].indexOf(l)) return !0;
                  return n.preventDefault(), !1;
                }));
          }
          j
            .find(".xdsoft_select")
            .xdsoftScroller(F)
            .on("touchstart mousedown.xdsoft", function (e) {
              var t = e.originalEvent;
              (this.touchMoved = !1),
                (this.touchStartPosition = t.touches ? t.touches[0] : t),
                e.stopPropagation(),
                e.preventDefault();
            })
            .on("touchmove", ".xdsoft_option", X)
            .on("touchend mousedown.xdsoft", ".xdsoft_option", function () {
              if (!this.touchMoved) {
                (void 0 !== H.currentTime && null !== H.currentTime) ||
                  (H.currentTime = H.now());
                var t = H.currentTime.getFullYear();
                H &&
                  H.currentTime &&
                  H.currentTime[
                    e(this).parent().parent().hasClass("xdsoft_monthselect")
                      ? "setMonth"
                      : "setFullYear"
                  ](e(this).data("value")),
                  e(this).parent().parent().hide(),
                  W.trigger("xchange.xdsoft"),
                  F.onChangeMonth &&
                    e.isFunction(F.onChangeMonth) &&
                    F.onChangeMonth.call(W, H.currentTime, W.data("input")),
                  t !== H.currentTime.getFullYear() &&
                    e.isFunction(F.onChangeYear) &&
                    F.onChangeYear.call(W, H.currentTime, W.data("input"));
              }
            }),
            (W.getValue = function () {
              return H.getCurrentTime();
            }),
            (W.setOptions = function (o) {
              var a = {};
              (F = e.extend(!0, {}, F, o)),
                o.allowTimes &&
                  e.isArray(o.allowTimes) &&
                  o.allowTimes.length &&
                  (F.allowTimes = e.extend(!0, [], o.allowTimes)),
                o.weekends &&
                  e.isArray(o.weekends) &&
                  o.weekends.length &&
                  (F.weekends = e.extend(!0, [], o.weekends)),
                o.allowDates &&
                  e.isArray(o.allowDates) &&
                  o.allowDates.length &&
                  (F.allowDates = e.extend(!0, [], o.allowDates)),
                o.allowDateRe &&
                  "[object String]" ===
                    Object.prototype.toString.call(o.allowDateRe) &&
                  (F.allowDateRe = new RegExp(o.allowDateRe)),
                o.highlightedDates &&
                  e.isArray(o.highlightedDates) &&
                  o.highlightedDates.length &&
                  (e.each(o.highlightedDates, function (t, o) {
                    var r,
                      i = e.map(o.split(","), e.trim),
                      s = new u(n.parseDate(i[0], F.formatDate), i[1], i[2]),
                      l = n.formatDate(s.date, F.formatDate);
                    void 0 !== a[l]
                      ? (r = a[l].desc) &&
                        r.length &&
                        s.desc &&
                        s.desc.length &&
                        (a[l].desc = r + "\n" + s.desc)
                      : (a[l] = s);
                  }),
                  (F.highlightedDates = e.extend(!0, [], a))),
                o.highlightedPeriods &&
                  e.isArray(o.highlightedPeriods) &&
                  o.highlightedPeriods.length &&
                  ((a = e.extend(!0, [], F.highlightedDates)),
                  e.each(o.highlightedPeriods, function (t, o) {
                    var r, i, s, l, d, c, f;
                    if (e.isArray(o))
                      (r = o[0]), (i = o[1]), (s = o[2]), (f = o[3]);
                    else {
                      var h = e.map(o.split(","), e.trim);
                      (r = n.parseDate(h[0], F.formatDate)),
                        (i = n.parseDate(h[1], F.formatDate)),
                        (s = h[2]),
                        (f = h[3]);
                    }
                    for (; r <= i; )
                      (l = new u(r, s, f)),
                        (d = n.formatDate(r, F.formatDate)),
                        r.setDate(r.getDate() + 1),
                        void 0 !== a[d]
                          ? (c = a[d].desc) &&
                            c.length &&
                            l.desc &&
                            l.desc.length &&
                            (a[d].desc = c + "\n" + l.desc)
                          : (a[d] = l);
                  }),
                  (F.highlightedDates = e.extend(!0, [], a))),
                o.disabledDates &&
                  e.isArray(o.disabledDates) &&
                  o.disabledDates.length &&
                  (F.disabledDates = e.extend(!0, [], o.disabledDates)),
                o.disabledWeekDays &&
                  e.isArray(o.disabledWeekDays) &&
                  o.disabledWeekDays.length &&
                  (F.disabledWeekDays = e.extend(!0, [], o.disabledWeekDays)),
                (!F.open && !F.opened) || F.inline || t.trigger("open.xdsoft"),
                F.inline &&
                  ((G = !0), W.addClass("xdsoft_inline"), t.after(W).hide()),
                F.inverseButton &&
                  ((F.next = "xdsoft_prev"), (F.prev = "xdsoft_next")),
                F.datepicker ? A.addClass("active") : A.removeClass("active"),
                F.timepicker ? R.addClass("active") : R.removeClass("active"),
                F.value &&
                  (H.setCurrentTime(F.value), t && t.val && t.val(H.str)),
                isNaN(F.dayOfWeekStart)
                  ? (F.dayOfWeekStart = 0)
                  : (F.dayOfWeekStart = parseInt(F.dayOfWeekStart, 10) % 7),
                F.timepickerScrollbar || E.xdsoftScroller(F, "hide"),
                F.minDate &&
                  /^[\+\-](.*)$/.test(F.minDate) &&
                  (F.minDate = n.formatDate(
                    H.strToDateTime(F.minDate),
                    F.formatDate
                  )),
                F.maxDate &&
                  /^[\+\-](.*)$/.test(F.maxDate) &&
                  (F.maxDate = n.formatDate(
                    H.strToDateTime(F.maxDate),
                    F.formatDate
                  )),
                F.minDateTime &&
                  /^\+(.*)$/.test(F.minDateTime) &&
                  (F.minDateTime = H.strToDateTime(F.minDateTime).dateFormat(
                    F.formatDate
                  )),
                F.maxDateTime &&
                  /^\+(.*)$/.test(F.maxDateTime) &&
                  (F.maxDateTime = H.strToDateTime(F.maxDateTime).dateFormat(
                    F.formatDate
                  )),
                L.toggle(F.showApplyButton),
                j
                  .find(".xdsoft_today_button")
                  .css("visibility", F.todayButton ? "visible" : "hidden"),
                j
                  .find("." + F.prev)
                  .css("visibility", F.prevButton ? "visible" : "hidden"),
                j
                  .find("." + F.next)
                  .css("visibility", F.nextButton ? "visible" : "hidden"),
                J(F),
                F.validateOnBlur &&
                  t.off("blur.xdsoft").on("blur.xdsoft", function () {
                    if (
                      F.allowBlank &&
                      (!e.trim(e(this).val()).length ||
                        ("string" == typeof F.mask &&
                          e.trim(e(this).val()) ===
                            F.mask.replace(/[0-9]/g, "_")))
                    )
                      e(this).val(null), W.data("xdsoft_datetime").empty();
                    else {
                      var t = n.parseDate(e(this).val(), F.format);
                      if (t) e(this).val(n.formatDate(t, F.format));
                      else {
                        var o = +[e(this).val()[0], e(this).val()[1]].join(""),
                          a = +[e(this).val()[2], e(this).val()[3]].join("");
                        !F.datepicker &&
                        F.timepicker &&
                        o >= 0 &&
                        o < 24 &&
                        a >= 0 &&
                        a < 60
                          ? e(this).val(
                              [o, a]
                                .map(function (e) {
                                  return e > 9 ? e : "0" + e;
                                })
                                .join(":")
                            )
                          : e(this).val(n.formatDate(H.now(), F.format));
                      }
                      W.data("xdsoft_datetime").setCurrentTime(e(this).val());
                    }
                    W.trigger("changedatetime.xdsoft"),
                      W.trigger("close.xdsoft");
                  }),
                (F.dayOfWeekStartPrev =
                  0 === F.dayOfWeekStart ? 6 : F.dayOfWeekStart - 1),
                W.trigger("xchange.xdsoft").trigger("afterOpen.xdsoft");
            }),
            W.data("options", F).on(
              "touchstart mousedown.xdsoft",
              function (e) {
                return (
                  e.stopPropagation(),
                  e.preventDefault(),
                  q.hide(),
                  B.hide(),
                  !1
                );
              }
            ),
            E.append(N),
            E.xdsoftScroller(F),
            W.on("afterOpen.xdsoft", function () {
              E.xdsoftScroller(F);
            }),
            W.append(A).append(R),
            !0 !== F.withoutCopyright && W.append(I),
            A.append(j).append(z).append(L),
            F.insideParent ? e(t).parent().append(W) : e(F.parentID).append(W),
            (H = new (function () {
              var t = this;
              (t.now = function (e) {
                var n,
                  o,
                  a = new Date();
                return (
                  !e &&
                    F.defaultDate &&
                    ((n = t.strToDateTime(F.defaultDate)),
                    a.setFullYear(n.getFullYear()),
                    a.setMonth(n.getMonth()),
                    a.setDate(n.getDate())),
                  a.setFullYear(a.getFullYear()),
                  !e &&
                    F.defaultTime &&
                    ((o = t.strtotime(F.defaultTime)),
                    a.setHours(o.getHours()),
                    a.setMinutes(o.getMinutes()),
                    a.setSeconds(o.getSeconds()),
                    a.setMilliseconds(o.getMilliseconds())),
                  a
                );
              }),
                (t.isValidDate = function (e) {
                  return (
                    "[object Date]" === Object.prototype.toString.call(e) &&
                    !isNaN(e.getTime())
                  );
                }),
                (t.setCurrentTime = function (e, n) {
                  "string" == typeof e
                    ? (t.currentTime = t.strToDateTime(e))
                    : t.isValidDate(e)
                    ? (t.currentTime = e)
                    : e || n || !F.allowBlank || F.inline
                    ? (t.currentTime = t.now())
                    : (t.currentTime = null),
                    W.trigger("xchange.xdsoft");
                }),
                (t.empty = function () {
                  t.currentTime = null;
                }),
                (t.getCurrentTime = function () {
                  return t.currentTime;
                }),
                (t.nextMonth = function () {
                  (void 0 !== t.currentTime && null !== t.currentTime) ||
                    (t.currentTime = t.now());
                  var n,
                    o = t.currentTime.getMonth() + 1;
                  return (
                    12 === o &&
                      (t.currentTime.setFullYear(
                        t.currentTime.getFullYear() + 1
                      ),
                      (o = 0)),
                    (n = t.currentTime.getFullYear()),
                    t.currentTime.setDate(
                      Math.min(
                        new Date(
                          t.currentTime.getFullYear(),
                          o + 1,
                          0
                        ).getDate(),
                        t.currentTime.getDate()
                      )
                    ),
                    t.currentTime.setMonth(o),
                    F.onChangeMonth &&
                      e.isFunction(F.onChangeMonth) &&
                      F.onChangeMonth.call(W, H.currentTime, W.data("input")),
                    n !== t.currentTime.getFullYear() &&
                      e.isFunction(F.onChangeYear) &&
                      F.onChangeYear.call(W, H.currentTime, W.data("input")),
                    W.trigger("xchange.xdsoft"),
                    o
                  );
                }),
                (t.prevMonth = function () {
                  (void 0 !== t.currentTime && null !== t.currentTime) ||
                    (t.currentTime = t.now());
                  var n = t.currentTime.getMonth() - 1;
                  return (
                    -1 === n &&
                      (t.currentTime.setFullYear(
                        t.currentTime.getFullYear() - 1
                      ),
                      (n = 11)),
                    t.currentTime.setDate(
                      Math.min(
                        new Date(
                          t.currentTime.getFullYear(),
                          n + 1,
                          0
                        ).getDate(),
                        t.currentTime.getDate()
                      )
                    ),
                    t.currentTime.setMonth(n),
                    F.onChangeMonth &&
                      e.isFunction(F.onChangeMonth) &&
                      F.onChangeMonth.call(W, H.currentTime, W.data("input")),
                    W.trigger("xchange.xdsoft"),
                    n
                  );
                }),
                (t.getWeekOfYear = function (t) {
                  if (F.onGetWeekOfYear && e.isFunction(F.onGetWeekOfYear)) {
                    var n = F.onGetWeekOfYear.call(W, t);
                    if (void 0 !== n) return n;
                  }
                  var o = new Date(t.getFullYear(), 0, 1);
                  return (
                    4 !== o.getDay() &&
                      o.setMonth(0, 1 + ((4 - o.getDay() + 7) % 7)),
                    Math.ceil(((t - o) / 864e5 + o.getDay() + 1) / 7)
                  );
                }),
                (t.strToDateTime = function (e) {
                  var o,
                    a,
                    r = [];
                  return e && e instanceof Date && t.isValidDate(e)
                    ? e
                    : ((r = /^([+-]{1})(.*)$/.exec(e)) &&
                        (r[2] = n.parseDate(r[2], F.formatDate)),
                      r && r[2]
                        ? ((o =
                            r[2].getTime() - 6e4 * r[2].getTimezoneOffset()),
                          (a = new Date(
                            t.now(!0).getTime() + parseInt(r[1] + "1", 10) * o
                          )))
                        : (a = e ? n.parseDate(e, F.format) : t.now()),
                      t.isValidDate(a) || (a = t.now()),
                      a);
                }),
                (t.strToDate = function (e) {
                  if (e && e instanceof Date && t.isValidDate(e)) return e;
                  var o = e ? n.parseDate(e, F.formatDate) : t.now(!0);
                  return t.isValidDate(o) || (o = t.now(!0)), o;
                }),
                (t.strtotime = function (e) {
                  if (e && e instanceof Date && t.isValidDate(e)) return e;
                  var o = e ? n.parseDate(e, F.formatTime) : t.now(!0);
                  return t.isValidDate(o) || (o = t.now(!0)), o;
                }),
                (t.str = function () {
                  var e = F.format;
                  return (
                    F.yearOffset &&
                      (e = (e = e.replace(
                        "Y",
                        t.currentTime.getFullYear() + F.yearOffset
                      )).replace(
                        "y",
                        String(
                          t.currentTime.getFullYear() + F.yearOffset
                        ).substring(2, 4)
                      )),
                    n.formatDate(t.currentTime, e)
                  );
                }),
                (t.currentTime = this.now());
            })()),
            L.on("touchend click", function (e) {
              e.preventDefault(),
                W.data("changed", !0),
                H.setCurrentTime(U()),
                t.val(H.str()),
                W.trigger("close.xdsoft");
            }),
            j
              .find(".xdsoft_today_button")
              .on("touchend mousedown.xdsoft", function () {
                W.data("changed", !0),
                  H.setCurrentTime(0, !0),
                  W.trigger("afterOpen.xdsoft");
              })
              .on("dblclick.xdsoft", function () {
                var e,
                  n,
                  o = H.getCurrentTime();
                (o = new Date(o.getFullYear(), o.getMonth(), o.getDate())),
                  (e = H.strToDate(F.minDate)),
                  o <
                    (e = new Date(
                      e.getFullYear(),
                      e.getMonth(),
                      e.getDate()
                    )) ||
                    ((n = H.strToDate(F.maxDate)),
                    o >
                      (n = new Date(
                        n.getFullYear(),
                        n.getMonth(),
                        n.getDate()
                      )) ||
                      (t.val(H.str()),
                      t.trigger("change"),
                      W.trigger("close.xdsoft")));
              }),
            j
              .find(".xdsoft_prev,.xdsoft_next")
              .on("touchend mousedown.xdsoft", function () {
                var t = e(this),
                  n = 0,
                  o = !1;
                !(function e(a) {
                  t.hasClass(F.next)
                    ? H.nextMonth()
                    : t.hasClass(F.prev) && H.prevMonth(),
                    F.monthChangeSpinner &&
                      (o || (n = setTimeout(e, a || 100)));
                })(500),
                  e([F.ownerDocument.body, F.contentWindow]).on(
                    "touchend mouseup.xdsoft",
                    function t() {
                      clearTimeout(n),
                        (o = !0),
                        e([F.ownerDocument.body, F.contentWindow]).off(
                          "touchend mouseup.xdsoft",
                          t
                        );
                    }
                  );
              }),
            R.find(".xdsoft_prev,.xdsoft_next").on(
              "touchend mousedown.xdsoft",
              function () {
                var t = e(this),
                  n = 0,
                  o = !1,
                  a = 110;
                !(function e(r) {
                  var i = E[0].clientHeight,
                    s = N[0].offsetHeight,
                    l = Math.abs(parseInt(N.css("marginTop"), 10));
                  t.hasClass(F.next) && s - i - F.timeHeightInTimePicker >= l
                    ? N.css(
                        "marginTop",
                        "-" + (l + F.timeHeightInTimePicker) + "px"
                      )
                    : t.hasClass(F.prev) &&
                      l - F.timeHeightInTimePicker >= 0 &&
                      N.css(
                        "marginTop",
                        "-" + (l - F.timeHeightInTimePicker) + "px"
                      ),
                    E.trigger("scroll_element.xdsoft_scroller", [
                      Math.abs(parseInt(N[0].style.marginTop, 10) / (s - i)),
                    ]),
                    (a = a > 10 ? 10 : a - 10),
                    o || (n = setTimeout(e, r || a));
                })(500),
                  e([F.ownerDocument.body, F.contentWindow]).on(
                    "touchend mouseup.xdsoft",
                    function t() {
                      clearTimeout(n),
                        (o = !0),
                        e([F.ownerDocument.body, F.contentWindow]).off(
                          "touchend mouseup.xdsoft",
                          t
                        );
                    }
                  );
              }
            ),
            (r = 0),
            W.on("xchange.xdsoft", function (i) {
              clearTimeout(r),
                (r = setTimeout(function () {
                  (void 0 !== H.currentTime && null !== H.currentTime) ||
                    (H.currentTime = H.now());
                  for (
                    var r,
                      i,
                      s,
                      l,
                      d,
                      u,
                      c,
                      f,
                      h,
                      m,
                      g = "",
                      p = new Date(
                        H.currentTime.getFullYear(),
                        H.currentTime.getMonth(),
                        1,
                        12,
                        0,
                        0
                      ),
                      D = 0,
                      x = H.now(),
                      v = !1,
                      y = !1,
                      T = !1,
                      w = !1,
                      b = [],
                      _ = !0,
                      M = "";
                    p.getDay() !== F.dayOfWeekStart;

                  )
                    p.setDate(p.getDate() - 1);
                  for (
                    g += "<table><thead><tr>",
                      F.weeks && (g += "<th></th>"),
                      r = 0;
                    r < 7;
                    r += 1
                  )
                    g +=
                      "<th>" +
                      F.i18n[a].dayOfWeekShort[(r + F.dayOfWeekStart) % 7] +
                      "</th>";
                  for (
                    g += "</tr></thead>",
                      g += "<tbody>",
                      !1 !== F.maxDate &&
                        ((v = H.strToDate(F.maxDate)),
                        (v = new Date(
                          v.getFullYear(),
                          v.getMonth(),
                          v.getDate(),
                          23,
                          59,
                          59,
                          999
                        ))),
                      !1 !== F.minDate &&
                        ((y = H.strToDate(F.minDate)),
                        (y = new Date(
                          y.getFullYear(),
                          y.getMonth(),
                          y.getDate()
                        ))),
                      !1 !== F.minDateTime &&
                        ((T = H.strToDate(F.minDateTime)),
                        (T = new Date(
                          T.getFullYear(),
                          T.getMonth(),
                          T.getDate(),
                          T.getHours(),
                          T.getMinutes(),
                          T.getSeconds()
                        ))),
                      !1 !== F.maxDateTime &&
                        ((w = H.strToDate(F.maxDateTime)),
                        (w = new Date(
                          w.getFullYear(),
                          w.getMonth(),
                          w.getDate(),
                          w.getHours(),
                          w.getMinutes(),
                          w.getSeconds()
                        ))),
                      !1 !== w &&
                        (m =
                          31 * (12 * w.getFullYear() + w.getMonth()) +
                          w.getDate());
                    D < H.currentTime.countDaysInMonth() ||
                    p.getDay() !== F.dayOfWeekStart ||
                    H.currentTime.getMonth() === p.getMonth();

                  ) {
                    (b = []),
                      (D += 1),
                      (s = p.getDay()),
                      (l = p.getDate()),
                      (d = p.getFullYear()),
                      (O = p.getMonth()),
                      (u = H.getWeekOfYear(p)),
                      (h = ""),
                      b.push("xdsoft_date"),
                      (c =
                        F.beforeShowDay && e.isFunction(F.beforeShowDay.call)
                          ? F.beforeShowDay.call(W, p)
                          : null),
                      F.allowDateRe &&
                        "[object RegExp]" ===
                          Object.prototype.toString.call(F.allowDateRe) &&
                        (F.allowDateRe.test(n.formatDate(p, F.formatDate)) ||
                          b.push("xdsoft_disabled")),
                      F.allowDates &&
                        F.allowDates.length > 0 &&
                        -1 ===
                          F.allowDates.indexOf(n.formatDate(p, F.formatDate)) &&
                        b.push("xdsoft_disabled");
                    var k =
                      31 * (12 * p.getFullYear() + p.getMonth()) + p.getDate();
                    ((!1 !== v && p > v) ||
                      (!1 !== T && p < T) ||
                      (!1 !== y && p < y) ||
                      (!1 !== w && k > m) ||
                      (c && !1 === c[0])) &&
                      b.push("xdsoft_disabled"),
                      -1 !==
                        F.disabledDates.indexOf(
                          n.formatDate(p, F.formatDate)
                        ) && b.push("xdsoft_disabled"),
                      -1 !== F.disabledWeekDays.indexOf(s) &&
                        b.push("xdsoft_disabled"),
                      t.is("[disabled]") && b.push("xdsoft_disabled"),
                      c && "" !== c[1] && b.push(c[1]),
                      H.currentTime.getMonth() !== O &&
                        b.push("xdsoft_other_month"),
                      (F.defaultSelect || W.data("changed")) &&
                        n.formatDate(H.currentTime, F.formatDate) ===
                          n.formatDate(p, F.formatDate) &&
                        b.push("xdsoft_current"),
                      n.formatDate(x, F.formatDate) ===
                        n.formatDate(p, F.formatDate) && b.push("xdsoft_today"),
                      (0 !== p.getDay() &&
                        6 !== p.getDay() &&
                        -1 ===
                          F.weekends.indexOf(n.formatDate(p, F.formatDate))) ||
                        b.push("xdsoft_weekend"),
                      void 0 !==
                        F.highlightedDates[n.formatDate(p, F.formatDate)] &&
                        ((i =
                          F.highlightedDates[n.formatDate(p, F.formatDate)]),
                        b.push(
                          void 0 === i.style
                            ? "xdsoft_highlighted_default"
                            : i.style
                        ),
                        (h = void 0 === i.desc ? "" : i.desc)),
                      F.beforeShowDay &&
                        e.isFunction(F.beforeShowDay) &&
                        b.push(F.beforeShowDay(p)),
                      _ &&
                        ((g += "<tr>"),
                        (_ = !1),
                        F.weeks && (g += "<th>" + u + "</th>")),
                      (g +=
                        '<td data-date="' +
                        l +
                        '" data-month="' +
                        O +
                        '" data-year="' +
                        d +
                        '" class="xdsoft_date xdsoft_day_of_week' +
                        p.getDay() +
                        " " +
                        b.join(" ") +
                        '" title="' +
                        h +
                        '"><div>' +
                        l +
                        "</div></td>"),
                      p.getDay() === F.dayOfWeekStartPrev &&
                        ((g += "</tr>"), (_ = !0)),
                      p.setDate(l + 1);
                  }
                  (g += "</tbody></table>"),
                    z.html(g),
                    j
                      .find(".xdsoft_label span")
                      .eq(0)
                      .text(F.i18n[a].months[H.currentTime.getMonth()]),
                    j
                      .find(".xdsoft_label span")
                      .eq(1)
                      .text(H.currentTime.getFullYear() + F.yearOffset),
                    (M = ""),
                    (O = "");
                  var S = 0;
                  if (!1 !== F.minTime) {
                    var Y = H.strtotime(F.minTime);
                    S = 60 * Y.getHours() + Y.getMinutes();
                  }
                  var C = 1440;
                  if (!1 !== F.maxTime) {
                    Y = H.strtotime(F.maxTime);
                    C = 60 * Y.getHours() + Y.getMinutes();
                  }
                  if (!1 !== F.minDateTime) {
                    Y = H.strToDateTime(F.minDateTime);
                    if (
                      n.formatDate(H.currentTime, F.formatDate) ===
                      n.formatDate(Y, F.formatDate)
                    )
                      (O = 60 * Y.getHours() + Y.getMinutes()) > S && (S = O);
                  }
                  if (!1 !== F.maxDateTime) {
                    var O;
                    Y = H.strToDateTime(F.maxDateTime);
                    if (
                      n.formatDate(H.currentTime, F.formatDate) ===
                      n.formatDate(Y, F.formatDate)
                    )
                      (O = 60 * Y.getHours() + Y.getMinutes()) < C && (C = O);
                  }
                  if (
                    ((f = function (o, a) {
                      var r,
                        i = H.now(),
                        s =
                          F.allowTimes &&
                          e.isArray(F.allowTimes) &&
                          F.allowTimes.length;
                      i.setHours(o),
                        (o = parseInt(i.getHours(), 10)),
                        i.setMinutes(a),
                        (a = parseInt(i.getMinutes(), 10)),
                        (b = []);
                      var l = 60 * o + a;
                      (t.is("[disabled]") || l >= C || l < S) &&
                        b.push("xdsoft_disabled"),
                        (r = new Date(H.currentTime)).setHours(
                          parseInt(H.currentTime.getHours(), 10)
                        ),
                        s ||
                          r.setMinutes(
                            Math[F.roundTime](
                              H.currentTime.getMinutes() / F.step
                            ) * F.step
                          ),
                        (F.initTime || F.defaultSelect || W.data("changed")) &&
                          r.getHours() === parseInt(o, 10) &&
                          ((!s && F.step > 59) ||
                            r.getMinutes() === parseInt(a, 10)) &&
                          (F.defaultSelect || W.data("changed")
                            ? b.push("xdsoft_current")
                            : F.initTime && b.push("xdsoft_init_time")),
                        parseInt(x.getHours(), 10) === parseInt(o, 10) &&
                          parseInt(x.getMinutes(), 10) === parseInt(a, 10) &&
                          b.push("xdsoft_today"),
                        (M +=
                          '<div class="xdsoft_time ' +
                          b.join(" ") +
                          '" data-hour="' +
                          o +
                          '" data-minute="' +
                          a +
                          '">' +
                          n.formatDate(i, F.formatTime) +
                          "</div>");
                    }),
                    F.allowTimes &&
                      e.isArray(F.allowTimes) &&
                      F.allowTimes.length)
                  )
                    for (D = 0; D < F.allowTimes.length; D += 1)
                      f(
                        H.strtotime(F.allowTimes[D]).getHours(),
                        (O = H.strtotime(F.allowTimes[D]).getMinutes())
                      );
                  else
                    for (D = 0, r = 0; D < (F.hours12 ? 12 : 24); D += 1)
                      for (r = 0; r < 60; r += F.step) {
                        var P = 60 * D + r;
                        P < S ||
                          P >= C ||
                          f(
                            (D < 10 ? "0" : "") + D,
                            (O = (r < 10 ? "0" : "") + r)
                          );
                      }
                  for (
                    N.html(M), o = "", D = parseInt(F.yearStart, 10);
                    D <= parseInt(F.yearEnd, 10);
                    D += 1
                  )
                    o +=
                      '<div class="xdsoft_option ' +
                      (H.currentTime.getFullYear() === D
                        ? "xdsoft_current"
                        : "") +
                      '" data-value="' +
                      D +
                      '">' +
                      (D + F.yearOffset) +
                      "</div>";
                  for (
                    q.children().eq(0).html(o),
                      D = parseInt(F.monthStart, 10),
                      o = "";
                    D <= parseInt(F.monthEnd, 10);
                    D += 1
                  )
                    o +=
                      '<div class="xdsoft_option ' +
                      (H.currentTime.getMonth() === D ? "xdsoft_current" : "") +
                      '" data-value="' +
                      D +
                      '">' +
                      F.i18n[a].months[D] +
                      "</div>";
                  B.children().eq(0).html(o), e(W).trigger("generate.xdsoft");
                }, 10)),
                i.stopPropagation();
            }).on("afterOpen.xdsoft", function () {
              var e, t, n, o;
              F.timepicker &&
                (N.find(".xdsoft_current").length
                  ? (e = ".xdsoft_current")
                  : N.find(".xdsoft_init_time").length &&
                    (e = ".xdsoft_init_time"),
                e
                  ? ((t = E[0].clientHeight),
                    (n = N[0].offsetHeight) - t <
                      (o = N.find(e).index() * F.timeHeightInTimePicker + 1) &&
                      (o = n - t),
                    E.trigger("scroll_element.xdsoft_scroller", [
                      parseInt(o, 10) / (n - t),
                    ]))
                  : E.trigger("scroll_element.xdsoft_scroller", [0]));
            }),
            (i = 0),
            z.on("touchend click.xdsoft", "td", function (n) {
              n.stopPropagation(), (i += 1);
              var o = e(this),
                a = H.currentTime;
              if (
                (null == a && ((H.currentTime = H.now()), (a = H.currentTime)),
                o.hasClass("xdsoft_disabled"))
              )
                return !1;
              a.setDate(1),
                a.setFullYear(o.data("year")),
                a.setMonth(o.data("month")),
                a.setDate(o.data("date")),
                W.trigger("select.xdsoft", [a]),
                t.val(H.str()),
                F.onSelectDate &&
                  e.isFunction(F.onSelectDate) &&
                  F.onSelectDate.call(W, H.currentTime, W.data("input"), n),
                W.data("changed", !0),
                W.trigger("xchange.xdsoft"),
                W.trigger("changedatetime.xdsoft"),
                (i > 1 ||
                  !0 === F.closeOnDateSelect ||
                  (!1 === F.closeOnDateSelect && !F.timepicker)) &&
                  !F.inline &&
                  W.trigger("close.xdsoft"),
                setTimeout(function () {
                  i = 0;
                }, 200);
            }),
            N.on("touchstart", "div", function (e) {
              this.touchMoved = !1;
            })
              .on("touchmove", "div", X)
              .on("touchend click.xdsoft", "div", function (t) {
                if (!this.touchMoved) {
                  t.stopPropagation();
                  var n = e(this),
                    o = H.currentTime;
                  if (
                    (null == o &&
                      ((H.currentTime = H.now()), (o = H.currentTime)),
                    n.hasClass("xdsoft_disabled"))
                  )
                    return !1;
                  o.setHours(n.data("hour")),
                    o.setMinutes(n.data("minute")),
                    W.trigger("select.xdsoft", [o]),
                    W.data("input").val(H.str()),
                    F.onSelectTime &&
                      e.isFunction(F.onSelectTime) &&
                      F.onSelectTime.call(W, H.currentTime, W.data("input"), t),
                    W.data("changed", !0),
                    W.trigger("xchange.xdsoft"),
                    W.trigger("changedatetime.xdsoft"),
                    !0 !== F.inline &&
                      !0 === F.closeOnTimeSelect &&
                      W.trigger("close.xdsoft");
                }
              }),
            A.on("mousewheel.xdsoft", function (e) {
              return (
                !F.scrollMonth ||
                (e.deltaY < 0 ? H.nextMonth() : H.prevMonth(), !1)
              );
            }),
            t.on("mousewheel.xdsoft", function (e) {
              return (
                !F.scrollInput ||
                (!F.datepicker && F.timepicker
                  ? ((s = N.find(".xdsoft_current").length
                      ? N.find(".xdsoft_current").eq(0).index()
                      : 0) +
                      e.deltaY >=
                      0 &&
                      s + e.deltaY < N.children().length &&
                      (s += e.deltaY),
                    N.children().eq(s).length &&
                      N.children().eq(s).trigger("mousedown"),
                    !1)
                  : F.datepicker && !F.timepicker
                  ? (A.trigger(e, [e.deltaY, e.deltaX, e.deltaY]),
                    t.val && t.val(H.str()),
                    W.trigger("changedatetime.xdsoft"),
                    !1)
                  : void 0)
              );
            }),
            W.on("changedatetime.xdsoft", function (t) {
              if (F.onChangeDateTime && e.isFunction(F.onChangeDateTime)) {
                var n = W.data("input");
                F.onChangeDateTime.call(W, H.currentTime, n, t),
                  delete F.value,
                  n.trigger("change");
              }
            })
              .on("generate.xdsoft", function () {
                F.onGenerate &&
                  e.isFunction(F.onGenerate) &&
                  F.onGenerate.call(W, H.currentTime, W.data("input")),
                  G && (W.trigger("afterOpen.xdsoft"), (G = !1));
              })
              .on("click.xdsoft", function (e) {
                e.stopPropagation();
              }),
            (s = 0),
            (P = function (e, t) {
              do {
                if (!(e = e.parentNode) || !1 === t(e)) break;
              } while ("HTML" !== e.nodeName);
            }),
            (l = function () {
              var t, n, o, a, r, i, s, l, d, u, c, f, h;
              if (
                ((t = (l = W.data("input")).offset()),
                (n = l[0]),
                (u = "top"),
                (o = t.top + n.offsetHeight - 1),
                (a = t.left),
                (r = "absolute"),
                (d = e(F.contentWindow).width()),
                (f = e(F.contentWindow).height()),
                (h = e(F.contentWindow).scrollTop()),
                F.ownerDocument.documentElement.clientWidth - t.left <
                  A.parent().outerWidth(!0))
              ) {
                var m = A.parent().outerWidth(!0) - n.offsetWidth;
                a -= m;
              }
              "rtl" === l.parent().css("direction") &&
                (a -= W.outerWidth() - l.outerWidth()),
                F.fixed
                  ? ((o -= h),
                    (a -= e(F.contentWindow).scrollLeft()),
                    (r = "fixed"))
                  : ((s = !1),
                    P(n, function (e) {
                      return (
                        null !== e &&
                        ("fixed" ===
                        F.contentWindow
                          .getComputedStyle(e)
                          .getPropertyValue("position")
                          ? ((s = !0), !1)
                          : void 0)
                      );
                    }),
                    s && !F.insideParent
                      ? ((r = "fixed"),
                        o + W.outerHeight() > f + h
                          ? ((u = "bottom"), (o = f + h - t.top))
                          : (o -= h))
                      : o + W[0].offsetHeight > f + h &&
                        (o = t.top - W[0].offsetHeight + 1),
                    o < 0 && (o = 0),
                    a + n.offsetWidth > d && (a = d - n.offsetWidth)),
                (i = W[0]),
                P(i, function (e) {
                  if (
                    "relative" ===
                      F.contentWindow
                        .getComputedStyle(e)
                        .getPropertyValue("position") &&
                    d >= e.offsetWidth
                  )
                    return (a -= (d - e.offsetWidth) / 2), !1;
                }),
                (c = {
                  position: r,
                  left: F.insideParent ? n.offsetLeft : a,
                  top: "",
                  bottom: "",
                }),
                F.insideParent
                  ? (c[u] = n.offsetTop + n.offsetHeight)
                  : (c[u] = o),
                W.css(c);
            }),
            W.on("open.xdsoft", function (t) {
              var n = !0;
              F.onShow &&
                e.isFunction(F.onShow) &&
                (n = F.onShow.call(W, H.currentTime, W.data("input"), t)),
                !1 !== n &&
                  (W.show(),
                  l(),
                  e(F.contentWindow)
                    .off("resize.xdsoft", l)
                    .on("resize.xdsoft", l),
                  F.closeOnWithoutClick &&
                    e([F.ownerDocument.body, F.contentWindow]).on(
                      "touchstart mousedown.xdsoft",
                      function t() {
                        W.trigger("close.xdsoft"),
                          e([F.ownerDocument.body, F.contentWindow]).off(
                            "touchstart mousedown.xdsoft",
                            t
                          );
                      }
                    ));
            })
              .on("close.xdsoft", function (t) {
                var n = !0;
                j
                  .find(".xdsoft_month,.xdsoft_year")
                  .find(".xdsoft_select")
                  .hide(),
                  F.onClose &&
                    e.isFunction(F.onClose) &&
                    (n = F.onClose.call(W, H.currentTime, W.data("input"), t)),
                  !1 === n || F.opened || F.inline || W.hide(),
                  t.stopPropagation();
              })
              .on("toggle.xdsoft", function () {
                W.is(":visible")
                  ? W.trigger("close.xdsoft")
                  : W.trigger("open.xdsoft");
              })
              .data("input", t),
            (V = 0),
            W.data("xdsoft_datetime", H),
            W.setOptions(F),
            H.setCurrentTime(U()),
            t
              .data("xdsoft_datetimepicker", W)
              .on(
                "open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart",
                function () {
                  t.is(":disabled") ||
                    (t.data("xdsoft_datetimepicker").is(":visible") &&
                      F.closeOnInputClick) ||
                    (F.openOnFocus &&
                      (clearTimeout(V),
                      (V = setTimeout(function () {
                        t.is(":disabled") ||
                          ((G = !0),
                          H.setCurrentTime(U(), !0),
                          F.mask && J(F),
                          W.trigger("open.xdsoft"));
                      }, 100))));
                }
              )
              .on("keydown.xdsoft", function (t) {
                var n,
                  o = t.which;
                return -1 !== [p].indexOf(o) && F.enterLikeTab
                  ? ((n = e(
                      "input:visible,textarea:visible,button:visible,a:visible"
                    )),
                    W.trigger("close.xdsoft"),
                    n.eq(n.index(this) + 1).focus(),
                    !1)
                  : -1 !== [b].indexOf(o)
                  ? (W.trigger("close.xdsoft"), !0)
                  : void 0;
              })
              .on("blur.xdsoft", function () {
                W.trigger("close.xdsoft");
              });
        }),
        (s = function (t) {
          var n = t.data("xdsoft_datetimepicker");
          n &&
            (n.data("xdsoft_datetime", null),
            n.remove(),
            t.data("xdsoft_datetimepicker", null).off(".xdsoft"),
            e(F.contentWindow).off("resize.xdsoft"),
            e([F.contentWindow, F.ownerDocument.body]).off(
              "mousedown.xdsoft touchstart"
            ),
            t.unmousewheel && t.unmousewheel());
        }),
        e(F.ownerDocument)
          .off("keydown.xdsoftctrl keyup.xdsoftctrl")
          .off("keydown.xdsoftcmd keyup.xdsoftcmd")
          .on("keydown.xdsoftctrl", function (e) {
            e.keyCode === m && (O = !0);
          })
          .on("keyup.xdsoftctrl", function (e) {
            e.keyCode === m && (O = !1);
          })
          .on("keydown.xdsoftcmd", function (e) {
            91 === e.keyCode && !0;
          })
          .on("keyup.xdsoftcmd", function (e) {
            91 === e.keyCode && !1;
          }),
        this.each(function () {
          var t,
            a = e(this).data("xdsoft_datetimepicker");
          if (a) {
            if ("string" === e.type(o))
              switch (o) {
                case "show":
                  e(this).select().focus(), a.trigger("open.xdsoft");
                  break;
                case "hide":
                  a.trigger("close.xdsoft");
                  break;
                case "toggle":
                  a.trigger("toggle.xdsoft");
                  break;
                case "destroy":
                  s(e(this));
                  break;
                case "reset":
                  (this.value = this.defaultValue),
                    (this.value &&
                      a
                        .data("xdsoft_datetime")
                        .isValidDate(n.parseDate(this.value, F.format))) ||
                      a.data("changed", !1),
                    a.data("xdsoft_datetime").setCurrentTime(this.value);
                  break;
                case "validate":
                  a.data("input").trigger("blur.xdsoft");
                  break;
                default:
                  a[o] && e.isFunction(a[o]) && (l = a[o](r));
              }
            else a.setOptions(o);
            return 0;
          }
          "string" !== e.type(o) &&
            (!F.lazyInit || F.open || F.inline
              ? i(e(this))
              : (t = e(this)).on(
                  "open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart",
                  function e() {
                    t.is(":disabled") ||
                      t.data("xdsoft_datetimepicker") ||
                      (clearTimeout(H),
                      (H = setTimeout(function () {
                        t.data("xdsoft_datetimepicker") || i(t),
                          t
                            .off(
                              "open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart",
                              e
                            )
                            .trigger("open.xdsoft");
                      }, 100)));
                  }
                ));
        }),
        l
      );
    }),
    (e.fn.datetimepicker.defaults = t);
};
!(function (e) {
  "function" == typeof define && define.amd
    ? define(["jquery", "jquery-mousewheel"], e)
    : "object" == typeof exports
    ? (module.exports = e(require("jquery")))
    : e(jQuery);
})(datetimepickerFactory),
  (function (e) {
    "function" == typeof define && define.amd
      ? define(["jquery"], e)
      : "object" == typeof exports
      ? (module.exports = e)
      : e(jQuery);
  })(function (e) {
    var t,
      n,
      o = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
      a =
        "onwheel" in document || document.documentMode >= 9
          ? ["wheel"]
          : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
      r = Array.prototype.slice;
    if (e.event.fixHooks)
      for (var i = o.length; i; ) e.event.fixHooks[o[--i]] = e.event.mouseHooks;
    var s = (e.event.special.mousewheel = {
      version: "3.1.12",
      setup: function () {
        if (this.addEventListener)
          for (var t = a.length; t; ) this.addEventListener(a[--t], l, !1);
        else this.onmousewheel = l;
        e.data(this, "mousewheel-line-height", s.getLineHeight(this)),
          e.data(this, "mousewheel-page-height", s.getPageHeight(this));
      },
      teardown: function () {
        if (this.removeEventListener)
          for (var t = a.length; t; ) this.removeEventListener(a[--t], l, !1);
        else this.onmousewheel = null;
        e.removeData(this, "mousewheel-line-height"),
          e.removeData(this, "mousewheel-page-height");
      },
      getLineHeight: function (t) {
        var n = e(t),
          o = n["offsetParent" in e.fn ? "offsetParent" : "parent"]();
        return (
          o.length || (o = e("body")),
          parseInt(o.css("fontSize"), 10) ||
            parseInt(n.css("fontSize"), 10) ||
            16
        );
      },
      getPageHeight: function (t) {
        return e(t).height();
      },
      settings: { adjustOldDeltas: !0, normalizeOffset: !0 },
    });
    function l(o) {
      var a,
        i = o || window.event,
        l = r.call(arguments, 1),
        c = 0,
        f = 0,
        h = 0,
        m = 0,
        g = 0;
      if (
        (((o = e.event.fix(i)).type = "mousewheel"),
        "detail" in i && (h = -1 * i.detail),
        "wheelDelta" in i && (h = i.wheelDelta),
        "wheelDeltaY" in i && (h = i.wheelDeltaY),
        "wheelDeltaX" in i && (f = -1 * i.wheelDeltaX),
        "axis" in i && i.axis === i.HORIZONTAL_AXIS && ((f = -1 * h), (h = 0)),
        (c = 0 === h ? f : h),
        "deltaY" in i && (c = h = -1 * i.deltaY),
        "deltaX" in i && ((f = i.deltaX), 0 === h && (c = -1 * f)),
        0 !== h || 0 !== f)
      ) {
        if (1 === i.deltaMode) {
          var p = e.data(this, "mousewheel-line-height");
          (c *= p), (h *= p), (f *= p);
        } else if (2 === i.deltaMode) {
          var D = e.data(this, "mousewheel-page-height");
          (c *= D), (h *= D), (f *= D);
        }
        if (
          ((a = Math.max(Math.abs(h), Math.abs(f))),
          (!n || a < n) && ((n = a), u(i, a) && (n /= 40)),
          u(i, a) && ((c /= 40), (f /= 40), (h /= 40)),
          (c = Math[c >= 1 ? "floor" : "ceil"](c / n)),
          (f = Math[f >= 1 ? "floor" : "ceil"](f / n)),
          (h = Math[h >= 1 ? "floor" : "ceil"](h / n)),
          s.settings.normalizeOffset && this.getBoundingClientRect)
        ) {
          var x = this.getBoundingClientRect();
          (m = o.clientX - x.left), (g = o.clientY - x.top);
        }
        return (
          (o.deltaX = f),
          (o.deltaY = h),
          (o.deltaFactor = n),
          (o.offsetX = m),
          (o.offsetY = g),
          (o.deltaMode = 0),
          l.unshift(o, c, f, h),
          t && clearTimeout(t),
          (t = setTimeout(d, 200)),
          (e.event.dispatch || e.event.handle).apply(this, l)
        );
      }
    }
    function d() {
      n = null;
    }
    function u(e, t) {
      return (
        s.settings.adjustOldDeltas && "mousewheel" === e.type && t % 120 == 0
      );
    }
    e.fn.extend({
      mousewheel: function (e) {
        return e ? this.bind("mousewheel", e) : this.trigger("mousewheel");
      },
      unmousewheel: function (e) {
        return this.unbind("mousewheel", e);
      },
    });
  });
