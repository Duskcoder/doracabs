// Local Inner tab javascript

$(document).ready(function (e) {
  $(".One_addmore").click(function (e) {
    e.preventDefault();
    $("#One_inner").prepend(`
        <div class='input-group '>
             <div class="input-group mb-3 form_clock">
                <span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                <input type="text" class="form-control" id="inputDestination" placeholder= "Next Location">    
                </div>
                    <a href="#" class="removeInput">Remove</a>
        </div>

      `);
  });
});

//  Round Trip Inner Tab JavaScript

//  $(document).ready(function(e){
//    $(".addmore").click(function(e){
//      e.preventDefault();
//        $("#rt_inner").prepend(`
//        <div class='input-group '>
//             <div class="input-group mb-3 form_clock">
//                <span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
//                <input type="text" class="form-control" id="inputDestination" placeholder= "Next Location">
//                </div>
//                    <a href="#" class="removeInput">Remove</a>
//        </div>
//        `);
//    });
//
//    $(document).on('click', '.removeInput', function(e){
//      e.preventDefault();
//      let removeField = $(this).parent();
//      $(removeField).remove();
//    });
//
//  });

// Accordion JavaScript

var acc = document.getElementsByClassName("accordion_btn");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
