$(document).ready(function () {
  jQuery(".numbersOnly").keyup(function () {
    this.value = this.value.replace(/[^0-9\.]/g, "");
  });

  jQuery(".lettersOnly").keyup(function () {
    this.value = this.value.replace(/[^a-zA-Z\s]+$/g, "");
  });

  jQuery(".alphanimericOnly").keyup(function () {
    this.value = this.value.replace(/[^A-Za-z0-9.\/\s]/g, "");
  });

  jQuery(".address").keyup(function () {
    this.value = this.value.replace(/[^A-Za-z0-9//,.\/\s]/g, "");
  });
});
